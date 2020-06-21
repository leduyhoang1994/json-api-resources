<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TicketNoteTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ticket_note_type')->updateOrInsert([
            'code' => 'update_ticket',
            'label' => 'Update Ticket'
        ]);

        DB::table('ticket_note_type')->updateOrInsert([
            'code' => 'update_level',
            'label' => 'Update Level'
        ]);
        
        DB::table('ticket_note_type')->updateOrInsert([
            'code' => 'agent_note',
            'label' => 'Agent Note'
        ]);

	    DB::table('ticket_note_type')->updateOrInsert([
		    'code' => 'open_ticket',
		    'label' => 'Open Ticket'
	    ]);

	    DB::table('ticket_note_type')->updateOrInsert([
		    'code' => 'close_ticket',
		    'label' => 'Close Ticket'
	    ]);
    }
}
