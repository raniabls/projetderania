<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    public function index() {
        $todos = Todo::all();
        return view('todos.index', ['todos' => $todos]);
    }

    public function create() {
        return view('todos.create');
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

        $newTodo = Todo::create($data);

        return redirect(route('todo.index'));
    }

    public function edit(Todo $todo) {
        return view('todos.edit', ['todo' => $todo]);
    }

    public function update(Todo $todo, Request $request) {
        $data = $request->validate([
            'Titres' => 'required',
            'Date' => 'required',
            'Temps' => 'required',
            'Categorie' => 'required',
            'Détails' => 'required',
        ]);

        $todo->update($data);

        return redirect(route('todo.index'))->with('success', 'Tâche mise à jour avec succès');
    }
    
    public function destroy(Todo $todo) {
        $todo->delete();
        return redirect(route('todo.index'))->with('success', 'Tâche supprimer avec succès');
    }

}
