<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $users = User::with('userStatus')
            ->with('sessions')
            ->get();

        return view('home', [
            'users' => $users,
        ]);
    }
}
