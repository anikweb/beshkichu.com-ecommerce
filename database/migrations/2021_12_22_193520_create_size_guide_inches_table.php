<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSizeGuideInchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('size_guide_inches', function (Blueprint $table) {
            $table->id();
            $table->float('inches');
            $table->float('us_mens')->nullable();
            $table->float('us_womans')->nullable();
            $table->float('uk')->nullable();
            $table->float('eu')->nullable();
            $table->float('jp')->nullable();
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
        Schema::dropIfExists('size_guide_inches');
    }
}
