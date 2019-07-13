@extends('home')
@section('title', 'Danh sách tỉnh thành')
@section('content')
    <div class="col-12">
        <div class="row">
            <a class="btn btn-primary" href="{{route('cities.create')}}">Thêm mới</a>
            <div class="col-12">
                <h1>Danh sách thành phố</h1>
            </div>
            <table class="table table-striped">
                <thaed>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Tên Tỉnh Thành</th>
                        <th scope="col">Số lượng khách hàng</th>
                        <th scope="col">Action</th>
                    </tr>
                </thaed>
                <tbody>
                @if(count($cities) == 0)
                    <tr colspan="4">Không có dữ liệu</tr>
                @else
                    @foreach($cities as $key => $city)
                        <tr>
                            <th scope="row">{{++$key}}</th>
                            <td>{{ $city->name }}</td>
                            <td>{{ count($city->customers) }}</td>
                            <td>
                                <a href="{{route('cities.show', ['id' => $city->id])}}">
                                    <button type="button" class="btn btn-primary">Show</button>
                                </a>
                                <a href="{{route('cities.edit', ['id' => $city->id])}}">
                                    <button type="button" class="btn badge-info">Edit</button>
                                </a>
                                <a href="{{route('cities.delete', ['id' => $city->id])}}">
                                    <button type="button" class="btn btn-dark">Delete</button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
    {{$cities->links()}}
@endsection
