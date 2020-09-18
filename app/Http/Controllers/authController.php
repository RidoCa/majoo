<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Str;


class authController extends Controller
{
    //
    public function login(){
        return view('auth.login');
    }
    
    public function regis(){
        return view('auth.regis');
    }
    
    public function regisadmin(){
        return view('auth.regisadmin');
    }
    
    public function postlogin(Request $request){
        if (Auth::attempt($request->only('email', 'password'))) {
        
            if(auth()->user()->role=='admin'){
                return redirect('/dashboard');
            }else{
                return redirect('/katalog');
            }
        }

        return redirect('/login');
    }
    
    public function postregis(Request $request){
    
        $this->validate($request, [
            'name' => 'required|alpha',
            'email' => 'required|email|unique:App\Models\User,email',
            'password' => 'required',
            ]);
            
            $user = new \App\Models\User;

            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->remember_token = Str::random(60);
            $user->role = $request->role;
        
            $user->save();

        return redirect('/dashboard');
        
    }
    
    public function beranda(Request $request){
        $total = \App\Models\productModel::all()->count();
        $sudah = \App\Models\pesananModel::where('status','=',1)->get()->count();
        $belum = \App\Models\pesananModel::where('status','=',0)->get()->count();

        // //memanggil view
        return view('beranda', ['total' => $total, 'sudah' => $sudah,'belum' => $belum]);
    }
    
    
    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}
