@extends('admin.main')
@section('header')
    <script src="/template/admin/ckeditor/ckeditor.js"></script>
@endsection
@section('content')
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="text-center">{{ $title }}</h3>
            </div>

            @include('admin.alert')
            <div class="panel-body">
                <form action="" enctype="multipart/form-data" method="POST">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tên Sản Phẩm</label>
                                <input type="text" name="name" class="form-control" value="{{$product->name}}">
                            </div>
                            @error('name')
                            <div class="text text-danger mb-3">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Danh mục</label>
                                <select class="form-control" name="menu_id">
                                    {!! \App\Helpers\Menu::getParent_edit($menus, $product->menu_id) !!}
                                </select>
                                @error('menu_id')
                                <div class="text text-danger mb-3">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Số lượng sản phẩm</label>
                        <input type="number" name="quantity" value="{{$product->quantity}}" class="form-control">
                    </div>
                    @error('quantity')
                    <div class="text text-danger mb-3">{{ $message }}</div>
                    @enderror
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Giá Sản Phẩm</label>
                                <input type="number" name="price" value="{{$product->price}}" class="form-control">
                            </div>
                            @error('price')
                            <div class="text text-danger mb-3">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Giá giảm</label>
                                <input type="number" name="price_sale" value="{{$product->price_sale}}"
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
                                <input type="hidden" value="{{$product->thumb}}" class="form-control" name="thumb_late">
                                <img src="{{$product->thumb}}" width="200px">
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
                                           {{ $product->active == 1 ? 'checked=""' : '' }} type="radio" id="active"
                                           name="active">
                                    <label for="active" class="custom-control-label">Có</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" value="0" type="radio" id="no_active"
                                           name="active" {{ $product->active == 0 ? 'checked=""' : '' }}>
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
                                           name="hot"
                                        {{ $product->hot == 1 ? 'checked=""' : '' }}>
                                    <label for="hot" class="custom-control-label">Có</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" value="0" type="radio" id="no_hot"
                                           name="hot" {{ $product->hot == 0 ? 'checked=""' : '' }}>
                                    <label for="no_hot" class="custom-control-label">Không</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Mô tả</label>
                        <textarea class="form-control" name="description" rows="5">{{$product->description}}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Mô tả chi tiết</label>
                        <textarea class="form-control" name="content" id="content"
                                  rows="5">{{$product->content}}</textarea>
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Cập nhật">
                    </div>
                    @csrf
                </form>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <script>

        CKEDITOR.replace('content');
    </script>
@endsection
