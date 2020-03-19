<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfectionHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infection_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('infection_id');
            $table->foreign('infection_id')
                ->references('id')->on('infections')
                ->onDelete('cascade');
            $table->unsignedBigInteger('city_id');
            $table->foreign('city_id')
                ->references('id')->on('cities')
                ->onDelete('cascade');
            $table->integer('cases')->default(0)->nullable(false);
            $table->integer('deaths')->default(0)->nullable(false);
            $table->integer('recovered')->default(0)->nullable(false);
            $table->integer('serious')->default(0)->nullable(false);
            $table->date('first_case')->nullable(true);
            $table->text('sources')->nullable(true);
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
        Schema::dropIfExists('infection_histories');
    }
}
