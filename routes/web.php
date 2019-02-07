<?php

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

Route::group(['middleware'=>'web'],function (){
    Route::match(['get','post'],'/',['uses' => 'IndexController@execute','as' => 'home']);
    Route::get('/page/{alias}',['uses' => 'PageController@execute','as' => 'page']);
});


//admin
Route::group(['prefix' => 'admin','middleware' => 'auth'],function (){
    Route::get('/',function (){
        $data = ['title'=>'Administrator Page'];
        return view('admin.index',$data);
    });

    //admin/pages
    Route::group(['prefix' => 'pages'],function (){
        //admin/pages
        Route::get('/',['uses' => 'PagesController@execute','as' => 'pages']);
        //admin/pages/add
        Route::match(['get','post'],'/add',['uses' => 'PagesAddController@execute','as' => 'pagesAdd']);
        //admin/edit/2
        Route::match(['get','post','delete'],'/edit/{page}',['uses' => 'PagesEditController@execute','as' => 'pagesEdit']);
    });


    //admin/portfolio
    Route::group(['prefix' => 'portfolio'],function (){
        //admin/portfolio
        Route::get('/',['uses' => 'PortfolioController@execute','as' => 'portfolio']);
        //admin/portfolio/add
        Route::match(['get','post'],'/add',['uses' => 'PortfolioAddController@execute','as' => 'portfolioAdd']);
        //admin/edit/2
        Route::match(['get','post','delete'],'/edit{portfolio}',['uses' => 'PortfolioEditController@execute','as' => 'portfolioEdit']);
    });

    //admin/services
    Route::group(['prefix' => 'services'],function (){
        //admin/services
        Route::get('/',['uses' => 'ServicesController@execute','as' => 'services']);
        //admin/services/add
        Route::match(['get','post'],'/add',['uses' => 'ServicesAddController@execute','as' => 'servicesAdd']);
        //admin/edit/2
        Route::match(['get','post','delete'],'/edit{services}',['uses' => 'ServicesEditController@execute','as' => 'servicesEdit']);
    });



});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
