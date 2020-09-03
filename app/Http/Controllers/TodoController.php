<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index(){
        $todos = Todo::query()->select(
            "id","name"
        )->get();
        return response()->json($todos);
    }

    public function store(Request $requet) {
        $todo = Todo::create($requet->only(['name']));
        return response()->json($todo);
    }

    public function destroy(Todo $todo) {
        $todo->delete();
        return response()->noContent();
    }
}
