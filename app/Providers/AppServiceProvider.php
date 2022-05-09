<?php

namespace App\Providers;

use App\Billing\PaymentGateway;
use Faker\Provider\ar_EG\Payment;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(PaymentGateway::class,function(){
            return new PaymentGateway('eur');
        });
    }
}
