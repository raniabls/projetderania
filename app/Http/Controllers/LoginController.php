<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Login;

class LoginController extends Controller
{
    public function index() {
        return view('profiles.index');
    }
    public function login() {
        return view('profiles.login');
    }
    public function store(Request $request) {
        // dd($request);
        $data = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $newLogin = Login::create($data);

        return redirect(route('create'));

    }
}
