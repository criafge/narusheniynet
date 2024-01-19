<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function signup(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'login' => 'required',
            'name' => 'required|string',
            'surname' => 'required|string',
            'phone' => 'required|numeric'
        ], [
            'login.required' => 'Слишком пусто',
            'email.required' => 'Слишком пусто',
            'email.email' => 'Ну не тот формат',
            'password.required' => 'Слишком пусто',
            'name.required' => 'Слишком пусто',
            'name.string' => 'Ну не тот формат',
            'surname.string' => 'Ну не тот формат',
            'surname.required' => 'Слишком пусто',
            'phone.required' => 'Слишком пусто',
            'phone.numeric' => 'Ну не тот формат',
        ]);
        User::create($request->all());
        return redirect('/');
    }

    public function signin(Request $request)
    {


        $request->validate(
            [
                'loginSignin' => 'required',
                'passwordSignin' => 'required'
            ],
            [
                'loginSignin.required' => 'Слишком пусто',
                'passwordSignin.required' => 'Слишком пусто'
            ]
        );
        $user = $request->only(["login", "password"]);

        if (Auth::attempt(['login' => $request->loginSignin, 'password' => $request->passwordSignin]))
        // if (Auth::attempt($user)) 
        {
            return redirect("home");
        } else {
            return redirect()->back();
        }
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect("/");
    }

    public function cabinet()
    {
        if (Auth::user()->role === 'client') {

            $applications = Auth::user()->applications;
            foreach($applications as $item){
                $item->status = $item->getStatus->title;
            }
            return view('home', ['applications' => $applications]);
        } else {
            return view('admin');
        }
    }

    public function applicationForm()
    {
        return view('application-form');
    }

    public function createApplication(Request $request)
    {
        $request->validate(
            [
                'number' => 'required',
                'description' => 'required',
            ],
            [
                'number.required' => 'Слишком пусто',
                'description.required' => 'Слишком пусто',
            ]
        );
        Application::create([
            'number' => $request->number, 
            'description' => $request->description,
            'user_id' => Auth::user()->id, 
        ]);
        return redirect()->back();
        // dd($request->all());
    }
}
