<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    // return what you want
});

/*Ajax Modal Start*/
Route::get('kd/ajxYrnIssForm/{orderId}/{kdPrgrmId}', 'KnitDyeingPrgController@ajxYrnIssForm');
Route::get('ajxColor', 'AjaxController@ajxColor');
Route::get('kdEnAjxColor', 'AjaxController@kdEnAjxColor');
Route::get('kdEnAjxSize', 'AjaxController@kdEnAjxSize');

Route::get('ajxSize', 'AjaxController@ajxSize');

/*Ajax Modal End*/



Route::get('/', 'HomeController@index');


Route::get('ajax_ttt/{id}','HomeController@profile');


Route::auth();

//Auth::guard('admin')->check();

Route::resource('employees', 'admin\EmployeesController',['except' => ['show'],'as' => 'admin']);

//  Department Routing
Route::get('departments/ajax_designation/',['as'=>'admin.departments.ajax_designation','uses'=> 'admin\DepartmentsController@ajax_designation']);
Route::get('ajax_designation/', 'admin\DepartmentsController@ajax_designation');
Route::resource('departments', 'admin\DepartmentsController',['except' => ['show','create', 'destroy'],'as' => 'admin']);

//delete employee
Route::get('/delete_employee/{id}', 'admin\EmployeesController@destroy');

Route::post('/employees_info', 'admin\EmployeesController@store');

Route::get('/appointmentLetter', 'admin\EmployeesController@appointmentLetter');

Route::get('/home', 'HomeController@index');

Route::get('/profile', 'HomeController@profile');

Route::get('/Employees', 'HomeController@employees');
Route::get('/colorTable', 'HomeController@newEmployee');

Route::post('/update_user_info', 'HomeController@updateUserInfo');


Route::get('delete_dep/{id}', 'admin\DepartmentsController@destroy');


Route::get('/ajax_test', 'HomeController@ajaxTest');


//    Salary Routing
Route::resource('salary','SalaryController',['only'=>['destroy','update','store'],'as' => 'admin']);

#########################################################################

//Route::get('searchDateRange', 'OrderController@searchDateRange');
//Settings
Route::get('factSettings/factory', 'FactSettings@index');
Route::Post('factSettings/saveFactNameNPrefix', 'FactSettings@saveFactNameNPrefix');

Route::get('Order/searchDateRange/{from}/{to}/{customer_name}/{shipSts}', 'OrderController@searchDateRange');

Route::get('Order/autoCompltSrch/{field}/{searchKey}', 'OrderController@autoCompltSrch');
Route::get('Order/autoCompltRslt/{field}/{actionName}/{from}/{to}', 'OrderController@autoCompltRslt');
Route::get('Order/orderStsSrc/{name}/{actionName}', 'OrderController@orderStsSrc');
Route::get('Order/listTable', 'OrderController@listTable');
Route::get('Order/chngShpmntSts/{shipmntSts}/{orderId}', 'OrderController@chngShpmntSts');
Route::get('Order/shipQty/{shipQty}/{orderId}', 'OrderController@shipQty');
Route::get('Order/actualShipDate/{acShipDate}/{orderId}', 'OrderController@actualShipDate');
Route::get('Order/cancelShipDate/{orderId}', 'OrderController@cancelShipDate');
Route::get('Order/exportExcel', 'OrderController@exportExcel');

Route::get('production/listTable', 'ProductionController@listTable');
Route::get('production/searchDateRange/{from}/{to}', 'ProductionController@searchDateRange');
Route::get('production/orderStsSrc/{name}/{actionName}', 'ProductionController@orderStsSrc');
Route::post('production/storePrData', 'ProductionController@storePrData');
Route::get('production/dateWisePrData', 'ProductionController@dateWisePrData');
Route::get('production/orderPrSearchDateRange/{from}/{to}/{customer_name}/{shipSts}', 'ProductionController@orderPrSearchDateRange');
Route::get('production/autoCompltSrch/{field}/{searchKey}', 'ProductionController@autoCompltSrch');
Route::get('production/autoCompltRslt/{field}/{actionName}/{from}/{to}', 'ProductionController@autoCompltRslt');
Route::get('production/rsltFrDtPrPage/{field}/{actionName}/{from}/{to}', 'ProductionController@rsltFrDtPrPage');
Route::get('production/dateAutoCompltSrch/{field}/{searchKey}', 'ProductionController@dateAutoCompltSrch');
Route::get('production/srchFrDtPrPage/{field}/{searchKey}', 'ProductionController@srchFrDtPrPage');
Route::get('production/dateAutoCompltRslt/{field}/{actionName}', 'ProductionController@dateAutoCompltRslt');
Route::get('production/editPrData/{id}', 'ProductionController@editPrData');
Route::get('production/delPrData/{id}', 'ProductionController@delPrData');

