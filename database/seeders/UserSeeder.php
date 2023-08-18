<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Faker\Generator;
use Illuminate\Container\Container;

class UserSeeder extends Seeder
{
    /**
     * The current Faker instance.
     *
     * @var \Faker\Generator
     */
    protected $faker;

    /**
     * Create a new seeder instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->faker = $this->withFaker();
    }

    /**
     * Get a new Faker instance.
     *
     * @return \Faker\Generator
     */
    protected function withFaker()
    {
        return Container::getInstance()->make(Generator::class);
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nama' => 'Administrator',
            'username' => 'admin',
            'password' => Hash::make('admin'),
            'contact_person' => $this->faker->e164PhoneNumber(),
            'akses_id' => '1'
        ]);
        User::create([
            'nama' => 'Karyawan',
            'username' => 'karyawan',
            'password' => Hash::make('admin'),
            'contact_person' => $this->faker->e164PhoneNumber(),
            'akses_id' => '2'
        ]);
    }
}