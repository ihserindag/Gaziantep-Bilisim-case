<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class BackHomeController extends Controller
{
    public function index()
    {
        return view('back.homepage');
    }
    public function login()
    {
       return  view('back.login');
    }
    public function loginPost(Request $request)
    {
        $login=Auth::attempt([
            'email'=>$request->email,
            'password'=>$request->password

        ]);

        if($login)
        {
            return redirect()->route('index');
        }
       return redirect()->route('login')->withErrors('Email Adresi veya Şifre Hatalı');


    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }

    public function register(){

        return view('back.register');
    }

    public function registerPost(Request $request){
        $data=User::where('email',$request->email)->get();

        if(!$data)

        {

            $users=new Prozes;
            $users->name=$request->name;
            $users->email=$request->email;
            $users->password=bcrypt($request->password);
            $users->save();
            toastr()->success('Üye işleminiz  başarı ile gerçekleşti');
            return redirect()->route('login');
        }
        else{
            toastr()->success('Kayıtlı kullanıcı var');
            return redirect()->route('login');
        }



    }

    public function passwordchange()
    {

        return view('back.passwordchange');

    }


    public function passwordchangestore(Request $request)
    {
        $id=Auth::user()->id;

        $users=User::findOrFail($id);
        $users->password=$request->password;
        $users->save();

    }







}
