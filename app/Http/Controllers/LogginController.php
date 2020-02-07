<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use Route;
use App\User;
use Hash;

class LogginController extends Controller
{
    public function login(Client $http, Request $request)
    {
        $email = $request->username;
        $password = $request->password;

        try{
            $request->request->add([
            'username' => $email,
            'password' => $password,
            'grant_type' => 'password',
            'client_id' => env('PASSPORT_ID'),
            'client_secret' => env('PASSPORT_PUBLIC_KEY'),
            'scope' => '*'
        ]);
            $tokenRequest = Request::create(
                env('APP_URL').'/oauth/token',
                'post'
            );

            $response = Route::dispatch($tokenRequest);

            if($response->getStatusCode() == 200){
                //$this->storeAccessToken($response->getContent());
            }

            return $response;
        }catch(BadResponseException $e){
            return response()->json('Error'.$e->getCode());
        }
    }

    public function register(Request $request)
    {
        $request->validate( [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        return User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
    }

    public function logout()
    {
        auth()->user()->tokens->each(function ($token, $key){
            $token->delete();
        });

        return response()->json('Logger out successfully', 200);
    }
}
