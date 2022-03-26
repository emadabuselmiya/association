<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAddressWebite extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('websits', function (Blueprint $table) {
            $table->string('address')->nullable();
            $table->text('address_map')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('websits', function (Blueprint $table) {
            $table->dropColumn('address');
            $table->dropColumn('address_map');
        });
    }
}
