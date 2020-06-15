<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttributeGroupProcessRuleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attribute_group_process_rule', function (Blueprint $table) {
            $table->id();
            $table->integer('group_id');
            $table->string('field');
            $table->string('equation');
            $table->string('value');
            $table->string('logic');
            $table->string('parent_id')->nullable();
            $table->integer('sequence')->default(0);
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
        Schema::dropIfExists('attribute_group_process_rule');
    }
}
