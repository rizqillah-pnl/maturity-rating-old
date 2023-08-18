<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // Declare an associative array
        // $arr = array("a" => "admin", "b" => "jurusan", "c" => "pusat", "d" => "unit");

        // // Use array_rand function to returns random key
        // $key = array_rand($arr);
        return [
            'nama' => $this->faker->name(),
            'username' => $this->faker->unique()->userName(),
            'password' => Hash::make('admin'),
            'remember_token' => Str::random(10),
            'contact_person' => $this->faker->unique()->e164PhoneNumber(),
            'akses_id' => mt_rand(16, 24),
            'about' => $this->faker->sentence(15)
            // 'jurusan_id' => mt_rand(1, 6)
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
