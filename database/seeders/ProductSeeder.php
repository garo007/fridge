<?php

namespace Database\Seeders;

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
        $arr = [
            0=>['name'=>'Хлеб'],
            1=>['name'=>'Молоко'],
            2=>['name'=>'Масло'],
            3=>['name'=>'Кефир'],
            4=>['name'=>'Говядина'],
            5=>['name'=>'Свинина'],
            6=>['name'=>'Мясо баранина'],
        ];
        foreach ($arr as $ar){
            DB::table('products')->insert([
                'name' => $ar,
                ]);
        }
    }
}
