<?php

namespace App\Http\Controllers;

use App\Http\Requests\AgentRequest;
use Illuminate\Http\Request;
use App\Models\Agent;
use Illuminate\View\View;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class AgentController extends Controller
{
    public function register(){
        return view('agent.register');
    }
    public function agentRegister(AgentRequest $request){
        $agent = new Agent();
        $agent->name = $request->name;
        $agent->email = $request->email;
        $agent->password = $request->password;
        $agent->save();
        return redirect()->route('login');
    }
    public function login(){
        return view('agent.login');
    }
    public function dologin(AgentRequest $request){
        $email = $request->email;
        $password = $request->password;

        if(auth()->attempt(['email' => $email, 'password' => $password])){
            return redirect()->route('index');
        }else{
            return redirect()->route('login');
        }

    }
}

