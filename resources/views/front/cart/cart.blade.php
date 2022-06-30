@extends('master.front.master')
@section('title')
   Cart Products
@endsection
@section('body')
    <div class="page-wrapper">
        <main class="main">
            <div class="page-header text-center" style="background-image: url('{{asset('/')}}front/assets/images/page-header-bg.jpg')">
            <div class="page-content">
                <div class="cart">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-9">
                                <table class="table table-cart table-mobile">
                                    <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Update</th>
                                        <th>Total</th>
                                        <th>Remove</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php($subtotal = 0)
                                    @foreach($products as $product)
                                    <tr>
                                        <td class="product-col">
                                            <div class="product">
                                                <figure class="product-media">
                                                    <a href="#">
                                                        <img src="{{$product->attributes->image}}" alt="Product image">
                                                    </a>
                                                </figure>

                                                <h3 class="product-title">
                                                    <a href="#">{{$product->name}}</a>
                                                </h3><!-- End .product-title -->
                                            </div><!-- End .product -->
                                        </td>
                                        <td class="price-col">Tk. {{number_format($product->price)}}</td>

                                        <form action="{{route('cart.update', ['id' => $product->id])}}" method="post">
                                            @csrf
                                            <td class="quantity-col">
                                                <div class="cart-product-quantity">
                                                    <input type="number" name="qty" class="form-control" value="{{$product->quantity}}" min="1" max="10" step="1" data-decimals="0" required>
                                                </div><!-- End .cart-product-quantity -->
                                            </td>
                                            <td>
                                                <input type="submit" value="Update" class="btn btn-default">
                                            </td>
                                        </form>

                                        @php($unitTotal = $product->quantity * $product->price)
                                        <td class="total-col">Tk. {{number_format($unitTotal)}}</td>

                                        <td><a href="{{route('cart.product.remove', ['id' => $product->id])}}" style="color: black">Remove</a></td>
                                    </tr>
                                        @php($subtotal += $unitTotal)
                                    @endforeach
                                    </tbody>
                                </table><!-- End .table table-wishlist -->

                                <div class="cart-bottom">
                                    <div class="cart-discount">
                                        <form action="#">
                                            <div class="input-group">
                                                <input type="text" class="form-control" required placeholder="coupon code">
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-primary-2" type="submit"><i class="icon-long-arrow-right"></i></button>
                                                </div><!-- .End .input-group-append -->
                                            </div><!-- End .input-group -->
                                        </form>
                                    </div><!-- End .cart-discount -->

                                </div><!-- End .cart-bottom -->
                            </div><!-- End .col-lg-9 -->
                            <aside class="col-lg-3">
                                <div class="summary summary-cart">
                                    <h3 class="summary-title">Cart Total</h3><!-- End .summary-title -->

                                    <table class="table table-summary">
                                        <tbody>
                                        <tr class="summary-subtotal">
                                            <td>Subtotal:</td>
                                            <td>Tk. {{number_format($subtotal)}}</td>
                                        </tr><!-- End .summary-subtotal -->

                                        <tr class="summary-shipping">
                                            <td>Shipping:</td>
                                            <td>&nbsp;</td>
                                        </tr>

                                        <tr class="summary-shipping-row">
                                            <td>
                                                <input type="radio" id="express-shipping" name="shipping" class="custom-control-input">
                                                <label class="custom-control-label" for="express-shipping">Dhaka City:</label>
                                            </td>
                                            <td>Tk. 100</td>
                                        </tr><!-- End .summary-shipping-row -->
                                        <tr class="summary-shipping-row">
                                            <td>
                                                <input type="radio" id="express-shipping" name="shipping" class="custom-control-input">
                                                <label class="custom-control-label" for="express-shipping">Outside Dhaka:</label>
                                            </td>
                                            <td>Tk. 150</td>
                                        </tr><!-- End .summary-shipping-row -->

                                        <tr class="summary-total">
                                            <td>Total:</td>
                                            <td>Tk. {{number_format($subtotal + 100)}}</td>
                                            {{Session::put('subtotal', $subtotal)}}
                                        </tr><!-- End .summary-total -->
                                        </tbody>
                                    </table><!-- End .table table-summary -->

                                    <a href="{{route('checkout')}}" class="btn btn-outline-primary-2 btn-order btn-block">PROCEED TO CHECKOUT</a>
                                </div><!-- End .summary -->

                                <a href="{{route('home')}}" class="btn btn-outline-dark-2 btn-block mb-3"><span>CONTINUE SHOPPING</span><i class="icon-refresh"></i></a>
                            </aside><!-- End .col-lg-3 -->
                        </div><!-- End .row -->
                    </div><!-- End .container -->
                </div><!-- End .cart -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->

    </div><!-- End .page-wrapper -->
    <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>
@endsection
