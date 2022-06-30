<?php

namespace App\Http\Controllers;
use App\Models\Brand;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function add()
    {
        return view('admin.brand.add');
    }
    public function create(Request $request)
    {
        Brand::getNewBrand($request);
        return redirect()->back()->with('message', 'Brand Created Successfully');
    }
    public function edit($id)
    {
        return view('admin.brand.edit',[
            'brand' => Brand::find($id),
        ]);
    }
    public function delete($id)
    {
        Brand::deleteBrand($id);
        return redirect('/manage-brand')->with('message', 'Brand Deleted Successfully');
    }
    public function update(Request $request, $id)
    {
        Brand::updateBrand($request,$id);
        return redirect('/manage-brand')->with('message', 'Brand Updated Successfully');
    }
    public function manage()
    {
        return view('admin.brand.manage',[
            'brands' => Brand::orderby('id', 'desc')->get(),
        ]);
    }

}
