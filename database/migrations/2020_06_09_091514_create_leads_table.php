<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateLeadsTable.
 */
class CreateLeadsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('leads', function(Blueprint $table) {
            $table->increments('id');
						$table->string('name')->nullable();
						$table->string('phone')->nullable();
						$table->string('email')->nullable();
						$table->string('source')->nullable();
						$table->text('note')->nullable();
						$table->string('train_location')->nullable();
						$table->string('page')->nullable();
						$table->string('district')->nullable();
						$table->string('product')->nullable();
						$table->date('lead_date')->nullable();
						$table->integer('current_ticket_id')->nullable();
						$table->integer('current_agent_id')->nullable();
            $table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('leads');
	}
}
