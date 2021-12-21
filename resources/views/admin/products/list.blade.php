@extends('admin.main')
@section('header')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')

    <div class="card">
        <div class="card-header bg-primary">
            <h3 class=" text-center">{{ $title }}</h3>
        </div>
        @include('admin.alert')
        <div class="row m-3">
            <div class="col-8"></div>
            <div class="col-4">
                <input class="form-control" id="myInput" type="text" placeholder="Search..">
            </div>
            @csrf
        </div>
        <div class="card-body">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Tên sản phẩm</th>
                                <th>Giá gốc</th>
                                <th>Ảnh.</th>
                                <th>Active</th>
                                <th>Cập nhật</th>
                                <th style="width: 100px">&nbsp;</th>
                            </tr>
                            </thead>
                            <tbody id="myTable">
                            {!! \App\Helpers\Product::list($products) !!}
                            </tbody>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                    <div class="pagin">
                        @if($products->total()!=0)
                            <div class="col-md-12 mt-4">
                                <ul class="pagination">
                                    <li class="paginate_button page-item {{($products->currentPage() == 1) ? ' disabled' : '' }}">
                                        <a class="page-link" href="{{ $products->url(1) }}">Previous</a>
                                    </li>
                                    @for ($i = 1; $i <= $products->lastPage(); $i++)
                                        <li class="paginate_button page-item {{($products->currentPage() == $i) ? ' active' : '' }}">
                                            <a class="page-link" href="{{ $products->url($i) }}">{{ $i }}</a>
                                        </li>
                                    @endfor
                                    <li class="paginate_button page-item {{ ($products->currentPage() == $products->lastPage()) ? ' disabled' : '' }}">
                                        <a class="page-link"
                                           href="{{ $products->url($products->currentPage()+1) }}">Next</a>
                                    </li>
                                </ul>
                            </div>
                        @else
                            <h4>Không có sản phẩm</h4>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4 class="text-center">Danh sách ảnh của 1 sản phẩm</h4>
            </div>

            <div class="panel-body">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th style="width: 45px; text-align: center;">#</th>
                                    <th style="text-align: center;">Ảnh</th>
                                    <th style="text-align: center;">Tên ảnh</th>
                                    <th style="text-align: center;">Ngày cập nhật</th>
                                    <th style="width: 150px;">&ensp;</th>
                                </tr>
                                </thead>
                                <tbody id="multiple">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection


@section('footer')
    <style>
        nav.flex {
            display: none;
        }
    </style>
    <script>
        $("div.table-responsive > table > tbody > tr > td").click(function () {
            // var customerId = $(this).attr('#id').html();
            var currentRow = $(this).closest("tr");
            var id = currentRow.find("td:eq(0)").text();
            $.ajax({
                type: 'GET',
                dataType: "JSON",
                url: '/admin/product/list-image/' + id + '',
                success: function (result) {
                    if (result.error === false) {
                        let n = result.product_images.length;
                        var html = '';
                        for (let i = 0; i < n; i++) {
                            html += '<tr>' +
                                '<td>' + result.product_images[i].id + '</td>' +
                                '<td><a href="' + result.product_images[i].image + '"  target="_blank"><img src="' + result.product_images[i].image + '" width="100px"></a></td>' +
                                '<td>' + result.product_images[i].image_name + '</td>' +
                                '<td style="text-align: center;">' + result.product_images[i].updated_at + '</td>' +
                                '<td class="text-center" >  ' +
                                '<a class="btn btn-primary btn-sm" style="margin-right: 1rem;" href=\"/admin/products-image/edit/' + result.product_images[i].id + '\">' +
                                '<i class="fas fa-edit"></i>' +
                                '</a>' +
                                '<a href="#" class="btn btn-danger btn-sm" onclick="removeRow(' + result.product_images[i].id + ' ,\'/admin/products-image/destroy\')">' +
                                '<i class="fas fa-trash"></i>' +
                                '</a>' +
                                '</td>'
                            '</tr>';
                        }
                        document.getElementById("multiple").innerHTML = html;
                    } else {
                        alert('Xóa lỗi vui lòng thử lại');
                    }
                }
            });
        });
    </script>
    <script src="/template/admin/js/main.js"></script>
@endsection
