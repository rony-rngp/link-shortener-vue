<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function user_list()
    {
        return view('backend.user_list');
    }

    public function get_user_list(Request $request)
    {
        $users = User::where('name', 'LIke', "%$request->search%")
            ->orWhere('email', 'LIke', "%$request->search%")
            ->paginate(10);
        $count_users = User::where('name', 'LIke', "%$request->search%")
            ->orWhere('email', 'LIke', "%$request->search%")
            ->count();
        return response()->json([
            'users' => $users,
            'count_users' => $count_users,
        ]);
    }

    public function get_user_details($id)
    {
        $user = User::find($id);
        return response()->json([
           'user' => $user
        ],200);
    }
}
