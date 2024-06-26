<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //password 87654321
        DB::statement("INSERT INTO `users` (`id`, `name`, `email`, `country`, `city`, `image`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
            ('6fd715b5-b43f-4fa3-922c-21f01a9f6063', 'Test321', 'user786@test.com', 'Pakistan', 'Rawalpindi', NULL, NULL, '$2y$10/\$pAykJ7jtP67WYmKKoJ8O.eDpu7dzS0KantxHGhly0oGGTw/Jj6bjm', 'xVG4LYbXIirQOpj3AZeWeDd8ayKFP4IhuMJ8ae8OuesLz0zqjrx9kVXxudqx', '2023-03-28 03:22:41', '2023-03-29 01:10:11'),
            ('022004ad-5c56-4aae-b3cd-33ce2d13b179', 'Test user', 'User@test.com', 'Pakistan', 'khushab', NULL, NULL, '$2y$10/\$pAykJ7jtP67WYmKKoJ8O.eDpu7dzS0KantxHGhly0oGGTw/Jj6bjm', 'xVG4LYbXIirQOpj3AZeWeDd8ayKFP4IhuMJ8ae8OuesLz0zqjrx9kVXxudqx', '2023-03-28 03:22:41', '2023-03-29 01:10:11');
            ");
    }
}
