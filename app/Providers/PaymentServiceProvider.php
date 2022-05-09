<?php

namespace App\Providers;

use App\Http\Controllers\UserController;
use Illuminate\Support\ServiceProvider;

class PaymentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(UserController::class,function(){
            return new UserController("UBL-".rand(0,1500));
        });
    }
}
