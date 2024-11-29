<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\User;
use App\Models\Product;
use App\Observers\UserObserver;
use App\Observers\ProductObserver;
use Illuminate\Support\Facades\Blade;
use App\Observers\CandidateObserver;
use App\Models\Candidate;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */

    public function boot()
    {
        Candidate::observe(CandidateObserver::class);
        Blade::component('layouts.app', 'layouts.app');

    }
}
