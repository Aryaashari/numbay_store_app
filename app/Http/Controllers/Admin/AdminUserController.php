<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;

class AdminUserController extends Controller
{
    public function index() {
        $users = User::with('roles')->get();
        
        return view('dashboard.user.index', compact('users'));
    }

    public function show(User $user) {
        return view('dashboard.user.profile', compact('user'));
    }

    public function create() {
        return view('dashboard.user.create');
    }

    public function destroy($id) {
        User::destroy($id);

        return redirect('/admin/users')->with('status', 'Pengguna berhasil dihapus!');
    }
}
