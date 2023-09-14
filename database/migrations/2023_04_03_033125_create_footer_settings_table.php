<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFooterSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('footer_settings', function (Blueprint $table) {
            $table->id();
            $table->string('logo_header');
            $table->string('logo_footer');
            $table->string('address');
            $table->string('about');
            $table->string('about_1');
            $table->string('about_2');
            $table->string('about_3');
            $table->string('about_4');
            $table->string('about_5');
            $table->string('account');
            $table->string('account_1');
            $table->string('account_2');
            $table->string('account_3');
            $table->string('account_4');
            $table->string('account_5');
            $table->string('support');
            $table->string('support_1');
            $table->string('support_2');
            $table->string('support_3');
            $table->string('support_4');
            $table->string('support_5');
            $table->string('extra1');
            $table->string('extra2');
            $table->string('extra3');
            $table->string('extra4');
            $table->string('extra5');
            $table->string('extra6');
            $table->string('extra7');
            $table->string('extra8');
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
        Schema::dropIfExists('footer_settings');
    }
}
