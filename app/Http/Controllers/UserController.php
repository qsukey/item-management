<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * ユーザー一覧
     */
    public function index()
    {
        return view('user.index'); 
    }
}
