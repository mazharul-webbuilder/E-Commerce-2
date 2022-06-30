@extends('master.front.master')
@section('title')
    Checkout
@endsection
@section('body')
    <main class="main">
        <div class="page-content">
            <div class="checkout">
                <div class="container">
                    <div class="checkout-discount">
                    </div>
                    <form action="{{route('customer.checkout')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-7">
                                <h2 class="checkout-title">Billing Information</h2><!-- End .checkout-title -->

                                @if(!Session::get('customerID'))
                                <label>Full Name *</label>
                                <input type="text" name="name" class="form-control" required>

                                <label>Email *</label>
                                <input type="email" name="email" class="form-control" required>

                                <label>Phone *</label>
                                <input type="number" name="mobile" class="form-control" required> <br>


                                <label>Delivery Address *</label>
                                <input type="text" name="delivery_address" class="form-control" required/>

                                <label>Payment Method</label><br><br>
                                <label for="online"> Online  <input type="radio" name="payment_method" id="online" value="1"></label>
                                <label for="cash"> Cash On Deliver  <input type="radio" checked name="payment_method" id="cash" value="2"></label>

                                @else

                                <label>Delivery Address *</label>
                                <input type="text" name="delivery_address" class="form-control" required/>

                                <label>Payment Method</label><br><br>
                                <label for="online"> Online  <input type="radio" name="payment_method" id="online" value="1"></label>
                                <label for="cash"> Cash On Deliver  <input type="radio" checked name="payment_method" id="cash" value="2"></label>
                                @endif
                                <br>
                                <br>
                                <input type="submit" class="btn btn-primary w-100" value="Confirm Order">

                            </div>
                            <aside class="col-lg-5">
                                <div class="summary">
                                    <h3 class="summary-title">Checkout</h3>

                                    <table class="table table-summary">
                                        <thead>
                                        <tr>
                                            <th>Product Info</th>
                                            <th>Subtotal</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        @foreach($cartProducts as $cartProduct)
                                        <tr>
                                            <td><a href="#">{{$cartProduct->name}} - ({{$cartProduct->quantity}} * {{$cartProduct->price}}) </a></td>
                                            <td>Tk. {{number_format($cartProduct->quantity * $cartProduct->price)}}</td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td>Tax Total (15%):</td>
                                            @php($taxTotal = (Session::get('subtotal') * 15) / 100)
                                            {{Session::put('taxtotal' , $taxTotal)}}
                                            <td>Tk. {{number_format($taxTotal)}}</td>
                                        </tr>
                                        <tr>
                                            <td>Shipping:</td>

                                            @php($shipping = 100)
                                            @php($total = Session::get('subtotal') + $taxTotal + $shipping)
                                            {{Session::put('total', $total)}}
                                            <td>Tk. {{number_format($shipping)}}</td>
                                            {{Session::put('shipping_cost', $shipping)}}
                                        </tr>
                                        <tr class="summary-subtotal">
                                            <td>Subtotal:</td>
                                            <td>Tk. {{number_format($total)}}</td>
                                        </tr><!-- End .summary-subtotal -->

                                        <tr class="summary-total">
                                            <td>Total Payable:</td>
                                            <td>Tk. {{number_format($total)}}</td>
                                        </tr><!-- End .summary-total -->
                                        </tbody>
                                    </table><!-- End .table table-summary -->

                                </div><!-- End .summary -->
                            </aside><!-- End .col-lg-3 -->
                        </div><!-- End .row -->
                    </form>
                </div><!-- End .container -->
            </div><!-- End .checkout -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->
@endsection
