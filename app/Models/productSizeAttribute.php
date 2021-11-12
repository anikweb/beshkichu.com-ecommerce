<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productSizeAttribute extends Model
{
    use HasFactory;
    public function attribute(){
        return $this->belongsTo(Product_Attribute::class,'attribute_id');
    }

}
