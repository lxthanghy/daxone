@extends('Admin.layout')
@section('title')| Loại sản phẩm @endsection
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
<link href="{{asset('public/admin/assets/css/ui-kit/custom-pagination.css')}}" rel="stylesheet" type="text/css">
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
            <h3 style="color: #e95f2b">Quản lý loại sản phẩm</h3>
        </div>
    </div>
    <div class="crumbs">
        <ul id="breadcrumbs" class="breadcrumb">
            <li><a href="index.html"><i class="flaticon-home-fill"></i></a></li>
            <li><a href="#">Tables</a></li>
            <li class="active"><a href="#">Basic</a> </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-sm-8">
            <button type="button" class="btn btn-button-12 mb-2" id="btnAdd" data-toggle="modal"
                data-target=".ModalAddEdit" data-url="{{route('category.store')}}"><i class=" flaticon-plus"></i> Thêm
                mới</button>
        </div>
        <div class="col-sm-4">
            <div class="input-group mb-4">
                <input type="search" class="form-control" name="txtSearch" value="" placeholder="Tìm kiếm">
                <div class="input-group-append">
                    <button type="button" class="btn btn-gradient-warning" id="btnSearch"><i
                            class="flaticon-search-1"></i></button>
                </div>
            </div>
        </div>
    </div>
    <div class="row layout-spacing">
        <div class="col-lg-12 col-md-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Danh sách loại sản phẩm</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-4">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
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
                                        <a href="{{route('category.change_status',['id'=>$item->id])}}">
                                            @if ($item->status == 1)
                                            <span class="badge badge-success"> Active </span>
                                            @else
                                            <span class="badge badge-danger"> Unactive </span>
                                            @endif
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{route('category.change_home_flag',['id'=>$item->id])}}">
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
                                            data-url="{{route('category.show',['category'=>$item->id])}}"
                                            data-target=".ModalView">
                                            <i class="flaticon-view-3"></i>
                                        </a>
                                        <a href="#" class="btn-material btn-material-info btnEdit" data-toggle="modal"
                                            data-url="{{route('category.edit',['category'=>$item->id])}}"
                                            data-update="{{route('category.update',['category'=>$item->id])}}"
                                            data-target=".ModalAddEdit" data-id="{{$item->id}}">
                                            <i class="flaticon-edit-5"></i>
                                        </a>
                                        <a href="#" class="btn-material btn-material-danger btnDelete"
                                            data-url="{{route('category.destroy',['category'=>$item->id])}}">
                                            <i class=" flaticon-delete-6"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            {{$model->links()}}
        </div>
    </div>
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
                    <label for="">Tên loại:</label>
                    <input type="text" name="name" class="form-control" placeholder="Tên loại">
                </div>
                <div class="form-group">
                    <label for="">Alias:</label>
                    <input type="text" name="alias" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label for="">Mô tả:</label>
                    <textarea class="form-control" name="description" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <div class="widget-content widget-content-area">
                        <p>Status:</p>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline1" name="status" class="custom-control-input"
                                value="1" checked>
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
                                value="1" checked>
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
                    <button type="button" class="btn btn-primary btn-rounded mt-3 mb-3" id="btnSave"
                        data-url="{{route('category.store')}}"></button>
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
                <h5 class="modal-title text-center" id="myLargeModalLabel">Thông tin nhà cung cấp</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p><b style="color: #3862f5">Tên loại sản phẩm:</b> <span id="name"></span></p>
                <p><b style="color: #3862f5">Mô tả:</b> <span id="description"></span></p>
                <p><b style="color: #3862f5">Trạng thái:</b> <span id="status"></span></p>
                <p><b style="color: #3862f5">Home Flag:</b> <span id="home_flag"></span></p>
                <p><b style="color: #3862f5">Ngày tạo:</b> <span id="created_at"></span></p>
                <p><b style="color: #3862f5">Ngày sửa:</b> <span id="updated_at"></span></p>
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
<script type="text/javascript">
    $(document).ready(function () {
        var url = '';
        var id = 0;
        var category = {
        init:function() {
            category.registersEvent();
        },
        registersEvent:function() {
            //Click xem chi tiết nhà cung cấp
            $('.btnView').off('click').on('click', function(event) {
                var url = $(this).data('url');
                category.ShowCategory(url);
            });

            //Click thêm nhà cung cấp
            $('#btnAdd').off('click').on('click', function(event) {
                event.preventDefault();
                category.ResetForm();
                $('#myLargeModalLabel').text('Thêm mới nhà cung cấp');
                $('#btnSave').text('Thêm');
                url = $(this).data('url');
            });

            //Click cập nhật nhà cung cấp
            $('.btnEdit').off('click').on('click', function(event) {
                event.preventDefault();
                $('#myLargeModalLabel').text('Cập nhật thông tin nhà cung cấp');
                $('#btnSave').text('Cập nhật');
                var urle = $(this).data('url');
                category.EditCategory(urle);
                id = $(this).data('id');
                url = $(this).data('update');
            });

            //Click lưu thông tin
            $('#btnSave').on('click',function() {
                if(id == 0)
                    category.AddCategory(url);
                else
                    category.UpdateCategory(url);
            });

            //Click xoá thông tin
            $('.btnDelete').off('click').on('click', function(event) {
                event.preventDefault();
                var url = $(this).data('url');
                swal({
                    title: 'Xoá loại sản phẩm?',
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
                            category.DeleteCategory(url);
                    }
                });
            });

            //Tìm kiếm
            $('#btnSearch').on('click', function() {
                
            });
        },
        //Thêm mới loại sản phẩm
        AddCategory: function(url) {
            $.ajax({
                url: url,
                type: 'POST',
                dataType: 'json',
                data: {
                    "_token": "{{ csrf_token() }}",
                    name: $("input[name='name']").val(),
                    alias: $("input[name='alias']").val(),
                    description: $('textarea[name="description"]').val(),
                    status:  $("input[name='status']:checked").val(),
                    home_flag: $("input[name='home_flag']:checked").val()
                },
                success:function(res) {   
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
                    Snackbar.show({
                        text: err,
                        actionTextColor: '#fff',
                        backgroundColor: '#e7515a'
                    });
                }
            });
        },
        EditCategory: function(url) {
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                success: function(res)
                {
                    $("input[name='name']").val(res.obj.name);
                    $("textarea[name='description']").text(res.obj.description);
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
            })
        },
        ShowCategory: function(url) {
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                success: function(res) {
                    $('#name').text(res.obj.name);
                    $('#description').text(res.obj.description);
                    if(res.obj.status == 1)
                        $('#status').html('<span class="badge badge-success"> Active </span>');
                    else
                        $('#status').html('<span class="badge badge-danger"> Unactive </span>');
                    if(res.obj.home_flag == 1)
                        $('#home_flag').html('<span class="badge badge-success"> Active </span>');
                    else
                        $('#home_flag').html('<span class="badge badge-danger"> Unactive </span>');
                    $('#created_at').text(res.created_at);
                    $('#updated_at').text(res.updated_at);
                },
                error: function(err) {
                    Snackbar.show({
                        text: err,
                        actionTextColor: '#fff',
                        backgroundColor: '#e7515a'
                    });
                }
            })
        },
        UpdateCategory: function(url) {
            $.ajax({
                url: url,
                type: 'PUT',
                dataType: 'json',
                data: {
                    "_token": "{{ csrf_token() }}",
                    name: $("input[name='name']").val(),
                    alias: $("input[name='alias']").val(),
                    description: $('textarea[name="description"]').val(),
                    status: $("input[name='status']:checked").val(),
                    home_flag: $("input[name='home_flag']:checked").val()
                },
                success:function(res) {   
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
                error: function(err) {
                    Snackbar.show({
                        text: err,
                        actionTextColor: '#fff',
                        backgroundColor: '#e7515a'
                    });
                }
            });
        },
        DeleteCategory: function(url) {
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
        ResetForm: function() {
            $("input[name='name']").val('');
            $("input[name='alias']").val('');
            $('textarea[name="description"]').val('');
            $("#customRadioInline1").prop('checked', true);
            $("#customRadioInline3").prop('checked', true);
        }
    }
    category.init();
    });
</script>
@endsection