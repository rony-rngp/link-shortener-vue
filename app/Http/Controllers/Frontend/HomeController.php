<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index()
    {
        return view('frontend.home');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'main_link' => 'required|url'
        ]);

        $hash = Str::random(6);

        $link = new Link();
        $link->user_id = @Auth::user()->id;
        $link->main_link = $request->main_link;
        $link->hash = $hash;
        $link->save();

        return response()->json([
            'status' => true,
            'message' => 'Link shorted successfully',
            'link' => $link
        ]);
    }

    public function redirect($hash)
    {
        $link_data = Link::where('hash', $hash)->first();
        if ($link_data){
            $link_data->increment('view_count');
            return redirect()->to($link_data->main_link);
        }else{
            abort(404);
        }
    }

    public function user_shorted_links($user_id)
    {
        $user_shorted_links = Link::where('user_id', $user_id)->get();
        return response()->json([
           'status' => true,
            'user_shorted_links' => $user_shorted_links
        ]);
    }
}
