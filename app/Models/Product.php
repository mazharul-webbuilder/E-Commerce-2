<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    private static $product;
    private static $imageUrl;
    private static $directory = 'product-images/';

    public static function getNewProduct($request)
    {
        self::$product                      = new Product();
        self::$product->categoryID          =  $request->category_id;
        self::$product->subcategoryID       =  $request->subcategory_id;
        self::$product->brandID             =  $request->brand_id;
        self::$product->unitId              =  $request->unit_id;
        self::$product->name                =  $request->name;
        self::$product->code                =  $request->code;
        self::$product->regular_price       =  $request->regular_price;
        self::$product->selling_price       =  $request->selling_price;
        self::$product->stock_amount        =  $request->stock_amount;
        self::$product->short_description   =  $request->short_description;
        self::$product->long_description    =  $request->long_description;
        self::$product->image               =  GetImage::getImageUrl($request, self::$directory);
        self::$product->save();
        return self::$product;
    }

    public static function updateProduct($request, $id)
    {
        self::$product = Product::find($id);
        if ($request->file('image'))
        {
            if (file_exists(self::$product->image))
            {
                unlink(self::$product->image);
            }

            self::$imageUrl = GetImage::getImageUrl($request, self::$directory);
        }
        else
        {
            self::$imageUrl = self::$product->image;
        }

        self::$product->categoryID          =  $request->category_id;
        self::$product->subcategoryID       =  $request->subcategory_id;
        self::$product->brandID             =  $request->brand_id;
        self::$product->unitId              =  $request->unit_id;
        self::$product->name                =  $request->name;
        self::$product->code                =  $request->code;
        self::$product->regular_price       =  $request->regular_price;
        self::$product->selling_price       =  $request->selling_price;
        self::$product->stock_amount        =  $request->stock_amount;
        self::$product->short_description   =  $request->short_description;
        self::$product->long_description    =  $request->long_description;
        self::$product->image               =  self::$imageUrl;
        self::$product->save();
        return self::$product;
    }

    public static function deleteProduct($id)
    {
        self::$product = Product::find($id);
        if (file_exists(self::$product->image))
        {
            unlink(self::$product->image);
        }
        self::$product->delete();
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'categoryID');
    }

    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class, 'subcategoryID');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brandID');
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unitId');
    }

    public function otherImages()
    {
        return $this->hasMany(OtherImage::class, 'productID');
    }
}
