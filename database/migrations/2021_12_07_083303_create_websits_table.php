<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateWebsitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('websits', function (Blueprint $table) {
            $table->id();
            $table->string('websit_title');
            $table->string('favicon_image')->nullable();
            $table->string('logo')->nullable();
            $table->string('seo_keyword')->nullable();
            $table->timestamps();
        });

        DB::table('websits')->insert(['websit_title' => 'Dashboard Master']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('websits');
    }
}
