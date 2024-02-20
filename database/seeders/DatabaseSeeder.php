<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run($loopCount = 10)
    {
        for ($i = 0; $i < $loopCount; $i++) {
            // \App\Models\User::factory()->create([
            //     'name' => 'uhuy',
            //     'email' => 'uhuy@gmail.com',
            //     'password' => Hash::make('123123'),
            //     'roles' => '2',
            //     'rekenings' => '0182308120238120',
            // ]);

            Post::factory()->create();
        }
    }
}
