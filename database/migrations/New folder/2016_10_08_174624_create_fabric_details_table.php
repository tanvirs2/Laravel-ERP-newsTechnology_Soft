<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFabricDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fabric_details', function (Blueprint $table) {

            $table->increments('id');
            $table->string('garmentsItem');
            $table->string('bodyPart');
            $table->string('fabNature');
            $table->string('ColorType');
            $table->string('FabricDescription');
            $table->string('FabricSource');
            $table->string('DiaType');
            $table->string('gsm');
            $table->string('ColorSizeSensitive');
            $table->string('Color');
            $table->string('Uom');
            $table->string('AvgGreyCons');
            $table->string('Rate');
            $table->string('Amount');
            $table->string('Status');

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
        Schema::drop('fabric_details');
    }
}
