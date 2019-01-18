<?php

use App\Http\Controllers\MaterialController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Route::get('/', function () {
    return view('welcome');
}); */

Auth::routes();


Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/groupmaterials', 'GroupMaterialController');
Route::post('/groupmaterials/post', 'GroupMaterialController@store');
Route::get('/groupmaterials/edit/', 'GroupMaterialController@show');
Route::post('/groupmaterials/inactive', 'GroupMaterialController@inactive');
Route::post('/groupmaterials/active', 'GroupMaterialController@active');
Route::get('get-data-group-material', ['as' => 'get.group_material', 'uses' => 'GroupMaterialController@getData']);
Route::get('get-api-group-material', ['as' => 'get.get_group_material', 'uses' => 'GroupMaterialController@get_material_group']);


Route::resource('materials', 'MaterialController');
Route::post('/materials/post', 'MaterialController@store');
Route::get('/materials/edit/', 'MaterialController@show');

Route::post('/materials/inactive', 'MaterialController@inactive');
Route::post('/materials/active', 'MaterialController@active');
Route::get('data-table-material', ['as' => 'get.material', 'uses' => 'MaterialController@getData']);
Route::get('sap_group_material', ['as' => 'get.sap_group_material', 'uses' => 'MaterialController@sap_group_material']);
Route::get('data-table-group-material', ['as' => 'get.data_table_group_material', 'uses' => 'MaterialController@groupMaterialGroup']);


Route::resource('material_user', 'MaterialUserController');
Route::get('/material_user/show', 'MaterialController@show');
Route::post('/material_user/post', 'MaterialUserController@store');
Route::put('/material_user/store_location/{id}', 'MaterialUserController@store_location');

Route::get('get-uom', ['as' => 'get.uom', 'uses' => 'MaterialUserController@get_uom']);
Route::get('get-plant', ['as' => 'get.plant', 'uses' => 'MaterialUserController@get_plant']);
Route::get('get-div', ['as' => 'get.div', 'uses' => 'MaterialUserController@get_div']);
Route::get('get-location', ['as' => 'get.location', 'uses' => 'MaterialUserController@get_location']);
Route::get('get-mrp_controller', ['as' => 'get.mrp_controller', 'uses' => 'MaterialUserController@get_mrp_controller']);
Route::get('get-valuation_class', ['as' => 'get.valuation_class', 'uses' => 'MaterialUserController@get_valuation_class']);
Route::get('get-industry_sector', ['as' => 'get.industry_sector', 'uses' => 'MaterialUserController@get_industry_sector']);
Route::get('get-material_type', ['as' => 'get.material_type', 'uses' => 'MaterialUserController@get_material_type']);
Route::get('get-sales_org', ['as' => 'get.sales_org', 'uses' => 'MaterialUserController@get_sales_org']);
Route::get('get-dist_channel', ['as' => 'get.dist_channel', 'uses' => 'MaterialUserController@get_dist_channel']);
Route::get('get-item_cat', ['as' => 'get.item_cat', 'uses' => 'MaterialUserController@get_item_cat']);
Route::get('get-tax_classification', ['as' => 'get.tax_classification', 'uses' => 'MaterialUserController@get_tax_classification']);
Route::get('get-account_assign', ['as' => 'get.account_assign', 'uses' => 'MaterialUserController@get_account_assign']);
Route::get('get-availability_check', ['as' => 'get.availability_check', 'uses' => 'MaterialUserController@get_availability_check']);
Route::get('get-transportation_group', ['as' => 'get.transportation_group', 'uses' => 'MaterialUserController@get_transportation_group']);
Route::get('get-loading_group', ['as' => 'get.loading_group', 'uses' => 'MaterialUserController@get_loading_group']);
Route::get('get-profit_center', ['as' => 'get.profit_center', 'uses' => 'MaterialUserController@get_profit_center']);
Route::get('get-mrp_type', ['as' => 'get.mrp_type', 'uses' => 'MaterialUserController@get_mrp_type']);
Route::get('get-tm_material', ['as' => 'get.tm_material', 'uses' => 'MaterialUserController@get_tm_material']);
Route::get('get-sle', ['as' => 'get.sle', 'uses' => 'MaterialUserController@get_sle']);

Route::post('/ldaplogin', 'LDAPController@login');
Route::resource('/wsdl', 'WsdlController');