<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImageGallery extends Model
{
    use HasFactory;

    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }
    public function attribute(){
        return $this->belongsTo(ProductImageGallery::class,'image_gallery_id');
    }
}
