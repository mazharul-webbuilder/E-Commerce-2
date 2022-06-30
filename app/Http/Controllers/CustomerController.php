<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Request;
use Session;

class CustomerController extends Controller
{
    private $customer;

    public function dashboard()
    {
        return view('front.customer.dashboard',[
            'orders' => Order::where('customerID', Session::get('customerID'))->get()
        ]);
    }
    public function register()
    {
        return view('front.customer.register');
    }
    public function create(Request $request)
    {
       Customer::customerCreate($request);
       return redirect('/customer-dashboard');
    }
    public function login()
    {
        return view('front.customer.login');
    }
    public function loginCheck(Request $request)
    {
        $this->customer = Customer::where('email', $request->email)->first();
        if ($this->customer)
        {
            if (password_verify( $request->password, $this->customer->password))
            {
                Session::put('customerID', $this->customer->id);
                Session::put('customerName', $this->customer->name);

                return  redirect('/customer-dashboard');
            }
            else
            {
                return  redirect('/customer-login')->with('message', 'Password Invalid');
            }
        }
        else
        {
            return  redirect('/customer-login')->with('message2', 'Email Invalid');

        }
    }
    public function logout(Request $request)
    {
        Session::forget('customerID');
        Session::forget('customerName');
        return  redirect('/');

    }
}
