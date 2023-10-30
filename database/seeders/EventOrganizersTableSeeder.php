<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EventOrganizersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table("event_organizers")->insert([
//           [
//            "id"=>"e8650430-8fe9-489b-8453-cb843e05ff0d",
//            "name"=>"Zeeshan",
//            "email"=>"zeeshanawan1998@gmail.com",
//            "country"=>'Pakistan',
//            "city"=>'Talagang',
//            "image"=>"profile-placeholder.jpg",
//            "password"=>Hash::make("Shani-1998"),
//            "created_at"=>Carbon::now(),
//            "updated_at"=>Carbon::now(),
//        ],
          [
                  "id"=>"201b77e1-268c-45cc-b5ad-8baa8ee9c749",
                  "name"=>"EO321",
                  "email"=>"EO321@organizer.com",
                  "country"=>'Pakistan',
                  "city"=>'Islamabad',
                  "image"=>"profile-placeholder.jpg",
                  "password"=>Hash::make("Pakistan@786"),
                  "created_at"=>Carbon::now(),
                  "updated_at"=>Carbon::now(),
              ],
        ]);

    }
}
