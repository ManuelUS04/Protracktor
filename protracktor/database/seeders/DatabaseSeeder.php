<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $this->call(TeamSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(SettingsSeeder::class);
        $this->call(EventSeeder::class);
        $this->call(EventVersionSeeder::class);
        $this->call(EmailsSeeder::class);
        $this->call(Emails2Seeder::class);
        $this->call(Emails3Seeder::class);
        $this->call(Emails4Seeder::class);
        $this->call(Emails5Seeder::class);
        $this->call(Emails6Seeder::class);
        $this->call(CrudUserSeeder::class);
    }
}
