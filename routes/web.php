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
Route::group(['middleware' => ['web']], function () {

});

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/ldaplogin', 'LDAPController@login');
Route::post('/ldaplogout', 'LDAPController@logout');

Route::resource('/groupmaterials', 'GroupMaterialController');
Route::post('/groupmaterials/post', 'GroupMaterialController@store');
Route::get('/groupmaterials/edit/', 'GroupMaterialController@show');
Route::post('/groupmaterials/inactive', 'GroupMaterialController@inactive'); 
Route::post('/groupmaterials/active', 'GroupMaterialController@active');
Route::get('get-data-group-material', ['as' => 'get.group_material', 'uses' => 'GroupMaterialController@getData']);
Route::get('get-api-group-material', ['as' => 'get.get_group_material', 'uses' => 'GroupMaterialController@get_material_group']);

/* MATERIAL */
Route::resource('materials', 'MaterialController');
Route::post('/materials/post', 'MaterialController@store');
Route::get('/materials/edit/', 'MaterialController@show');
Route::post('/materials/inactive', 'MaterialController@inactive');
Route::post('/materials/active', 'MaterialController@active');
Route::get('data-table-material', ['as' => 'get.material', 'uses' => 'MaterialController@getData']);
Route::get('sap_group_material', ['as' => 'get.sap_group_material', 'uses' => 'MaterialController@sap_group_material']);
Route::get('data-table-group-material', ['as' => 'get.data_table_group_material', 'uses' => 'MaterialController@groupMaterialGroup']);

/* MATERIAL USER */
Route::resource('material_user', 'MaterialUserController');
Route::get('/material_extend/{id}', 'MaterialUserController@extend')->name('extend');
Route::get('/material_user/show', 'MaterialController@show');
Route::get('/material_user/searchs', 'MaterialController@search');
Route::post('/material_user/post', 'MaterialUserController@store');
Route::put('/material_user/store_location/{id}', 'MaterialUserController@store_location');
Route::get('/material_user/getimage/', 'MaterialUserController@get_image');
Route::get('get-image-detail', ['as' => 'get.get_image_detail', 'uses' => 'MaterialUserController@get_image']);
Route::get('material-user-detail', ['as' => 'get.material_user_detail', 'uses' => 'MaterialUserController@detail']);

Route::get('group-material-list', ['as' => 'get.group_material_list', 'uses' => 'MaterialUserController@groupMaterialGroup']);
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
Route::get('get-material_user_grid', ['as' => 'get.material_user_grid', 'uses' => 'MaterialUserController@get_material_user_grid']);
Route::get('get-material_user_grid_search', ['as' => 'get.material_user_grid_search', 'uses' => 'MaterialUserController@get_material_user_grid_search']);
Route::get('get-tr_material', ['as' => 'get.tr_material', 'uses' => 'MaterialUserController@get_tr_materials']);
Route::get('get-tm_material', ['as' => 'get.tm_material', 'uses' => 'MaterialUserController@get_tm_materials']);
Route::get('get-sle', ['as' => 'get.sle', 'uses' => 'MaterialUserController@get_sle']);
Route::get('get-auto_sugest', ['as' => 'get.auto_sugest', 'uses' => 'MaterialUserController@get_auto_sugest']);

/* MATERIAL USER EDIT */
Route::resource('/tr_materials', 'TrMaterialController');
Route::post('/tr_materials/post', 'TrMaterialController@store');
Route::get('/tr_material_grid/{id}', 'TrMaterialController@grid')->name('search');
Route::get('tr_material_auto_sugest', 'TrMaterialController@auto_sugest');

Route::resource('/tm_materials', 'TmMaterialController');
Route::post('/tm_materials/post', 'TmMaterialController@store');
Route::get('/tm_material_grid/{id}', 'TmMaterialController@grid')->name('search');
Route::get('tm_material_auto_sugest', 'TmMaterialController@auto_sugest');


/* USER SETTINGS */
Route::resource('/users', 'UsersController');
Route::post('/users/post', 'UsersController@store');
Route::get('/users/edit/', 'UsersController@show');
Route::post('/users/inactive', 'UsersController@inactive');
Route::post('/users/active', 'UsersController@active');
Route::get('grid-tr-user', ['as' => 'get.grid_tr_user', 'uses' => 'UsersController@dataGrid']);

Route::resource('/roles', 'RolesController');
Route::post('/roles/post', 'RolesController@store');
Route::get('/roles/edit/', 'RolesController@show');
Route::post('/roles/inactive', 'RolesController@inactive');
Route::post('/roles/active', 'RolesController@active');
Route::get('grid-tm-role', ['as' => 'get.grid_tm_role', 'uses' => 'RolesController@dataGrid']);


Route::resource('/roleusers', 'RoleUserController');
Route::post('/roleusers/post', 'RoleUserController@store');
Route::get('/roleusers/edit/', 'RoleUserController@show');
Route::post('/roleusers/inactive', 'RoleUserController@inactive');
Route::post('/roleusers/active', 'RoleUserController@active');
Route::get('grid-role-user', ['as' => 'get.role_user', 'uses' => 'RoleUserController@dataGrid']);
Route::get('get-select_tr_user', ['as' => 'get.select_tr_user', 'uses' => 'RoleUserController@get_tr_user']);
Route::get('get-select_role', ['as' => 'get.select_role', 'uses' => 'RoleUserController@get_role']);

Route::resource('/menu', 'MenuController');
Route::post('/menu/post', 'MenuController@store');
Route::get('/menu/edit/', 'MenuController@show');
Route::post('/menu/inactive', 'MenuController@inactive');
Route::post('/menu/active', 'MenuController@active');
Route::get('grid-menu', ['as' => 'get.menu_grid', 'uses' => 'MenuController@dataGrid']);

Route::resource('/roleaccess', 'RoleAccessController');