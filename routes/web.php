<?php


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function(){
    Route::get('/home', 'RelationshipController@index')->name('home');
    Route::post('/save', 'RelationshipController@store_passport_id')->name('save_passport_id');
    Route::get('/one/to/one/relationship', "RelationshipController@one_to_one")->name('one_to_one');
    Route::get('crate/post', 'RelationshipController@create_post')->name('create_post');
    Route::post('save/post', "RelationshipController@store")->name('savepost');
    Route::get('show/{id}', "RelationshipController@show")->name('show');
    Route::post('save/comment', "RelationshipController@comment")-> name('comment');
    Route::get('/one/to/many', "RelationshipController@one_to_many")-> name('one_to_many');
    Route::get('one/to/many/invers', "RelationshipController@one_to_many_invers")-> name('one_to_many_invers');
    Route::get('/create/many/to/many', "RelationshipController@example") -> name('example');
    Route::get('/join', 'RelationshipController@joins') -> name('joins');
});

Route::get('sing-in/google', 'auth\LoginController@google');
Route::get('sing-in/google/redirect', 'auth\LoginController@redirect_google');