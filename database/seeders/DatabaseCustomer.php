<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseCustomer extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('customer')->insert([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        //     'birthday' => '2003-12-21',
        //     'gender' => 1,
        // ]);
        //Thêm nhiều dữ liệu
        $test = [];
        for($i = 1;$i <= 100; $i++){
            $test[] = [
                'name' => 'Test User',
                'email' => 'test'.$i.'@example.com',
                'birthday' => '2003-12-21',
                'gender' => 1,
            ];
        }
        DB::table('customer')->insert($test);
    }
}
