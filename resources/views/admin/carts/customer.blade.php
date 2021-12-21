@extends('admin.main')

@section('content')
    <div class="card">
        <div class="card-header bg-primary">
            <h3 class=" text-center">{{ $title }}</h3>
        </div>
        <div>
            @include('admin.alert')
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th style="width: 50px">ID</th>
                    <th>Tên khách hàng</th>
                    <th>Số điện thoại</th>
                    <th>Email</th>
                    <th>Ngày đặt hàng</th>
                    <th style="width: 100px">&nbsp;</th>
                </tr>
                </thead>
                <tbody>
                @foreach($customers as $key =>$customer)
                    <tr>
                        <td>{{$customer->id}}</td>
                        <td>{{$customer->name}}</td>
                        <td>{{$customer->phone}}</td>
                        <td>{{$customer->email}}</td>
                        <td>{{$customer->created_at}}</td>
                        <td><a class="btn btn-primary btn-sm" href="/admin/customers/view/{{$customer->id}}">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="#" class="btn btn-danger btn-sm"
                               onclick="removeRow({{$customer->id}},'/admin/customers/destroy')">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection



