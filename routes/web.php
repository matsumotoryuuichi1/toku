<?php

use App\Http\Controllers\SakuraController;
use App\Http\Controllers\ServletController;
use App\Http\Controllers\TestController;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('contacts','ContactForms');
//restのconrtollerで処理する物なので@~はいらない。Rest側で用意されてあるため



Route::get('contact/index','ContactForms@index')->name('contact.index');
     //->name('viewディレクトリーとファイル名');を書くと後々楽になる、フォームとかでリンク先、送信先の指定ができるため
     //{{route(contact.index)}}といったように
Route::get('contact/create','ContactForms@create')->name('contact.create');

Route::post('contact/store','ContactForms@store')->name('contact.store');

Route::get('contact/show/{id}','ContactForms@show')->name('contact.show');
            // 検索する際はこのように/番号を付けなければならないcontact/show/１
Route::get('contact/edit/{id}','ContactForms@edit')->name('contact.edit');
            //editは登録履歴の表示だけなのでgetで大丈夫
Route::post('contact/update/{id}','ContactForms@update')->name('contact.update');

Route::post('contact/destroy/{id}','ContactForms@destroy')->name('contact.destroy');




// Route::get('contact/index','ContactFormController');
//lessons/lessonを検索するとControllerのLessonControllerファイルに処理が渡される。
//LessonControllerファイルには上記の@のあとの名前の関数を作る

//ここからnomartusk
Route::get('nomarl/index','NomartuskController@index')->name('nomarl.index');
Route::get('nomarl/create','NomartuskController@create')->name('nomarl.create');
Route::post('nomarl/store','NomartuskController@store')->name('nomarl.store');
Route::get('nomarl/show/{id}','NomartuskController@show')->name('nomarl.show');
Route::get('nomarl/edit/{id}','NomartuskController@edit')->name('nomarl.edit');
Route::post('nomarl/update/{id}','NomartuskController@update')->name('nomarl.update');
Route::post('nomarl/destroy/{id}','NomartuskController@destroy')->name('nomarl.destroy');


Route::group(['prefix'=>'Servlet','middleware'=>'auth'],function(){
Route::get('index','ServletController@index')->name('Servlet/index');
Route::get('create','ServletController@create')->name('Servlet/create');
Route::post('store','ServletController@store')->name('Servlet/store');
Route::get('show/{id}','ServletController@show')->name('Servlet/show');
Route::get('edit/{id}','ServletController@edit')->name('Servlet/edit');
Route::post('update/{id}','ServletController@update')->name('Servlet/update');
Route::post('destroy/{id}','ServletController@destroy')->name('Servlet/destroy');


});






//ここからmay
Route::group(['prefix'=>'may','middleware'=>'auth'], function (){
Route::get('index','MayController@index')->name('may/index');
Route::get('create','MayController@create')->name('may/create');
Route::post('store','MayController@store')->name('may/store');
Route::get('show/{id}','MayController@show')->name('may/show');
Route::get('edit/{id}','MayController@edit')->name('may/edit');
Route::post('update/{id}','MayController@update')->name('may/update');
Route::post('destroy/{id}','MayController@destroy')->name('may/destroy');
});
Auth::routes();
//sakura
Route::group(['prefix'=>'sakura','middleware'=>'auth'],function(){
Route::get('index','SakuraController@index')->name('sakura.index');
Route::get('create','SakuraController@create')->name('sakura.create');
Route::post('store','SakuraController@store')->name('sakura.store');
Route::get('show/{id}','SakuraController@show')->name('sakura.show');
Route::get('edit/{id}','SakuraController@edit')->name('sakura.edit');
Route::post('update/{id}','SakuraController@update')->name('sakura.update');
Route::post('destroy/{id}','SakuraController@destroy')->name('sakura.destroy');
});
Auth::routes();

//リレーション
Route::get('shop/index','ShopController@index');
Route::get('shop1/index','shop1controller@index');
Route::get('sho','ShoController@index');
Route::get('big','BigController@index');
Route::get('b/index','bController@index');


//Office
Route::group(['prefix'=>'Office','middleware'=>'auth'], function (){
Route::get('home','OfficeController@home')->name('Office/home');
Route::get('index','OfficeController@index')->name('Office/index');
Route::get('formcreate','OfficeController@formcreate')->name('Office/formcreate');
// Route::get('create','OfficeController@create')->name('Office/create');
Route::get('start_create','OfficeController@start_create')->name('Office/start_create');
Route::get('break_create','OfficeController@break_create')->name('Office/break_create');
Route::get('return_create','OfficeController@return_create')->name('Office/return_create');
Route::get('reave_create','OfficeController@reave_create')->name('Office/reave_create');
Route::post('store','OfficeController@store')->name('Office/store');
Route::post('start_store','OfficeController@start_store')->name('Office/start_store');
Route::post('break_store','OfficeController@break_store')->name('Office/break_store');
Route::post('return_store','OfficeController@return_store')->name('Office/return_store');
Route::post('reave_store','OfficeController@reave_store')->name('Office/reave_store');
Route::get('show/{id}','OfficeController@show')->name('Office/show');//IDをあとで書く
Route::get('edit/{id}','OfficeController@edit')->name('Office/edit');
Route::post('update/{id}','OfficeController@update')->name('office/update');
Route::post('destroy/{id}','OfficeController@destroy')->name('Office/destroy');
// Route::get('time_show/{office_id}','OfficeController@time_show')->name('Office/time_show');
});


//テスト
Route::get('Office/timedata','OfficeController@timedata');
Route::get('link/', 'LinkController@index');
Route::get('test/area','ShopController@index');
Route::get('Office/test','OfficeController@test');
