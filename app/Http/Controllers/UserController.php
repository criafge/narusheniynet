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
            'email' => 'unique:users,email|required|email',
            'password' => 'required|min:6',
            'login' => 'unique:users,login|required',
            'name' => 'required|regex:/[А-Яа-яЁё]/u',
            'surname' => 'required|regex:/[А-Яа-яЁё]/u',
            'phone' => 'required|numeric|min:11'
        ], [
            'login.required' => 'Слишком пусто',
            'login.unique' => 'Такой уже есть, меняй',
            'email.required' => 'Слишком пусто',
            'email.unique' => 'Такой уже есть, меняй',
            'email.email' => 'Ну не тот формат',
            'password.required' => 'Слишком пусто',
            'password.min' => 'Малоооо',
            'name.required' => 'Слишком пусто',
            'name.regex' => 'Ну не тот формат',
            'surname.regex' => 'Ну не тот формат',
            'surname.required' => 'Слишком пусто',
            'phone.required' => 'Слишком пусто',
            'phone.numeric' => 'Ну не тот формат',
            'phone.min' => 'Ну не тот формат',
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
        {
            return redirect("home");
        } 
        else {
            return redirect()->back()->with('error', 'Неправильный логин или пароль');
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
            return redirect('/admin');
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
        return redirect()->back()->with('success', 'Заявка добавлена!');
        // dd($request->all());
    }

    public function deleteApplication(Application $application){
        $application->delete();
        return redirect()->back();
    }
    public function userData()
    {
        return view('user-data', ['user'=> Auth::user()]);
    }

    public function changeData(Request $request){
        $request->validate([
            'email' => 'required|email',
            'login' => 'required',
            'name' => 'required|string',
            'surname' => 'required|string',
            'phone' => 'required|numeric'
        ], [
            'login.required' => 'Слишком пусто',
            'email.required' => 'Слишком пусто',
            'email.email' => 'Ну не тот формат',
            'name.required' => 'Слишком пусто',
            'name.string' => 'Ну не тот формат',
            'surname.string' => 'Ну не тот формат',
            'surname.required' => 'Слишком пусто',
            'phone.required' => 'Слишком пусто',
            'phone.numeric' => 'Ну не тот формат',
        ]);
        if(empty($request->password)){
            $request['password'] = Auth::user()->password;
        }
        User::find(Auth::user()->id)->update($request->except('_token'));
        return redirect()->back();
    }
}
