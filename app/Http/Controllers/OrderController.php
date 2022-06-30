<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use PDF;

class OrderController extends Controller
{
    public function manage()
    {
        return view('admin.order.manage', [
            'orders' => Order::all(),
        ]);
    }
    public function detail($id)
    {
        return view('admin.order.detail', [
            'order' => Order::find($id),
        ]);
    }
    public function makeInvoice($id)
    {
        return view('admin.order.invoice',[
            'order' => Order::find($id)
        ]);
    }
    public function printInvoice($id)
    {

        $pdf = PDF::loadView('admin.order.print', ['order' => Order::find($id)]);
        return $pdf->download('invoice' .$id. '.pdf');
    }
    public function edit($id)
    {
        return view('admin.order.edit',[
            'order' => Order::find($id)
        ]);
    }
    public function delete(Request $request, $id)
    {
        $order = Order::find($id);
        $orderDetail = OrderDetail::where('order_id', $order->id);
        foreach ($orderDetail as $orderDetail)
        {
            $orderDetail->delete();
        }
        $order->delete();
        return redirect('/manage-order')->with('message', 'Deleted Successfully, You Can Found Deleted Orders On Cancel Orders Table');
    }

    public function update(Request $request, $id)
    {
        Order::updateOrder($request, $id);
        return redirect('/manage-order')->with('message', 'Order Updated Successfully');
    }
}
