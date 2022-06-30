@extends('master.front.master')
@section('title')
    Dashboard
@endsection
@section('body')
    <section class="">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <nav class="nav flex-column">
                        <a class="nav-link active" href="#">Profile</a>
                        <a class="nav-link" href="#">Edit Profile</a>
                        <a class="nav-link" href="#">Profile Settings</a>
                        <a class="nav-link" href="#">Delete Account</a>
                    </nav>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-center text-secondary py-5">You Last Orders</h3>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th style="text-align: center">Order-ID</th>
                                    <th>Total Order</th>
                                    <th>Order Date</th>
                                    <th>Delivery Address</th>
                                    <th>Order Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $order)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td style="text-align: center">{{$order->id}}</td>
                                    <td>{{$order->delivery_address}}</td>
                                    <td>Tk. {{number_format($order->order_total)}}</td>
                                    <td>{{$order->order_date}}</td>
                                    <td>{{$order->order_status}}</td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
