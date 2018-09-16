<?php
// 'middleware' => 'web',
Route::group([ 'prefix' => 'api/classsection', 'namespace' => 'App\\Modules\ClassSection\Http\Controllers'], function()
{
    // Route::get('/', 'ClassSectionController@index');
    Route::post('/create',[ 
       'uses' => 'ClassSectionController@store',
       'as' => 'api.classsection.create',
       ]);
    Route::post('/create/section',[ 
       'uses' => 'ClassSectionController@addSection',
       'as' => 'api.section.create',
       ]);
});
