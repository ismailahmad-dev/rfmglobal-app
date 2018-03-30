<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::create([
            'name'        => 'RFM Sample Product A',
            'slug'      => Str::slug('RFM Sample Product A'),
            'price'       => 99.90,
            'is_active'   => true,
        ]);

        Product::create([
            'name'        => 'RFM Sample Product B',
            'slug'      => Str::slug('RFM Sample Product B'),
            'price'       => 149.90,
            'is_active'   => true,
        ]);
    }
}
