<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SaleTicketProcessRuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("DELETE FROM `attribute_group_process_rule`;");
        DB::statement("INSERT INTO `attribute_group_process_rule` (`id`, `group_id`, `field`, `equation`, `value`, `logic`, `parent_id`, `sequence`, `created_at`, `updated_at`) VALUES
        (1, 2, 'connection_status', '==', 'connected', '&&', NULL, 0, '2020-06-15 18:03:01', '2020-06-15 18:03:02'),
        (2, 3, 'concern_status', '==', 'interested_in', '&&', NULL, 0, '2020-06-15 18:03:28', '2020-06-15 18:03:28'),
        (3, 4, 'convert_result', '==', 'converted', '&&', NULL, 0, '2020-06-15 18:03:49', '2020-06-15 18:03:50'),
        (4, 6, 'payment_acceptance', '==', 'agree', '&&', NULL, 0, '2020-06-15 18:06:04', '2020-06-15 18:06:05'),
        (5, 7, 'payment_status', '==', 'proceed', '&&', NULL, 0, '2020-06-15 18:08:59', '2020-06-15 18:09:00'),
        (6, 8, 'payment_fulfillment', '==', '1', '&&', NULL, 0, '2020-06-15 18:15:00', '2020-06-15 18:15:01');");
    }
}
