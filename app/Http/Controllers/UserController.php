<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function editUser() {
        $user = auth()->user();
        return view('user.edit', compact('user'));
    }
}
