<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'title' => 'Điểm Thu hút',
            'avatar' => 'flaticon-gift',
        ]);
        DB::table('categories')->insert([
            'title' => 'Khách sạn',
            'avatar' => 'flaticon-gift',
        ]);
        DB::table('categories')->insert([
            'title' => 'Nhà Hàng',
            'avatar' => 'flaticon-gift',
        ]);
        DB::table('categories')->insert([
            'title' => 'Spa',
            'avatar' => 'flaticon-gift',
        ]);
        
    }
}
