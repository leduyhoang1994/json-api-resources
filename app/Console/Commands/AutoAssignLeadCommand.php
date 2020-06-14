<?php

namespace App\Console\Commands;

use App\Models\Lead;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Console\Command;

class AutoAssignLeadCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lead:auto-assign';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Auto assign leads to agent';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $agents = User::where("role_id", UserRole::AGENT)->get()->toArray();
        $leads = Lead::whereNull("current_agent_id")->get();
        $currentAgent = 0;
        foreach($leads as $lead) {
            if (!isset($agents[$currentAgent])) {
                $currentAgent = 0;
            }

            $lead->current_agent_id = $agents[$currentAgent]["id"];
            $lead->save();

            $currentAgent++;
        }
    }
}
