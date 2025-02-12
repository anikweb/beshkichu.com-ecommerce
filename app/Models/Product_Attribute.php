<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product_Attribute extends Model
{
    use HasFactory, SoftDeletes;
    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }
    public function color(){
        return $this->belongsTo(ProductColor::class,'color_id');
    }

    public function image(){
        return $this->belongsTo(ProductImageGallery::class,'image_gallery_id');
    }
    public function size(){
        return $this->hasMany(productSizeAttribute::class,'attribute_id');
    }
}
