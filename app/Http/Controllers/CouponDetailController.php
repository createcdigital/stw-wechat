<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\PurchaseHistory;
use App\Models\Store;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use EasyWeChat\Payment\Order;
use Illuminate\Support\Facades\Log;
use Overtrue\Socialite\User;


class CouponDetailController extends BaseController
{
    /**
     * PayController constructor.
     */
    public function __construct()
    {
        $this->PAYMENT = app('wechat')->payment;
        $this->JSSDK = app('wechat')->js;
    }


    public function index($id, $p)
    {
        $coupon = Coupon::where('id', $id)
                        ->where('status', '1')
                        ->get();

        $package = [];
        if($coupon != null && count($coupon) > 0)
        {
            $coupon = $coupon[0];
            $package["coupon_id"] = $coupon->id;
            $package["p"] = $p;

            if($p == "a")
            {
                $package["title"] = $coupon->package_a_title;
                $package["price_children"] = $coupon->package_a_price_children;
                $package["price_adult"] = $coupon->package_a_price_adult;
                $package["price_family"] = $coupon->package_a_price_family;
                $package["available_date"] = $coupon->package_a_available_date;
                $package["quantity"] = $coupon->package_a_quantity;
                $package["image"] = $coupon->package_a_image;
                $package["description"] = $coupon->package_a_description;
            }

            if($p == "b")
            {
                $package["title"] = $coupon->package_b_title;
                $package["price_children"] = $coupon->package_b_price_children;
                $package["price_adult"] = $coupon->package_b_price_adult;
                $package["price_family"] = $coupon->package_b_price_family;
                $package["available_date"] = $coupon->package_b_available_date;
                $package["quantity"] = $coupon->package_b_quantity;
                $package["image"] = $coupon->package_b_image;
                $package["description"] = $coupon->package_b_description;
            }

            if($p == "c")
            {
                $package["title"] = $coupon->package_c_title;
                $package["price_children"] = $coupon->package_c_price_children;
                $package["price_adult"] = $coupon->package_c_price_adult;
                $package["price_family"] = $coupon->package_c_price_family;
                $package["available_date"] = $coupon->package_c_available_date;
                $package["quantity"] = $coupon->package_c_quantity;
                $package["image"] = $coupon->package_c_image;
                $package["description"] = $coupon->package_c_description;
            }

            if($p == "d")
            {
                $package["title"] = $coupon->package_d_title;
                $package["price_children"] = $coupon->package_d_price_children;
                $package["price_adult"] = $coupon->package_d_price_adult;
                $package["price_family"] = $coupon->package_d_price_family;
                $package["available_date"] = $coupon->package_d_available_date;
                $package["quantity"] = $coupon->package_d_quantity;
                $package["image"] = $coupon->package_d_image;
                $package["description"] = $coupon->package_d_description;
            }

            if($p == "e")
            {
                $package["title"] = $coupon->package_e_title;
                $package["price_children"] = $coupon->package_e_price_children;
                $package["price_adult"] = $coupon->package_e_price_adult;
                $package["price_family"] = $coupon->package_e_price_family;
                $package["available_date"] = $coupon->package_e_available_date;
                $package["quantity"] = $coupon->package_e_quantity;
                $package["image"] = $coupon->package_e_image;
                $package["description"] = $coupon->package_e_description;
            }

            if($p == "f")
            {
                $package["title"] = $coupon->package_f_title;
                $package["price_children"] = $coupon->package_f_price_children;
                $package["price_adult"] = $coupon->package_f_price_adult;
                $package["price_family"] = $coupon->package_f_price_family;
                $package["available_date"] = $coupon->package_f_available_date;
                $package["quantity"] = $coupon->package_f_quantity;
                $package["image"] = $coupon->package_f_image;
                $package["description"] = $coupon->package_f_description;
            }

            if($p == "g")
            {
                $package["title"] = $coupon->package_g_title;
                $package["price_children"] = $coupon->package_g_price_children;
                $package["price_adult"] = $coupon->package_g_price_adult;
                $package["price_family"] = $coupon->package_g_price_family;
                $package["available_date"] = $coupon->package_g_available_date;
                $package["quantity"] = $coupon->package_g_quantity;
                $package["image"] = $coupon->package_g_image;
                $package["description"] = $coupon->package_g_description;
            }

            if($p == "h")
            {
                $package["title"] = $coupon->package_h_title;
                $package["price_children"] = $coupon->package_h_price_children;
                $package["price_adult"] = $coupon->package_h_price_adult;
                $package["price_family"] = $coupon->package_h_price_family;
                $package["available_date"] = $coupon->package_h_available_date;
                $package["quantity"] = $coupon->package_h_quantity;
                $package["image"] = $coupon->package_h_image;
                $package["description"] = $coupon->package_h_description;
            }


            $coupon_id = $coupon->id;
            $set_name = $package["title"];
            $set_price = $package["price_adult"];


            if (session()->has('wechat.oauth_user')) {
                //Log::info("=========detail, openid: " . session('wechat.oauth_user')["id"]);

                $weChatUserInfo = $this->getWeChatUserInfo();
                $out_trade_no = date("YmdHis") . uniqid();
                $dataPurchaseHistory = [
                    "coupon_id" => $coupon_id,
                    "store_id" => $coupon->store_id,
                    "store_name" => $coupon->store_name,
                    "coupon_set_name" => $set_name,
                    "coupon_set_price" => $set_price,
                    "openid" => $weChatUserInfo['openid'],
                    "out_trade_no" => $out_trade_no,
                    "qrcode_url" => url('/qrcode') . '/' . $out_trade_no,
                ];

                $this->saveToDB($weChatUserInfo, $dataPurchaseHistory);

                $paymentJS = $this->generatePaymentJS($dataPurchaseHistory);
                // for debug
                //$paymentJS = '[{appid: "appid"}]';
                if ($paymentJS) {
                    return view('coupon-index', ['slider' => $package["image"],
                        'store_name' => $coupon->store_name,
                        'package' => $package,
                        'foodList' => $this->getFoodData($coupon->store_name),
                        'shippingList' => $this->getShippingData($coupon->store_name),
                        'entertainmentList' => $this->getEntertainmentData($coupon->store_name),
                        'jssdk' => $this->JSSDK,
                        'paymentjs' => $paymentJS,
                        'qrcodeurl' => $dataPurchaseHistory['qrcode_url']
                    ]);
                }

            }

        }

        return view('/');
    }

