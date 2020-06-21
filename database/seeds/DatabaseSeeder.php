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
        // $this->call(UserSeeder::class);
        $this->call(TicketNoteTypeSeeder::class);
        $this->call(UserRoleSeeder::class);
        $this->call(SaleTicketProcessRuleSeeder::class);
        $this->call(InstallPassportSeeder::class);
    }
}
