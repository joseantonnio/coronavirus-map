<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infections', function (Blueprint $table) {
            $table->id();
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
        Schema::dropIfExists('infections');
    }
}
