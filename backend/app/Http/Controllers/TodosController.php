<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Todo;
use Illuminate\Support\Facades\Auth;

class TodosController extends Controller
{
    public function index() {
        $id = Auth::id();
        // todosテーブルのすべてのデータを取得する処理
        $todos = Todo::where('user_id',$id)->get();
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

        $request->validate([
            'body' => 'required | max:15',
        ],[
            'body.required' => 'bodyは必須です',
            'body.max' => '15文字以内でご入力ください', 
        ]);

        $todo->body = $request->body;
        $todo->user_id = Auth::id();
        
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

    public function __construct()
    {
        $this->middleware('auth');
    }
}
