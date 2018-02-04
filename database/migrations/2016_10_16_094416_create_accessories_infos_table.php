<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccessoriesInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accessories_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('order_number');
            $table->string('itemName');
            $table->string('colorName');
            $table->string('requestDate');
            $table->string('targetDeliveryDate');
            $table->string('exFactoryDate');
            $table->string('itemStatus');
            $table->string('itemApprovalDate');
            $table->string('courierDetails');
            $table->string('itemRemark');
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
        Schema::drop('accessories_infos');
    }
}
