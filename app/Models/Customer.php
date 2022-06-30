<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Session;

class Customer extends Model
{
    use HasFactory;
    private static $customer;

    public static function getNewCustomer($request)
    {
        self::$customer                = new Customer();
        self::$customer->name          = $request->name;
        self::$customer->email         = $request->email;
        self::$customer->password      = bcrypt($request->mobile);
        self::$customer->mobile        = $request->mobile;
        self::$customer->address       = $request->delivery_address;
        self::$customer->save();

        Session::put('customerID', self::$customer->id);
        Session::put('customerName', self::$customer->name);

        return self::$customer;

    }

    public static function customerCreate($request)
    {
        self::$customer = new Customer();
        self::$customer->name = $request->name;
        self::$customer->email = $request->email;
        self::$customer->mobile = $request->mobile;
        self::$customer->password = bcrypt($request->password);
        self::$customer->save();

        Session::put('customerID', self::$customer->id);
        Session::put('customerName', self::$customer->name);

        return self::$customer;
    }


}
