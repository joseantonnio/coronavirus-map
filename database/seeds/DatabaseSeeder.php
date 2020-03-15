<?php

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
        // $this->call(UsersTableSeeder::class);

        $path = base_path() . DIRECTORY_SEPARATOR . 'database' . DIRECTORY_SEPARATOR . 'seeds' . DIRECTORY_SEPARATOR . 'states.sql';
        DB::unprepared(file_get_contents($path));
        $this->command->info('States table seeded!');

        $path = base_path() . DIRECTORY_SEPARATOR . 'database' . DIRECTORY_SEPARATOR . 'seeds' . DIRECTORY_SEPARATOR . 'cities.sql';
        DB::unprepared(file_get_contents($path));
        $this->command->info('Cities table seeded!');
    }
}
