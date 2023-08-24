<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    // Use for render Admin dashboard
    public function adminDashboard()
    {
        $categories = Category::tree()->get()->toTree();
        return view('admin\dashboard' , compact('categories'));
    }

    // Use for render User dashboard
    
    public function userDashboard()
    {
        return view('user\dashboad');
    }
}
