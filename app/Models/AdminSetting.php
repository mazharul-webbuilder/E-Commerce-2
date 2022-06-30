<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminSetting extends Model
{
    use HasFactory;

    private static $adminSetting;

    public static function getNewSetting($request)
    {
        self::$adminSetting                         = new AdminSetting();
        self::$adminSetting->shipping_in_dhaka      = $request->shipping_in_dhaka;
        self::$adminSetting->shipping_outside_dhaka = $request->shipping_outside_dhaka;
        self::$adminSetting->save();
    }

    public static function updateSetting($request , $id)
    {
        self::$adminSetting = AdminSetting::find($id);
        self::$adminSetting->shipping_in_dhaka      = $request->shipping_in_dhaka;
        self::$adminSetting->shipping_outside_dhaka = $request->shipping_outside_dhaka;
        self::$adminSetting->save();

    }

    public static function deleteSettiing($id)
    {
        self::$adminSetting = AdminSetting::find($id);
        self::$adminSetting->delete();

    }
}
