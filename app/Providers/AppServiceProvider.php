<?php

namespace App\Providers;

use App\Models\WebSetting;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\View;
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
        $app_settings = WebSetting::where('setting_type', 'app')->get();
        $social_settings = WebSetting::where('setting_type', 'social')->get();
        $footer_settings = WebSetting::where('setting_type', 'footer')->get();
        View::share(['app_settings' => $app_settings, 'social_settings' => $social_settings, 'footer_settings' =>$footer_settings]);
    }
}
