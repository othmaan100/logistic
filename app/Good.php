<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    //
    protected $fillable = [
        'good_id_no','truck_id','good_type','good_weight','good_cost','diesel_cost','commission','road_expenses','client_id','good_date_of_pickup', 'good_date_of_delivery','good_pickup_point','good_delivery_point',
    ];
    
    //Table Name
    protected $table = 'tbl_good';

    //primary key
    public $primaryKey ='good_id'; 
    //TimeStamps
    public $timeStamps = true;

    public function myExpenses()
    {
        return $this->hasMany('App\Expense','good_id');
        
    }
    public function myPayments()
    {
        return $this->hasMany('App\Payment','good_id');
        
    } 
}
