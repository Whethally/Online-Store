<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('market.auth.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::check()) {
            return redirect()->intended(route('profile'))->with(success(__('Вы авторизовались.')));
        }

        $credentials = $request->only('login', 'password');
        // dd($credentials);
        // dd(Auth::attempt($credentials));
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (Auth::user()->admin == 1) {
                return redirect()->intended(route('dashboard'))->with(success(__('Вы вошли как администратор.')));
            }
            return redirect()->route('profile')->with(success(__('Вы авторизовались.')));
        }

        return redirect()->back()->withInput()->with(warning(__('Неверный логин или пароль.')));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with(alert(__('Вы вышли из системы.')));
    }
}
