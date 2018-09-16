<?php

Route::group([ 'prefix' => 'admin', 'namespace' => 'App\\Modules\Admin\Http\Controllers'], function()
{
   Route::post('/registerUser',[

    'uses' =>'AdminController@getRegisterAdmin',
    'as' =>'api.register.admin',

    ]);
   Route::post('/login',[

    'uses' =>'AuthenticationController@login',
    'as' =>'api.login.users',

    ]);
   Route::post('/assign/Role',[

    'uses' =>'RoleController@createRoles',
    'as' =>'api.assign.Roles',

    ]);
   Route::post('/get/Roles',[

    'uses' =>'RoleController@listRoles',
    'as' =>'api.getAll.Roles',

    ]);
   Route::post('/get/destroy/Roles',[

    'uses' =>'RoleController@destroyRoles',
    'as' =>'api.admin.delete.Roles',

    ]);
});
