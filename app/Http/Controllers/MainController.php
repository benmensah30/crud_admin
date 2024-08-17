<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index()
    {

        return view('admin.dashboard');
    }

    public function profil()
    {

        return view('users.profil');
    }

    public function admin_profil()
    {

        return view('admin.ad_profil');
    }

    public function users_show()
    {

        $users = User::all();
        return view('admin.index', [
            "users" => $users
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function users_index()
    {
        return view('users.user_dashboard');
    }
}
