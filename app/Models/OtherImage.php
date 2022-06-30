<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherImage extends Model
{
    use HasFactory;

    private static $otherImage;
    private static $otherImages;
    private static $imageUrl;
    private static $imageName;
    private static $directory;

    public static function getImageUrl($otherImage)
    {
        self::$imageName = $otherImage->getClientOriginalName();
        self::$directory = 'product-other-images/';
        $otherImage->move(self::$directory, self::$imageName);
        self::$imageUrl  = self::$directory.self::$imageName;
        return self::$imageUrl;

    }

    public static function getOtherImages($request, $productID)
    {
        self::$otherImages = $request->file('otherImages');
        foreach (self::$otherImages as $otherImage)
        {
            self::$otherImage               = new OtherImage();
            self::$otherImage->productID    = $productID;
            self::$otherImage->image        = self::getImageUrl($otherImage);
            self::$otherImage->save();
        }

    }

    public static function updateOtherImage($request, $id)
    {
        self::$otherImages = OtherImage::where('productID', $id)->get();
        foreach (self::$otherImages as $otherImage)
        {
            if (file_exists($otherImage->image))
            {
                unlink($otherImage->image);
            }
            $otherImage->delete();
        }
        self::getOtherImages($request, $id);
    }

    public static function deleteOtherImages($id)
    {
        self::$otherImages = OtherImage::where('productID', $id)->get();
        foreach (self::$otherImages as $otherImage)
        {
            if (file_exists($otherImage->image))
            {
                unlink($otherImage->image);
            }
            $otherImage->delete();
        }
    }


}
