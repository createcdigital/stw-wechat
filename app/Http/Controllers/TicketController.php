<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class TicketController extends BaseController
{

    public function qrcode($orderid)
    {
        return view('qrcode', ['qrcodeurl' => url('/ticket') . '/' . $orderid, 'jssdk' => $this->JSSDK]);//
    }


    public function ticketInfo($out_trade_no)
    {
        $data['ticketInfo'] = PurchaseHistory::where("out_trade_no","=",$out_trade_no)->get();
        return view('ticketinfo',$data);

    }
}
