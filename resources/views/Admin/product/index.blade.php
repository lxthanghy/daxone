@extends('Admin.layout')
@section('title')| Sản phẩm @endsection
@section('css')
<link href="{{asset('public/admin/plugins/animate/animate.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('public/admin/assets/css/modals/component.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('public/admin/assets/css/ui-kit/custom-modal.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('public/admin/assets/css/ui-kit/buttons/creative/creative-material.css')}}" rel="stylesheet"
    type="text/css">
<link href="{{asset('public/admin/plugins/notification/snackbar/snackbar.min.css')}}" rel="stylesheet" type="text/css">
<script src="{{asset('public/admin/plugins/sweetalerts/promise-polyfill.js')}}"></script>
<link href="{{asset('public/admin/plugins/sweetalerts/sweetalert2.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('public/admin/plugins/sweetalerts/sweetalert.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('public/admin/assets/css/ui-kit/custom-sweetalert.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href=" {{asset('public/admin/assets/css/ecommerce/product_in_cart.css')}} ">
<style>
    .form-control {
        border: 1px solid #ccc;
        color: #888ea8;
        font-size: 15px;
        border-radius: 2px;
    }

    code {
        color: #3862f5;
    }

    .form-control:disabled,
    .form-control[readonly] {
        background-color: #f1f3f9;
        border-color: #f1f3f1;
    }

    .btn-primary.disabled,
    .btn-primary:disabled {
        background-color: #3862f5;
        border-color: #3862f5;
    }

    label {
        color: #3b3f5c;
        margin-bottom: 14px;
    }

    .form-control::-webkit-input-placeholder {
        color: #888ea8;
        font-size: 15px;
    }

    .form-control::-ms-input-placeholder {
        color: #888ea8;
        font-size: 15px;
    }

    .form-control::-moz-placeholder {
        color: #888ea8;
        font-size: 15px;
    }

    .form-control:focus {
        border-color: #f1f3f1;
        border-left: solid 3px #3862f5;
    }

    .page-item.active .page-link {
        z-index: 1;
        color: #fff;
        background-color: #6156ce;
        border-color: #6156ce;

    }

    ul.pagination li .page-link {
        width: 100%;
        height: 100%;
        color: #6156ce;
        padding: .5rem .75rem;
    }

    ul.pagination li a:hover:not(.active) {
        background-color: #6156ce;
        color: #fff;
    }
