<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseTruncater extends Seeder
{
    public function run()
    {
        DB::statement('BEGIN;');
        DB::statement('TRUNCATE provider_user CASCADE');
        DB::statement('TRUNCATE providers CASCADE');
        DB::statement('TRUNCATE users CASCADE');
        DB::statement('COMMIT;');
    }
}
