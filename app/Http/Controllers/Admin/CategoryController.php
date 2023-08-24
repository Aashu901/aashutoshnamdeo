<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth' , 'is_admin']);
    }

    public function createCategory()
    {
        $category = Category::get();        
        $edit = false;
        return view('admin\category\create' compact('category' , 'edit'));
    }
    public function createCategorySave(Request $request)
    {
        $caretory = new Category();

        $caretory->category_name = $request->category_name;

        if($request->category_name)
        {
            $caretory->category_name = $request->category_name;
        }

        $caretory->save();

        return redirect()->back()->with('message', 'Category Saved');     


    }
}
