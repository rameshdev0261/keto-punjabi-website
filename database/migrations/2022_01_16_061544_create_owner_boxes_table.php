<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOwnerBoxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('owner_boxes', function (Blueprint $table) {
            $table->id();
            $table->string('owner_box_title');
            $table->string('owner_box_desc');
            $table->string('owner_box_image');
            $table->string('owner_name');
            $table->string('owner_sign');
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
        Schema::dropIfExists('owner_boxes');
    }
}
