<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function add()
    {
        return view('admin.subCategory.add',[
            'categories' => Category::orderby('id' , 'desc')->get(),
        ]);
    }

    public function create(Request $request)
    {
        SubCategory::getSubCategory($request);
        return redirect()->back()->with('message', 'SubCategory Created Successfully');
    }

    public function update(Request $request, $id)
    {
        SubCategory::updateSubCategory($request, $id);
        return redirect('/manage-subcategory')->with('message', 'Subcategory Updated Successfully');
    }

    public function delete(Request $request, $id)
    {
        SubCategory::deleteSubCategory($id);
        return redirect('/manage-subcategory')->with('message', 'Subcategory Deleted Successfully');
    }

    public function manage()
    {
        return view('admin.subCategory.manage',[
            'subcategories' => SubCategory::orderby('id', 'desc')->get(),
        ]);
    }

    public function edit($id)
    {
        return view('admin.subCategory.edit',[
            'categories' => Category::orderby('id', 'desc')->get(),
            'subcategory' => SubCategory::find($id)
        ]);
    }

}
