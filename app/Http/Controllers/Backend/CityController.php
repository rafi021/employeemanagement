<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CityStoreRequest;
use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * create a new instance of the class
     *
     * @return void
     */
    function __construct()
    {
        $this->middleware('permission:city-list|city-create|city-edit|city-delete', ['only' => ['index','store']]);
        $this->middleware('permission:city-create', ['only' => ['create','store']]);
        $this->middleware('permission:city-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:city-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cities = City::latest('id')->with(['state'])->paginate(5)->withQueryString();
        if($request->has('search')){
            $cities = City::where('name', 'like', "%{$request->search}%")
            ->with(['state'])->paginate(2);
        }
        return view('admin.pages.City.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states = State::latest('id')->get();
        return view('admin.pages.City.create', compact('states'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CityStoreRequest $request)
    {
        City::create($request->validated());
        $notification = [
            'alert_type' => 'Success',
            'message' => 'City Created Successfully!!!'
        ];
        notify()->success($notification['message'],$notification['alert_type'],"topRight");
        return redirect()->route('cities.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        $states = State::latest('id')->get();
        return view('admin.pages.City.edit', compact(
            'city',
            'states'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(CityStoreRequest $request, City $city)
    {
        $city->update($request->validated());
        $notification = [
            'alert_type' => 'Success',
            'message' => 'City Updated Successfully!!!'
        ];
        notify()->success($notification['message'],$notification['alert_type'],"topRight");
        return redirect()->route('cities.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        $city->delete();
        $notification = [
            'alert_type' => 'Success',
            'message' => 'City Deleted Successfully!!!'
        ];
        notify()->success($notification['message'],$notification['alert_type'],"topRight");
        return redirect()->route('cities.index')->with($notification);
    }
}
