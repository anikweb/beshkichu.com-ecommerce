<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contact_information extends Model
{
    use HasFactory;
    public function division(){
        return $this->belongsTo(Division::class,'division_id');
    }
    public function district(){
        return $this->belongsTo(District::class,'district_id');
    }
    public function upazila(){
        return $this->belongsTo(Upazila::class,'upazila_id');
    }
}
