<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function confirm(Application $application)
    {
        $application->status_id = 2;
        $application->save();
        return redirect()->back();
    }
    public function refuse(Application $application)
    {
        $application->status_id = 3;
        $application->save();
        return redirect()->back();
    }



    public function index(Request $request){
        if(!isset($request->sort)){
            $applications = Application::all();
        }else{
            $applications = Application::orderBy('created_at', 'desc')->get();
        }
        foreach($applications as $item){
            $item->status = $item->getStatus->title;
        }
        return view('admin', ['applications' => $applications]);
    }
}
