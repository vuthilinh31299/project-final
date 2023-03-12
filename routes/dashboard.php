<?php
Route::group(['prefix' => 'admin', 'as' => 'dashboard.', 'namespace' => 'Auth'], function(){
    Route::get('login', 'LoginController@getLoginPage')->name('login');
    Route::post('login', 'LoginController@postLogin')->name('postLogin');
    Route::get('logout', 'LoginController@logOutAdmin')->name('logOut');
}); 
Route::group(['prefix' => 'admin', 'as' => 'dashboard.', 'namespace' => 'Dashboard','middleware' => 'adminLogin'], function(){
    Route::get('/', 'DashboardController@index')->name('index');
    Route::group(['prefix' => 'provider'], function(){
        Route::get('/', 'ProvidersController@getList')->name('provider.list');
        Route::get('create', 'ProvidersController@getCreate')->name('provider.getCreate');
        Route::post('create', 'ProvidersController@postCreate')->name('provider.postCreate');
   });
    
});

?>