<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;


    // function products() {
    //     return $this->belongsToMany(Product::class,'attribute_prooducts','attribute_id','product_id');
    // }

    function variants() {
        return $this->hasMany(Variant::class);
    }
}
