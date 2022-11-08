<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Validator;

class FormController extends Controller
{
    // public function post(Request $request) {
    //     $rulus = [
    //         'body' => 'required',
    //     ];

    //     $message = [
    //         'body. required' => '・bodyは必須です',
    //     ];

    //     $validator = Validator::make($request->all(), $rulus, $message)

    //   // 記述方法：Validator::make('値の配列', '検証ルールの配列');
    
    //     if ($validator->fails()) {
    //       return redirect('/errorpage')
    //       ->withErrors($validator)
    //       ->withInput();
    //     } else {
    //       return view('sample.index', ['msg' => 'OK']);
    //     }
    
    // }  // 記述方法：if($validator->fails()) {失敗時の処理} else {成功時の処理}
    
}
