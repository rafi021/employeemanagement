<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CountryStoreRequest;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * create a new instance of the class
     *
     * @return void
     */
    function __construct()
    {
        $this->middleware('permission:country-list|country-create|country-edit|country-delete', ['only' => ['index','store']]);
        $this->middleware('permission:country-create', ['only' => ['create','store']]);
        $this->middleware('permission:country-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:country-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $countries = Country::latest('id')->paginate(5)->withQueryString();
        if($request->has('search')){
            $countries = Country::where('name', 'like', "%{$request->search}%")
                ->orWhere('country_code', 'like', "%{$request->search}%")->paginate(2);
        }
        return view('admin.pages.Country.index', compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.Country.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CountryStoreRequest $request)
    {
        Country::create($request->validated());
        $notification = [
            'alert_type' => 'Success',
            'message' => 'Country Created Successfully!!!'
        ];
        notify()->success($notification['message'],$notification['alert_type'],"topRight");
        return redirect()->route('countries.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        return view('admin.pages.Country.edit', compact('country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(CountryStoreRequest $request, Country $country)
    {
        $country->update($request->validated());
        $notification = [
            'alert_type' => 'Success',
            'message' => 'Country Updated Successfully!!!'
        ];
        notify()->success($notification['message'],$notification['alert_type'],"topRight");
        return redirect()->route('countries.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        $country->delete();
        $notification = [
            'alert_type' => 'Success',
            'message' => 'Country Deleted Successfully!!!'
        ];
        notify()->success($notification['message'],$notification['alert_type'],"topRight");
        return redirect()->route('countries.index')->with($notification);
    }
}
