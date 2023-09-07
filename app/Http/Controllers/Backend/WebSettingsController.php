<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\WebSetting;
use Illuminate\Http\Request;

class WebSettingsController extends Controller
{
    public function show()
    {
        return view('backend.web_settings.view');
    }

    public function get_social()
    {
        $social = WebSetting::where('setting_type', 'social')->get();
        return response()->json($social);
    }

    public function add_social(Request $request)
    {
        $this->validate($request, [
            'facebook' => 'required',
            'linkedin' => 'required',
            'youtube' => 'required',
            'instagram' => 'required',
        ]);

        $data = [];
        $data = [
          'facebook' => $request->facebook,
          'linkedin' => $request->linkedin,
          'youtube' => $request->youtube ,
          'instagram' => $request->instagram
        ];

        foreach ($data as $key => $value){
            $web_setting = WebSetting::updateOrCreate(
                [
                    'setting_name' => $key
                ],
                [
                    'setting_name' => $key,
                    'setting_value' => $value,
                    'setting_type' => 'social',
                ]
            );

        }


    }

    public function get_footer()
    {
        $social = WebSetting::where('setting_type', 'footer')->get();
        return response()->json($social);
    }

    public function add_footer(Request $request)
    {
       $this->validate($request, [
          'footer_text' => 'required|max:30'
       ]);

       $data = [];
       $data = ['footer_text' => $request->footer_text];
       foreach ($data as $key => $value){
           WebSetting::updateOrCreate(
               ['setting_name' => $key],
               [
                   'setting_name' => $key,
                   'setting_value' => $value,
                   'setting_type' => 'footer',
               ]
           );
       }
    }

    public function get_contact()
    {
        $contact = WebSetting::where('setting_type', 'contact')->get();
        return response()->json($contact);
    }

    public function add_contact(Request $request)
    {
        $this->validate($request, [
           'email' => 'required|email',
           'phone' => 'required',
        ]);

        $data = [];
        $data = ['email' => $request->email, 'phone' => $request->phone];
        foreach ($data as $key => $value){
            WebSetting::updateOrCreate(
                ['setting_name' => $key],
                [
                    'setting_name' => $key,
                    'setting_value' => $value,
                    'setting_type' => 'contact',
                ]
            );
        }


    }
}
