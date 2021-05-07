<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function edit() {
        $user = auth()->user();

        return view('dashboard.admin.edit-profile', compact('user'));
    }
}
