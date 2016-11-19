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
//******************************************游客路由******************************************//
Route::group(['namespace'=>'Home'],function(){
    Route::get('/',[
        'uses'=>'UserController@welcome',
        'as'=>'welcome'
    ]);
    Route::get('/getArticle',[
        'uses'=>'UserController@getArticle',
        'as'=>'getArticle'
    ]);
    Route::get('/getStatusArticle',[
        'uses'=>'UserController@getStatusArticle',
        'as'=>'getStatusArticle'
    ]);
    Route::get('/getTagArticle',[
        'uses'=>'UserController@getTagArticle',
        'as'=>'getTagArticle'
    ]);
    Route::post('/searchFor',[
        'uses'=>'UserController@searchFor',
        'as'=>'searchFor'
    ]);
});


//******************************************管理员路由******************************************//
Route::group(['namespace'=>'Admin'],function() {
    Route::get('/admin_lukbob', [
        'uses' => 'AdminController@getAdmin',
        'as' => 'getAdmin'
    ]);
    Route::post('/adminHome',[
        'uses'=>'AdminController@adminHome',
        'as'=>'adminHome'
    ]);
});
Route::group(['namespace'=>'Admin','middleware'=>"admin"],function() {
    Route::get('/sitemap.xml',[
        'uses'=>'AdminController@siteMap',
        'as'=>'siteMap'
    ]);
    Route::get('/adminArticle',[
        'uses'=>'AdminController@adminArticle',
        'as'=>'adminArticle'
    ]);
    Route::get('getLinks',[
        'uses'=>'AdminController@getLinks',
        'as'=>'getLinks'
    ]);
//******************************************文章路由*******************************************//
    Route::get('/addArticles', [
        'uses' => 'ArticleController@addArticles',
        'as' => 'addArticles'
    ]);
    Route::post('/storeArticle', [
        'uses' => 'ArticleController@storeArticle',
        'as' => 'storeArticle'
    ]);
    Route::get('/checkStatus/{name}', [
        'uses' => 'ArticleController@checkStatus',
        'as' => 'checkStatus'
    ]);
    Route::get('/checkTag/{name}', [
        'uses' => 'ArticleController@checkTag',
        'as' => 'checkTag'
    ]);
    Route::get('/uploadArticle', [
        'uses' => 'ArticleController@uploadArticle',
        'as' => 'uploadArticle'
    ]);
    Route::post('/postUploadArticle', [
        'uses' => 'ArticleController@postUploadArticle',
        'as' => 'postUploadArticle'
    ]);
    Route::post('/getModal', [
        'uses' => 'ArticleController@getModal',
        'as' => 'getModal'
    ]);
    Route::get('/deleteArticle', [
        'uses' => 'ArticleController@deleteArticle',
        'as' => 'deleteArticle'
    ]);
//*******************************************友链路由******************************************//
    Route::get('/addLinks',[
        'uses'=>'LinksController@addLinks',
        'as'=>'addLinks'
    ]);
    Route::post('/postLinks',[
        'uses'=>'LinksController@postLinks',
        'as'=>'postLinks'
    ]);
    Route::get('/check_ip/{ip}',[
        'uses'=>'LinksController@check_ip',
        'as'=>'check_ip'
    ]);
    Route::get('/check_name/{name}',[
        'uses'=>'LinksController@check_name',
        'as'=>'check_name'
    ]);
    Route::get('/uploadLink',[
        'uses'=>'LinksController@uploadLink',
        'as'=>'uploadLink'
    ]);
    Route::post('/postUploadLink',[
        'uses'=>'LinksController@postUploadLink',
        'as'=>'postUploadLink'
    ]);
    Route::get('deleteLink',[
        'uses'=>'LinksController@deleteLink',
        'as'=>'deleteLink'
    ]);
});

