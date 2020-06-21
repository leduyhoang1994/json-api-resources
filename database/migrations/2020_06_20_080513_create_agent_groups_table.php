<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateAgentGroupsTable.
 */
class CreateAgentGroupsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('agent_groups', function(Blueprint $table) {
            $table->increments('id');
			$table->string('name');
			$table->integer('status')->default(\App\Models\AgentGroup::STATUS_ACTIVE);
			$table->integer('leader_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('agent_groups');
	}
}
