<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\WebSetting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function show()
    {
        return view('backend.settings.view');
    }

    public function get_app()
    {
        $app_settings = WebSetting::where('setting_type', 'app')->get();
        return $app_settings;
    }

    public function store_app(Request $request)
    {
        $this->validate($request, [
            'app_name' => 'required',
            'app_title' => 'required',
            'slogan' => 'required',
            'second_slogan' => 'required',
        ]);

        $data = [];
        $data = [
            'app_name' => $request->app_name,
            'app_title' => $request->app_title,
            'slogan' => $request->slogan,
            'second_slogan' => $request->second_slogan
        ];

        foreach ($data as $key => $value){
            WebSetting::updateOrCreate(
                ['setting_name' => $key],
                [
                    'setting_name' => $key,
                    'setting_value' => $value,
                    'setting_type' => 'app',
                ]
            );
        }
    }

    public function get_redirect()
    {
        $redirect_settings = WebSetting::where('setting_type', 'redirect')->get();
        return $redirect_settings;
    }

    public function store_redirect(Request $request)
    {
        $this->validate($request, [
           'redirect_status' => 'required'
        ]);

        $data = [];
        $data = [
            'redirect_status' => $request->redirect_status,
        ];

        foreach ($data as $key => $value){
            WebSetting::updateOrCreate(
                ['setting_name' => $key],
                [
                    'setting_name' => $key,
                    'setting_value' => $value,
                    'setting_type' => 'redirect',
                ]
            );
        }
    }

    public function get_ads()
    {
        $ads_settings = WebSetting::where('setting_type', 'ads')->get();
        return $ads_settings;
    }

    public function store_ads(Request $request)
    {
        $this->validate($request, [
           'popup_ads' => 'required',
           'top_ads' => 'required',
           'bottom_ads' => 'required'
        ]);

        $data = [];
        $data = [
            'popup_ads' => $request->popup_ads, 'top_ads' => $request->top_ads, 'bottom_ads' => $request->bottom_ads
        ];

        foreach ($data as $key => $value){
            WebSetting::updateOrCreate(
                ['setting_name' => $key],
                [
                    'setting_name' => $key,
                    'setting_value' => $value,
                    'setting_type' => 'ads',
                ]
            );
        }
    }

    public function get_email()
    {
        $email_settings = WebSetting::where('setting_type', 'email')->get();
        return $email_settings;
    }

    public function store_email(Request $request)
    {
        $this->validate($request, [
           'mail_mailer' => 'required',
           'mail_host' => 'required',
           'mail_port' => 'required',
           'mail_username' => 'required',
           'mail_password' => 'required',
           'mail_encryption' => 'required',
           'mail_from_address' => 'required',
           'mail_from_name' => 'required',
        ]);


        $data = [];
        $data = [
            'mail_mailer' => $request->mail_mailer,
            'mail_host' => $request->mail_host,
            'mail_port' => $request->mail_port,
            'mail_username' => $request->mail_username,
            'mail_password' => $request->mail_password,
            'mail_encryption' => $request->mail_encryption,
            'mail_from_address' => $request->mail_from_address,
            'mail_from_name' => $request->mail_from_name,
        ];


        foreach ($data as $key => $value){
            WebSetting::updateOrCreate(
                ['setting_name' => $key],
                [
                    'setting_name' => $key,
                    'setting_value' => $value,
                    'setting_type' => 'email',
                ]
            );
        }
    }
}
