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

Route::get('/', array('as' => 'index', 'uses' => 'HomeController@index'));

Route::get('danh-muc/{id}/{title}.html', array('as'=>'show_category', 'uses' => 'HomeController@show_category'));
Route::get('/san-pham-{id}/{title}.html', array('as'=>'show', 'uses' => 'HomeController@show'));
Route::get('/lien-he.html', array('as'=>'contact', 'uses' => 'HomeController@contact'));
Route::post('/tao-lien-he.html', array('as'=>'create_contact', 'uses' => 'HomeController@createContact'));
// admin
Route::get('/quynhquanly', array('as'=>'admin', 'uses' => 'AdminController@index'));

Route::get('/quynhquanly/danh-muc-san-pham.html', array('as'=>'categories', 'uses' => 'AdminController@index'));
Route::get('/quynhquanly/them-danh-muc-con.html', array('as'=>'new_category', 'uses' => 'AdminController@newSubCategory'));
Route::post('/quynhquanly/tao-danh-muc-con.html', array('as'=>'create_category', 'uses' => 'AdminController@createSubCategory'));
Route::post('/quynhquanly/update-danh-muc-con/{id}', array('as'=>'update_category', 'uses' => 'AdminController@updateSubCategory'));
Route::get('/quynhquanly/sua-danh-muc-con/{id}', array('as'=>'edit_category', 'uses' => 'AdminController@editSubCategory'));
Route::get('/quynhquanly/xoa-danh-muc-con/{id}', array('as'=>'delete_category', 'uses' => 'AdminController@deleteSubCategory'));
Route::get('/quynhquanly/them-san-pham/{sub_id}', array('as'=>'new_product_category', 'uses' => 'AdminController@newProductToSubCategory'));
Route::post('/quynhquanly/tao-san-pham/{sub_id}', array('as'=>'create_product_category', 'uses' => 'AdminController@createProductToSubCategory'));
Route::get('/quynhquanly/danh-muc-con/{sub_id}/san-pham.html', array('as'=>'all_product_category', 'uses' => 'AdminController@listProductOfCategory'));

Route::get('/quynhquanly/tat-ca-san-pham.html', array('as'=>'articles', 'uses' => 'AdminController@listArticle'));
Route::get('/quynhquanly/them-moi-san-pham.html', array('as'=>'new_product', 'uses' => 'AdminController@newArticle'));
Route::get('/quynhquanly/sua-san-pham/{id}', array('as'=>'edit_product', 'uses' => 'AdminController@editArticle'));
Route::get('/quynhquanly/xoa-san-pham/{id}', array('as'=>'delete_product', 'uses' => 'AdminController@deleteArticle'));
Route::post('/quynhquanly/tao-san-pham.html', array('as'=>'create_product', 'uses' => 'AdminController@createArticle'));
Route::post('/quynhquanly/update-san-pham/{id}', array('as'=>'update_product', 'uses' => 'AdminController@updateArticle'));

Route::get('/quynhquanly/get-subcategory', array('as'=>'get_subcategory', 'uses' => 'AdminController@getSubCategory'));

Route::get('/quynhquanly/themsanphamnoibat-{id}-.html', array('as'=>'new_high', 'uses' => 'AdminController@newHigh'));
Route::post('/quynhquanly/tao-san-pham-noi-bat.html', array('as'=>'create_high', 'uses' => 'AdminController@createHigh'));
Route::get('/quynhquanly/san-pham-noi-bat.html', array('as'=>'index_high', 'uses' => 'AdminController@indexHigh'));
Route::get('/quynhquanly/xoa-san-pham-noi-bat/{id}.html', array('as'=>'delete_high', 'uses' => 'AdminController@deleteHigh'));

Route::get('/quynhquanly/san-pham-yeu-thich.html', array('as'=>'index_favorite', 'uses' => 'AdminController@indexFavorite'));
Route::get('/quynhquanly/san-pham-thong-minh.html', array('as'=>'index_smart', 'uses' => 'AdminController@indexSmart'));
// Route::get('/laravel-filemanager', 'LfmController@show');
// Route::post('/laravel-filemanager/upload', 'LfmController@upload');
Route::group(array('middleware' => ''), function(){
    Route::controller('filemanager', 'FilemanagerLaravelController');
});
