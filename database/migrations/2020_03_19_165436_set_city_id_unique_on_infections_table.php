<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SetCityIdUniqueOnInfectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('infections', function (Blueprint $table) {
            $table->unsignedBigInteger('city_id')->unique()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('infections', function (Blueprint $table) {
            $table->dropForeign(['city_id']);
            $table->dropUnique(['city_id']);
            $table->foreign('city_id')
                ->references('id')->on('cities')
                ->onDelete('cascade');
        });
    }
}
