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
            $table->string('status');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->string('connection_status', 191)->nullable();
            $table->string('target_product_id', 191)->nullable();
            $table->string('address', 191)->nullable();
            $table->string('concern_status', 191)->nullable();
            $table->string('convert_result', 191)->nullable();
            $table->string('decline_reason', 191)->nullable();
            $table->string('studio_id', 191)->nullable();
            $table->string('course_id', 191)->nullable();
            $table->string('payment_acceptance', 191)->nullable();
            $table->string('package_id', 191)->nullable();
            $table->string('full_name', 191)->nullable();
            $table->string('phone', 191)->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('address_cod', 191)->nullable();
            $table->string('payment_status', 191)->nullable();
            $table->string('payment_method', 191)->nullable();
            $table->integer('payment_amount')->nullable();
            $table->integer('payment_fulfillment')->nullable();
            $table->string('current_level', 191)->nullable();
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
