<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Models\PurchaseHistory;
use EasyWeChat\Payment\Order;
use Illuminate\Support\Facades\Log;
use Overtrue\Socialite\User;

class JourneyController extends Controller
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function journey()
    {

        $data['scenery'] = DB::table('stores')->join('coupons', 'stores.id', '=', 'coupons.store_id')->select('stores.id', 'stores.business_name', 'stores.photo_list', 'coupons.quantity_sold')->where('categories', 'like', '旅游景点%')->get();
        $data['food'] = DB::table('stores')->join('coupons', 'stores.id', '=', 'coupons.store_id')->select('stores.id', 'stores.business_name', 'stores.photo_list', 'coupons.quantity_sold')->where('categories', 'like', '美食%')->get();
        $data['entertainment'] = DB::table('stores')->join('coupons', 'stores.id', '=', 'coupons.store_id')->select('stores.id', 'stores.business_name', 'stores.photo_list', 'coupons.quantity_sold')->where('categories', 'like', '休闲娱乐%')->get();
        $data['stay'] = DB::table('stores')->join('coupons', 'stores.id', '=', 'coupons.store_id')->select('stores.id', 'stores.business_name', 'stores.photo_list', 'coupons.quantity_sold')->where('categories', 'like', '酒店宾馆%')->get();
        //dd(json_decode($data['food'][0]->photo_list));
        //dd($data);
        foreach ($data as $key => $value) {
            foreach ($value as $k => $v) {
                $arr = json_decode($v->photo_list);
                $v->photo = $arr[0]->photo_url;
            }
        }
        return view('Journey.journey', $data);
    }


    public function detail($id)
    {
        //Log::info("=========detail, id:".$id);
        $stores = DB::table('coupons')->where('store_id', '=', $id)->get();

        $data['stores'] = $stores;
        $arr = json_decode($data['stores'][0]->photo_list);
        $data['stores'][0]->photo_array = $arr;

        $coupon_id = $data['stores'][0]->id;
        $coupon_title = $data['stores'][0]->title;
        $set_name = $data['stores'][0]->set1_name;
        $set_price = $data['stores'][0]->set1_price;



        if (session()->has('wechat.oauth_user')) {
            //Log::info("=========detail, openid: " . session('wechat.oauth_user')["id"]);

            $weChatUserInfo = $this->getWeChatUserInfo();
            $dataPurchaseHistory = [
                "coupon_id"        => $coupon_id,
                "coupon_title"     => $coupon_title,
                "coupon_set_name"  => $set_name,
                "coupon_set_price" => $set_price,
                "openid"           => $weChatUserInfo['openid'],
                "out_trade_no"     => date("YmdHis") . uniqid(),
                "qrcode_url"       => url('/proof') . '/' . date("YmdHis") . uniqid(),
            ];

            $this->saveToDB($weChatUserInfo, $dataPurchaseHistory);

            $paymentJS = $this->generatePaymentJS($dataPurchaseHistory);
            // for debug
            //$paymentJS = '[{appid: "appid"}]';
            if ($paymentJS) {
                $data['paymentjs'] = $paymentJS;
                $data{'qrcodeurl'} = $dataPurchaseHistory['qrcode_url'];
                return view('Journey.detail', $data);
            }

        }


        return redirect('/');
    }


    public function proof($orderid)
    {
        return view('Journey.proof', ['qrcodeurl' => url('/ticket') . '/' . $orderid, 'jssdk' => $this->JSSDK]);//
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

    public function ticketInfo($couponid)
    {

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
        $purchaseHistory->coupon_id = $dataPurchaseHistory['coupon_id'];
        $purchaseHistory->coupon_title = $dataPurchaseHistory['coupon_title'];
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
            'body' => $data['coupon_title'] . "套餐(" . $data['coupon_set_name'] . ")",
            'detail' => $data['coupon_title'] . "套餐(" . $data['coupon_set_name'] . ")",
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
}
