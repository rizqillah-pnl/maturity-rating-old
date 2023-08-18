<?php

namespace Database\Seeders;

use App\Models\Akses;
use Illuminate\Database\Seeder;

class AksesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Akses::create(
            [
                'role' => 'admin'
            ]
        );
        Akses::create(
            [
                'role' => 'karyawan'
            ]
        );
    }
}
