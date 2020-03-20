<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddContributorIdToInfectionsAndHistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('infections', function (Blueprint $table) {
            $table->unsignedBigInteger('contributor_id')->nullable(true)->after('city_id');
            $table->foreign('contributor_id')->references('id')->on('contributors');
        });

        Schema::table('infection_histories', function (Blueprint $table) {
            $table->unsignedBigInteger('contributor_id')->nullable(true)->after('city_id');
            $table->foreign('contributor_id')->references('id')->on('contributors');
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
            $table->dropForeign(['contributor_id']);
            $table->dropColumn('contributor_id');
        });

        Schema::table('infection_histories', function (Blueprint $table) {
            $table->dropForeign(['contributor_id']);
            $table->dropColumn('contributor_id');
        });
    }
}
