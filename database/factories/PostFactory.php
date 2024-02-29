<?php

namespace Database\Factories;

use App\Models\Kategori;
use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Post::class;



    public function definition(): array
    {
        $randomName = $this->faker->word();
        $randomUserId = User::inRandomOrder()->pluck('idUser')->first();
        $randomKatId = Kategori::inRandomOrder()->pluck('idKategori')->first();
        $randomName = $this->faker->word();
        return [
            'postTitle' => $this->faker->word(),
            // 'email_verified_at' => now(),
            'kodeUser' => $randomUserId,
            // 'remember_token' => Str::random(10),
            'postCategory' => $randomKatId,
            'postDesc' => $this->faker->word(),
            'postImage' => $randomName,
            'postUrl' => $randomName,
            'status' => '2',
        ];
    }

    // Function to generate POS codes like POS001, POS002, ...
    private function generateRandomKodeUser()
    {
        // Retrieve random kodeUser from the User table
        $randomUser = User::all()->random();

        // Return the kodeUser of the random user
        return $randomUser->kodeUser;
    }
}
