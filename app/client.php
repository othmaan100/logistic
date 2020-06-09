<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class client extends Model
{
    //
    protected $fillable = [
        'client_name','client_phone', 'client_address',
    ];


    //Table Name
    protected $table = 'tbl_clients';

    //primary key
    public $primaryKey ='id';
    //TimeStamps
    public $timeStamps = true;

    public function myGood()
    {
        return $this->hasMany('App\Good', 'client_id');
        
    } 
}
