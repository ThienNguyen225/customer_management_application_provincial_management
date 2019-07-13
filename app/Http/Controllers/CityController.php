<?php

namespace App\Http\Controllers;

use App\City;
use App\Http\Requests\CreateCityRequest;
use App\Http\Requests\EditCityRequest;
class CityController extends Controller
{
    public function index(){
        $cities = City::paginate(5);
        return view('cities.list', compact('cities'));
    }

    public function create(){
        return view('cities.create');
    }

    public function store(CreateCityRequest $request){
        $city = new City();
        $city->name = $request->input('name');
        $city->save();
        return redirect()->route('cities.index');
    }

    public function show($id){
        $city = City::findOrFail($id);
        return view('cities.show', compact('city'));
    }

    public function edit($id){
        $city = City::findOrFail($id);
        return view('cities.edit', compact('city'));
    }

    public function update(EditCityRequest $request ,$id){
        $city = City::findOrFail($id);
        $city->name = $request->input('name');
        $city->save();
        return redirect()->route('cities.index');
    }

    public function delete($id){
        $city = City::findOrFail($id);
        return view('cities.delete', compact('city'));
    }

    public function destroy($id){
        $city = City::findOrFail($id);
        $city->delete();
        return redirect()->route('cities.index');
    }
}