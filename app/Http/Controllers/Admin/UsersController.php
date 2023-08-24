<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    public function listUser()
    {
        $users = User::where('is_admin', '0')->get();
        return view('admin\user\list' compact('users'));

    }
}
