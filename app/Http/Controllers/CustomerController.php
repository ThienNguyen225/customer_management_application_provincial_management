<?php

namespace App\Http\Controllers;

use App\City;
use App\Customer;
use App\Http\Requests\CustomerCreateRequest;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(){
        $customers = Customer::paginate(5);
        $cities = City::all();
        return view('customer.list', compact('customers', 'cities'));
    }

    public function create(){
        $cities = City::all();
        return view('customer.create', compact('cities'));
    }

    public function store(Request $request){
        $customer = new Customer();
        $customer->name = $request->input('name');
        $customer->email = $request->input('email');
        $customer->city_id = $request->input('city');
        $customer->dob = $request->input('date');

        if (isset($request->image)){
            $image = $request->image;
            $path = $image->store('images', 'public');
            $customer->image = $path;
        }
        $customer->save();
        return redirect()->route('customers.index');
    }

    public function show($id){
        $customer = Customer::findOrFail($id);
        return view('customer.show', compact('customer'));
    }

    public function edit($id){
        $customer = Customer::findOrFail($id);
        $cities = City::all();
        return view('customer.edit', compact('customer', 'cities'));
    }

    public function update(Request $request, $id){
        $customer = Customer::findOrFail($id);
        $customer->name = $request->input('name');
        $customer->email = $request->input('email');
        $customer->city_id = $request->input('city');
        $customer->dob = $request->input('date');

        if (isset($request->image)){
            $image = $request->image;
            $path = $image->store('images', 'public');
            $customer->image = $path;
        }
        $customer->save();
        Session::flash('success', 'Cập nhật khách hàng thành công');
        return redirect()->route('customers.index');
    }

    public function filterByCity(Request $request){
        $idCity = $request->input('city_id');

        $cityFilter = City::findOrFail($idCity);

        //lay ra tat ca customer cua cityFiler
        $customers = Customer::where('city_id', $cityFilter->id)->paginate(5);
        $totalCustomerFilter = count($customers);
        $cities = City::all();

        return view('customer.list', compact('customers', 'cities', 'totalCustomerFilter', 'cityFilter'));
    }

    public function search(Request $request){
        $keyword = $request->input('keyword');
        if (!$keyword){
            return redirect()->route('customers.index');
        }
        $customer = Customer::where('name', 'LIKE', '%' . $keyword ,'%')->paginate(3);
        $cities = City::all();
        return view('customer.list', compact('customer', 'cities'));
    }
}
