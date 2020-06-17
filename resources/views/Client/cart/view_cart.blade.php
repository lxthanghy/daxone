@extends('Client.layout')
@section('title')
Giỏ hàng của bạn
@endsection
@section('css')
<style type="text/css">
    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Firefox */
    input[type=number] {
        -moz-appearance: textfield;
    }
</style>
@endsection
@section('content')
<div class="container">
    <h3 class="cart-page-title">Các sản phẩm trong giỏ hàng</h3>
    <div class="row" id="view_cart_list">
        @if ($count > 0)
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <form action="#">
                <div class="table-content table-responsive cart-table-content">
                    <table>
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Tên sản phẩm</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Tổng tiền</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $total_price = 0;
                            @endphp
                            @foreach ($carts as $item)
                            <tr>
                                <td class="product-thumbnail">
                                <a href="{{ route('product.viewdetail',['alias' => $item['alias'], 'id' => $item['id']]) }}"><img
                                            src="{{ url('/') }}/{{ $item['image'] }}" alt="{{ $item['name'] }}"
                                            style="width: 82px;"></a>
                                </td>
                                <td class="product-name"><a
                                        href="{{ route('product.viewdetail',['alias' => $item['alias'], 'id' => $item['id']]) }}">{{ $item['name'] }}</a>
                                </td>
                                <td class="product-price-cart"><span class="amount">{{ $item['price_format'] }} đ</span>
                                </td>
                                <td class="product-quantity">
                                    <div class="cart-plus-minus">
                                        <div class="dec qtybutton">-</div>
                                        <input class="cart-plus-minus-box" type="number" min="1" name="qtybutton"
                                            value="{{ $item['quantity'] }}">
                                        <div class="inc qtybutton">+</div>
                                    </div>
                                </td>
                                @php
                                $subtotal = $item['price'] * $item['quantity'];
                                $total_price += $subtotal;
                                @endphp
                                <td class="product-subtotal">{{ number_format($subtotal) }} đ</td>
                                <td class="product-remove">
                                    <a href="#" class="btnUpdate"
                                        data-url="{{ route('cart.update', ['id' => $item['id']]) }}"><i
                                            class="la la-pencil"></i></a>
                                    <a href="#" class="btnDelete"
                                        data-url="{{ route('cart.delete', ['id' => $item['id']]) }}"><i
                                            class="la la-close"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="cart-shiping-update-wrapper">
                            <div class="cart-shiping-update">
                                <a href="{{ route('home.index') }}">Tiếp tục mua hàng</a>
                            </div>
                            <div class="cart-clear">
                                <button>Cập nhật giỏ hàng</button>
                                <a href="#" id="btnClearCart" data-url="{{ route('cart.clear') }}">Xoá sạch giỏ hàng</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="row">
                <div class="col-lg-4 col-md-12">
                    <div class="grand-totall">
                        <div class="title-wrap">
                            <h4 class="cart-bottom-title section-bg-gary-cart">Giỏ hàng</h4>
                        </div>
                        <h5>Tổng tiền sản phẩm <span>{{ number_format($total_price) }} đ</span></h5>
                        <div class="total-shipping">
                            <h5>Total shipping</h5>
                            <ul>
                                <li><input type="checkbox"> Standard <span>$20.00</span></li>
                                <li><input type="checkbox"> Express <span>$30.00</span></li>
                            </ul>
                        </div>
                        <h4 class="grand-totall-title">Grand Total <span>$260.00</span></h4>
                        <a href="{{ route('payment.checkout') }}">Thanh toán</a>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="col-sm-12">
            <p style="color: red; font-weight: bold; font-size: 20px" class="ml-3">Bạn không có sản phẩm nào trong giỏ hàng của bạn</p>
            <span class="ml-3">Nhấn <b>Quay lại trang chủ</b> để tiếp tục mua sắm</span>
        </div>
        <div class="col-sm-12 mt-2">
            <a href="{{ route('home.index') }}" class="btn btn-primary ml-3">
                <i class="la la-arrow-left"></i>
                Quay lại trang chủ</a>
        </div>
        @endif
    </div>
</div>
@endsection
@section('js')
<script type="text/javascript">
    $(document).ready(function () {
        var view_cart = {
            init: function() {
                view_cart.registersEvent();
            },
            registersEvent: function() {

                //Cập nhật item giỏ hàng
                $(document).off('click', '.btnUpdate').on('click', '.btnUpdate', function(event) {
                    event.preventDefault();
                    var url = $(this).data('url');
                    var quantity = $(this).parents('tr').find("input[name='qtybutton']").val();
                    if(url != "" && quantity != "")
                        view_cart.UpdateCart(url, parseInt(quantity));
                });

                //Xoá sạch giỏ hàng
                $(document).on('click', '#btnClearCart', function(event) {
                    event.preventDefault();
                    var url = $(this).data('url');
                    if(url != "")
                        view_cart.ClearCart(url);
                        
                });
            },
            UpdateCart: function(url, quantity)
            {
                $.ajax({
                    url: url,
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        quantity: quantity
                    },
                    success: function(res) {
                        if(res.status == 1)
                        {
                            $('#view_cart_list').html(res.cart_list);
                            $('.cart_list').html(res.html_cart);
                            $('#count_cart').html(res.count);
                            toastr["success"]("Đã cập nhật");
                        }
                        else if(res.status == 0)
                        {
                            toastr["warning"]("Số lượng vượt quá đáp ứng");
                        }
                    },
                    error: function(err) {
                        console.log(err);
                    }
                });
            },
            ClearCart: function(url) {
                $.ajax({
                    url: url,
                    type: 'GET',
                    dataType: 'json',
                    success: function(res) {
                        if(res.status == 1)
                        {
                            $('#view_cart_list').html(res.cart_list);
                            $('.cart_list').html(res.html_cart);
                            $('#count_cart').html(res.count);
                            toastr["info"]("Đã xoá sạch");
                        }
                    },
                    error: function(err) {
                        console.log(err);
                    }
                });
            }
        }
        view_cart.init();
    });
</script>
@endsection