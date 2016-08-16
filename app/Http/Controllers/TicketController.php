<?php

namespace App\Http\Controllers;

use App\Models\PurchaseHistory;
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
        $ticketinfo = PurchaseHistory::where("out_trade_no", $out_trade_no)->first();

        if($ticketinfo != null)
            return view('ticketinfo',['ticketinfo' => $ticketinfo]);
        else
            return redirect('/');

    }
}
