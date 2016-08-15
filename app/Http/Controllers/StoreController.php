<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\PurchaseHistory;
use App\Models\Store;
use Illuminate\Http\Request;

use App\Http\Requests;

class StoreController extends BaseController
{
    public function index($id)
    {
        $sliderList = [];
        $store = Store::where('id', $id)
                            ->where('status', '1')
                            ->get();
        if($store != null && count($store) > 0)
        {
            $sliderList = json_decode($store[0]->photo_list);


            $coupon = Coupon::where('store_id', $id)
                                ->where('status', '1')
                                ->first();

            return view('store-index', ['sliderList' => $sliderList,
                                        'coupon' => $coupon,
                                        'foodList' => $this->getFoodData($store[0]->business_name),
                                        'shippingList' => $this->getShippingData($store[0]->business_name),
                                        'entertainmentList' => $this->getEntertainmentData($store[0]->business_name),
                                        'jssdk' => $this->JSSDK
            ]);
        }

        return view('/');
    }


    private function getFoodData($location_code){
        $list = Store::where('location_code', $location_code)
            ->where('categories', 'like', '美食%')
            ->where('status', '1')
            ->orderBy('sort_index')
            ->get();

        $data = [];
        foreach($list as $l)
        {
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

    private function getShippingData($location_code)
    {

        $list = Store::where('location_code', $location_code)
            ->where('categories', 'like', '购物%')
            ->where('status', '1')
            ->orderBy('sort_index')
            ->get();

        $data = [];
        foreach($list as $l)
        {
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
            ->get();

        $data = [];
        foreach($list as $l)
        {
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
}
