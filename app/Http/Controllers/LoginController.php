<?php

namespace App\Http\Controllers;

use App\Models\Relation;
use App\Models\User;
use App\Models\UserWork;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function store(Request $request){
        $validate = $request->validate([
            'name' => 'required',
            'password' => 'required',
            'email' =>'required|email:dns|unique:users',
            'gender' => 'required',
            'linkedIn' => 'required',
            'phone' => 'required',
            'image' => 'required|image|file|max:1024',
            'interest' => 'required|array|min:3'
        ]);

        $randomPrice = mt_rand(100000, 125000);

        //ngehash passwordnya
        $validate['password'] = bcrypt($validate['password']);

        //masukin imagenya ke file laravel
        $validate['image'] = $request->File('image')->store('storage');

        $user = User::create($validate);

        $interests = $request->input('interest');

        foreach ($interests as $interest) {
            $relation = new UserWork();
            $relation->user_id = $user->id;
            $relation->work_id = $interest;
            $relation->save();
        }

        //redirect ke payment dan kasi message dari sessionnya
        return view('/payment', compact('user', 'randomPrice'))->with('statusMessage', 'You are successfully registered!');
    }

    public function login(Request $request){
        $validate = $request->validate([
            'email' =>'required|email:dns',
            'password' => 'required'
        ]);

        if(Auth::attempt($validate)){
            $request->session()->regenerate();

            return redirect('/');
        }

        return redirect()->back()->with('statusMessage', "Failed to Log In!");

    }

    public function logout(){
        Auth::logout();

        session()->invalidate();
        session()->regenerateToken();

        return redirect('/');
    }
}
