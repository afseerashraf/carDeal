<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AgentRequest;
use Illuminate\Http\Request;
use App\Models\Agent;
use Illuminate\Support\Facades\Hash;

class AgentLoginController extends Controller
{
  public function register(){
    return view('agent.register');
  }
    public function login(AgentRequest $request){
      $agent = Agent::where('email', $request->email)->first();
      if(Hash::check($request->password, $agent->password))/*check the request password eaquel to the hashed password*/{
          $token = $agent->createToken('mobile-app');
          return $token;
      }else{
        return 'The provided credentials are incorrect';
      }

    }

}
