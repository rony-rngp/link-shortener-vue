<?php

use Illuminate\Support\Facades\Route;



Route::get('/', [\App\Http\Controllers\Frontend\HomeController::class, 'index']);
Route::post('/store', [\App\Http\Controllers\Frontend\HomeController::class, 'store']);

Route::match(['get', 'post'], '/login', [\App\Http\Controllers\Frontend\AuthController::class, 'login'])->name('user.login');
Route::match(['get', 'post'], '/register', [\App\Http\Controllers\Frontend\AuthController::class, 'register'])->name('user.register');

Route::group(['middleware' => 'auth'], function (){
   Route::post('/logout', [\App\Http\Controllers\Frontend\AuthController::class, 'logout'])->name('logout');
   Route::get('/user-shorted-links/list/{user_id}', [\App\Http\Controllers\Frontend\HomeController::class, 'user_shorted_links']);
});

//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//---admin routes are here
Route::match(['get', 'post'], '/admin', [\App\Http\Controllers\Backend\AuthController::class, 'login'])->name('admin.login');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function (){
    Route::post('/logout', [\App\Http\Controllers\Backend\AuthController::class, 'admin_logout'])->name('logout');
    Route::get('/dashboard', [\App\Http\Controllers\Backend\AuthController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [\App\Http\Controllers\Backend\AuthController::class, 'profile'])->name('profile');
    Route::post('/update/profile', [\App\Http\Controllers\Backend\AuthController::class, 'update_profile'])->name('update.profile');
    Route::post('/update/password', [\App\Http\Controllers\Backend\AuthController::class, 'update_password'])->name('update.password');

    //----users
    Route::get('/user/list', [\App\Http\Controllers\Backend\UserController::class, 'user_list'])->name('user.list');
    Route::get('/get/user/list', [\App\Http\Controllers\Backend\UserController::class, 'get_user_list'])->name('get.user.list');
    Route::get('/get/user/details/{id}', [\App\Http\Controllers\Backend\UserController::class, 'get_user_details'])->name('get.user.details');

    //links
    Route::group(['prefix' => 'link'], function (){
       Route::get('/view', [\App\Http\Controllers\Backend\LinkController::class, 'show'])->name('link.view');
       Route::get('/list', [\App\Http\Controllers\Backend\LinkController::class, 'link_list'])->name('link.list');
       Route::get('/details/{id}', [\App\Http\Controllers\Backend\LinkController::class, 'link_details'])->name('link.details');
    });

    //links
    Route::group(['prefix' => 'web-settings'], function (){
       Route::get('/', [\App\Http\Controllers\Backend\WebSettingsController::class, 'show'])->name('web.setting');
       Route::get('/social/get', [\App\Http\Controllers\Backend\WebSettingsController::class, 'get_social'])->name('web.setting.social.get');
       Route::post('/social/add', [\App\Http\Controllers\Backend\WebSettingsController::class, 'add_social'])->name('web.setting.social.add');
       Route::get('/footer/get', [\App\Http\Controllers\Backend\WebSettingsController::class, 'get_footer'])->name('web.setting.footer.get');
       Route::post('/footer/add', [\App\Http\Controllers\Backend\WebSettingsController::class, 'add_footer'])->name('web.setting.footer.add');
       Route::get('/contact/get', [\App\Http\Controllers\Backend\WebSettingsController::class, 'get_contact'])->name('web.setting.contact.get');
       Route::post('/contact/add', [\App\Http\Controllers\Backend\WebSettingsController::class, 'add_contact'])->name('web.setting.contact.add');
    });
    //Settings
    Route::group(['prefix' => 'settings'], function (){
       Route::get('/', [\App\Http\Controllers\Backend\SettingsController::class, 'show'])->name('setting');
       Route::get('/app/get', [\App\Http\Controllers\Backend\SettingsController::class, 'get_app'])->name('setting.app.get');
       Route::post('/app/store', [\App\Http\Controllers\Backend\SettingsController::class, 'store_app'])->name('setting.app.add');
       //redirect
       Route::get('/redirect/get', [\App\Http\Controllers\Backend\SettingsController::class, 'get_redirect'])->name('setting.redirect.get');
       Route::post('/redirect/store', [\App\Http\Controllers\Backend\SettingsController::class, 'store_redirect'])->name('setting.redirect.add');
       //ads
       Route::get('/ads/get', [\App\Http\Controllers\Backend\SettingsController::class, 'get_ads'])->name('setting.ads.get');
       Route::post('/ads/store', [\App\Http\Controllers\Backend\SettingsController::class, 'store_ads'])->name('setting.ads.add');
       //email
       Route::get('/email/get', [\App\Http\Controllers\Backend\SettingsController::class, 'get_email'])->name('setting.email.get');
       Route::post('/email/store', [\App\Http\Controllers\Backend\SettingsController::class, 'store_email'])->name('setting.email.add');
    });

});

//redirect
Route::get('{hash}', [\App\Http\Controllers\Frontend\HomeController::class, 'redirect'])->name('redirect');
