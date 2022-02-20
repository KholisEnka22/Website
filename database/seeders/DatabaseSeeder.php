<?php

namespace Database\Seeders;

use App\Models\Kontingen;
use Illuminate\Database\Seeder;
use App\Models\Tingkat;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::create(
            [
                'name'     => 'Administrator',
                'email'    => 'admin@gmail.com',
                'role'    => 'admin',
                'password' => bcrypt('password'),
            ]
        );

        User::create(
            [
                'name'     => 'SuperAdministrator',
                'email'    => 'spr.admin@gmail.com',
                'role'    => 'spr_admin',
                'password' => bcrypt('password'),
            ]
        );

        Tingkat::create(
            [
                'nama_tgkt' => 'Badge',
            ]
        );
        Tingkat::create(
            [
                'nama_tgkt' => 'Putih',
            ]
        );
        Tingkat::create(
            [
                'nama_tgkt' => 'Kuning',
            ]
        );
        Tingkat::create(
            [
                'nama_tgkt' => 'Merah',
            ]
        );
        Tingkat::create(
            [
                'nama_tgkt' => 'Biru',
            ]
        );
    }
}