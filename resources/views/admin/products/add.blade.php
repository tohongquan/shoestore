@extends('admin.main')
@section('header')
    <script src="/template/admin/ckeditor/ckeditor.js"></script>
@endsection
@section('content')
    <div class="card">
        <div class="card-header bg-primary">
            <h3 class=" text-center">{{ $title }}</h3>
        </div>
        @include('admin.alert')
        <div class="card-body">
            <form action="" enctype="multipart/form-data" method="POST">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tên Sản Phẩm</label>
                            <input type="text" name="name" class="form-control" value="{{old('name')}}">
                        </div>
                        @error('name')
                        <div class="text text-danger mb-3">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Danh mục</label>
                            <select class="form-control" name="menu_id" id="exampleFormControlSelect1">
                                {!! \App\Helpers\Menu::getParent($menus) !!}
                            </select>
                            @error('menu_id')
                            <div class="text text-danger mb-3">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Số lượng sản phẩm</label>
                    <input type="number" name="quantity" value=" {{old('quantity')}}" class="form-control">
                </div>
                @error('quantity')
                <div class="text text-danger mb-3">{{ $message }}</div>
                @enderror
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Giá Sản Phẩm</label>
                            <input type="number" name="price" value="{{old('price')}}" class="form-control">
                        </div>
                        @error('price')
                        <div class="text text-danger mb-3">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Giá giảm</label>
                            <input type="number" name="price_sale" value="{{old('price_sale')}}"
                                   class="form-control">
                        </div>
                        @error('price_sale')
                        <div class="text text-danger mb-3">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="menu">Ảnh đại diện</label>
                            <input type="file" class="form-control" name="thumb">
                            @error('thumb')
                            <div class="text text-danger mb-3">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="menu">Thêm ảnh</label>
                            <input type="file" class="form-control" multiple name="path_image[]">
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Kích Hoạt</label>
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" value="1"
                                       type="radio" id="active"
                                       name="active" checked="">
                                <label for="active" class="custom-control-label">Có</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" value="0" type="radio" id="no_active"
                                       name="active">
                                <label for="no_active" class="custom-control-label">Không</label>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Hot</label>
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" value="1"
                                       type="radio" id="hot"
                                       name="hot" checked="">
                                <label for="hot" class="custom-control-label">Có</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" value="0" type="radio" id="no_hot"
                                       name="hot">
                                <label for="no_hot" class="custom-control-label">Không</label>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <label>Mô tả</label>
                    <textarea class="form-control" name="description" rows="5">{{old('description')}}</textarea>
                </div>

                <div class="form-group">
                    <label>Mô tả chi tiết</label>
                    <textarea class="form-control" name="content" id="content"
                              rows="5">{{old('content')}}</textarea>
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Thêm">
                </div>
                @csrf
            </form>
        </div>
    </div>
@endsection

@section('footer')
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection
