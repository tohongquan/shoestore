@extends('admin.main')
@section('content')
@include('admin.alert')
    <section class="content">
        <div class="container-fluid">
            <div class="mt-5"></div>
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small card -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3> {{$carts->count()}}</h3>

                            <p>Đơn hàng</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <a href="/admin/customers" class="small-box-footer">
                            Danh sách <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small card -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3> {{$products->count()}}<sup style="font-size: 20px"></sup></h3>

                            <p> Sản phẩm</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="/admin/product/list" class="small-box-footer">
                            Danh sách <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small card -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{$users->count()}}</h3>

                            <p>Người dùng</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            Danh sách <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <!-- ./col -->
                <!-- ./col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>

@endsection
