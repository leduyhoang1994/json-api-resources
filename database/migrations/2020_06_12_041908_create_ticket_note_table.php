<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketNoteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_note', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer("ticket_id");
            $table->integer("current_level_id")->nullable();
            $table->string("current_level")->nullable();
            $table->integer("note_type");
            $table->longText("note")->nullable();
            $table->json("ticket_data")->nullable();
            $table->timestamps();
        });
        Schema::create('ticket_note_type', function (Blueprint $table) {
            $table->id();
            $table->string("code");
            $table->string("label");
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
        Schema::dropIfExists('ticket_note');
        Schema::dropIfExists('ticket_note_type');
    }
}
