<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSizeGuideCmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('size_guide_cms', function (Blueprint $table) {
            $table->id();
            $table->float('cm');
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
        Schema::dropIfExists('size_guide_cms');
    }
}
