<?php

namespace App\Http\Controllers;

use App\Models\PurchaseHistory;
use EasyWeChat\Payment\Order;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Log;

class PayController extends Controller
{
    protected $wechatApp;

    /**
     * PayController constructor.
     */
    public function __construct()
    {
        if (!session()->has('wechat.oauth_user')) {
            return redirect('/');
        }

        $this->wechatApp = app('wechat');
    }


    /**
     * pay
     */
    public function pay()
    {
        // get openid
        $wechat_user = session('wechat.oauth_user');
        $openid = $wechat_user["id"];

        // payment js
        $payment = $this->wechatApp->payment;
        $attributes = [
            'trade_type'       => 'JSAPI',
            'body'             => 'stw test',
            'detail'           => 'stw test',
            'out_trade_no'     => date("YmdHis").uniqid(),
            'total_fee'        => 1,
            'notify_url'       => url('/pay/notify'),
            'openid'           => $openid,
        ];
        $order = new Order($attributes);
        $result = $payment->prepare($order);

        if ($result->return_code == 'SUCCESS'){
            $prepayId = $result->prepay_id;
            $paymentJs = $payment->configForPayment($prepayId);

            return view('pay', ['openid' => $openid, 'paymentjs' => $paymentJs]);
        }


        return redirect('/');
    }

    /**
     * pay notify
     *
     * @return mixed
     */
    public function notify()
    {
        $response = $this->wechatApp->payment->handleNotify(function($notify, $successful){
            Log.info("============pay notify, transaction_id: ".$notify->transaction_id.", successful:".$successful);

            $order = PurchaseHistory::where('transaction_id', $notify->transaction_id).frist();
            if($order != null)
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
//        $debug_user = array(
//            'id'=> 'o6_bmjrPTlm6_2sgVt7hMZOPfL2M',
//            'nickname'=> 'Band',
//            'name'=> 'Band',
//            'avatar'=>'http://wx.qlogo.cn/mmopen/g3MonUZtNHkdmzicIlibx6iaFqAc56vxLSUfpb6n5WKSYVY0ChQKkiaJSgQ1dZuTOgvLLrhJbERQQ4eMsv84eavHiaiceqxibJxCfHe/0',
//            'original'=>'{"subscribe": 1, "openid": "o6_bmjrPTlm6_2sgVt7hMZOPfL2M", "nickname": "Band", "sex": 1, "language": "zh_CN", "city": "广州", "province": "广东", "country": "中国", "headimgurl": "http://wx.qlogo.cn/mmopen/g3MonUZtNHkdmzicIlibx6iaFqAc56vxLSUfpb6n5WKSYVY0ChQKkiaJSgQ1dZuTOgvLLrhJbERQQ4eMsv84eavHiaiceqxibJxCfHe/0", "subscribe_time": 1382694957,"unionid": " o6_bmasdasdsad6_2sgVt7hMZOPfL", "remark": "","groupid": 0}',
//            'token'=>'9NnUno3Fj7f9tAmPF5oVnp_Kch2zqCDdnef3ZypI_ePQ9Q7Moz9BWW86h0ab9R_pAIae0htpiJk0ERbd2VxngoMg7B_FPEVSZl5FEqONevuLdR0VDqbuvXhEfxRXCHCyATXaADAIBF'
//        );
        $debug_user = array(
            'id'=> 'onlckwsZdLbYwTnBKGdSDTUIku-I1',
            'nickname'=> '',
            'name'=> '',
            'avatar'=>'',
            'original'=>'',
            'token'=>'9NnUno3Fj7f9tAmPF5oVnp_Kch2zqCDdnef3ZypI_ePQ9Q7Moz9BWW86h0ab9R_pAIae0htpiJk0ERbd2VxngoMg7B_FPEVSZl5FEqONevuLdR0VDqbuvXhEfxRXCHCyATXaADAIBF'
        );
        $user = new User($debug_user);

        $request->session()->flush();
        $request->session()->put('wechat.oauth_user', $user);

        return redirect("/pay");
    }
}
