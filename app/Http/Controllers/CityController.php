<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cities = City::all();
        return response()->view('a4.cities.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->view('a4.cities.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:45|string'
        ], [
            'name.required' => 'Enter city name please!'
        ]);
        $isSaved = City::create([
            'name' => $request->name
        ]);
        session()->flash('alert-type', $isSaved ? 'success' : 'danger');
        session()->flash('message', $isSaved ? 'Created Successfully!' : 'Created Failed!');
        return redirect()->route('cities.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(City $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(City $city)
    {
        return response()->view('a4.cities.edit', compact('city'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, City $city)
    {
        $request->validate([
            'name' => 'required|min:3|max:45|string'
        ], [
            'name.required' => 'Enter city name please!'
        ]);
        $isSaved = City::find($city->id)->update([
            'name' => $request->name
        ]);
        session()->flash('alert-type', $isSaved ? 'success' : 'danger');
        session()->flash('message', $isSaved ? 'Updated Successfully!' : 'Updated Failed!');
        return redirect()->route('cities.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(City $city)
    {
        $isSaved=$city->delete();
        session()->flash('alert-type', $isSaved ? 'success' : 'danger');
        session()->flash('message', $isSaved ? 'Deleted Successfully!' : 'Deleted Failed!');
        return redirect()->route('cities.index');
    }
}