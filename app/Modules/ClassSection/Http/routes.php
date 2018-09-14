<?php
// 'middleware' => 'web',
Route::group([ 'prefix' => 'api/classsection', 'namespace' => 'App\\Modules\ClassSection\Http\Controllers'], function()
{
    // Route::get('/', 'ClassSectionController@index');
    Route::post('/create', 'ClassSectionController@store');
});
