<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function admin()
    {
        return view('admin');
    }


    public function index()
    {
        $users = User::get();
        return view('admin',compact('users'));
    }

    /**
     * Responds with a welcome message with instructions
     *
     * @return \Illuminate\Http\JsonResponse
     */

    public function changeStatus(Request $request)
    {
        $user = User::find($request->user_id);
        $user->status = $request->status;
        $user->save();

        return response()->json(['success'=>'Status change successfully.']);
    }

}
