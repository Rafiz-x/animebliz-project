<?php

namespace Database\Seeders;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Setting;

use App\Models\Admin;
use App\Models\Category;
use App\Models\Genre;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin::create([
        //     'name' => "Rafiz",
        //     'email' => 'rafiz@gmail.com',
        //     'password' => Hash::make('rafiz'),
        //     'perms' => '1'
        // ]);


        $genres = [
            [
                'name' => 'Action & Adventure',
                'created_at' => now(),
                'updated_at' => now()
            ],

            // [
            //     'name' => 'Bollywood',
            //     'created_at' => now(),
            //     'updated_at' => now()
            // ],

            // [
            //     'name' => 'Hollywood',
            //     'created_at' => now(),
            //     'updated_at' => now()
            // ],
            // [
            //     'name' => 'Hindi Dubbed',
            //     'created_at' => now(),
            //     'updated_at' => now()
            // ],
        ];

        Genre::insert($genres);

        // User::factory(10)->create();

        // Setting::factory()->create([
        //     'app_name' => 'Animebliz',
        //     'app_version' => '1.0.0'
        // ]);

    }
}
