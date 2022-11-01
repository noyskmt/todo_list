<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class TodosController extends Controller
{
    public function index() {
        // todosテーブルのすべてのデータを取得する処理
        $todos = Todo::all();
        // return view('todosフォルダの中のindex.blade.phpを参照している')->with('todos', $todos);

        $user = Auth::user();
        $id = Auth::id();
        // dump($id);
        
        // with関数はbladeファイルに変数を渡す
        return view('todos.index')->with(['todos' => $todos]);
    }

    public function store(Request $request) {
        // インスタンスを作成
        $todo = new Todo();

        // データの中身を追加する
        $id = Auth::id();

        // \Log::debug($request);
        $todo->body = $request->body;

        // データを追加したものを保存
        $todo->save();

        return redirect('/todos');
    }

    public function destroy(todo $todo) {
        $todo->delete();
        return redirect('/todos');
    }

    public function edit(todo $todo) {
        return view('todos.edit')->with('todo',$todo);
    }

    public function update(Request $request, todo $todo) {
        $todo->body = $request->body;
        $todo->save();
        return redirect('/todos');
    }
}
