<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
//        \DB::table('admins')->insert([
//            'name' => 'Muhammad Zeeshan',
//            'email' => 'muhammadzeeshan5420@gmail.com',
//            "image"=>"profile-placeholder.jpg",
//            'password' => Hash::make('Pakistan@786'),
//            'created_at'=>Carbon::now(),
//            'updated_at'=>Carbon::now(),
//        ]);
        \DB::table('admins')->insert([
            'name' => 'Muhammad Zeeshan(Bc190402071)',
            'email' => 'admin@ems.com',
            "image"=>"profile-placeholder.jpg",
            'password' => Hash::make('Ems-2023'),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);
    }
}
