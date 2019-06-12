<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 11; $i++){
            DB::table('products')->insert([
                'title' => Str::random(10),
                'description' => Str::random(15),
                'img' => 'https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/image/AppleInc/aos/published/images/M/HA/MHA22/MHA22?wid=1144&hei=1144&fmt=jpeg&qlt=95&op_usm=0.5,0.5&.v=1465862227050',
                'price' => rand(5, 60) . " €",
            ]);
        }
    }
}
