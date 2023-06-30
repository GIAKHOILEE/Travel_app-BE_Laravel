<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequests;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequests;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    public function login(LoginRequests $request)
    {
        $validated = $request -> validated();
        if(auth()->attempt($validated)){
            $user = Auth::user();
            $iduser = Auth::id();

            $token = $user -> createToken("travel")->accessToken;
            $checkuser = User::where('id', $iduser)->pluck('system_role')->first();

            if ($checkuser == 1) {
                return response()->json(["user" => $user,'token' => $token,'message'=>"login user success"],200);
            } else if ( $checkuser == 2) {
                return response()->json(["user" => $user,'token' => $token,'message'=>"login admin success"],200);
            }
        }
        else{
            return response()->json(['message'=>"login err"],211);
        }
    }


    public function register(RegisterRequests $request)
    {
        $validated = $request -> validated();
        $validated['password'] = bcrypt( $validated['password'] );
        $validated['system_role'] = 1;
        $user = User::create($validated);
        if($user){
            return response()->json(["user" => $user,'message'=>"register success"],211);
        }
        else{
            return response()->json(["user" => $user,'message'=>"register success"],200);
        }


    }


    public function get_user()
    {
        $user = auth()->user();
        return response()->json(['user'=>$user],200);
    }

}
