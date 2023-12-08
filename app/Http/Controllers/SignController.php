<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sign;

class SignController extends Controller
{
    public function index() {
        return view('profiles.index');
    }
    public function sign() {
        return view('profiles.sign');
    }
    public function store(Request $request) {
        // dd($request);
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $newSign = Sign::create($data);

        return redirect(route('create'));

    }
}