</style>
@endsection
@section('content')
<div class="container">
    <div class="page-header">
        <div class="page-title">
            <h3 style="color: #e95f2b">Quản lý sản phẩm</h3>
        </div>
    </div>
    <div class="crumbs">
        <ul id="breadcrumbs" class="breadcrumb">
            <li><a href="index.html"><i class="flaticon-home-fill"></i></a></li>
            <li><a href="#">Tables</a></li>
            <li class="active"><a href="#">Basic</a> </li>
        </ul>
    </div>
    @if ($total_all_product <= 0)
    <div class="row">
        <div class="col-sm-12">
            <div class="alert alert-icon-left alert-light-danger" role="alert">
                <i class="flaticon-danger-3"></i>
                Không có sản phẩm nào !
            </div>
        </div>
    </div>
    @else
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing text-center">
            <div class="products-cart-top-section">
                <h4 class="mb-5 card-title">Thống kê sản phẩm</h4>
                <div class="card-section mx-md-auto">
                    <div class="row mt-5">
                        <div class="col-xl-6 col-lg-6 col-md-6 pr-md-0 col-sm-6 col-12 pl-sm-0 ">
                            <div class="pc-cards">
                                <div class="icon ico-products mb-4">
                                    <i class="flaticon-3d-cube mb-4"></i>
                                </div>
                                <h5 class="txt-pc-products">Tổng số sản phẩm</h5>
                                <h6 class="numeric-pc-products">{{ $total_all_product }}</h6>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 pl-md-0 col-sm-6 col-12 pr-sm-0">
                            <div class="pc-cards">
                                <div class="icon ico-in-cart mb-4">
                                    <i class="flaticon-cart-2 mb-4"></i>
                                </div>
                                <h5 class="txt-pc-in-cart">Sản phẩm trong hoá đơn</h5>
                                <h6 class="numeric-pc-in-cart">{{ $total_product_in_orders }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-sm-8">
            <button type="button" class="btn btn-button-12 mb-2" id="btnAdd" data-toggle="modal"
                data-target=".ModalAddEdit" data-url="{{route('product.store')}}"><i class=" flaticon-plus"></i> Thêm
                mới</button>
        </div>
        <div class="col-sm-4">
            <div class="input-group mb-4">
                <input type="search" class="form-control" name="txtSearch" value="{{$search_name}}"
                    placeholder="Tìm kiếm">

                <div class="input-group-append">
                    <button type="button" class="btn btn-gradient-warning" id="btnSearch"><i
                            class="flaticon-search-1"></i></button>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-sm-2">
            <span>Hiển thị (hàng)</span>
            <select class="form-control" id="sl_page_size">
                <option value="">-- Chọn --</option>
                <option value="5" {{$page_size == 5 ? "selected" : ""}}>5</option>
                <option value="10" {{$page_size == 10 ? "selected" : ""}}>10</option>
                <option value="15" {{$page_size == 15 ? "selected" : ""}}>15</option>
                <option value="20" {{$page_size == 20 ? "selected" : ""}}>20</option>
            </select>
        </div>
        <div class="col-sm-2">
            <span>Giá</span>
            <select class="form-control" id="sort_by_price">
                <option value="">-- Chọn --</option>
                <option value="asc" {{$sort_by_price == "asc" ? "selected" : ""}}>Tăng dần</option>
                <option value="desc" {{$sort_by_price == "desc" ? "selected" : ""}}>Giảm dần</option>
            </select>
        </div>
        <div class="col-sm-2">
            <span>Số lượng</span>
            <select class="form-control" id="sort_by_quantity">
                <option value="">-- Chọn --</option>
                <option value="asc" {{$sort_by_quantity == "asc" ? "selected" : ""}}>Tăng dần</option>
                <option value="desc" {{$sort_by_quantity == "desc" ? "selected" : ""}}>Giảm dần</option>
            </select>
        </div>
        <div class="col-sm-3">
            <span>Nhà cung cấp</span>
            <select class="form-control" id="sl_supplier">
                <option value="">-- Chọn nhà cung cấp --</option>
                @foreach ($suppliers as $supplier)
                <option value="{{$supplier->id}}" {{$supplier_id == $supplier->id ? "selected" : ""}}>
                    {{$supplier->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-sm-3">
            <span>Loại sản phẩm</span>
            <select class="form-control" id="sl_category">
                <option value="">-- Chọn loại --</option>
                @foreach ($categories as $category)
                <option value="{{$category->id}}" {{$category_id == $category->id ? "selected" : ""}}>
                    {{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-sm-2 mt-2">
            <span>Ngày thêm</span>
            <select class="form-control" id="sort_by_created_at">
                <option value="">-- Chọn --</option>
                <option value="asc" {{$sort_by_created_at == "asc" ? "selected" : ""}}>Cũ nhất</option>
                <option value="desc" {{$sort_by_created_at == "desc" ? "selected" : ""}}>Mới nhất</option>
            </select>
        </div>
    </div>
    <div class="row layout-spacing">
        @if ($total > 0)
        <div class="col-lg-12 col-md-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4 class="text-center">Danh sách sản phẩm</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="alert alert-light-success">
                                Có <b>{{$total}}</b> sản phẩm
                            </div>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <div class="table-responsive" id="table-component">
                        <table class="table table-bordered mb-4">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Status</th>
                                    <th>Home Flag</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0; ?>
                                @foreach ($model as $item)
                                <tr>
                                    <td>{{++$i}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>
                                        <img src="{{$url = url('/')}}/{{$item->image}}" alt="" style="height: 40px">
                                    </td>
                                    <td>{{number_format($item->price)}} đ</td>
                                    <td>{{$item->quantity}}</td>
                                    <td>
                                        <a href="{{route('product.change_status',['id' => $item->id])}}">
                                            @if ($item->status == 1)
                                            <span class="badge badge-success"> Active </span>
                                            @else
                                            <span class="badge badge-danger"> Unactive </span>
                                            @endif
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{route('product.change_home_flag',['id' => $item->id])}}">
                                            @if ($item->home_flag == 1)
                                            <span class="badge badge-success"> Active </span>
                                            @else
                                            <span class="badge badge-danger"> Unactive </span>
                                            @endif
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <a href="#" class="btn-material btn-material-primary btnView"
                                            data-toggle="modal"
                                            data-url="{{ route('product.show',['product' => $item->id]) }}"
                                            data-target=".ModalView">
                                            <i class="flaticon-view-3"></i>
                                        </a>
                                        <a href="#" class="btn-material btn-material-info btnEdit" data-toggle="modal"
                                            data-edit="{{ route('product.edit',['product' => $item->id]) }}"
                                            data-update="{{ route('product.update',['product' => $item->id]) }}"
                                            data-id="{{$item->id}}" data-target=".ModalAddEdit">
                                            <i class="flaticon-edit-5"></i>
                                        </a>
                                        <a href="#" class="btn-material btn-material-danger btnDelete"
                                            data-url="{{ route('product.destroy',['product' => $item->id]) }}">
                                            <i class=" flaticon-delete-6"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$model->appends(request()->all())->links()}}
                    </div>
                </div>
            </div>

        </div>
        @else
        <div class="col-sm-6">
            <div class="alert alert-icon-left alert-light-danger" role="alert">
                <i class="flaticon-danger-3"></i>
                Không có sản phẩm nào !
            </div>
        </div>
        @endif
    </div>
    @endif
</div>
<div class="modal fade ModalAddEdit" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Name (Tên):</label>
                    <input type="text" name="name" class="form-control" placeholder="Tên sản phẩm">
                </div>
                <div class="form-group">
                    <label for="">Alias:</label>
                    <input type="text" name="alias" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label for="">Price (Giá):</label>
                    <input type="number" min="0" name="price" class="form-control" placeholder="Giá">
                </div>
                <div class="form-group">
                    <label for="">Promotion (Khuyến mãi %):</label>
                    <input type="number" min="0" name="promotion" class="form-control" placeholder="Khuyến mãi">
                </div>
                <div class="form-group">
                    <label for="">Quantity (Số lượng):</label>
                    <input type="number" min="0" name="quantity" class="form-control" value="0" placeholder="Số lượng">
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Supplier (Nhà cung cấp):</label>
                            <select class="form-control" name="supplier_id" style="width: 300px;">
                                <option value="" id="default_supp">-- Chọn nhà cung cấp --</option>
                                @foreach ($suppliers as $supplier)
                                <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Product category (Loại sản phẩm):</label>
                            <select class="form-control" name="category_id" style="width: 300px;">
                                <option value="" id="default_cate">-- Chọn loại --</option>
                                @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Description (Mô tả):</label>
                    <textarea name="description" class="form-control" placeholder="Mô tả"></textarea>
                </div>
                <div class="form-group">
                    <label for="">Image (Ảnh):</label>
                    <input type="text" name="image" class="form-control" readonly>
                    <button class="mt-1 mb-1 btn btn-button-1" id="btnChooseImage">Choose image</button>
                    <div id="show_image"></div>
                </div>
                <div class="form-group">
                    <label for="" class="d-block">More image (Ảnh chi tiết):</label>
                    <button class="mt-1 mb-1 btn btn-button-1" id="btnChooseImageList">Choose more image</button>
                    <div id="show_image_list" style="display: flex; flex-wrap: wrap">
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Frame (Khung):</label>
                    <textarea name="frame" class="form-control" placeholder="Khung"></textarea>
                </div>
                <div class="form-group">
                    <label for="">Rims (Vành):</label>
                    <textarea name="rims" class="form-control" placeholder="Vành"></textarea>
                </div>
                <div class="form-group">
                    <label for="">Tires (Lốp/Bánh xe):</label>
                    <textarea name="tires" class="form-control" placeholder="Bánh xe"></textarea>
                </div>
                <div class="form-group">
                    <label for="">Weight (Trọng lượng):</label>
                    <textarea name="weight" class="form-control" placeholder="Cân nặng"></textarea>
                </div>
                <div class="form-group">
                    <label for="">Weight limit (Tải trọng tối đa):</label>
                    <textarea name="weight_limit" class="form-control" placeholder="Tải trọng tối đa"></textarea>
                </div>
                <div class="form-group">
                    <div class="widget-content widget-content-area">
                        <p>Status:</p>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline1" name="status" class="custom-control-input"
                                value="1">
                            <label class="custom-control-label" for="customRadioInline1">Active</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline2" name="status" class="custom-control-input"
                                value="0">
                            <label class="custom-control-label" for="customRadioInline2">Unactive</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="widget-content widget-content-area">
                        <p>Home Flag:</p>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline3" name="home_flag" class="custom-control-input"
                                value="1">
                            <label class="custom-control-label" for="customRadioInline3">Active</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline4" name="home_flag" class="custom-control-input"
                                value="0">
                            <label class="custom-control-label" for="customRadioInline4">Unactive</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-rounded mt-3 mb-3" id="btnSave"></button>
                    <button type="button" class="btn btn-dark btn-rounded mt-3 mb-3" data-dismiss="modal">Hủy</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade ModalView" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="myLargeModalLabel">Thông tin sản phẩm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p><b style="color: #3862f5">Tên sản phẩm:</b> <span id="name"></span></p>
                <p><b style="color: #3862f5">Ảnh:</b></p>
                <div id="view_image"></div>
                <p><b style="color: #3862f5">Ảnh khác:</b></p>
                <div id="view_more_image"></div>
                <p class="mt-2 mb-2"><b style="color: #3862f5">Giá:</b> <span id="price"></span></p>
                <p class="mt-2 mb-2"><b style="color: #3862f5">Khuyến mãi:</b> <span id="promotion"></span></p>
                <p class="mt-2 mb-2"><b style="color: #3862f5">Số lượng:</b> <span id="quantity"></span></p>
                <p class="mt-2 mb-2"><b style="color: #3862f5">Rating:</b> <span id="rating"></span></p>
                <p class="mt-2 mb-2"><b style="color: #3862f5">Nhà cung cấp:</b> <span id="supplier_name"></span></p>
                <p class="mt-2 mb-2"><b style="color: #3862f5">Loại sản phẩm:</b> <span id="category_name"></span></p>
                <p class="mt-2 mb-2"><b style="color: #3862f5">Frame (Khung):</b> <span id="frame"></span></p>
                <p class="mt-2 mb-2"><b style="color: #3862f5">Rims (Vành):</b> <span id="rims"></span></p>
                <p class="mt-2 mb-2"><b style="color: #3862f5">Tires (Lốp/Bánh xe):</b> <span id="tires"></span></p>
                <p class="mt-2 mb-2"><b style="color: #3862f5">Weight (Trọng lượng):</b> <span id="weight"></span></p>
                <p class="mt-2 mb-2"><b style="color: #3862f5">Weight limit (Tải trọng tối đa):</b> <span
                        id="weight_limit"></span></p>
                <p class="mt-2 mb-2"><b style="color: #3862f5">Description (Mô tả):</b> <span id="description"></span>
                </p>
                <p class="mt-2 mb-2"><b style="color: #3862f5">Trạng thái:</b> <span id="status"></span></p>
                <p class="mt-2 mb-2"><b style="color: #3862f5">Home Flag:</b> <span id="home_flag"></span></p>
                <p class="mt-2 mb-2"><b style="color: #3862f5">View count:</b> <span id="view_count"></span></p>
                <p class="mt-2 mb-2"><b style="color: #3862f5">Ngày tạo:</b> <span id="created_at"></span></p>
                <p class="mt-2 mb-2"><b style="color: #3862f5">Ngày sửa:</b> <span id="updated_at"></span></p>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark btn-rounded mt-3 mb-3" data-dismiss="modal">Hủy</button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('js')
<script src="{{asset('public/admin/assets/js/modal/classie.js')}}"></script>
<script src="{{asset('public/admin/assets/js/modal/modalEffects.js')}}"></script>
<script src="{{asset('public/js/genAlias.js')}}"></script>
<script src="{{asset('public/admin/plugins/notification/snackbar/snackbar.min.js')}}"></script>
<script src="{{asset('public/admin/assets/js/ui-kit/notification/custom-snackbar.js')}}"></script>
<script src="{{asset('public/admin/plugins/sweetalerts/sweetalert2.min.js')}}"></script>
<script src="{{url('public/editor/ckeditor/ckeditor.js')}}"></script>
<script src="{{url('public/editor/ckfinder/ckfinder.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var url = "";
        var id = 0;
        var product = {
        init:function() {
            product.registersEvent();
        },
        registersEvent:function() {
            //Click Thêm mới sản phẩm
            $('#btnAdd').on('click', function() {
                $('#myLargeModalLabel').text('Thêm mới sản phẩm');
                $('#btnSave').text('Thêm');
                product.ResetForm();
                url = $(this).data('url');
            });

            //Click view chi tiết sản phẩm
            $('.btnView').off('click').on('click', function() {
                var url = $(this).data('url');
                if(url != "")
                    product.ShowProduct(url);
            });

            //Click edit sản phẩm
            $('.btnEdit').off('click').on('click', function(event) {
                event.preventDefault();
                $('#myLargeModalLabel').text('Cập nhật thông tin sản phẩm');
                $('#btnSave').text('Cập nhật');
                id = $(this).data('id');
                var edit = $(this).data('edit');
                product.EditProduct(edit);
                url = $(this).data('update');
            });

            //Click xoá sản phẩm
            $('.btnDelete').off('click').on('click', function(event) {
                event.preventDefault();
                var url = $(this).data('url');
                swal({
                    title: 'Xoá sản phẩm?',
                    text: "Thao tác không thể phục hồi, tiếp tục ?",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'Huỷ',
                    confirmButtonText: 'Xoá',
                    padding: '2em'
                }).then(function(result) {
                    if (result.value) {
                        if(url != null)
                            product.DeleteProduct(url);
                    }
                });
            });

            //Click chọn ảnh
            $('#btnChooseImage').on('click', function() {
                var url = "{!!url('/')!!}";
                CKFinder.modal({
		            chooseFiles: true,
		            width: 1200,
		            height: 700,
		            onInit: function( finder ) {
			        finder.on('files:choose', function(evt) {
				        var file = evt.data.files.first();
                        var img_path = file.getUrl();
                        var img_input_path = img_path.replace(url, '');
                        $("input[name='image']").val(img_input_path);
                        var img_html = `<img src="${img_path}" alt="" height="150px" style="border: 2px solid #5f27cd">`;
                        $('#show_image').html(img_html);
			            });
                    }
                });
            });

            //Click chọn nhiều ảnh
            $('#btnChooseImageList').on('click', function() {
                CKFinder.modal({
		            chooseFiles: true,
		            width: 1200,
		            height: 700,
		            onInit: function( finder ) {
			        finder.on('files:choose', function(evt) {
				        var file = evt.data.files.first();
                        var img_path = file.getUrl();
                        var html = `<div class="image_list_item" style="border: 2px solid #5f27cd">
                            <img src="${img_path}" alt="" style="height: 70px">
                            <a href="#" class="btnDelMoreImg"><i class="flaticon-delete-can-fill-2" style="color: #d63031; font-size: 20px"></i></a>
                        </div>`;
                        $('#show_image_list').append(html);
                        $('.btnDelMoreImg').off('click').on('click', function (e) {
                            e.preventDefault();
                            $(this).parent().remove();
                        });
                        });
                    }
                });
            });

            //Click lưu thông tin
            $('#btnSave').off('click').on('click', function(e) {
                e.preventDefault();
                if(id == 0)
                    product.AddProduct(url);
                else
                    product.UpdateProduct(url);
            });

            //Choose page size
            $('#sl_page_size').on('change', function() {
                var row =  $(this).val();
                var url = "";
                if(row != "")
                {
                    row = parseInt(row);
                    <?php
                        $request = request()->all();
                        $URL = url()->current() . '?' . http_build_query(array_merge($request, ['page_size' => 'row']));
                    ?>
                    url = "{!! $URL !!}";
                    url = url.replace('row', row);
                }
                else
                {
                    <?php
                        $request = request()->all();
                        if (array_key_exists('page_size', $request))
                            unset($request['page_size']);
                        $URL = url()->current() . '?' . http_build_query(array_merge($request));
                    ?>
                    url = "{!! $URL !!}";
                }
                window.location.href = url;
            });

            //Sort by price
            $('#sort_by_price').on('change', function() {
                var sort = $(this).val();
                var url = "";
                if(sort != "")
                {
                    <?php
                        $request = request()->all();
                        if (array_key_exists('sort_by_quantity', $request))
                            unset($request['sort_by_quantity']);
                        if (array_key_exists('sort_by_created_at', $request))
                            unset($request['sort_by_created_at']);
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

            //Sort by quantity
            $('#sort_by_quantity').on('change', function() {
                var sort = $(this).val();
                var url = "";
                if(sort != "")
                {
                    <?php
                        $request = request()->all();
                        if (array_key_exists('sort_by_price', $request))
                            unset($request['sort_by_price']);
                        if (array_key_exists('sort_by_created_at', $request))
                            unset($request['sort_by_created_at']);
                        $URL = url()->current() . '?' . http_build_query(array_merge($request, ['sort_by_quantity' => 'SORT']));
                    ?>
                    url = "{!! $URL !!}";
                    url = url.replace('SORT', sort);
                }
                else
                {
                    <?php
                        $request = request()->all();
                        if (array_key_exists('sort_by_quantity', $request))
                            unset($request['sort_by_quantity']);
                        $URL = url()->current() . '?' . http_build_query(array_merge($request));
                    ?>
                    url = "{!! $URL !!}";
                }
                window.location.href = url;
            });

            //Sort by created at
            $('#sort_by_created_at').on('change', function() {
                var sort = $(this).val();
                var url = "";
                if(sort != "")
                {
                    <?php
                        $request = request()->all();
                        if (array_key_exists('sort_by_price', $request))
                            unset($request['sort_by_price']);
                        if (array_key_exists('sort_by_quantity', $request))
                            unset($request['sort_by_quantity']);
                        $URL = url()->current() . '?' . http_build_query(array_merge($request, ['sort_by_created_at' => 'SORT']));
                    ?>
                    url = "{!! $URL !!}";
                    url = url.replace('SORT', sort);
                }
                else
                {
                    <?php
                        $request = request()->all();
                        if (array_key_exists('sort_by_created_at', $request))
                            unset($request['sort_by_created_at']);
                        $URL = url()->current() . '?' . http_build_query(array_merge($request));
                    ?>
                    url = "{!! $URL !!}";
                }
                window.location.href = url;
            });

            //Select supplier
            $('#sl_supplier').on('change', function() {
                var id = $(this).val();
                var url = "";
                if(id != "")
                {
                    id = parseInt(id);
                    <?php
                        $request = request()->all();
                        if (array_key_exists('page', $request))
                            $request['page'] = 1;
                        $URL = url()->current() . '?' . http_build_query(array_merge($request, ['sl_supplier' => 'id']));
                    ?>
                    url = "{!! $URL !!}";
                    url = url.replace('id', id);
                }
                else
                {
                    <?php
                        $request = request()->all();
                        if (array_key_exists('sl_supplier', $request))
                            unset($request['sl_supplier']);
                        $URL = url()->current() . '?' . http_build_query(array_merge($request));
                    ?>
                    url = "{!! $URL !!}";
                }
                window.location.href = url;
            });

            //Select category
            $('#sl_category').on('change', function() {
                var id = $(this).val();
                if(id != "")
                {
                    id = parseInt(id);
                    <?php
                        $request = request()->all();
                        if (array_key_exists('page', $request))
                            $request['page'] = 1;
                        $URL = url()->current() . '?' . http_build_query(array_merge($request, ['sl_category' => 'id']));
                    ?>
                    url = "{!! $URL !!}";
                    url = url.replace('id', id);                 
                }
                else
                {
                    <?php
                        $request = request()->all();
                        if (array_key_exists('sl_category', $request))
                            unset($request['sl_category']);
                        $URL = url()->current() . '?' . http_build_query(array_merge($request));
                    ?>
                    url = "{!! $URL !!}";
                }
                window.location.href = url;
            });

            //Search
            $('#btnSearch').on('click', function() {
                var txtSearch = $("input[name='txtSearch']").val();
                var url = "";
                if(txtSearch != "")
                {
                    var url = "{!! url()->current().'?'.http_build_query(array_merge(request()->all(),['search_name' => 'SEARCH'])) !!}";
                    url = url.replace('SEARCH', txtSearch);
                }
                else
                {
                    <?php
                        $request = request()->all();
                        if (array_key_exists('search_name', $request))
                            unset($request['search_name']);
                        $URL = url()->current() . '?' . http_build_query(array_merge($request));
                    ?>
                    url = "{!! $URL !!}";
                }
                window.location.href = url;
            });
        },
        //Thêm mới sản phẩm
        AddProduct: function(url) {
            var more_image = product.GetSrcImage();
            $.ajax({
                url: url,
                type: 'POST',
                dataType: 'json',
                data: {
                    "_token": "{{ csrf_token() }}",
                    name: $("input[name='name']").val(),
                    alias: $("input[name='alias']").val(),
                    description: $('textarea[name="description"]').val(),
                    image: $("input[name='image']").val(),
                    more_image: more_image,
                    frame: $("textarea[name='frame']").val(),
                    rims: $("textarea[name='rims']").val(),
                    tires: $("textarea[name='tires']").val(),
                    weight: $("textarea[name='weight']").val(),
                    weight_limit: $("textarea[name='weight_limit']").val(),
                    price: $("input[name='price']").val(),
                    promotion: $("input[name='promotion']").val(),
                    quantity: $("input[name='quantity']").val(),
                    category_id: $('select[name="category_id"] option:selected').val(),
                    supplier_id: $('select[name="supplier_id"] option:selected').val(),
                    status: $("input[name='status']").val(),
                    home_flag: $("input[name='home_flag']").val()
                },
                success: function(res) {
                    if(res.errors)
                    {
                        var er = res.errors[0];
                        Snackbar.show({
                            text: er,
                            actionTextColor: '#fff',
                            backgroundColor: '#e7515a'
                        });
                    }
                    else
                    {
                        if(res.status)
                        {
                            Snackbar.show({
                                text: 'Thêm thành công',
                                actionTextColor: '#fff',
                                backgroundColor: '#1abc9c'
                            });
                            $('.ModalAddEdit').modal('hide');
                            setTimeout(function() {
                                window.location.reload();
                            }, 800)
                        }
                        else
                        {
                            Snackbar.show({
                                text: 'Thêm thất bại',
                                actionTextColor: '#fff',
                                backgroundColor: '#e7515a'
                            });
                        }
                    }
                },
                error: function(err) {
                }
            });
        },
        //Edit sản phẩm
        EditProduct: function(url) {
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                success: function(res) {
                    $("input[name='name']").val(res.obj.name);
                    $("input[name='alias']").val(res.obj.alias);
                    $('textarea[name="description"]').val(res.obj.description);
                    var html_image = `<img src="${res.image}" alt="" height="150px" style="border: 2px solid #5f27cd">`;
                    $('#show_image').html(html_image);
                    $("input[name='image']").val(res.obj.image);
                    if(res.more_image != null)
                    {
                        var html = ``;
                        $.each(res.more_image, function(index, value) {
                            html += `<div class="image_list_item" style="border: 2px solid #5f27cd">
                            <img src="${value}" alt="${res.obj.name}" style="height: 70px">
                            <a href="#" class="btnDelMoreImg"><i class="flaticon-delete-can-fill-2" style="color: #d63031; font-size: 20px"></i></a>
                            </div>`;
                        });
                        $('#show_image_list').html(html);
                        $('.btnDelMoreImg').off('click').on('click', function (e) {
                            e.preventDefault();
                            $(this).parent().remove();
                        });
                    }
                    $("textarea[name='frame']").val(res.obj.frame);
                    $("textarea[name='rims']").val(res.obj.rims);
                    $("textarea[name='tires']").val(res.obj.tires);
                    $("textarea[name='weight']").val(res.obj.weight);
                    $("textarea[name='weight_limit']").val(res.obj.weight_limit);
                    $("input[name='price']").val(res.price);
                    $("input[name='promotion']").val(res.obj.promotion);
                    $("input[name='quantity']").val(res.obj.quantity);
                    $.each($("select[name='supplier_id'] option"), function(index, value) {
                        if($(this).val() == res.obj.supplier_id)
                            $(this).prop('selected', true);
                    });
                    $.each($("select[name='category_id'] option"), function(index, value) {
                        if($(this).val() == res.obj.category_id)
                            $(this).prop('selected', true);
                    });
                    if(res.obj.status == 1)
                    {
                        $("#customRadioInline1").prop('checked', true);
                        $("#customRadioInline2").prop('checked', false);
                    }
                    else
                    {
                        $("#customRadioInline1").prop('checked', false);
                        $("#customRadioInline2").prop('checked', true);
                    }
                    if(res.obj.home_flag == 1)
                    {
                        $("#customRadioInline3").prop('checked', true);
                        $("#customRadioInline4").prop('checked', false);
                    }
                    else
                    {
                        $("#customRadioInline3").prop('checked', false);
                        $("#customRadioInline4").prop('checked', true);
                    }
                },
                error: function(err) {
                    Snackbar.show({
                        text: err,
                        actionTextColor: '#fff',
                        backgroundColor: '#e7515a'
                    });
                }
            });
        },
        //Hiển thị chi tiết sản phẩm
        ShowProduct: function(url) {
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                success: function(res)
                {
                    $('#name').text(res.obj.name);
                    var html = `<img src="${res.image}" alt="${res.obj.name}" height="150px" style="border: 2px solid #5f27cd">`;
                    $('#view_image').html(html);
                    if(res.more_image != null)
                    {
                        var html = ``;
                        $.each(res.more_image, function(index, value) {
                            html += `<img src="${value}" alt="${res.obj.name}" height="110px" class="mr-1" style="border: 1px solid #5f27cd">`;
                        });
                        $('#view_more_image').html(html);
                    }
                    else
                    {
                        $('#view_more_image').html('Không có ảnh khác');
                    }
                    $('#price').text(res.price + " đ");
                    $('#promotion').text("-"+res.obj.promotion + "%");
                    $('#quantity').text(res.obj.quantity + " sản phẩm");
                    $('#supplier_name').text(res.supplier_name);
                    $('#category_name').text(res.category_name);
                    $('#frame').text(res.obj.frame);
                    $('#rims').text(res.obj.rims);
                    $('#tires').text(res.obj.tires);
                    $('#weight').text(res.obj.weight);
                    $('#weight_limit').text(res.obj.weight_limit);
                    if(res.obj.description != null)
                        $('#description').text(res.obj.description);
                    else
                        $('#description').text('Không có mô tả nào');
                    if(res.obj.status == 1)
                        $('#status').html(`<span class="badge badge-success"> Active </span>`);
                    else
                        $('#status').html(`<span class="badge badge-danger"> Unactive </span>`);
                    if(res.obj.home_flag == 1)
                        $('#home_flag').html(`<span class="badge badge-success"> Active </span>`);
                    else
                        $('#home_flag').html(`<span class="badge badge-danger"> Unactive </span>`);
                    $('#view_count').text(res.obj.view_count + " view");
                    $('#created_at').text(res.created_at);
                    $('#updated_at').text(res.updated_at);
                },
                error: function(err)
                {
                    Snackbar.show({
                        text: err,
                        actionTextColor: '#fff',
                        backgroundColor: '#e7515a'
                    });
                }
            });
        },
        //Cập nhật sản phẩm
        UpdateProduct: function(url) {
            var more_image = product.GetSrcImage();
            $.ajax({
                url: url,
                type: 'PUT',
                dataType: 'json',
                data: {
                    "_token": "{{ csrf_token() }}",
                    name: $("input[name='name']").val(),
                    alias: $("input[name='alias']").val(),
                    description: $('textarea[name="description"]').val(),
                    image: $("input[name='image']").val(),
                    more_image: more_image,
                    frame: $("textarea[name='frame']").val(),
                    rims: $("textarea[name='rims']").val(),
                    tires: $("textarea[name='tires']").val(),
                    weight: $("textarea[name='weight']").val(),
                    weight_limit: $("textarea[name='weight_limit']").val(),
                    price: $("input[name='price']").val(),
                    promotion: $("input[name='promotion']").val(),
                    quantity: $("input[name='quantity']").val(),
                    category_id: $('select[name="category_id"] option:selected').val(),
                    supplier_id: $('select[name="supplier_id"] option:selected').val(),
                    status: $("input[name='status']:checked").val(),
                    home_flag: $("input[name='home_flag']:checked").val() 
                },
                success: function(res) {
                    if(res.errors)
                    {
                        var er = res.errors[0];
                        Snackbar.show({
                            text: er,
                            actionTextColor: '#fff',
                            backgroundColor: '#e7515a'
                        });
                    }
                    else
                    {
                        if(res.status)
                        {
                            Snackbar.show({
                                text: 'Cập nhật thành công',
                                actionTextColor: '#fff',
                                backgroundColor: '#1abc9c'
                            });
                            $('.ModalAddEdit').modal('hide');
                            setTimeout(function() {
                                window.location.reload();
                            }, 800)
                        }
                        else
                        {
                            Snackbar.show({
                                text: 'Cập nhật thất bại',
                                actionTextColor: '#fff',
                                backgroundColor: '#e7515a'
                            });
                        }
                    }
                },
                error: function(err)
                {
                    Snackbar.show({
                        text: err,
                        actionTextColor: '#fff',
                        backgroundColor: '#e7515a'
                    });
                }
            });
        },
        //Xoá sản phẩm
        DeleteProduct: function(url) {
            $.ajax({
                url: url,
                type: 'DELETE',
                dataType: 'json',
                data: {
                    "_token": "{{ csrf_token() }}",
                },
                success: function(res) {
                    if(res.status)
                    {
                        Snackbar.show({
                            text: 'Xóa thành công',
                            actionTextColor: '#fff',
                            backgroundColor: '#1abc9c'
                        });
                        setTimeout(function() {
                                window.location.reload();
                            }, 800)
                    }
                    else
                    {
                        Snackbar.show({
                            text: 'Xoá thất bại',
                            actionTextColor: '#fff',
                            backgroundColor: '#e7515a'
                        });
                    }
                },
                error: function(err)
                {
                    Snackbar.show({
                        text: err,
                        actionTextColor: '#fff',
                        backgroundColor: '#e7515a'
                    });
                }
            });
        },
        GetSrcImage: function () {
            var srcImages = [];
            var url = "{!!url('/')!!}";
            $.each($('.image_list_item img'), function (index, value) {
                var src = $(value).prop('src');
                src = src.replace(url, '');
                srcImages.push(src);
            });
            if(srcImages.length != 0)
                return JSON.stringify(srcImages);
            else
                return '';
        },
        ResetForm: function() {
            $("input[name='name']").val('');
            $("input[name='alias']").val('');
            $('textarea[name="description"]').val('');
            $('#show_image').html('');
            $("input[name='image']").val('');
            $('#show_image_list').html('');
            $('#default_cate').prop('selected',true),
            $('#default_supp').prop('selected',true),
            $("textarea[name='frame']").val('');
            $("textarea[name='rims']").val('');
            $("textarea[name='tires']").val('');
            $("textarea[name='weight']").val('');
            $("textarea[name='weight_limit']").val('');
            $("input[name='price']").val('');
            $("input[name='promotion']").val(0);
            $("input[name='quantity']").val('');
            $("#customRadioInline1").prop('checked', true);
            $("#customRadioInline3").prop('checked', true);
        }
    }
    product.init();
});
</script>
@endsection