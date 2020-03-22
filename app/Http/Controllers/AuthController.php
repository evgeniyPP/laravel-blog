<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login_get()
    {
        $form = app()->make('LoginForm');

        return view('auth.login', [
            'form' => $form
        ]);
    }

    public function login_post(Request $request)
    {
        $validator = Validator::make($request->all(), Config::get('constants.loginValidation'));

        if ($validator->fails()) {
            return redirect()
                ->route('auth.login_get')
                ->withErrors($validator);
        }

        $data = $request->all();

        if (Auth::attempt(['login' => $data['login'], 'password' => $data['password']], $data['remember'] ?? null)) {
            return redirect()->intended(route('index'));
        } else {
            return redirect()
                ->route('auth.login_get')
                ->withErrors(['login' => 'Неверный логин или пароль']);
        }
    }

    public function signup_get(Request $request)
    {
        $oldInput = $request->old();

        $form = app()->make('SignUpForm', [
            'name' => $oldInput['name'] ?? null,
            'surname' => $oldInput['surname'] ?? null,
            'login' => $oldInput['login'] ?? null
        ]);

        return view('auth.signup', [
            'form' => $form
        ]);
    }

    public function signup_post(Request $request)
    {
        $validator = Validator::make($request->all(), Config::get('constants.signUpValidation'));

        if ($validator->fails()) {
            return redirect()
                ->route('auth.signup_get')
                ->withErrors($validator)
                ->withInput($request->all());
        }

        $data = $request->all();
        DB::table('users')->insert(
            [
                'name' => $data['name'],
                'surname' => $data['surname'],
                'login' => $data['login'],
                'password' => password_hash($data['password'], \PASSWORD_DEFAULT)
            ]
        );

        return redirect()->route('index');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('index');
    }
}
