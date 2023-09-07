<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if (Auth::guard('admin')->check()){
            return redirect()->route('admin.dashboard');
        }

        if ($request->isMethod('post')){

            $this->validate($request, [
               'email' => 'required|email',
               'password' => 'required'
            ]);

            if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)){
                return response()->json([
                   'status' => true,
                   'message' => 'Login Success',
                ]);
            }else{
                return response()->json([
                    'status' => false,
                    'message' => 'These credentials do not match our records',
                ]);
            }
        }

        return view('backend.auth.login');
    }

    public function dashboard()
    {
        return view('backend.dashboard');
    }

    public function admin_logout()
    {
        Auth::guard('admin')->logout();
        return response()->json(['Logout Success']);
    }

    public function profile()
    {
        return view('backend.auth.profile');
    }

    public function update_profile(Request $request)
    {
        $this->validate($request, [
           'name' => 'required',
           'gender' => 'required',
            'image' => 'required'
        ]);


        $admin = Auth::guard('admin')->user();
        $admin->name = $request->name;
        $admin->gender = $request->gender;

        if ($request->image != $admin->image){
            $img = explode('/', $request->image);
            $get_ext = explode(';', $img[1]);
            $ext = $get_ext[0];
            $image_name = uniqid().'.'.$ext;
            $upload_url = public_path('backend/upload/admin/'.$image_name);
            Image::make($request->image)->resize(300, 200)->save($upload_url);

            if ($admin->image != '' && file_exists(public_path('backend/upload/admin/'.$admin->image))){
                unlink(public_path('backend/upload/admin/'.$admin->image));
            }
            $admin->image = $image_name;
        }

        $admin->save();
        return response()->json(['Profile Updated']);
    }

    public function update_password(Request $request)
    {
        $this->validate($request,[
            'current_password' => 'required',
            'password' => 'required|min:8',
            'password_confirmation' => 'required',
        ]);
        if ($request->password == $request->password_confirmation){
            if (Hash::check($request->current_password, Auth::guard('admin')->user()->password)){
                if (!Hash::check($request->password_confirmation, Auth::guard('admin')->user()->password)) {

                    $admin = Auth::guard('admin')->user();
                    $admin->password = Hash::make($request->password_confirmation);
                    $admin->save();

                    return response()->json([
                        'status' => true,
                        'msg' => 'Password Successfully Updated.'
                    ]);

                }else{
                    return response()->json([
                        'status' => 'passerror',
                        'msg' => 'Sorry ! New password can not be same as old password.'
                    ]);
                }
            }else{
                return response()->json([
                    'status' => 'current_pass_error',
                    'msg' => 'Current password is wrong.'
                ]);
            }
        }else{
            return response()->json([
                'status' => 'passerror',
                'msg' => 'Password do not match.'
            ]);
        }
    }
}
