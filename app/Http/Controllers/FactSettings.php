<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;

class FactSettings extends Controller
{
    public function index()
    {
        $prefix = 'NE';
        $factoryName = 'NEWS TECHNOLOGY LTD';
        $factDesc = 'A Leading Software Company in Bangladesh';

        $fact_set_db = DB::table('fact_settings');
        $factSettings = $fact_set_db->first();
        if ($factSettings != true) {
            $fact_set_db->insert(
                [
                    'prefix' => $prefix,
                    'factoryName' => $factoryName,
                    'factDesc' => $factDesc
                ]);
        } else if ($factSettings->factoryName == '' || $factSettings->factDesc == '') {
            $fact_set_db->where('id', $factSettings->id)->update(
                [
                    'prefix' => $prefix,
                    'factoryName' => $factoryName,
                    'factDesc' => $factDesc
                ]);
        }
        $factSettings = $fact_set_db->first();
        return view('factSettings.factSettings', ['factSettings' => $factSettings]);
    }
    public function saveFactNameNPrefix(Request $request)
    {
        $factData = $request->except(['_token']);
        $fact_set_db = DB::table('fact_settings');
        $factSettings = $fact_set_db->first();
        $fact_set_db->where('id', $factSettings->id)->update($factData);
    }
}
