<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function register(RegisterRequest $request)
    {
        $user = User::createUser($request);
        $token = $user->createToken('auth_token')->plainTextToken;
        event(new Registered($user));
        $log = User::loingUser($request);
        return response()->json([
            'data'          => $log,
            'access_token'  => $token,
            'token_type'    => 'Bearer'
        ]);
        // return redirect(RouteServiceProvider::ADMIN_HOME);
    }
    public function Login(Request $request){
        $user = User::loingUser($request);
        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json([
            'data'          => $user,
            'access_token'  => $token,
            'token_type'    => 'Bearer'
        ]);
        // return $user;
        }

        public function logout(){ 
            $users = User::all(); 
            return response()->json([ 
                'users' => $users 
            ],200); 
        } 
}
