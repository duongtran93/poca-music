<?php

namespace App\Http\Controllers;

use App\Http\Requests\changepasswordRequest;
use App\Song;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $songs = Song::where('user_id', Auth::user()->id)->get();
        return view('user.index', compact('songs'));
    }

    public function edit($id) {
        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, $id) {
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->address = $request->address;
        if ($request->avatar) {
            Storage::delete('public/avatar/'. $user->avatar);
            $avatar = $request->file('avatar');
            $avatarExtension = $avatar->getClientOriginalExtension();
            $avatarName = $user->name . time() .'.' . $avatarExtension;
            $avatar->storeAs('public/avatar', $avatarName);
            $user->avatar = $avatarName;
        }
        $user->save();

        return view('home');
    }

    public function editpass() {
        return view('user.editpass');
    }


    public function updatepass(changepasswordRequest $request) {
        if(Auth::Check())
        {
            $request_data = $request->All();

                $current_password = Auth::User()->password;
                if(Hash::check($request_data['old_password'], $current_password))
                {
                    $user = Auth::User();
                    $user->password = Hash::make($request_data['new_password']);;
                    $user->save();
                    return view('home');
                }
            return view('welcome');
        }
    }
}
