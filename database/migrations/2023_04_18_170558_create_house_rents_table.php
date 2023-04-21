<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHouseRentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('house_rents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('house_id');
            $table->string('rent');
            $table->string('baki');
            $table->string('jama')->default(0);
            $table->string('date')->nullable();
            $table->text('remark')->nullable();
            $table->boolean('dc')->default(0);
            $table->boolean('nod')->default(0);
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
        Schema::dropIfExists('house_rents');
    }
}
