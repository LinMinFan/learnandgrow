<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;

class FormController extends Controller
{
    public function index(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'content' => 'required',
        ], [
            'required' => ':attribute 為必填欄位。',
            'email' => ':attribute 格式不正確。',
        ]);

        Form::create($validatedData);

        return redirect()->route('index')->withSuccess(__('送出成功'));;
    }
}
