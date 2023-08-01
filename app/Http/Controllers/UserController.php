<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function home(){
        $userId = auth()->user()->id;

        $users = User::where('id', '!=', $userId)->get();

        return view('home', compact('users'));
    }

    public function homeNot(){

        $users = User::all();

        return view('homeNot', compact('users'));
    }

    public function pay(Request $request, $id){
        $randomPrice = $request->price;
        $pay = $request->amountPay;

        if($randomPrice > $pay){
            $sisa = $randomPrice-$pay;
            // dd($sisa);
            session()->flash('statusMessage', "You are still underpaid $sisa");
            return view('/payment', compact('randomPrice'));
        }
        elseif($pay > $randomPrice){
            $sisa = $pay-$randomPrice;
            $id = $id;
            session()->flash('statusMessage', "Sorry you overpaid $sisa, would you like to enter a balance?");
            return view('/payment', compact('randomPrice', 'sisa', "id"));
            // return view('/payment', compact('randomPrice'))->with('sisa', $sisa)->with('statusMessage', "Sorry you overpaid $sisa, would you like to enter a balance?");
        }

        return redirect('/');
    }

    public function wallet(Request $request){
        $sisa = $request->sisa;
        $id = $request->id;

        $user = User::find($id);
        $user['wallet'] = $sisa;
        $user->update();
    }
}