Route::get('knitAndDyeing/preListTable', 'KnitAndDyeingController@preListTable');
Route::get('knitAndDyeing/listTable', 'KnitAndDyeingController@listTable');
Route::get('knitAndDyeing/dateWiseKDdata', 'KnitAndDyeingController@dateWiseKDdata');
Route::get('knitAndDyeing/dateAutoCompltSrch', 'KnitAndDyeingController@dateAutoCompltSrch');
Route::get('knitAndDyeing/dateAutoCompltRslt', 'KnitAndDyeingController@dateAutoCompltRslt');
Route::get('knitAndDyeing/preOrderStsSrc/{name}/{actionName}', 'KnitAndDyeingController@preOrderStsSrc');
Route::get('knitAndDyeing/preAutoCompltSrch/{field}/{searchKey}', 'KnitAndDyeingController@preAutoCompltSrch');
Route::get('knitAndDyeing/preAutoCompltRslt/{field}/{actionName}/{from}/{to}', 'KnitAndDyeingController@preAutoCompltRslt');
Route::get('knitAndDyeing/preSearchDateRange/{from}/{to}/{customer_name}/{shipSts}', 'KnitAndDyeingController@preSearchDateRange');
Route::get('knitAndDyeing/orderStsSrc/{name}/{actionName}', 'KnitAndDyeingController@orderStsSrc');
Route::get('knitAndDyeing/autoCompltSrch/{field}/{searchKey}', 'KnitAndDyeingController@autoCompltSrch');
Route::get('knitAndDyeing/autoCompltRslt/{field}/{actionName}/{from}/{to}', 'KnitAndDyeingController@autoCompltRslt');
Route::get('knitAndDyeing/searchDateRange/{from}/{to}/{customer_name}/{shipSts}', 'KnitAndDyeingController@searchDateRange');
Route::get('knitAndDyeing/kdDatePageSearchDateRange/{from}/{to}', 'KnitAndDyeingController@kdDatePageSearchDateRange');
Route::get('knitAndDyeing/Entry', 'KnitAndDyeingController@knitAndDyeingEntry');
Route::get('knitAndDyeing/kntDyngEdit/{id}', 'KnitAndDyeingController@kntDyngEdit');
Route::post('knitAndDyeing/kdProgramColrSizeCnsmp', 'KnitAndDyeingController@kdProgramColrSizeCnsmp');
Route::post('knitAndDyeing/storeKdProgram', 'KnitAndDyeingController@storeKdProgram');
Route::post('knitAndDyeing/aaaaa', 'KnitAndDyeingController@aaaaa');

Route::get('dateFrmtChang', 'TnaController@dateFrmtChang');
Route::get('tna/listTable', 'TnaController@listTable');
Route::get('tna/orderStsSrc/{name}/{actionName}', 'TnaController@orderStsSrc');
Route::get('tna/autoCompltSrch/{field}/{searchKey}', 'TnaController@autoCompltSrch');
Route::get('tna/autoCompltRslt/{field}/{actionName}/{from}/{to}', 'TnaController@autoCompltRslt');
Route::get('tna/searchDateRange/{from}/{to}/{customer_name}/{shipSts}', 'TnaController@searchDateRange');
Route::get('tna/labDipFunc/{id}/{actionName}', 'TnaController@labDipFunc');
Route::get('tna/jointChck', 'TnaController@jointChck');
Route::get('tna/enDsTna/{id}/{fieldName}', 'TnaController@enDsTna');

Route::get('budget/listTable', 'BudgetController@listTable');
Route::get('budget/orderStsSrc/{name}/{actionName}', 'BudgetController@orderStsSrc');
Route::get('budget/autoCompltSrch/{field}/{searchKey}', 'BudgetController@autoCompltSrch');
Route::get('budget/autoCompltRslt/{field}/{actionName}/{from}/{to}', 'BudgetController@autoCompltRslt');
Route::get('budget/searchDateRange/{from}/{to}/{customer_name}/{shipSts}', 'BudgetController@searchDateRange');
Route::get('budget/labDipFunc/{id}/{actionName}', 'BudgetController@labDipFunc');
Route::get('budget/jointChck', 'BudgetController@jointChck');

Route::get('autoAddVal', 'PendingOrderController@autoAddVal');
Route::get('pending/listTable', 'PendingOrderController@listTable');
Route::get('pending/orderStsSrc/{name}/{actionName}', 'PendingOrderController@orderStsSrc');
Route::get('pending/autoCompltSrch/{field}/{searchKey}', 'PendingOrderController@autoCompltSrch');
Route::get('pending/autoCompltRslt/{field}/{actionName}/{from}/{to}', 'PendingOrderController@autoCompltRslt');
Route::get('pending/searchDateRange/{from}/{to}/{customer_name}/{shipSts}', 'PendingOrderController@searchDateRange');
Route::get('pending/labDipFunc/{id}/{actionName}', 'PendingOrderController@labDipFunc');

