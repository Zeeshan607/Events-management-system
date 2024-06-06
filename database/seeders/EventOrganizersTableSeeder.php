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
          [
                  "id"=>"201b77e1-268c-45cc-b5ad-8baa8ee9c749",
                  "name"=>"EO321",
                  "email"=>"eo321@organizer.com",
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
