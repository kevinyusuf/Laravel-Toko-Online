<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            ['categoryId'=> 1,
            'productImg' => 'Iphone12.png',
            'productName' => 'Iphone 12',
            'productPrice' => 25000000,
            'productDesc' => 'A14 Bionic, chip paling cepat di ponsel pintar. Layar OLED menyeluruh. Ceramic Shield dengan ketahanan jatuh empat kali lebih baik. Dan mode Malam di setiap kameranya. iPhone 12 punya semuanya — dalam dua ukuran sempurna.']
        ]);

        DB::table('products')->insert([
            ['categoryId'=> 1,
            'productImg' => 'SamsungFold.jpg',
            'productName' => 'Samsung Galaxy Fold',
            'productPrice' => 30000000,
            'productDesc' => 'The Samsung Galaxy Fold is an Android-based foldable smartphone developed by Samsung Electronics. Unveiled on February 20, 2019, it was released on September 6, 2019 in South Korea. The device is capable of being folded open to expose a 7.3-inch tablet-sized flexible display, while its front contains a smaller "cover" display, intended for accessing the device without opening it.']
        ]);

    }
}
