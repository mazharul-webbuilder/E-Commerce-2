<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GetImage extends Model
{
    use HasFactory;
    private static $image;
    private static $imageName;
    private static $imageUrl;
    private static $directory;


    public static function getImageUrl($request, $directory)
    {
        self::$image     = $request->file('image');
        self::$imageName = self::$image->getClientOriginalName();
        self::$image->move($directory, self::$imageName);
        self::$imageUrl  = $directory.self::$imageName;
        return self::$imageUrl;
    }

}
