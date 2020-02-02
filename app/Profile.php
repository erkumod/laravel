<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //

    public function PrimaryCar()
    {
        return $this->hasOne('App\MyCar','user_id' , 'user_id')->where('primary',true);
    }

    public function PrimaryCard()
    {
        return $this->hasOne('App\PaymentCard','user_id' , 'user_id')->where('primary',true);
    }
}
