<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model {

    protected $fillable = [
        'card_id',
        'status'
    ];
    
    /**
     * Get Status
     *
     * @param  string  $value
     * @return string
     */
    public function getStatusAttribute($value)
    {
        switch($value)
        {
            case 0:
                return "Offline";
                break;
            case 1:
                return "Online";
                break;
        }
    }

}
