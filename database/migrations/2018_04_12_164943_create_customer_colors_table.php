<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerColorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_colors', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id');
            $table->string('color');
            $table->string('bg_color');
            $table->string('text_color');
            $table->string('border_color');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void 
     */
    public function down()
    {
        Schema::dropIfExists('customer_colors');
    }
}
