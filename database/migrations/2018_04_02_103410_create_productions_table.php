<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('order_no');
            $table->date('planned_start');
            $table->date('planned_end');
            $table->date('actual_start');
            $table->date('actual_end');
            $table->string('quantity')->nullable();
            $table->integer('user_id')->unsigned();
            $table->integer('commodity_id')->unsigned();
            $table->integer('customer_id')->unsigned();
            $table->text('notes')->nullable();
            $table->boolean('isDone')->default(0);
            $table->boolean('isForecast')->default(0);
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
        Schema::dropIfExists('productions');
    }
}
