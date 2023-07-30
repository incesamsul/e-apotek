<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Get the databse dump we wish to use
        $sql = base_path('database/dumps/pos.sql');

        if ($sql) {
            // Remove foreign keys for now
            DB::statement('SET FOREIGN_KEY_CHECKS = 0');

            // Now we seed using our database dump of
            DB::unprepared(file_get_contents($sql));

            // Enable foreign keys
            DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        }
        // \App\Models\User::factory(10)->create();
    }
}
