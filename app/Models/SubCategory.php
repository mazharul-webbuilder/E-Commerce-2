<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    private static $subcategory;
    private static $directory = 'subcategory-images/';
    private static $imageUrl;


    public static function getSubCategory($request)
    {
        self::$subcategory = new SubCategory();
        self::$subcategory->categoryID = $request->category_id;
        self::$subcategory->name = $request->name;
        self::$subcategory->description = $request->description;
        self::$subcategory->image = GetImage::getImageUrl($request, self::$directory);
        self::$subcategory->save();
    }

    public static function updateSubCategory($request, $id)
    {
        self::$subcategory = SubCategory::find($id);
        if ($request->file('image'))
        {
            if (file_exists(self::$subcategory->image))
            {
                unlink(self::$subcategory->image);
            }

            self::$imageUrl = GetImage::getImageUrl($request, self::$directory);
        }
        else
        {
            self::$imageUrl = self::$subcategory->image;
        }

        self::$subcategory->categoryID = $request->category_id;
        self::$subcategory->name = $request->name;
        self::$subcategory->description = $request->description;
        self::$subcategory->image = self::$imageUrl;
        self::$subcategory->save();
    }

    public static function deleteSubCategory($id)
    {
        self::$subcategory = SubCategory::find($id);
        if (file_exists(self::$subcategory->image))
        {
            unlink(self::$subcategory->image);
        }

        self::$subcategory->delete();
    }


    public function category()
    {
        return $this->belongsTo(Category::class, 'categoryID');
    }
}
