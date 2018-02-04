<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLabdipInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('labdip_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('po_no');
            $table->string('order_number');
            $table->string('colorName');
            $table->string('requestDate');
            $table->string('targetDeliveryDate');
            $table->string('instructionsSelectedFactory');
            $table->string('exFactoryDate');
            $table->string('status');
            $table->string('approvalOrRejectionDate');
            $table->string('reasonForRejection');
            $table->string('courierDetails');
            $table->string('labdipRef');
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
        Schema::drop('labdip_infos');
    }
}
