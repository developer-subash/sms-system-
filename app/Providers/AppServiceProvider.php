<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        
    }
    public function boot(){
        Schema::defaultStringLength(191);

            $this->app['auth']->viaRequest('api', function ($request) {
            if ($request->header('Authorization')) {
            $key = explode(' ',$request->header('Authorization'));
            $user = Users::where('api_token', $key[1])->first();
            if(!empty($user)){
            $request->request->add(['userid' => $user->id]);
             
            }
            return $user;
            }
            });

        }
}
