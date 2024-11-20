<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('short_description');
            $table->string('thumbnail');
            $table->string('video_link');
            $table->string('diet_type')->nullable()->comment("Veg, Non-veg, Egg");
            $table->string('meal')->comment('Breakfast, lunch, dinner');
            $table->string('difficulty')->nullable()->comment("Easy, Medium, difficult");
            $table->string('category')->nullable()->comment("Main course, Dessert, Starter, Snack, Drink");
            $table->integer('category_id')->default(0);
            $table->integer('prep_time')->nullable()->comment("In minutes");

            $table->timestamps();
            // $table->integer('author')->nullable()->comment("Id of chef"); Maybe in future
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipes');
    }
}
