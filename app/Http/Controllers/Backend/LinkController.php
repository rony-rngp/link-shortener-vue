<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Link;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    public function show()
    {
        return view('backend.link.view');
    }

    public function link_list(Request $request)
    {
        $links = Link::with('user')
            ->where('main_link', 'LIKE' , "%$request->search%")->latest()
            ->paginate(10);
        $count_links = Link::where('main_link', 'LIKE' , "%$request->search%")->count();
        return response()->json([
            'links' => $links,
            'count_links' => $count_links,
        ]);
    }

    public function link_details($id)
    {
        $link = Link::with('user')->find($id);
        return response()->json([
           'link' => $link
        ]);
    }
}
