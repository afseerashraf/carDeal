<?php

namespace App\Http\Controllers;

use App\Http\Requests\AgentLogin;
use App\Http\Requests\AgentRequest;
use Illuminate\Http\Request;
use App\Models\Agent;
use Illuminate\View\View;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use App\Http\Requests\LoginRequest;
use App\Mail\agentresetPassword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\agent_resetPassword;
use Illuminate\Contracts\Session\Session;
use Illuminate\Validation\Rules\Password;


class AgentController extends Controller
{
    public function agentRegister(AgentRequest $request){
        $agent = new Agent();
        $agent->name = $request->name;
        $agent->email = $request->email;
        $agent->password = $request->password;
        $agent->save();
        return redirect()->route('login');
    }

    public function dologin(AgentLogin $request){
       $credentials = ['email' => $request->email, 'password' => $request->password];

        if(auth()->guard('agent')->attempt($credentials)){

            $agent = auth()->guard('agent')->user();


            return view('brand.create', ['agentName' => $agent->name]);
        }else{
            return redirect()->route('login');
        }

    }
    public function logout(){
        auth()->guard('agent')->logout();

        return redirect()->route('login');
    }

    public function showForgetPasswordEmailForm()
    {
        return view('agent.forgotPassword');
    }


    public function submitForgetPasswordEmail(Request $request)

    {

        $request->validate([

            'email' => 'required|email|exists:agents',

        ]);


        $agent = Agent::where('email',$request->email)->first();
        if($agent){
            $token = Str::random(64);
            $agent->update(['password_resetToken' => $token]);
            Mail::to($agent->email)->send(new agentresetPassword($agent, $token));
            return redirect()->back();
        }else{
            return redirect()->route('login');
        }

}

public function viewresetPasswordForm($token){
    $decryptedToken = decrypt($token);
    $agent = Agent::where('password_resetToken',  $decryptedToken)->first();
    if($agent){
        $agent->update(['password_resetToken' => 'Null']);
        return view('agent.reset', compact('agent'));

    }else{
        return redirect()->route('forgotPasswordEmail');
    }
}
public  function doreset(Request $request){
    $request->validate([
        'password' => [
            'required',
            'confirmed',
            Password::min(8)->letters()->numbers(),
        ],

    ]);
    $agent = Agent::find(Crypt::decrypt(request('agent_id')));
    if ($agent){
        $agent->update([
            'password' => '$request->password',
        ]);
    }

    return redirect()->route('login');
}




}

