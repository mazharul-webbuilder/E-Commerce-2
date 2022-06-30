<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryContoller extends Controller
{
    public function add()
    {
        return view('admin.category.add');
    }

    public function manage()
    {
        return view('admin.category.manage', [
            'categories' => Category::all()
        ]);
    }

    public function create(Request $request)
    {
        Category:: getNewCategory($request);
        return redirect()->back()->with('message', 'Category Created Successfully');
    }

    public function edit($id)
    {
        return view('admin.category.edit', [
            'category' => Category::find($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        Category:: updateCategory($request, $id);
        return redirect('/manage-category')->with('message', 'Category Updated Successfully');
    }

    public function delete(Request $request, $id)
    {
        Category:: deleteCategory($id);
        return redirect('/manage-category')->with('message', 'Category Deleted Successfully');
    }
}
