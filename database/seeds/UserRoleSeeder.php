<?php

use App\Models\UserRole;
use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserRole::updateOrCreate([
            "id" => 1,
            "label" => "Administrator"
        ]);
        UserRole::updateOrCreate([
            "id" => 2,
            "label" => "Supervisor"
        ]);
        UserRole::updateOrCreate([
            "id" => 3,
            "label" => "Agent"
        ]);
    }
}
