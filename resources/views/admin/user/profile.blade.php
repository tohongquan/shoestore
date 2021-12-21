<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="panel-heading">
                    Thông tin cá nhân
                </div>
            </div>
            <div class="modal-body">
                <form action="/admin/user/update" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-3 ">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="polaroid">
                                        @if (Session::get('admin_avatar') != '')
                                            <img src="{{ Session::get('admin_avatar') }}"
                                                alt="avatar_{{ Session::get('admin_name') }}" style="width:100%">
                                        @else
                                            <img src="/template/admin/image/find_user.png"
                                                class="user-image img-responsive" alt="user" style="width:100%" />
                                        @endif

                                    </div>
                                    @if (Session::get('admin_firstname') != '')
                                        <div class="textcontainer">
                                            <p>{{ Session::get('admin_firstname') . ' ' . Session::get('admin_lastname') }}
                                            </p>
                                        </div>
                                    @else
                                        <div class="textcontainer">
                                            <p>{{ Session::get('admin_firstname') . ' ' . Session::get('admin_lastname') }}
                                            </p>
                                        </div>
                                    @endif
                                    <div class="form-group">
                                        <label>Thay ảnh</label>
                                        <input type="file" name="avatar" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9 border">
                            <!-- Form Elements -->
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label>Họ</label>
                                                <input class="form-control" name="firstname"
                                                    value="{{ Session::get('admin_firstname') }}" />
                                            </div>
                                            <div class="form-group">
                                                <label>E-mail</label>
                                                <input class="form-control" name="email"
                                                    value="{{ Session::get('admin_email') }}" />
                                            </div>
                                            <div class="form-group">
                                                <label>Địa chỉ</label>
                                                <input class="form-control" name="address"
                                                    value="{{ Session::get('admin_address') }}" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label>Tên</label>
                                                <input class="form-control" name="lastname"
                                                    value="{{ Session::get('admin_lastname') }}" />
                                            </div>
                                            <div class="form-group">
                                                <label>Số điện thoại</label>
                                                <input class="form-control" name="phone"
                                                    value="{{ Session::get('admin_phone') }}" />
                                            </div>
                                            <div class="form-group">
                                                <label>Ngày sinh</label>
                                                <input class="form-control" type="date" id="birthday"
                                                    value="{{ Session::get('admin_birthday') }}" name="birthday">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Form Elements -->
                        </div>
                    </div>
                    <!-- /. ROW  -->
                    @csrf
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tắt</button>
                        <input type="submit" value="Lưu" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@section('footer')
    <style>
        .close {
            margin-top: -40px !important;
            font-size: 4rem !important;
            font-weight: 600 !important;
        }

        div.polaroid {
            background-color: white;
            width: 100%;
            border-radius: 50%;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            margin-bottom: 25px;
        }

        div.textcontainer {
            text-align: center;
            padding: 10px 20px;
        }

    </style>
@endsection
