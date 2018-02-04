<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tna extends Model
{
    protected $fillable = [
        'order_id',
        'LeadTime',
        'ShipmentDate',
        'LabDipApp_Start',
        'LabDipApp_Finish',
        'Fitsample_Start',
        'Fitsample_Finish',
        'FabBookKnit_Start',
        'FabBookKnit_Finish',
        'YarnIssue_Start',
        'YarnIssue_Finish',
        'TrimsBookSnF_Start',
        'TrimsBookSnF_Finish',
        'PPSampleApp_Start',
        'PPSampleApp_Finish',
        'KnitProd_Start',
        'KnitProd_Finish',
        'GreyReceive_Start',
        'GreyReceive_Finish',
        'DyeingProd_Start',
        'DyeingProd_Finish',
        'FinFabRcv_Start',
        'FinFabRcv_Finish',
        'PPMeeting_Start',
        'PPMeeting_Finish',
        'SewTrimsRcv_Start',
        'SewTrimsRcv_Finish',
        'Cutting_Start',
        'Cutting_Finish',
        'PrintOrEmb_Start',
        'PrintOrEmb_Finish',
        'FinTrimsRcv_Start',
        'FinTrimsRcv_Finish',
        'SewingProd_Start',
        'SewingProd_Finish',
        'GmtsFinish_Start',
        'GmtsFinish_Finish',
        'Inspection_Start',
        'Inspection_Finish',
        'ExFactory_Start',
        'ExFactory_Finish'
    ];
}
