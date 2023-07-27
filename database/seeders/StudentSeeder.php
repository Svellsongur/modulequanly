<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $fakedata = Factory::create();
        for ($i = 1;$i <= 20; $i++){
            DB::table('students')->insert([
                'image' => '',
                'name' => $fakedata->name,
                'email' => $fakedata->unique()->email,
                'address' => $fakedata->unique()->address(),
            ]);
        }
        
    }
}
