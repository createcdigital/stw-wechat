<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model {

    protected $fillable = [
        'status',
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

    /**
     * Get Status
     *
     * @param  string  $value
     * @return string
     */
    public function getIsRecommendAttribute($value)
    {
        switch($value)
        {
            case 0:
                return "off";
                break;
            case 1:
                return "on";
                break;
        }
    }

}
