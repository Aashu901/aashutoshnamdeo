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
        $categories = Category::get();        
        $edit = false;
        $actionUrl = route('admin.category.create.save');
        return view('admin\category\create' , compact('categories' , 'edit' ,  'actionUrl'));
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

        return redirect()->route('admin.dashboard')->with('message', 'Category Saved');     


    }

    // Render Edit Form

    public function editCategory($categoryId)
    {
        $categories = Category::get();        
        $currentCategory = Category::where('id' , $categoryId)->first();
        $edit = true;
        $actionUrl = route('admin.category.edit.save');

        return view('admin\category\create', compact('categories' , 'edit' , 'currentCategory' , 'actionUrl'));
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

        return redirect()->route('admin.dashboard')->with('message', 'Category Updated');   
    }

    // Delete Category

    public function deleteCategory($categoryId)
    {
        $deleteStatus = Category::where('id' , $categoryId)->delete();
        return redirect()->back()->with('message', 'Category Deleted');   
    }
}
