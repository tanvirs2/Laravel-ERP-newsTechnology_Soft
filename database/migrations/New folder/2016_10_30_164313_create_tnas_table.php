<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTnasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tnas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('BuyerName');
            $table->string('PONumber');
            $table->string('POQty');
            $table->string('LeadTime');
            $table->string('ShipmentDate');
            $table->string('LabDipApp_Start');
            $table->string('LabDipApp_Finish');
            $table->string('Fitsample_Start');
            $table->string('Fitsample_Finish');
            $table->string('FabBookKnit_Start');
            $table->string('FabBookKnit_Finish');
            $table->string('YarnIssue_Start');
            $table->string('YarnIssue_Finish');
            $table->string('TrimsBookSnF_Start');
            $table->string('TrimsBookSnF_Finish');
            $table->string('PPSampleApp_Start');
            $table->string('PPSampleApp_Finish');
            $table->string('KnitProd_Start');
            $table->string('KnitProd_Finish');
            $table->string('GreyReceive_Start');
            $table->string('GreyReceive_Finish');
            $table->string('DyeingProd_Start');
            $table->string('DyeingProd_Finish');
            $table->string('FinFabRcv_Start');
            $table->string('FinFabRcv_Finish');
            $table->string('PPMeeting_Start');
            $table->string('PPMeeting_Finish');
            $table->string('SewTrimsRcv_Start');
            $table->string('SewTrimsRcv_Finish');
            $table->string('Cutting_Start');
            $table->string('Cutting_Finish');
            $table->string('PrintOrEmb_Start');
            $table->string('PrintOrEmb_Finish');
            $table->string('FinTrimsRcv_Start');
            $table->string('FinTrimsRcv_Finish');
            $table->string('SewingProd_Start');
            $table->string('SewingProd_Finish');
            $table->string('GmtsFinish_Start');
            $table->string('GmtsFinish_Finish');
            $table->string('Inspection_Start');
            $table->string('Inspection_Finish');
            $table->string('ExFactory_Start');
            $table->string('ExFactory_Finish');
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
        Schema::drop('tnas');
    }
}
