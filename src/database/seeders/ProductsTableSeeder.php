<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
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
        DB::table('products')->insert
        ([
            [
                'name' => '腕時計', 
                'price' => 15000, 
                'brand' => 'Rolax',
                'detail' => 'スタイリッシュなデザインのメンズ腕時計',
                'image' => 'products/Armani+Mens+Clock.jpg',
                'condition_id' => '1' ,
                'sell_user_id' => '1',
                'created_at' => now(), 
                'updated_at' => now(), 
            ], 
            [
                'name' => 'HDD', 
                'price' => 5000, 
                'brand' => '西芝',
                'detail' => '高速で信頼性の高いハードディスク',
                'image' => 'products/HDD+Hard+Disk.jpg',
                'condition_id' => '2' ,
                'sell_user_id' => '1',
                'created_at' => now(), 
                'updated_at' => now(), 
            ], 
            [
                'name' => '玉ねぎ3束', 
                'price' => 300, 
                'brand' => 'なし',
                'detail' => '新鮮な玉ねぎ3束のセット',
                'image' => 'products/iLoveIMG+d.jpg',
                'condition_id' => '3' ,
                'sell_user_id' => '1',
                'created_at' => now(), 
                'updated_at' => now(), 
            ], 
            [
                'name' => '革靴', 
                'price' => 4000, 
                'brand' => 'なし',
                'detail' => 'クラシックなデザインの革靴',
                'image' => 'products/Leather+Shoes+Product+Photo.jpg',
                'condition_id' => '4' ,
                'sell_user_id' => '1',
                'created_at' => now(), 
                'updated_at' => now(), 
            ], 
            [
                'name' => 'ノートPC', 
                'price' => 45000, 
                'brand' => 'なし',
                'detail' => '高性能なノートパソコン',
                'image' => 'products/Living+Room+Laptop.jpg',
                'condition_id' => '1' ,
                'sell_user_id' => '1',
                'created_at' => now(), 
                'updated_at' => now(), 
            ], 
            [
                'name' => 'マイク', 
                'price' => 8000, 
                'brand' => 'なし',
                'detail' => '高音質のレコーディング用マイク',
                'image' => 'products/Music+Mic+4632231.jpg',
                'condition_id' => '2' ,
                'sell_user_id' => '1',
                'created_at' => now(), 
                'updated_at' => now(), 
            ], 
            [
                'name' => 'ショルダーバッグ', 
                'price' => 3500, 
                'brand' => 'なし',
                'detail' => 'おしゃれなショルダーバッグ',
                'image' => 'products/Purse+fashion+pocket.jpg',
                'condition_id' => '3' ,
                'sell_user_id' => '1',
                'created_at' => now(), 
                'updated_at' => now(), 
            ],
            [
                'name' => 'タンブラー', 
                'price' => 500, 
                'brand' => 'なし',
                'detail' => '使いやすいタンブラー',
                'image' => 'products/Tumbler+souvenir.jpg',
                'condition_id' => '4' ,
                'sell_user_id' => '1',
                'created_at' => now(), 
                'updated_at' => now(), 
            ], 
            [
                'name' => 'コーヒーミル', 
                'price' => 4000, 
                'brand' => 'Starbacks',
                'detail' => '手動のコーヒーミル',
                'image' => 'products/Waitress+with+Coffee+Grinder.jpg',
                'condition_id' => '1' ,
                'sell_user_id' => '1',
                'created_at' => now(), 
                'updated_at' => now(), 
            ], 
            [
                'name' => 'メイクセット', 
                'price' => 3500, 
                'brand' => 'なし',
                'detail' => '便利なメイクアップセット',
                'image' => 'products/外出メイクアップセット.jpg',
                'condition_id' => '2' ,
                'sell_user_id' => '1',
                'created_at' => now(), 
                'updated_at' => now(), 
            ], 	
            [
                'name' => 'ショルダーバッグ(出品例)', 
                'price' => 3500, 
                'brand' => 'なし',
                'detail' => 'おしゃれなショルダーバッグ',
                'image' => 'products/Purse+fashion+pocket.jpg',
                'condition_id' => '3' ,
                'sell_user_id' => '2',
                'created_at' => now(), 
                'updated_at' => now(), 
            ],
            [
                'name' => 'メイクセット(購入例)', 
                'price' => 3500, 
                'brand' => 'なし',
                'detail' => '便利なメイクアップセット',
                'image' => 'products/外出メイクアップセット.jpg',
                'condition_id' => '2' ,
                'sell_user_id' => '1',
                'created_at' => now(), 
                'updated_at' => now(), 
            ], 	
            
        ]); 
    }
}
