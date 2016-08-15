<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Models\PurchaseHistory;
use EasyWeChat\Payment\Order;
use Illuminate\Support\Facades\Log;
use Overtrue\Socialite\User;

class PayController extends Controller
{
    protected $PAYMENT;
    protected $JSSDK;

    /**
     * PayController constructor.
     */
    public function __construct()
    {
        $this->PAYMENT = app('wechat')->payment;
        $this->JSSDK = app('wechat')->js;
    }



    public function pay($id, $p)
    {



        return redirect('/');
    }


    public function proof($orderid)
    {
        return view('Journey.proof', ['qrcodeurl' => url('/ticket') . '/' . $orderid, 'jssdk' => $this->JSSDK]);//
    }


    //二维码信息
  public function ticketInfo($out_trade_no)
  {
    $data['ticketInfo'] = PurchaseHistory::where("out_trade_no","=",$out_trade_no)->get();
    return view('Journey.ticketinfo',$data);

  }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }



    /**
     * Save to DB
     *
     * @param $weChatUserInfo
     * @param $dataPurchaseHistory
     */
    private function saveToDB($weChatUserInfo, $dataPurchaseHistory)
    {
        $purchaseHistory = new PurchaseHistory;
        $purchaseHistory->openid = $weChatUserInfo['openid'];
        $purchaseHistory->nickname = $weChatUserInfo['nickname'];
        $purchaseHistory->sex = $weChatUserInfo['sex'];
        $purchaseHistory->city = $weChatUserInfo['city'];
        $purchaseHistory->country = $weChatUserInfo['country'];
        $purchaseHistory->province = $weChatUserInfo['province'];
        $purchaseHistory->headimgurl = $weChatUserInfo['headimgurl'];
        $purchaseHistory->language = $weChatUserInfo['language'];
        // can't read from easywechat(version 3.1)
//        $purchaseHistory->groupid = $weChatUserInfo['groupid'];
//        $purchaseHistory->unionid = $weChatUserInfo['unionid'];
//        $purchaseHistory->subscribe = $weChatUserInfo['subscribe'];
//        $purchaseHistory->subscribe_time = $weChatUserInfo['subscribe_time'];
//        $purchaseHistory->remark = $weChatUserInfo['remark'];
        $purchaseHistory->groupid = '';
        $purchaseHistory->unionid = '';
        $purchaseHistory->subscribe = 0;
        $purchaseHistory->subscribe_time = '';
        $purchaseHistory->remark = '';
        $purchaseHistory->store_id = $dataPurchaseHistory['store_id'];
        $purchaseHistory->store_name = $dataPurchaseHistory['store_name'];
        $purchaseHistory->coupon_id = $dataPurchaseHistory['coupon_id'];
        $purchaseHistory->coupon_set_name = $dataPurchaseHistory['coupon_set_name'];
        $purchaseHistory->coupon_set_price = $dataPurchaseHistory['coupon_set_price'];
        $purchaseHistory->out_trade_no = $dataPurchaseHistory['out_trade_no'];
        $purchaseHistory->qrcode_url = $dataPurchaseHistory['qrcode_url'];
        $purchaseHistory->save();
    }

    /**
     * Get WeChat UserInfo
     *
     * @return mixed
     */
    private function getWeChatUserInfo()
    {
        $wechat_user = session()->get('wechat.oauth_user');
        // for debug
        //return json_decode($wechat_user->getOriginal());
        return $wechat_user->getOriginal();
    }


    /**
     * Generate to PaymentJS
     *
     * @param $data
     * @return bool
     */
    private function generatePaymentJS($data)
    {
        //Log::info("========generatePaymentJS, openid:" . $data['openid']);
        $attributes = [
            'trade_type' => 'JSAPI',
            'body' => $data['store_name'] . "套餐(" . $data['coupon_set_name'] . ")",
            'detail' => $data['store_name'] . "套餐(" . $data['coupon_set_name'] . ")",
            'out_trade_no' => $data['out_trade_no'],
            'total_fee' => str_replace(".", "", $data['coupon_set_price']),
            'notify_url' => url('/pay/notify'),
            'openid' => $data['openid'],
        ];
        $order = new Order($attributes);
        $result = $this->PAYMENT->prepare($order);

        //Log::info("========generatePaymentJS, result:" . $result->return_msg);
        if ($result->return_code == 'SUCCESS') {
            $prepayId = $result->prepay_id;
            $paymentJs = $this->PAYMENT->configForPayment($prepayId);

            return $paymentJs;
        }

        return false;
    }


    /**
     * test for wechat oauth
     */
    public function test(Request $request)
    {
        // fo debug
        $debug_user = array(
            'id'=> 'o6_bmjrPTlm6_2sgVt7hMZOPfL2M',
            'openid'=> 'o6_bmjrPTlm6_2sgVt7hMZOPfL2M',
            'nickname'=> 'Band',
            'name'=> 'Band',
            'avatar'=>'http://wx.qlogo.cn/mmopen/g3MonUZtNHkdmzicIlibx6iaFqAc56vxLSUfpb6n5WKSYVY0ChQKkiaJSgQ1dZuTOgvLLrhJbERQQ4eMsv84eavHiaiceqxibJxCfHe/0',
            'original'=>'{"subscribe": 1, "openid": "o6_bmjrPTlm6_2sgVt7hMZOPfL2M", "nickname": "Band", "sex": 1, "language": "zh_CN", "city": "广州", "province": "广东", "country": "中国", "headimgurl": "http://wx.qlogo.cn/mmopen/g3MonUZtNHkdmzicIlibx6iaFqAc56vxLSUfpb6n5WKSYVY0ChQKkiaJSgQ1dZuTOgvLLrhJbERQQ4eMsv84eavHiaiceqxibJxCfHe/0", "subscribe_time": 1382694957,"unionid": " o6_bmasdasdsad6_2sgVt7hMZOPfL", "remark": "","groupid": 0}',
            'token'=>'9NnUno3Fj7f9tAmPF5oVnp_Kch2zqCDdnef3ZypI_ePQ9Q7Moz9BWW86h0ab9R_pAIae0htpiJk0ERbd2VxngoMg7B_FPEVSZl5FEqONevuLdR0VDqbuvXhEfxRXCHCyATXaADAIBF'
        );
        $user = new User($debug_user);
        $request->session()->flush();
        $request->session()->put('wechat.oauth_user', $user);
        return redirect("/");
    }
}
