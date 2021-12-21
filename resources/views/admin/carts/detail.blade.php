@extends('admin.main')

@section('content')
    <div class="customer mt -3">
        <ul>
            <li>Tên khách hàng: <strong>{{$customer->name}}</strong></li>
            <li>Tên khách hàng: <strong>{{$customer->phone}}</strong></li>
            <li>Tên khách hàng: <strong>{{$customer->address}}</strong></li>
            <li>Tên khách hàng: <strong>{{$customer->email}}</strong></li>
            <li>Tên khách hàng: <strong>{{$customer->content}}</strong></li>
        </ul>
    </div>
    <div class="carts">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    @php $total = 0; @endphp
                        <table class="table table-cart table-mobile">
                            <thead>
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Total</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($carts as $key =>$cart)
                                @php
                                    $price =$cart->price*$cart->pty;
                                    $total+=$price;
                                @endphp
                                <tr>
                                    <td>
                                        <img src="{{$cart->product->thumb}}" alt="IMG" style="width: 100px">
                                    </td>
                                    <td>{{$cart->product->name}}</td>
                                    <td class="price-col">{{number_format($cart->price,0,'','.')}}</td>
                                    <td class="price-col">{{$cart->pty}}</td>
                                    <td class="price-col">{{number_format($price,0,'','.')}}</td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="text-right">Tổng tiền</td>
                                    <td class="price-col">{{number_format($total,0,'','.')}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table><!-- End .table table-wishlist -->
                </div><!-- End .col-lg-9 -->
            </div><!-- End .row -->
        </div>
    </div>
@endsection
