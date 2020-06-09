<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Drivers extends Model
{
    //
    protected $fillable = [
        'driver_id_no','driver_name','driver_phone', 'driver_address','driver_image',
    ];


    //Table Name
    protected $table = 'tbl_drivers';

    //primary key
    public $primaryKey ='driver_id';
    //TimeStamps
    public $timeStamps = true;

    public function myTruck()
    {
        return $this->hasOne('App\Truck', 'driver_id_no', 'driver_id_no');
        #return $this->hasOne('App\Truck');
    } 

    public function myTasks()
    {
        return $this->hasMany('App\Good', 'driver_id');
        
    } 
}
