@extends('client.main')

@section('content')
    <div class="page-header text-center" style="background-image: url('/template/client/images/page-header-bg.jpg');">
        <div class="container">
            @if(isset($menu))
                <h1 class="page-title">{{$menu->name}}<span></span></h1>
            @else
                <h1 class="page-title">{{ $title}}<span></span></h1>
            @endif

        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                @if(isset($menu))
                    <li class="breadcrumb-item active"><a href="#">Danh Mục</a></li>
                    <li class="breadcrumb-item active"><a href="#">{{$menu->name}}</a></li>
                @else
                    <li class="breadcrumb-item active"><a href="#">{{$title}}</a></li>
                @endif
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="container">
            <div class="toolbox">
                <div class="toolbox-left">
                    <a href="#" class="sidebar-toggler"><i class="icon-bars"></i>Filters</a>
                </div><!-- End .toolbox-left -->

                <div class="toolbox-center">
                    <div class="toolbox-info text-dark">
                        @if($products->total()!=0)
                            Có <span style="font-style:italic;">{{$products->count()}} </span>of<span
                                style="font-style:italic;"> {{$products->total()}}</span> sản phẩm
                        @else
                            Có <span style="font-style:italic;">{{$products->total()}} </span> sản phẩm
                        @endif
                    </div><!-- End .toolbox-info -->
                </div><!-- End .toolbox-center -->

                <div class="toolbox-right">
                    <div class="toolbox-sort">
                        <form method="GET" action="#">
                            <div class="row">
                                <div class="col-8">
                                    <label for="sortby">Sắp xếp:</label>
                                    <div class="select-custom">
                                        <select name="sort" id="sortby" class="form-control">
                                            <option value="random" selected="selected">Ngẫu nhiên</option>
                                            <option value="asc">Giá Tăng</option>
                                            <option value="desc">Giá Giảm</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <br>
                                    <input type="submit" class="form-control btn-outline-primary-2 btn-other" value="Sắp xếp">
                                </div>
                            </div>

                        </form>
                    </div><!-- End .toolbox-sort -->
                </div><!-- End .toolbox-right -->
            </div><!-- End .toolbox -->

            @include('client.product.list')

            <div class="sidebar-filter-overlay"></div><!-- End .sidebar-filter-overlay -->
            <aside class="sidebar-shop sidebar-filter">
                <div class="sidebar-filter-wrapper">
                    <div class="widget widget-clean">
                        <label><i class="icon-close"></i>Bộ lọc</label>
                        <a href="#" class="sidebar-filter-clear">xóa hết</a>
                    </div><!-- End .widget -->
                    <div class="widget widget-collapsible">
                        <h3 class="widget-title">
                            <a data-toggle="collapse" href="#widget-1" role="button" aria-expanded="true"
                               aria-controls="widget-1">
                                Danh Mục
                            </a>
                        </h3><!-- End .widget-title -->

                        <div class="collapse show" id="widget-1">
                            <div class="widget-body">
                                <div class="filter-items filter-items-count">
                                    <div class="filter-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="cat-1">
                                            <label class="custom-control-label" for="cat-1">Danh Mục 1</label>
                                        </div><!-- End .custom-checkbox -->
                                        <span class="item-count">3</span>
                                    </div><!-- End .filter-item -->
                                </div><!-- End .filter-items -->
                            </div><!-- End .widget-body -->
                        </div><!-- End .collapse -->
                    </div><!-- End .widget -->

                    <div class="widget widget-collapsible">
                        <h3 class="widget-title">
                            <a data-toggle="collapse" href="#widget-2" role="button" aria-expanded="true"
                               aria-controls="widget-2">
                                Kích cỡ
                            </a>
                        </h3><!-- End .widget-title -->

                        <div class="collapse show" id="widget-2">
                            <div class="widget-body">
                                <div class="filter-items">
                                    <div class="filter-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="size-1">
                                            <label class="custom-control-label" for="size-1">39</label>
                                        </div><!-- End .custom-checkbox -->
                                    </div><!-- End .filter-item -->

                                    <div class="filter-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="size-2">
                                            <label class="custom-control-label" for="size-2">40</label>
                                        </div><!-- End .custom-checkbox -->
                                    </div><!-- End .filter-item -->

                                    <div class="filter-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" checked id="size-3">
                                            <label class="custom-control-label" for="size-3">41</label>
                                        </div><!-- End .custom-checkbox -->
                                    </div><!-- End .filter-item -->

                                    <div class="filter-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" checked id="size-4">
                                            <label class="custom-control-label" for="size-4">42</label>
                                        </div><!-- End .custom-checkbox -->
                                    </div><!-- End .filter-item -->

                                    <div class="filter-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="size-5">
                                            <label class="custom-control-label" for="size-5">43</label>
                                        </div><!-- End .custom-checkbox -->
                                    </div><!-- End .filter-item -->

                                    <div class="filter-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="size-6">
                                            <label class="custom-control-label" for="size-6">44</label>
                                        </div><!-- End .custom-checkbox -->
                                    </div><!-- End .filter-item -->
                                </div><!-- End .filter-items -->
                            </div><!-- End .widget-body -->
                        </div><!-- End .collapse -->
                    </div><!-- End .widget -->

                    <div class="widget widget-collapsible">
                        <h3 class="widget-title">
                            <a data-toggle="collapse" href="#widget-3" role="button" aria-expanded="true"
                               aria-controls="widget-3">
                                Màu sắc
                            </a>
                        </h3><!-- End .widget-title -->

                        <div class="collapse show" id="widget-3">
                            <div class="widget-body">
                                <div class="filter-colors">
                                    <a href="#" style="background: #b87145;"><span class="sr-only">Color Name</span></a>
                                    <a href="#" style="background: #f0c04a;"><span class="sr-only">Color Name</span></a>
                                    <a href="#" style="background: #333333;"><span class="sr-only">Color Name</span></a>
                                    <a href="#" class="selected" style="background: #cc3333;"><span class="sr-only">Color Name</span></a>
                                    <a href="#" style="background: #3399cc;"><span class="sr-only">Color Name</span></a>
                                    <a href="#" style="background: #669933;"><span class="sr-only">Color Name</span></a>
                                    <a href="#" style="background: #f2719c;"><span class="sr-only">Color Name</span></a>
                                    <a href="#" style="background: #ebebeb;"><span class="sr-only">Color Name</span></a>
                                </div><!-- End .filter-colors -->
                            </div><!-- End .widget-body -->
                        </div><!-- End .collapse -->
                    </div><!-- End .widget -->
                </div><!-- End .sidebar-filter-wrapper -->
            </aside><!-- End .sidebar-filter -->
        </div><!-- End .container -->
    </div><!-- End .page-content -->
@endsection

@section('footer')
    <style>
        nav.flex {
            display: none;
        }
        .btn-other{
            border: 1px solid #000;
        }
        .btnview:before {
            content: '\f145';
        }
    </style>
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-lg" style="max-width: 800px !important;" id="ok">
            @include('client.product.quick')
        </div>
    </div>
    <script>
        $('.btnview').click(function () {
            var id = $(this).attr('data-id');

            $.ajax({
                type: 'GET',
                datatype: 'JSON',
                data: {id},
                url: "/quickView",
                success: function (result) {
                    $('#ok').html(result);
                }
            });
        });
        $('#sortby').change(function () {
            var name = '{{ isset($_GET['products'])?$_GET['products']:'' }}';
            var slug = '{{ isset($menu->slug)?$menu->slug:'' }}';
            var id = '{{ isset($menu->id)?$menu->id:'' }}';
            var sort = $(this).val();

            // $.ajax({
            //     type: 'GET',
            //     datatype: 'JSON',
            //     data: {id, slug, sort},
            //     url: "/filter",
            //     success: function (result) {
            //         $('#test').html(result);
            //     }
            // });
        })
    </script>
@endsection
