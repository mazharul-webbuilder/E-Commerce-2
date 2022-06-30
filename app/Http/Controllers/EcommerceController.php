<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class EcommerceController extends Controller
{
    public function index()
    {
        return view('front.home.home',[
            'categories' => Category::orderby('id', 'desc')->take(6)->get(),
        ]);
    }

    public function categoryProduct($id)
    {
        return view('front.category.category-product',[
            'products' => Product::where('categoryID', $id)->get(),
        ]);
    }

    public function subcategoryProduct($id)
    {
       return view('front.subcategory.subcategory',[
           'products' => Product::where('subcategoryID', $id)->get(),
       ]);
    }

    public static function detail($id)
    {
        return view('front.product.detail',[
            'product' => Product::find($id),
        ]);
    }

}