    private function getFoodData($location_code){
        $list = Store::where('location_code', $location_code)
            ->where('categories', 'like', '美食%')
            ->where('status', '1')
            ->orderBy('sort_index')
            ->first();

        $data = [];
        if($list != null) {
            $l = $list;

            $couponCount = Coupon::where('store_id', $l->id)
                ->where('status', '1')
                ->count();

            $startPrice = Coupon::where('store_id', $l->id)
                ->where('status', '1')
                ->min('package_a_price_adult');

            $purchaseCount = 0;
            $couponList = Coupon::where('store_id', $l->id)
                ->where('status', '1')
                ->get();;
            foreach ($couponList as $coupon) {
                $purchaseCount += PurchaseHistory::where('coupon_id', $coupon->id)
                    ->where('pay_status', '1')
                    ->count();
            }

            $item = [
                'store_id' => $l->id,
                'image' => json_decode($l->photo_list)[0]->photo_url,
                'packageCount' => $couponCount,
                'startPrice' => $startPrice,
                'purchaseCount' => $purchaseCount
            ];

            array_push($data, $item);
        }


        return $data;
    }

    private function getShippingData($location_code)
    {

        $list = Store::where('location_code', $location_code)
            ->where('categories', 'like', '购物%')
            ->where('status', '1')
            ->orderBy('sort_index')
            ->first();

        $data = [];
        if($list != null) {
            $l = $list;

            $couponCount = Coupon::where('store_id', $l->id)
                ->where('status', '1')
                ->count();

            $startPrice = Coupon::where('store_id', $l->id)
                ->where('status', '1')
                ->min('package_a_price_adult');

            $purchaseCount = 0;
            $couponList = Coupon::where('store_id', $l->id)
                ->where('status', '1')
                ->get();;
            foreach ($couponList as $coupon)
            {
                $purchaseCount += PurchaseHistory::where('coupon_id', $coupon->id)
                    ->where('pay_status', '1')
                    ->count();
            }

            $item = [
                'store_id' => $l->id,
                'image' => json_decode($l->photo_list)[0]->photo_url,
                'packageCount' => $couponCount,
                'startPrice' => $startPrice,
                'purchaseCount' => $purchaseCount
            ];

            array_push($data, $item);

        }

        return $data;
    }

    private function getEntertainmentData($location_code)
    {

        $list = Store::where('location_code', $location_code)
            ->where('categories', 'like', '休闲娱乐%')
            ->where('status', '1')
            ->orderBy('sort_index')
            ->first();

        $data = [];
        if($list != null) {
            $l = $list;

            $couponCount = Coupon::where('store_id', $l->id)
                ->where('status', '1')
                ->count();

            $startPrice = Coupon::where('store_id', $l->id)
                ->where('status', '1')
                ->min('package_a_price_adult');

            $purchaseCount = 0;
            $couponList = Coupon::where('store_id', $l->id)
                ->where('status', '1')
                ->get();;
            foreach ($couponList as $coupon)
            {
                $purchaseCount += PurchaseHistory::where('coupon_id', $coupon->id)
                    ->where('pay_status', '1')
                    ->count();
            }

            $item = [
                'store_id' => $l->id,
                'image' => json_decode($l->photo_list)[0]->photo_url,
                'packageCount' => $couponCount,
                'startPrice' => $startPrice,
                'purchaseCount' => $purchaseCount
            ];

            array_push($data, $item);

        }

        return $data;
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
