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


Route::resource('materials', 'MaterialController');
Route::post('/materials/post', 'MaterialController@store');
Route::get('/materials/edit/', 'MaterialController@show');
Route::post('/materials/inactive', 'MaterialController@inactive');
Route::post('/materials/active', 'MaterialController@active');
Route::get('data-table-material', ['as' => 'get.material', 'uses' => 'MaterialController@getData']);
Route::get('data-table-group-material', ['as' => 'get.data_table_group_material', 'uses' => 'MaterialController@groupMaterialGroup']);

Route::post('/ldaplogin', 'LDAPController@login');
