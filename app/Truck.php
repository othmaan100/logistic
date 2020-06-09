<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Truck extends Model
{
    //
    protected $fillable = [
        'truck_model','plate_number','driver_id_no',
    ];

  
     public function myDriver()
    {
        return $this->belongsTo('App\Drivers', 'driver_id_no', 'driver_id_no');
    }  
    public function myGood()
    {
        return $this->hasMany('App\Good');
        #return $this->hasOne('App\Truck');
    } 
}
