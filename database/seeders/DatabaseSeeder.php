<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{


    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AksesSeeder::class,
            UserSeeder::class,
            JenisSuratKeluarSeeder::class,
            NewsletterSeeder::class,
            SuratKeluarSeeder::class,
            SuratMasukSeeder::class,
        ]);
    }
}
