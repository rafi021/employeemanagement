<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StateStoreRequest;
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;

class StateController extends Controller
{
    /**
     * create a new instance of the class
     *
     * @return void
     */
    function __construct()
    {
        $this->middleware('permission:state-list|state-create|state-edit|state-delete', ['only' => ['index','store']]);
        $this->middleware('permission:state-create', ['only' => ['create','store']]);
        $this->middleware('permission:state-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:state-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $states = State::latest('id')->with(['country'])->paginate(5)->withQueryString();
        if($request->has('search')){
            $states = State::where('name', 'like', "%{$request->search}%")
            ->with(['country'])->paginate(2);
        }
        return view('admin.pages.State.index', compact('states'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::select('id', 'name')->get();
        return view('admin.pages.State.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StateStoreRequest $request)
    {
        State::create($request->validated());
        $notification = [
            'alert_type' => 'Success',
            'message' => 'State Created Successfully!!!'
        ];
        notify()->success($notification['message'],$notification['alert_type'],"topRight");
        return redirect()->route('states.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function show(State $state)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function edit(State $state)
    {
        $countries = Country::select('id', 'name')->get();
        return view('admin.pages.State.edit', compact(
        'state',
        'countries'
    ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function update(StateStoreRequest $request, State $state)
    {
        $state->update($request->validated());
        $notification = [
            'alert_type' => 'Success',
            'message' => 'State Updated Successfully!!!'
        ];
        notify()->success($notification['message'],$notification['alert_type'],"topRight");
        return redirect()->route('states.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function destroy(State $state)
    {
        $state->delete();
        $notification = [
            'alert_type' => 'Success',
            'message' => 'State Deleted Successfully!!!'
        ];
        notify()->success($notification['message'],$notification['alert_type'],"topRight");
        return redirect()->route('states.index')->with($notification);
    }
}
