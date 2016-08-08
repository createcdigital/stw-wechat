<?php

namespace App\Http\Controllers;

use App\Models\PurchaseHistory;
use EasyWeChat\Payment\Order;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Log;
use Overtrue\Socialite\User;

class PayController extends Controller
{
    protected $PAYMENT;

    /**
     * PayController constructor.
     */
    public function __construct()
    {
        $this->PAYMENT = app('wechat')->payment;
    }


    /**
     * pay
     */
    public function pay()
    {
        if (session()->has('wechat.oauth_user')) {

            // get param from request and session
            $data = [
                "coupon_id" => 1, // from Request
                "coupon_title" => "优惠卷标题", // from Request
                "coupon_set_name" => "单人套餐", // from Request
                "coupon_set_price" => "1", // from Request
                "openid" => session('wechat.oauth_user')["id"], // from session
                "out_trade_no" => date("YmdHis") . uniqid(),
            ];

            // insert to db
            $purchaseHistory =  new PurchaseHistory;
            $purchaseHistory->openid = $data['openid'];
            $purchaseHistory->coupon_id = $data['coupon_id'];
            $purchaseHistory->coupon_title = $data['coupon_title'];
            $purchaseHistory->coupon_set_name = $data['coupon_set_name'];
            $purchaseHistory->coupon_set_price = $data['coupon_set_price'];
            $purchaseHistory->out_trade_no = $data['out_trade_no'];
            $purchaseHistory->save();

            $paymentJS = $this->generatePaymentJS($data);
            if($paymentJS)
                return view('pay', ['openid' => $data['openid'], 'paymentjs' => $paymentJS]);

        }

        return redirect('/');
    }

    /**
     * Generate to PaymentJS
     *
     * @param $data
     * @return bool
     */
    public function generatePaymentJS($data)
    {
        $attributes = [
            'trade_type' => 'JSAPI',
            'body' => $data['coupon_title']."套餐(".$data['coupon_set_name'].")",
            'detail' => $data['coupon_title']."套餐(".$data['coupon_set_name'].")",
            'out_trade_no' =>  $data['out_trade_no'],
            'total_fee' => str_replace(".", "", $data['coupon_set_price']),
            'notify_url' => url('/pay/notify'),
            'openid' => $data['openid'],
        ];
        $order = new Order($attributes);
        $result = $this->PAYMENT->prepare($order);

        if ($result->return_code == 'SUCCESS') {
            $prepayId = $result->prepay_id;
            $paymentJs = $this->PAYMENT->configForPayment($prepayId);

            return $paymentJs;
        }

        return false;
    }

    /**
     * pay notify
     *
     * @return mixed
     */
    public function notify()
    {
        $response = $this->PAYMENT->handleNotify(function($notify, $successful){
            Log::info("============pay notify, successful:".$successful);

            if($successful)
            {
                Log::info("============pay notify data, out_trade_no:".$notify->out_trade_no.", transaction_id: ".$notify->transaction_id);

                $order = PurchaseHistory::where('out_trade_no', $notify->out_trade_no)->first();
                if($order == null)
                {
                    return true;
                }

                if($order->pay_status == 1)
                {
                    return true;
                }

                if($successful)
                {
                    $order->transaction_id = $notify->transaction_id;
                    $order->pay_status = 1;

                }else
                {
                    $order->transaction_id = $notify->transaction_id;
                    $order->pay_status = 2;
                }

                $order->save();
            }else
            {
                Log::info("============pay fail");
            }

            return true;
        });

        return $response;
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

        return redirect("/pay");
    }
}
