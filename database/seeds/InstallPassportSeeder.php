<?php

use Illuminate\Database\Seeder;

class InstallPassportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\Artisan::call("passport:install");
    }
}
