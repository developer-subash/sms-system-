<?php

Route::group(['prefix' => 'setting', 'namespace' => 'App\\Modules\Setting\Http\Controllers'], function()
{
   
   Route::post('/getPagedSetting',[ 
       'uses' => 'SettingController@getPagedSetting',
       'as' => 'api.getPaged.setting',
       ]);
   Route::post('/create',[ 
       'uses' => 'SettingController@createSetting',
       'as' => 'api.create.setting',
       ]);
   Route::post('/update',[ 
       'uses' => 'SettingController@updateSetting',
       'as' => 'api.update.setting',
       ]);

});
