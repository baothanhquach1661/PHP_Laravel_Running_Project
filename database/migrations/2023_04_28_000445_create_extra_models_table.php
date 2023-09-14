<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExtraModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('extra_models', function (Blueprint $table) {
            $table->id();
            $table->string('banner_name')->nullable();
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->text('banner_photo')->nullable();
            $table->text('status')->nullable();
            $table->text('extra1')->nullable();
            $table->text('extra2')->nullable();
            $table->text('extra3')->nullable();
            $table->text('extra4')->nullable();
            $table->text('extra5')->nullable();
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
        Schema::dropIfExists('extra_models');
    }
}
