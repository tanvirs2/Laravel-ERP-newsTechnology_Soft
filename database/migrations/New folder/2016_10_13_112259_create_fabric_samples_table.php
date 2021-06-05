<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFabricSamplesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fabric_samples', function (Blueprint $table) {
            $table->increments('id');
            $table->string('po_no');
            $table->string('requestDate');
            $table->string('targetDeliveryDate');
            $table->string('instructionsSelectedFactory');
            $table->string('exFactoryDate');
            $table->string('status');
            $table->string('approvalOrRejectionDate');
            $table->string('reasonForRejection');
            $table->string('courierDetails');
            $table->string('comment');
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
        Schema::drop('fabric_samples');
    }
}
