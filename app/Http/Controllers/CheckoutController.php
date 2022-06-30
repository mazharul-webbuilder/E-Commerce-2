<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Cart;
use Session;

class CheckoutController extends Controller
{
    private $customer;
    private $order;

    public function index()
    {
        return view('front.checkout.checkout', ['cartProducts' => Cart::getContent()]);
    }

    public function checkout(Request $request)
    {
        if (!Session::get('customerID'))
        {
            $this->customer = Customer::getNewCustomer($request);
        }
        else
        {
            $this->customer = Customer::find(Session::get('customerID'));
            $this->order    = Order::getNewOrder($request, $this->customer->id);
            OrderDetail::getOrderDetails($request, $this->order->id);
        }

        return redirect('/customer-dashboard');
    }
}
