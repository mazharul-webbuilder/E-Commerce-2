<?php

namespace App\Http\Controllers;
use App\Models\Brand;
use App\Models\Category;
use App\Models\OtherImage;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\Unit;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $product;

    public function getProductSubCategory()
    {
        $categoryId = $_GET['id'];
        $subcategories = SubCategory::where('categoryID', $categoryId)->get();
        return response()->json($subcategories);
    }

    public function add()
    {
        return view('admin.product.add',[
            'categories' => Category::all(),
            'subcategories' => SubCategory::all(),
            'brands' => Brand::all(),
            'units' => Unit::all(),
        ]);
    }

    public function detail($id)
    {
        return view('admin.product.detail',[
            'product' => Product::find($id),
        ]);
    }

    public function edit($id)
    {
        return view('admin.product.edit',[
            'categories'    => Category::all(),
            'subcategories' => SubCategory::all(),
            'brands'        => Brand::all(),
            'units'         => Unit::all(),
            'otherimages'   => OtherImage::where('productID', $id),
            'product'       => Product::find($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->product = Product::updateProduct($request, $id);

       if ($request->file('otherImages'))
       {
           OtherImage:: updateOtherImage($request, $this->product->id);
       }
       return redirect('/manage-product')->with('message', 'Product Updated Successfully');
    }

    public function create(Request $request)
    {
        $this->product = Product::getNewProduct($request);
        OtherImage::getOtherImages($request, $this->product->id);
        return redirect()->back()->with('message' , 'Product Created Successfully');
    }

    public function delete(Request $request, $id)
    {
        Product::deleteProduct($id);
        OtherImage::deleteOtherImages($id);
        return redirect()->back()->with('message' , 'Product Deleted Successfully');

    }


    public function manage()
    {
        return view('admin.product.manage',[
            'products'   => Product::orderby('id', 'desc')->get(),
            'categories' => Category::all(),
        ]);
    }


}
