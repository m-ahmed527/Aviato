<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    use HasFactory;
    protected $fillable = [
        'slug',
        'name',
    ];

    function attribute() {
        return $this->belongsTo(Attribute::class);
    }

    function products()  {
        return $this->belongsToMany(Product::class,'product_variants','variant_id','product_id');
    }
}
