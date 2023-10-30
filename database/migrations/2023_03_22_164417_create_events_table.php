<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->text("title")->nullable();
            $table->string("image")->nullable();
            $table->longText("description")->nullable();
            $table->timestamp("datetime")->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string("address")->nullable();
//            $table->uuid("")->nullable();
            $table->foreignUuid('event_organizer_id')
                ->constrained()
                ->cascadeOnDelete();
            $table->string("organizer_type")->nullable();
            $table->boolean("is_approved")->default(0);
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
        Schema::dropIfExists('events');
    }
};
