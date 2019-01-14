<?php

Route::group([
    'middleware' => ['web', 'laracms.auth'],
    'namespace'  => 'Grundmanis\Laracms\Modules\Banners\Controllers',
    'prefix'     => 'laracms/banners/'
], function () {
    Route::get('/', 'BannerController@index')->name('laracms.banners');
    Route::get('create', 'BannerController@create')->name('laracms.banners.create');
    Route::post('create', 'BannerController@store');
    Route::get('edit/{banner}', 'BannerController@edit')->name('laracms.banners.edit');
    Route::post('edit/{banner}', 'BannerController@update');
    Route::get('destroy/{banner}', 'BannerController@destroy')->name('laracms.banners.destroy');
});