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
            'productImg' => 'Iphone12Merah.png',
            'productName' => 'Iphone 12',
            'productPrice' => 25000000,
            'productDesc' => 'A14 Bionic, chip paling cepat di ponsel pintar. Layar OLED menyeluruh. Ceramic Shield dengan ketahanan jatuh empat kali lebih baik. Dan mode Malam di setiap kameranya. iPhone 12 punya semuanya — dalam dua ukuran sempurna.']
        ]);

        DB::table('products')->insert([
            ['categoryId'=> 1,
            'productImg' => 'SamsungFoldhijau.png',
            'productName' => 'Samsung Galaxy Fold',
            'productPrice' => 30000000,
            'productDesc' => 'The Samsung Galaxy Fold is an Android-based foldable smartphone developed by Samsung Electronics. Unveiled on February 20, 2019, it was released on September 6, 2019 in South Korea. The device is capable of being folded open to expose a 7.3-inch tablet-sized flexible display, while its front contains a smaller "cover" display, intended for accessing the device without opening it.']
        ]);

        DB::table('products')->insert([
            ['categoryId'=> 3,
            'productImg' => 'AppleWatch.png',
            'productName' => 'Apple Watch Series 6',
            'productPrice' => 7000000,
            'productDesc' => 'Measure your blood oxygen level with a revolutionary new sensor and app. Take an ECG anytime, anywhere. See your fitness metrics at a glance with the enhanced Always-On Retina display. With Apple Watch Series 6 on your wrist, a healthier, more active, more connected life is within reach.']
        ]);

        DB::table('products')->insert([
            ['categoryId'=> 2,
            'productImg' => 'Macbookpro2.png',
            'productName' => 'Macbook Pro',
            'productPrice' => 40000000,
            'productDesc' => 'Designed for those who defy limits and change the world, the 16-inch MacBook Pro is by far the most powerful notebook we have ever made. With an immersive Retina display, superfast processors, advanced graphics, the largest battery capacity ever in a MacBook Pro, Magic Keyboard, and massive storage, its the ultimate pro notebook for the ultimate user.']
        ]);



    }
}
