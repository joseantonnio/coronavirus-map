<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->integer('ibge')->nullable(false);
            $table->string('name', 100)->nullable(false);
            $table->float('lat', 8)->nullable(false);
            $table->float('lng', 8)->nullable(false);
            $table->boolean('is_capital')->nullable(false)->default(false);
            $table->unsignedBigInteger('state_id');
            $table->foreign('state_id')
                ->references('id')->on('states')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cities');
    }
}
