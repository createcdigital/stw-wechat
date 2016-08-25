<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\PurchaseHistory;
use App\Models\Store;
use Illuminate\Http\Request;

use App\Http\Requests;

class HomePageController extends BaseController
{

    public function homePage()
    {
        // slider
        $sliderList = Store::where('is_recommend', '1')
                            ->where('status', '1')
                            ->orderBy('home_sort_index')
                            ->get();


        return view('homepage', ['sliderList' => $sliderList,
                                'attractionsList' => $this->getAttractionsData(),
                                'foodList' => $this->getFoodData(),
                                'shippingList' => $this->getShippingData(),
                                'entertainmentList' => $this->getEntertainmentData(),
                                'jssdk' => $this->JSSDK
        ]);
    }

    public function getDataByCategoryId($categoryId)
    {
        switch($categoryId)
        {
            case 1:
                return $this->getAttractionsData();
                break;
            case 2:
                return $this->getFoodData();
                break;
            case 3:
                return $this->getShippingData();
                break;
            case 4:
                return $this->getEntertainmentData();
                break;
        }
    }


    private function getAttractionsData()
    {
        $list = Store::where('location_code', 'AIRPORT_CAIRNS')
            ->where('categories', 'like', '旅游景点%')
            ->where('status', '1')
            ->where('is_recommend', 0)
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
                                ->get();
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

    private function getFoodData(){
        $list = Store::where('location_code', 'AIRPORT_CAIRNS')
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

    private function getShippingData()
    {

        $list = Store::where('location_code', 'AIRPORT_CAIRNS')
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

    private function getEntertainmentData()
    {

        $list = Store::where('location_code', 'AIRPORT_CAIRNS')
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