Route::get('kdPrgrmSum/create/{ordId}/{kdId}/{grayFabSum}/{finishFabRqrSum}','KDProgramSumController@create');

Route::get('knitDyingProg/delete_kd/{ordId}','KnitDyeingPrgController@delete_kd');


/*Route::get('Order/searchDateRange/{from}/{to}/{customer_name}/{shipSts}', 'OrderController@searchDateRange');
Route::get('Order/autoCompltSrch/{field}/{searchKey}', 'OrderController@autoCompltSrch');
Route::get('Order/autoCompltRslt/{field}/{actionName}/{from}/{to}', 'OrderController@autoCompltRslt');
Route::get('Order/orderStsSrc/{name}/{actionName}', 'OrderController@orderStsSrc');
Route::get('Order/listTable', 'OrderController@listTable');
Route::get('Order/chngShpmntSts/{shipmntSts}/{orderId}', 'OrderController@chngShpmntSts');
Route::get('Order/shipQty/{shipQty}/{orderId}', 'OrderController@shipQty');
Route::get('Order/actualShipDate/{acShipDate}/{orderId}', 'OrderController@actualShipDate');
Route::get('Order/cancelShipDate/{orderId}', 'OrderController@cancelShipDate');
Route::get('Order/exportExcel', 'OrderController@exportExcel');*/

Route::resource('managementUser','ManageUserController');
Route::resource('Order','OrderController');
Route::resource('production','ProductionController');
Route::resource('newEmployee','NewEmployeeController');
Route::resource('info','InfoController');
Route::resource('po','PoController');
Route::resource('sizeNcolor','SizeColorController');
Route::resource('fabric','FabricController');
Route::resource('sample','SampleController');
Route::resource('labdip','LabdipController');
Route::resource('access','AccessoriesController');
Route::resource('yarn','YarnController');
Route::resource('yarnStore','YarnStoreController');
Route::resource('yarnIssue','YarnIssueController');
Route::resource('tna','TnaController');
Route::resource('knitDying','KnitAndDyeingController');
Route::resource('knitDyingProg','KnitDyeingPrgController');
Route::resource('budget','BudgetController');
Route::resource('pending','PendingOrderController');
Route::resource('settings','SettingsController');
Route::resource('size','SizeController');
Route::resource('line','linePrController');


Route::get('yrnRcvKdProgrm/create/{ordID}/{kdId}/{colorId}', [
    'as' => 'yrnRcvKdProgrm.create',
    'uses' => 'YarnReceiveForKdProgram@create'
]);
Route::get('yrnRcvKdProgrm/show/{kdId}/{colorId}', [
    'as' => 'yrnRcvKdProgrm.show',
    'uses' => 'YarnReceiveForKdProgram@show'
]);
Route::resource('yrnRcvKdProgrm','YarnReceiveForKdProgram', ['except' => ['create', 'show']]);

Route::get('kdForKnitting/create/{ordID}/{kdId}', [
    'as' => 'kdForKnitting.create',
    'uses' => 'KnittingQtyForKdProgram@create'
]);
Route::resource('kdForKnitting','KnittingQtyForKdProgram', ['except' => 'create']);

Route::get('dyingQtyFrKd/create/{ordID}/{kdId}/{colorId}', [
    'as' => 'dyingQtyFrKd.create',
    'uses' => 'DyingQtyForKdProgram@create'
]);
Route::get('dyingQtyFrKd/show/{kdId}/{colorId}', [
    'as' => 'dyingQtyFrKd.show',
    'uses' => 'DyingQtyForKdProgram@show'
]);

Route::resource('dyingQtyFrKd','DyingQtyForKdProgram', ['except' => ['create', 'show']]);

Route::get('finisFabRqrd/create/{ordID}/{kdId}/{colorId}', [
    'as' => 'finisFabRqrd.create',
    'uses' => 'FinishFabRcvForKdProgram@create'
]);
Route::get('finisFabRqrd/show/{kdId}/{colorId}', [
    'as' => 'finisFabRqrd.show',
    'uses' => 'FinishFabRcvForKdProgram@show'
]);
Route::resource('finisFabRqrd','FinishFabRcvForKdProgram', ['except' => ['create', 'show']]);

Route::get('finisFabIss/create/{ordID}/{kdId}/{colorId}', [
    'as' => 'finisFabIss.create',
    'uses' => 'FinishFabIssForKdProgram@create'
]);
Route::get('finisFabIss/show/{kdId}/{colorId}', [
    'as' => 'finisFabIss.show',
    'uses' => 'FinishFabIssForKdProgram@show'
]);
Route::resource('finisFabIss','FinishFabIssForKdProgram', ['except' => ['create', 'show']]);


Route::post('storeUserDetail','InfoController@storeUserDetail');
//delete order
Route::get('/delete_order/{id}', 'OrderController@destroy');