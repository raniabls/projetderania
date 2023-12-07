<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asmaa;

class AsmaaController extends Controller
{
    public function create() {
        return view('Login.asmaa');
    }
    public function store(Request $request) {
       // dd($request);
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            
        ]);

        $newAsmaa = Asmaa::create($data);

        
    }

}
