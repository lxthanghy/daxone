@extends('Client.layout')
@section('title')
{{$product->name}}
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
<div class="container pt-90 pb-90">
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="product-details-img">
                <div class="single-img-gallery zoompro-span mb-30">
                    <img class="zoompro" src="{{url('/')}}/{{$product->image}}"
                        data-zoom-image="{{url('/')}}/{{$product->image}}" alt="{{$product->name}}" />
                    @if ($product->promotion > 0)
                    <span>-{{$product->promotion}}%</span>
                    @endif
                </div>
                @if ($more_image != null)
                @foreach ($more_image as $image)
                <div class="single-img-gallery zoompro-span mb-30">
                    <img class="zoompro" src="{{url('/')}}/{{$image}}" data-zoom-image="{{url('/')}}/{{$image}}"
                        alt="{{$product->name}}" />
                </div>
                @endforeach
                @endif
            </div>
        </div>
        <div class="col-lg-6 col-md-6 sidebar-active sidebar-active-left">
            <div class="product-details-content pro-details-content-modify">
                <span>{{$product->supplier->name}}</span>
                <h2>{{$product->name}}</h2>
                <div class="product-ratting-review">
                    <div class="product-ratting">
                        <i class="la la-star"></i>
                        <i class="la la-star"></i>
                        <i class="la la-star"></i>
                        <i class="la la-star"></i>
                        <i class="la la-star-half-o"></i>
                    </div>
                    <div class="product-review">
                        <span>40+ Reviews</span>
                    </div>
                </div>
                <div class="pro-details-color-wrap">
                    <span>Color:</span>
                    <div class="pro-details-color-content">
                        <ul>
                            <li class="green"></li>
                            <li class="yellow"></li>
                            <li class="red"></li>
                            <li class="blue"></li>
                        </ul>
                    </div>
                </div>
                <div class="pro-details-size">
                    <span>Size:</span>
                    <div class="pro-details-size-content">
                        <ul>
                            <li><a href="#">s</a></li>
                            <li><a href="#">m</a></li>
                            <li><a href="#">xl</a></li>
                            <li><a href="#">xxl</a></li>
                        </ul>
                    </div>
                </div>
                <div class="pro-details-price-wrap">
                    <div class="product-price">
                        @if ($product->promotion > 0)
                        <span>{{number_format($product->price*((100-($product->promotion))/100))}} đ</span>
                        <span class="old">{{number_format($product->price)}} đ</span>
                        @else
                        <span>{{number_format($product->price)}} đ</span>
                        @endif
                    </div>
                    @if ($product->promotion > 0)
                    <div class="dec-rang"><span>- {{$product->promotion}}%</span></div>
                    @endif
                </div>
                <div class="pro-details-quality">
                    <div class="cart-plus-minus">
                    <input class="cart-plus-minus-box" min="1" type="number" name="qtybutton" value="1">
                    </div>
                </div>
                <div class="pro-details-compare-wishlist">
                    <div class="pro-details-wishlist">
                        <a title="Add To Wishlist" href="#"><i class="la la-heart-o"></i> Thêm vào danh sách
                            yêu thích</a>
                    </div>
                </div>
                <div class="pro-details-buy-now btn-hover btn-hover-radious">
                    <a title="Add To Cart" href="#" id="addToCart"
                        data-url="{{ route('cart.add', ['id' => $product->id, 'quantity'=> 'quantity']) }}">+ Thêm
                        vào giỏ hàng</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container pt-80 pb-90">
    <div class="row">
        <div class="ml-auto mr-auto col-lg-10">
            <div class="dec-review-topbar nav mb-40">
                <a data-toggle="tab" href="#des-details1">Mô tả</a>
                <a class="active" data-toggle="tab" href="#des-details2">Thông tin chi tiết</a>
                <a data-toggle="tab" href="#des-details3">Đánh giá</a>
            </div>
            <div class="tab-content dec-review-bottom">
                <div id="des-details1" class="tab-pane">
                    <div class="description-wrap">
                        @if ($product->description != null)
                        <p>{{$product->description}}</p>
                        @else
                        <p>Không có mô tả nào !</p>
                        @endif
                    </div>
                </div>
                <div id="des-details2" class="tab-pane active">
                    <div class="specification-wrap table-responsive">
                        <table>
                            <tbody>
                                <tr>
                                    <td class="width1">Tên sản phẩm</td>
                                    <td>{{$product->name}}</td>
                                </tr>
                                <tr>
                                    <td>Nhà cung cấp</td>
                                    <td>{{$product->supplier->name}}</td>
                                </tr>
                                <tr>
                                    <td class="width1">Loại sản phẩm</td>
                                    <td>{{$product->category->name}}</td>
                                </tr>
                                <tr>
                                    <td class="width1">Frame (Khung)</td>
                                    <td>{{$product->frame}}</td>
                                </tr>
                                <tr>
                                    <td class="width1">Rims (Vành)</td>
                                    <td>{{$product->rims}}</td>
                                </tr>
                                <tr>
                                    <td class="width1">Tires (Lốp)</td>
                                    <td>{{$product->tires}}</td>
                                </tr>
                                <tr>
                                    <td class="width1">Weight (Trọng lượng)</td>
                                    <td>{{$product->weight}}</td>
                                </tr>
                                <tr>
                                    <td class="width1">Tải trọng tối đa</td>
                                    <td>{{$product->weight_limit}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div id="des-details3" class="tab-pane">
                    <div class="dec-review-wrap mb-50">
                        <div class="row">
                            <div class="col-xl-3 col-lg-4 col-md-5">
                                <div class="dec-review-img-wrap">
                                    <div class="dec-review-img">
                                        <img src="public/client/assets/images/product-details/review-1.png"
                                            alt="review">
                                    </div>
                                    <div class="dec-client-name">
                                        <h4>Jonathon Doe</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-9 col-lg-8 col-md-7">
                                <div class="dec-review-content">
                                    <p>It is a long established fact that a reader will be distracted by the
                                        readable content of a page when looking at its layout. The point of
                                        using Lorem Ipsum is that it has a more-or-less normal distribution
                                        of letters,</p>
                                    <div class="review-content-bottom">
                                        <div class="review-like">
                                            <span><i class="la la-heart-o"></i> 24 Likes</span>
                                        </div>
                                        <div class="review-date">
                                            <span>25 Jun 2019</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@if ($product_related->count() > 0)
<div class="container pb-85">
    <div class="section-title-6 mb-50 text-center">
        <h2>Sản phẩm liên quan</h2>
    </div>
    <div class="product-slider-active owl-carousel">
        @foreach ($product_related as $item)
        <div class="product-wrap">
            <div class="product-img mb-15">
                <a href="{{ route('product.viewdetail',['alias' => $item->alias, 'id' => $item->id]) }}"><img src="{{url('/')}}/{{$item->image}}"
                        alt="{{$item->name}}"></a>
                @if ($item->promotion > 0)
                <span class="price-dec">-{{$item->promotion}}%</span>
                @endif
                <div class="product-action">
                    <a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i
                            class="la la-plus"></i></a>
                    <a title="Wishlist" href="#"><i class="la la-heart-o"></i></a>
                    <a title="Compare" href="#"><i class="la la-retweet"></i></a>
                </div>
            </div>
            <div class="product-content">
                <span>{{ $item->supplier->name }}</span>
                <h4><a href="{{ route('product.viewdetail',['alias' => $item->alias, 'id' => $item->id]) }}"></a>{{$item->name}}
                </h4>
                <div class="price-addtocart">
                    <div class="product-price">
                        @if ($item->promotion > 0)
                        <span>{{number_format($item->price*((100-($item->promotion))/100))}} đ</span>
                        <span class="old">{{number_format($item->price)}} đ</span>
                        @else
                        <span>{{number_format($item->price)}} đ</span>
                        @endif
                    </div>
                    <div class="product-addtocart">
                        <a title="Add To Cart" href="#" class="addToCart"
                            data-url="{{ route('cart.add', ['id' => $item->id, 'quantity' => 1]) }}">+ Thêm
                            vào giỏ</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endif
@endsection
@section('js')
<script type="text/javascript">
    $(document).ready(function () {
        var detail = {
            init: function() {
                detail.registersEvent();
            },
            registersEvent: function() {
                $('#addToCart').off('click').on('click', function(event) {
                    event.preventDefault();
                    var url = $(this).data('url');
                    var quantity = parseInt($("input[name='qtybutton']").val());
                    if(url != "")
                    {
                        url = url.replace('quantity', quantity);
                        detail.AddToCart(url);
                    }
                });
            },
            AddToCart: function(url) {
                $.ajax({
                    url: url,
                    type: 'GET',
                    dataType: 'json',
                    success: function(res) {
                        if(res.status == 0)
                        {
                            $('.cart_list').html(res.html_cart);
                            $('#count_cart').html(res.count);
                            toastr["success"]("Thêm thành công");
                        }
                        else if(res.status == 1)
                        {
                            toastr["warning"]("Số lượng vượt quá đáp ứng");
                        }
                    },
                    error: function(err) {
                        console.log(err);
                    }
                });
            }
        };
        detail.init();
    });
</script>
@endsection