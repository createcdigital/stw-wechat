<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Redirect, Input;
use DB;

class AjaxController extends Controller
{


  public function saveProof(Request $request)
  {

      $id = Input::get('id');
      $price_order = Input::get('order');
      $coupons =  DB::table('coupons')->where('store_id','=',$id)->get();
      if($price_order == 1){$set_name = $coupons[0]->set1_name;$set_price = $coupons[0]->set1_price;}
      if($price_order == '2'){$set_name = $coupons[0]->set2_name;$set_price =  $coupons[0]->set2_price;}
      if($price_order == '3'){$set_name =  $coupons[0]->set3_name;$set_price =  $coupons[0]->set3_price;}
      DB::table('purchase_histories')->insert(array('coupon_id' => $coupons[0]->id, 'set_name' =>$set_name,'set_price' =>$set_price,'pay_status' =>0));

      return response()->json(array('status' => 1,'msg' => 'ok'));

  }




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
