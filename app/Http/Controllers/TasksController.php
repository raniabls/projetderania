<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TasksController extends Controller
{
    public function index() {
        return view('layouts/app');
    }

    public function store(Request $request) {
        // dd($request);
        $data = $request->validate([
            'Titres' => 'required',
            'Date' => 'required',
            'Temps' => 'required',
            'Categorie' => 'required',
            'Détails' => 'required',
        ]);

        $newTask = Task::create($data);

        return redirect(route('welcome'));
    }
}
