<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TicketsFlat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('tickets_flat');
		Schema::create('tickets_flat', function (Blueprint $table) {
            $table->integer('id')->unsigned();
            $table->integer('entity_id')->unsigned();
            $table->integer('attribute_set_id')->unsigned();
            $table->integer('lead_id')->unsigned()->nullable();
            $table->integer('customer_id')->unsigned()->nullable();
            $table->integer('current_agent_id')->unsigned()->nullable();
            $table->integer('current_level_id')->unsigned()->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->integer('product_id')->nullable();
            $table->integer('package_id')->nullable();
            $table->string('address', 255)->nullable();
            $table->integer('connection_status')->nullable();
            $table->integer('concern_status')->nullable();
            $table->string('decline_reason', 255)->nullable();
            $table->integer('studio_id')->nullable();
            $table->integer('course_id')->nullable();
            $table->integer('payment_acceptance')->nullable();
            $table->string('full_name', 255)->nullable();
            $table->string('phone', 255)->nullable();
            $table->date('date_of_birth')->nullable();
            $table->integer('payment_status')->nullable();
            $table->integer('payment_method')->nullable();
            $table->integer('package_value')->nullable();
            $table->integer('payment_amount')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tickets_flat');
    }
}
