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

    // Render Create Form
    public function createCategory()
    {
        $category = Category::get();        
        $edit = false;
        return view('admin\category\create' , compact('category' , 'edit'));
    }

    // save category

    public function createCategorySave(Request $request)
    {
        $caretory = new Category();

        $caretory->category_name = $request->category_name;

        if($request->parent_category)
        {
            $caretory->parent_id = $request->parent_category;
        }

        $caretory->save();

        return redirect()->back()->with('message', 'Category Saved');     


    }

    // Render Edit Form

    public function editCategory($categoryId)
    {
        $categories = Category::get();        
        $currentCategory = Category::where('id' , $categoryId)->get()-first();
        $edit = true;
        return view('admin\category\create'  compact('categories' , 'edit' , 'currentCateggory'));
    }

    // Edit Save Category

    public function editCategorySave(Request $request)
    {
        $caretoryForUpdate = Category::where('id' , $request->category_id);
        
        $dataForUpdate = array();
        $dataForUpdate['category_name'] = $request->category_name; 
        if($request->parent_category)
        {
            $dataForUpdate['parent_id'] = $request->parent_id; 

        }

        $caretoryForUpdate->update($dataForUpdate);

        return redirect()->back()->with('message', 'Category Updated');   
    }

    public function deleteCategory($categoryId)
    {
        $deleteStatus = Category::where('id' , $categoryId)->delete();
        return redirect()->back()->with('message', 'Category Deleted');   
    }
}
