<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketEntityMainTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('entity_id')->unsigned();
			$table->integer('attribute_set_id')->unsigned();
            $table->integer('lead_id')->unsigned()->nullable();
            $table->integer('customer_id')->unsigned()->nullable();
            $table->integer('current_agent_id')->unsigned()->nullable();
            $table->integer('current_level_id')->unsigned()->nullable();
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
    	Schema::drop('tickets');       
    }
}
