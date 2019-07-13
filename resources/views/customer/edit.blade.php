@extends('home')
@section('title', 'Sửa thông tin khách hàng')
@section('content')
    <div class="col-12 col-md-12">
        <div class="row">
            <div class="col-12">
                <h1>Sửa thông tin khách hàng</h1>
            </div>
            <div class="col-12">
                <form method="post" action="{{route('customers.update', ['id' => $customer->id])}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" value="{{$customer->name}}" placeholder="Enter name" required>
                        {{--                                                @if($errors->has('name'))--}}
                        {{--                                                    {{$errors->first('name')}}--}}
                        {{--                                                @endif--}}
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" value="{{$customer->email}}" placeholder="Enter email" required>
                        {{--                                                @if($errors->has('email'))--}}
                        {{--                                                    {{$errors->first('email')}}--}}
                        {{--                                                @endif--}}
                    </div>
                    <div class="form-group">
                        <label>City</label>
                        <select class="form-control" name="city">
                            @foreach($cities as $city)
                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Date</label>
                        <input type="date" class="form-control" name="date" value="{{$customer->dob}}" placeholder="Enter date" required>
                        {{--                                                @if($errors->has('dob'))--}}
                        {{--                                                    {{$errors->first('dob')}}--}}
                        {{--                                                @endif--}}
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" class="form-control-file" name="image" value="{{$customer->image}}" placeholder="Enter image" required>
                        {{--                                                @if($errors->has('image'))--}}
                        {{--                                                    {{$errors->first('image')}}--}}
                        {{--                                                @endif--}}
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Back</button>
                </form>
            </div>
        </div>
    </div>
@endsection