<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Unlock models
        Model::unguard();
        // Truncate the DB
        $this->call(DatabaseTruncater::class);
        // Add testing data
        $this->call(TestingDatabaseSeeder::class);
    }
}
