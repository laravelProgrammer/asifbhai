<?php

namespace App\Providers;

use App\FormFields\DateTimePickerField;
use Illuminate\Support\ServiceProvider;
use TCG\Voyager\Facades\Voyager;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Voyager::addFormField(DateTimePickerField::class);

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Gate::define('browse_tutor', function ($user) {
            return $user->hasPermission('browse_tutor');
        });
        Gate::define('browse_search_tutor', function ($user) {
            return $user->hasPermission('browse_search_tutor');
        });
    }
}
