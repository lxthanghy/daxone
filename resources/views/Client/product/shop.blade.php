@extends('Client.layout')
@section('title')
Sản phẩm
@endsection
@section('css')
<style>
    .page-item.active .page-link {
        z-index: 1;
        color: #fff;
        background-color: #ff5151;
        border-color: #ff5151;

    }

    ul.pagination li .page-link {
        width: 100%;
        height: 100%;
        color: #ff5151;
        padding: .5rem .75rem;
    }

    ul.pagination li a:hover:not(.active) {
        background-color: #ff5151;
        color: #fff;
    }
</style>
@endsection
@section('content')
<div class="container">
    <div class="row flex-row-reverse">
        <div class="col-lg-9">
            <div class="shop-topbar-wrapper">
                <div class="shop-topbar-left">
                    @if ($count_product > 0)
                    <p>Hiển thị {{ $start }} - {{ $end }} của {{ $count_product }} sản phẩm </p>
                    @endif
                    
                </div>
                <div class="product-sorting-wrapper">
                    <div class="product-shorting shorting-style">
                        <label>Hiển thị (hàng):</label>
                        <select id="sl_page_size">
                            <option value="">--- Chọn ---</option>
                            <option value="6" {{ request()->get('size') == 6 ? "selected" : "" }}> 6</option>
                            <option value="9" {{ request()->get('size') == 9 ? "selected" : "" }}> 9</option>
                            <option value="12" {{ request()->get('size') == 12 ? "selected" : "" }}> 12</option>
                            <option value="15" {{ request()->get('size') == 15 ? "selected" : "" }}> 15</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="shop-bottom-area">
                <div class="tab-content jump">
                    <div id="shop-1" class="tab-pane active">
                        <div class="row">
                            @if ($count_product > 0)
                            @foreach ($model as $item)
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                                <div class="product-wrap mb-35">
                                    <div class="product-img mb-15">
                                        <a
                                            href="{{ route('product.viewdetail',['alias' => $item->alias, 'id' => $item->id]) }}"><img
                                                src="{{url('/')}}/{{$item->image}}" alt="{{$item->name}}"></a>
                                        @if ($item->promotion > 0)
                                        <span class="price-dec">-{{$item->promotion}}%</span>
                                        @endif
                                        <div class="product-action">
                                            <a data-toggle="modal" data-target="#exampleModal" title="Quick View"
                                                href="#"><i class="la la-plus"></i></a>
                                            <a title="Wishlist" href="#"><i class="la la-heart-o"></i></a>
                                            <a title="Compare" href="#"><i class="la la-retweet"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <span>{{ $item->supplier_name }}</span>
                                        <h4><a
                                                href="{{ route('product.viewdetail',['alias' => $item->alias, 'id' => $item->id]) }}"></a>{{$item->name}}
                                        </h4>
                                        <div class="price-addtocart">
                                            <div class="product-price">
                                                @if ($item->promotion > 0)
                                                <span>{{number_format($item->price*((100-($item->promotion))/100))}}
                                                    đ</span>
                                                <span class="old">{{number_format($item->price)}} đ</span>
                                                @else
                                                <span>{{number_format($item->price)}} đ</span>
                                                @endif
                                            </div>
                                            <div class="product-addtocart">
                                                <a title="Add To Cart" href="#" class="addToCart"
                                                    data-url="{{ route('cart.add', ['id' => $item->id, 'quantity' => 1]) }}">+
                                                    Thêm
                                                    vào giỏ</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @else
                            <div class="col-sm-12">
                                <h3>Không có sản phẩm nào</h3>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="text-center mt-5" style="display: flex; justify-content: center">
                        {{$model->appends(request()->all())->links()}}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="sidebar-wrapper">
                <div class="sidebar-widget">
                    <h4 class="sidebar-title">Tìm kiếm </h4>
                    <div class="sidebar-search mb-40 mt-20">
                        <form class="sidebar-search-form" action="#">
                            <input type="text" value="{{ request()->get('search') }}" placeholder="Nhập tên...">
                            <button id="btnSearch">
                                <i class="la la-search"></i>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="sidebar-widget shop-sidebar-border pt-40">
                    <h4 class="sidebar-title">Lọc theo danh mục</h4>
                    <div class="shop-catigory mt-20">
                        <ul id="faq">
                            <li> <a data-toggle="collapse" data-parent="#faq" href="#shop-catigory-1">Women Fashion <i
                                        class="la la-angle-down"></i></a>
                                <ul id="shop-catigory-1" class="panel-collapse collapse">
                                    <li><a href="#">Dress </a></li>
                                    <li><a href="#">Shoes</a></li>
                                    <li><a href="#">Sunglasses </a></li>
                                    <li><a href="#">Sweater </a></li>
                                    <li><a href="#">Handbag </a></li>
                                </ul>
                            </li>
                            <li> <a data-toggle="collapse" data-parent="#faq" href="#shop-catigory-2">Men Fashion <i
                                        class="la la-angle-down"></i></a>
                                <ul id="shop-catigory-2" class="panel-collapse collapse">
                                    <li><a href="#">Shirt </a></li>
                                    <li><a href="#">Shoes</a></li>
                                    <li><a href="#">Sunglasses </a></li>
                                    <li><a href="#">Sweater </a></li>
                                    <li><a href="#">Jacket </a></li>
                                </ul>
                            </li>
                            <li> <a data-toggle="collapse" data-parent="#faq" href="#shop-catigory-3">Furniture <i
                                        class="la la-angle-down"></i></a>
                                <ul id="shop-catigory-3" class="panel-collapse collapse">
                                    <li><a href="#"> Chair</a></li>
                                    <li><a href="#">Lift Chair</a></li>
                                    <li><a href="#">Bunk Bed</a></li>
                                    <li><a href="#">Computer Desk</a></li>
                                    <li><a href="#">Bookcase</a></li>
                                </ul>
                            </li>
                            <li> <a href="#">Lamp</a></li>
                            <li> <a href="#">Electronics</a> </li>
                            <li> <a href="#">Accessories</a></li>
                        </ul>
                    </div>
                </div>
                <div class="sidebar-widget shop-sidebar-border pt-40 mt-40">
                    <h4 class="sidebar-title">Sắp xếp </h4>
                    <div class="sidebar-widget-list mt-20">
                        <ul>
                            <li>
                                <div class="sidebar-widget-list-left">
                                    <div class="product-show shorting-style">
                                        <label>Sắp xếp theo giá:</label>
                                        <select id="sl_price">
                                            <option value="">--- Chọn ---</option>
                                            <option value="asc"
                                                {{ request()->get('sort_by_price') == "asc" ? "selected" : "" }}>Tăng
                                                dần
                                            </option>
                                            <option value="desc"
                                                {{ request()->get('sort_by_price') == "desc" ? "selected" : "" }}>Giảm
                                                dần
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="sidebar-widget-list-left">
                                    <div class="product-show shorting-style">
                                        <label>Sắp xếp theo ngày:</label>
                                        <select id="sl_date">
                                            <option value="">--- Chọn ---</option>
                                            <option value="asc"
                                                {{ request()->get('sort_by_date') == "asc" ? "selected" : "" }}>Mới nhất
                                            </option>
                                            <option value="desc"
                                                {{ request()->get('sort_by_date') == "desc" ? "selected" : "" }}>Cũ nhất
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="shop-price-filter mt-35 shop-sidebar-border pt-40 sidebar-widget">
                    <h4 class="sidebar-title">Lọc theo khoảng giá</h4>
                    <div class="price-filter mt-20">
                        <div class="row">
                            <div class="col-sm-6">
                                <input type="text" readonly id="min_price" value=""
                                    style="font-weight: bold; background: white; color: #FF5151;">
                                <input type="hidden" id="min_current" value="{{ $min_current }}" data-min="{{ $min }}">
                            </div>
                            <div class="col-sm-6">
                                <input type="text" readonly id="max_price" value=""
                                    style="font-weight: bold; background: white; color: #FF5151;">
                                <input type="hidden" id="max_current" value="{{ $max_current }}" data-max="{{ $max }}">
                            </div>
                        </div>
                        <div id="slider-range"
                            class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all mt-3">
                            <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                            <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0">
                            </span>
                            <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0">
                            </span>
                        </div>
                        <div class="price-slider-amount">
                            <button type="button" id="btnPriceFilter"
                                data-url="{{ request()->fullUrlWithQuery(['price' => 'range', 'page' => 1]) }}"
                                style="width: 100%;">Lọc</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script type="text/javascript">
    $(document).ready(function () {
        var shop = {
            init: function() {
                shop.registersEvent();
            },
            registersEvent: function() {

                //Chọn số hàng hiển thị
                $('#sl_page_size').on('change', function(){
                    var size = $(this).val();
                    var url = "";
                    if(size != "")
                    {
                        <?php
                            $request = request()->all();
                            if (array_key_exists('page', $request))
                                $request['page'] = 1;
                            $URL = url()->current() . '?' . http_build_query(array_merge($request, ['size' => 'num']));
                        ?>
                        url = "{!! $URL !!}";
                        url = url.replace('num', parseInt(size));
                    }
                    else
                    {
                        <?php
                            $request = request()->all();
                            if (array_key_exists('size', $request))
                                unset($request['size']);
                            $URL = url()->current() . '?' . http_build_query(array_merge($request));
                        ?>
                        url = "{!! $URL !!}";
                    }
                    window.location.href = url;
                }); 

                //Tìm kiếm
                $('#btnSearch').off('click').on('click', function(event) {
                    event.preventDefault();
                    var textSearch = $(this).parent().find('input').val();
                    var url = "";
                    if(textSearch.trim() != "")
                    {
                        <?php
                            $request = request()->all();
                            $URL = url()->current() . '?' . http_build_query(array_merge($request, ['search' => 'text']));
                        ?>
                        url = "{!! $URL !!}";
                        url = url.replace('text', textSearch);
                    }
                    window.location.href = url;
                });

                //Range chọn khoảng giá
                var sliderrange = $('#slider-range');
                var min = parseFloat($('#min_current').data('min'));
                var max = parseFloat($('#max_current').data('max'));
                var min_current = parseFloat($('#min_current').val());
                var max_current = parseFloat($('#max_current').val());
                $(function() {
                    sliderrange.slider({
                        range: true,
                        min: min,
                        max: max,
                        values: [min_current, max_current],
                        slide: function(event, ui) {
                            $('#min_price').val(ui.values[0].toLocaleString('it-IT', {style : 'currency', currency : 'VND'}));
                            $('#max_price').val(ui.values[1].toLocaleString('it-IT', {style : 'currency', currency : 'VND'}));
                            $('#min_current').val(ui.values[0]);
                            $('#max_current').val(ui.values[1]);
                        }
                    });
                    $('#min_price').val(sliderrange.slider("values", 0).toLocaleString('it-IT', {style : 'currency', currency : 'VND'}));
                    $('#max_price').val(sliderrange.slider("values", 1).toLocaleString('it-IT', {style : 'currency', currency : 'VND'}));
                });

                //Sắp xếp sản phẩm theo giá
                $('#sl_price').on('change', function() {
                    var sort = $(this).val();
                    var url = "";
                    if(sort != "")
                    {
                        <?php
                            $request = request()->all();
                            if (array_key_exists('sort_by_date', $request))
                                unset($request['sort_by_date']);
                            $URL = url()->current() . '?' . http_build_query(array_merge($request, ['sort_by_price' => 'SORT']));
                        ?>
                        url = "{!! $URL !!}";
                        url = url.replace('SORT', sort);
                    }
                    else
                    {
                        <?php
                            $request = request()->all();
                            if (array_key_exists('sort_by_price', $request))
                                unset($request['sort_by_price']);
                            $URL = url()->current() . '?' . http_build_query(array_merge($request));
                        ?>
                        url = "{!! $URL !!}";
                    }
                    window.location.href = url;
                });

                //Xắp xếp theo ngày tạo
                $('#sl_date').on('change', function() {
                    var sort = $(this).val();
                    var url = "";
                    if(sort != "")
                    {
                        <?php
                            $request = request()->all();
                            if (array_key_exists('sort_by_price', $request))
                                unset($request['sort_by_price']);
                            $URL = url()->current() . '?' . http_build_query(array_merge($request, ['sort_by_date' => 'SORT']));
                        ?>
                        url = "{!! $URL !!}";
                        url = url.replace('SORT', sort);
                    }
                    else
                    {
                        <?php
                            $request = request()->all();
                            if (array_key_exists('sort_by_date', $request))
                                unset($request['sort_by_date']);
                            $URL = url()->current() . '?' . http_build_query(array_merge($request));
                        ?>
                        url = "{!! $URL !!}";
                    }
                    window.location.href = url;
                });

                //Lọc sản phẩm theo giá
                $('#btnPriceFilter').on('click', function() {
                    var min = parseFloat($('#min_current').val());
                    var max = parseFloat($('#max_current').val());
                    var price_range = min + "-" + max;
                    var url = $(this).data('url');
                    if(url != "")
                    {
                        url = url.replace('range', price_range);
                        window.location.href = url;
                    }
                });
            }
        };
        shop.init();
    });
</script>
@endsection