<?php

namespace App\Providers;

use App\Http\View\Composser\Menuindex;
use Illuminate\Support\ServiceProvider;

class MenuindexProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {



        view()->composer([  'layouts.dashboard'   ], Menuindex::class);



     }
}
