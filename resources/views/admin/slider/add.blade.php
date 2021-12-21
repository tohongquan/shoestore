@extends('admin.main')

@section('header')
    <script src="/template/admin/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
    <div class="card">
        <div class="card-header bg-primary">
            <h3 class=" text-center">{{ $title }}</h3>
        </div>
        <div>
            @if (Session::has('error'))
                <div class="alert alert-danger">
                    {{ Session::get('error') }}
                </div>
            @endif

            @if (Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            @endif
        </div>
        <div class="card-body">
            <form action="/admin/slider/add/store" method="POST">
                <div class="card-body">

                    <div class="form-group">
                        <label for="menu">Tên slider</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                            placeholder="Nhập tên slider">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="menu">Đường link</label>
                        <input type="text" name="link" value="{{ old('link') }}" class="form-control"
                            placeholder="Nhập đường link">
                        @error('link')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Mô Tả Chi Tiết</label>
                        <textarea name="description" id="description"
                            class="form-control">{{ old('description') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="menu">Ảnh slider</label>
                        <input type="file" class="form-control" id="upload" accept=".jpg, .png">
                        <div id="image_show">

                        </div>
                        <input type="hidden" name="thumb" id="thumb">
                    </div>

                    <div class="form-group">
                        <label>Kích Hoạt</label>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" value="1" type="radio" id="active" name="active" checked="">
                            <label for="active" class="custom-control-label">Có</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" value="0" type="radio" id="no_active" name="active">
                            <label for="no_active" class="custom-control-label">Không</label>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Tạo slider</button>
                </div>
                @csrf
            </form>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            Footer
        </div>
        <!-- /.card-footer-->
    </div>
@endsection

@section('footer')
    <script>
        CKEDITOR.replace('description');
    </script>
@endsection
