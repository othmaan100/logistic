<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GoodsType extends Model
{
    //
     //Table Name
     protected $table = 'goodstypes';

     //primary key
     public $primaryKey ='id'; 
     //TimeStamps
     public $timeStamps = true;
 
}
