<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseHistory extends Model
{
    /**
     * Get Status
     *
     * @param  string  $value
     * @return string
     */
    public function getPayStatusAttribute($value)
    {
        switch($value)
        {
            case 0:
                return "未支付";
                break;
            case 1:
                return "已支付";
                break;
        }
    }

    /**
     * Get Sex
     *
     * @param  string  $value
     * @return string
     */
    public function getSexAttribute($value)
    {
        switch($value)
        {
            case 0:
                return "未知";
                break;
            case 1:
                return "男";
                break;
            case 2:
                return "女";
                break;
        }
    }

    /**
     * Get Sex
     *
     * @param  string  $value
     * @return string
     */
    public function getSubscribeAttribute($value)
    {
        switch($value)
        {
            case 0:
                return "未关注";
                break;
            case 1:
                return "已关注";
                break;
        }
    }
}
