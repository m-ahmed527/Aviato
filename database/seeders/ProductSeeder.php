<?php

namespace Database\Seeders;

use App\Models\Attribute;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\Variant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'user_id' => '1',
                'slug' => 'shirt',
                'name' => 'shirt',
                'code' => 'S1',
                'price' => '500',

            ],
            [
                'user_id' => '1',
                'slug' => 'pent',
                'name' => 'pent',
                'code' => 'P1',
                'price' => '1500',

            ],
            [
                'user_id' => '1',
                'slug' => 'shirt',
                'name' => 'shirt',
                'code' => 'S2',
                'price' => '700',

            ],
            [
                'user_id' => '1',
                'slug' => 'pent',
                'name' => 'pent',
                'code' => 'p2',
                'price' => '900',

            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }

        $attributes = [
            [
                'slug' => 'color',
                'name' => 'Color',
            ],

            [
                'slug' => 'size',
                'name' => 'Size',
            ],

        ];


        foreach ($attributes as $attribute) {
           Attribute::create($attribute);
        }

        $variants = [
            [
                'attribute_id' => '1',
                'slug' => 'red',
                'name' => 'Red',
            ],
            [
                'attribute_id' => '1',
                'slug' => 'green',
                'name' => 'Green',
            ],
            [
                'attribute_id' => '1',
                'slug' => 'black',
                'name' => 'Black',
            ],
            [
                'attribute_id' => '2',
                'slug' => 'small',
                'name' => 'Small',
            ],
            [
                'attribute_id' => '2',
                'slug' => 'medium',
                'name' => 'Medium',
            ],
            [
                'attribute_id' => '2',
                'slug' => 'large',
                'name' => 'Large',
            ],
        ];

        foreach($variants as $variant)
        {
            Variant::create($variant);
        }

        $prodVariants = [
            [
                'variant_id' => '1',
                'product_id' => '1',
                'quantity' => '3',
            ],
            [
                'variant_id' => '2',
                'product_id' => '1',
                'quantity' => '5',
            ],
            [
                'variant_id' => '2',
                'product_id' => '2',
                'quantity' => '10',
            ],
            [
                'variant_id' => '3',
                'product_id' => '2',
                'quantity' => '2',
            ],
            [
                'variant_id' => '4',
                'product_id' => '1',
                'quantity' => '20',
            ],
            [
                'variant_id' => '5',
                'product_id' => '2',
                'quantity' => '15',
            ],
            [
                'variant_id' => '5',
                'product_id' => '3',
                'quantity' => '15',
            ],
            [
                'variant_id' => '5',
                'product_id' => '3',
                'quantity' => '15',
            ],
            [
                'variant_id' => '5',
                'product_id' => '4',
                'quantity' => '15',
            ],
        ];

        foreach($prodVariants as $pv)
        {
            ProductVariant::create($pv);
        }

        
    }
}
