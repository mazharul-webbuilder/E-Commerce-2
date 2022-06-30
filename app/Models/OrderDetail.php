<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cart;
use Session;
class OrderDetail extends Model
{
    use HasFactory;
    private static $orderDetails;
    private static $orderDetail;

    public static function getOrderDetails($request, $orderID)
    {
        self::$orderDetails = Cart::getContent();
        foreach (self::$orderDetails as $orderDetail)
        {
            self::$orderDetail                   = new OrderDetail();
            self::$orderDetail->order_id         = $orderID;
            self::$orderDetail->product_id       = $orderDetail->id;
            self::$orderDetail->product_name     = $orderDetail->name;
            self::$orderDetail->product_price    = $orderDetail->price;
            self::$orderDetail->product_quantity = $orderDetail->quantity;
            self::$orderDetail->save();
        }

        foreach (self::$orderDetails as $orderDetail)
        {
            Cart::remove($orderDetail->id);
        }
    }
}
