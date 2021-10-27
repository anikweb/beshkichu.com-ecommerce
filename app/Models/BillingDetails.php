<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillingDetails extends Model
{
    use HasFactory;
    public function order_summary(){
        return $this->hasMany(Order_Summary::class,'billing_id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function division(){
        return $this->belongsTo(Division::class,'region_id');
    }
    public function district(){
        return $this->belongsTo(District::class,'district_id');
    }
    public function upazila(){
        return $this->belongsTo(Upazila::class,'upazila_id');
    }


}
