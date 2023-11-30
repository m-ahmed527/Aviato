<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'price',
        'slug',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    function getRouteKeyName()
    {
        return 'slug';
    }

    function attributes() {
        return $this->belongsToMany(Attribute::class,'attribute_products');
    }

    function variants()  {
        return $this->belongsToMany(Variant::class,'product_variants');
    }
}
