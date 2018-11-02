<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'devsrv\sessionout\Http\Controllers', 'middleware' => ['web']], function () {
    Route::post('/check-auth', 'AuthCheckCtrl@getStatus')->name('sessionout.chkauth');
});
