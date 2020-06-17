@if ($count > 0)
<ul>
    @php
    $total_price = 0;
    @endphp
    @foreach ($carts as $item)
    @php
    $total_price += $item['price'] * $item['quantity'];
    @endphp
    <li class="single-shopping-cart">
        <div class="shopping-cart-img">
            <a href="{{ route('product.viewdetail',['alias' => $item['alias'], 'id' => $item['id']]) }}"><img
                    alt="{{ $item['name'] }}" src="{{ url('/') }}/{{ $item['image'] }}"></a>
            <div class="item-close">
                <a href="public/client/#"><i class="sli sli-close"></i></a>
            </div>
        </div>
        <div class="shopping-cart-title">
            <h4><a
                    href="{{ route('product.viewdetail',['alias' => $item['alias'], 'id' => $item['id']]) }}">{{ $item['name'] }}</a>
            </h4>
            <span>{{ $item['price_format'] }} đ</span>
            <span>X {{ $item['quantity'] }}</span>
        </div>
        <div class="shopping-cart-delete">
            <a href="#" class="btnDelete" data-url="{{ route('cart.delete', ['id' => $item['id']]) }}"><i
                    class="la la-trash"></i></a>
        </div>
    </li>
    @endforeach
</ul>
<div class="shopping-cart-bottom">
    <div class="shopping-cart-total">
        <h4>Tổng tiền <span class="shop-total">{{number_format($total_price)}} đ</span></h4>
    </div>
    <div class="shopping-cart-btn btn-hover default-btn text-center">
        <a class="black-color" href="{{ route('cart.view') }}">Xem giỏ hàng</a>
        <a class="black-color" href="{{ route('payment.checkout') }}">Thanh toán</a>
    </div>
</div>
@else
<p style="color: red; font-weight: bold">Không có sản phẩm nào</p>
@endif