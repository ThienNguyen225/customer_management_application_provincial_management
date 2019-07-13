@extends('home')
@section('title', 'Chi tiết thành phố')
@section('content')
    <div class="col-12">
        <div class="row">
            <div class="col-12">
                <h1>Chi tiết thành phố</h1>
            </div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Tên tỉnh thành</th>
                    <th scope="col">Số khách hàng</th>
                </tr>
                </thead>
                <tbody>
                        <tr>
                            <th scope="row">{{ $city->id }}</th>
                            <td>{{ $city->name }}</td>
                            <td>{{ count($city->customers) }}</td>
                        </tr>
                </tbody>
            </table>
            <a class="btn btn-primary" href="{{route('cities.index')}}">Back</a>
        </div>
    </div>
@endsection