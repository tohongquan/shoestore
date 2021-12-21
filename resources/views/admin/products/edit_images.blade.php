@extends('admin.main')

@section('content')
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="text-center">{{ $title }}</h3>
            </div>

            @include('admin.alert')
            <div class="panel-body">
                <form action="" enctype="multipart/form-data" method="POST">

                    <div class="form-group">
                        <input type="hidden" name="product_id" class="form-control" value="{{$product_id}}">
                    </div>

                    <div class="form-group">
                        <label for="menu">Ảnh đại diện</label>
                        <input type="file" class="form-control" name="thumb">
                        <input type="hidden" value="{{$product_image->image}}" class="form-control"
                               name="thumb_late">
                        <input type="hidden" value="{{$product_image->image_name}}" class="form-control"
                               name="image_name_late">
                        <img src="{{$product_image->image}}" width="200px">
                        @error('thumb')
                        <div class="text text-danger mb-3">{{ $message }}</div>
                        @enderror
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



