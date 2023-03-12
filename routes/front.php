<?php
        Route::group(['prefix' => '/', 'namespace' => 'Auth', 'as' => 'front.'],function(){
        Route::get('/loginuser', 'LoginController@getLoginPageUser')->name('getlogin');
        Route::post('/loginuser', 'LoginController@postLoginUser')->name('postLogin');
        Route::get('/registeruser', 'RegisterController@getRegister')->name('registerUser');
        Route::post('registeruser', 'RegisterController@postRegister')->name('postRegister');
        Route::get('/logoutUser',  function(){Auth::logout();return redirect()->route('front.index');})->name('logOutUser');
        });
    Route::group(['prefix' => '/', 'namespace' => 'Front', 'as' => 'front.'],function(){
        Route::get('/', 'FrontController@index')->name('index');
        Route::post('/search', 'ProviderController@searchData')->name('provider.search');
    });
?>