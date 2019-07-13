@extends('home')
@section('title', 'Thông chi tiết khách hàng')
@section('content')
    <div class="col-12">
        <div class="row">
            <div class="col-12">
                <h1>Thông chi tiết khách hàng</h1>
            </div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Date</th>
                    <th scope="col">City</th>
                    <th scope="col">Image</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">{{$customer->id}}</th>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->dob }}</td>
                    @if(isset($customer->city))
                        <td>{{$customer->city->name}}</td>
                    @else
                        <td>Khong nhap thanh pho</td>
                    @endif
                    <td>
                        <img src="{{asset('storage/'. $customer->image)}}" alt="" style="width: 50px">
                    </td>
                </tr>
                </tbody>
            </table>
            <a class="btn btn-primary" href="{{route('customers.index')}}">Back</a>
        </div>
    </div>
@endsection