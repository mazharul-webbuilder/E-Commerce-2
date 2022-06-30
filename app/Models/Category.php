<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\GetImage;

class Category extends Model
{
    use HasFactory;
    private static $directory;
    private static $category;
    private static $imageUrl;


    public static function getNewCategory($request)
    {
        self::$category              = new Category();
        self::$category->name        = $request->name;
        self::$category->description = $request->description;
        self::$directory             = 'category-images/';
        self::$category->image       = GetImage::getImageUrl($request, self::$directory);
        self::$category->save();
    }




    public static function updateCategory($request, $id)
    {
        self::$category = Category::find($id);
        if ($request->file('image'))
        {
            if (file_exists(self::$category->image))
            {
                unlink(self::$category->image);
            }
            self::$directory             = 'category-images/';
            self::$imageUrl = GetImage::getImageUrl($request, self::$directory);
        }
        else
        {
            self::$imageUrl = self::$category->image;
        }
        self::$category->name        = $request->name;
        self::$category->description = $request->description;
        self::$category->image       = self::$imageUrl;
        self::$category->save();

    }


    public static function deleteCategory($id)
    {
        self::$category = Category::find($id);
        if (file_exists(self::$category->image))
        {
            unlink(self::$category->image);
        }
        self::$category->delete();
    }

    public function subcategories()
    {
        return $this->hasMany(SubCategory::class, 'categoryID');
    }
}
