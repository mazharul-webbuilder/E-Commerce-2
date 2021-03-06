<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Session;
use function Symfony\Component\Mime\Header\has;

class Order extends Model
{
    use HasFactory;
    private static $order;

    public static function getNewOrder($request, $custoemrID)
    {
        self::$order                    = new Order();
        self::$order->customerId        = $custoemrID;
        self::$order->order_total       = Session::get('total');
        self::$order->tax_amount        = Session::get('taxtotal');
        self::$order->shipping_cost     = Session::get('shipping_cost');
        self::$order->delivery_address  = $request->delivery_address;
        self::$order->order_date        = date('Y-m-d');
        self::$order->order_timestamp   = strtotime(date('Y-m-d'));
        self::$order->payment_type      = $request->payment_method;
        self::$order->save();

        return self::$order;
    }
    public static function updateOrder($request, $id)
    {
        self::$order = Order::find($id);
        self::$order->delivery_address = $request->delivery_address;
        self::$order->order_status = $request->order_status;
        self::$order->order_status = $request->order_status;
        self::$order->payment_amount = $request->payment_amount;
        self::$order->payment_status = $request->payment_status;
        self::$order->save();
    }


    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customerId');
    }

    public function orderDetails()
    {
        return  $this->hasMany(OrderDetail::class, 'order_id');
    }
}
