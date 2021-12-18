<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('request_id');
            $table->string('email');
            $table->string('mobile');
            $table->string('product_name');
            $table->text('details');
            $table->string('image')->nullable();
            $table->integer('quantity');
            $table->tinyInteger('status')->comment('1=pending, 2=picked, 3=declined');
            $table->timestamp('valid_to');
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
        Schema::dropIfExists('product_requests');
    }
}
