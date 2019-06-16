<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActivationCode extends Model
{
    protected  $fillable=['user_id' , 'code' , 'used' , 'expire'];
}
