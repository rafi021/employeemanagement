<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\PermissionStoreRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{

    /**
     * create a new instance of the class
     *
     * @return void
     */
    function __construct()
    {
        $this->middleware('permission:permission-list|permission-create|permission-edit|permission-delete', ['only' => ['index','store']]);
        $this->middleware('permission:permission-create', ['only' => ['create','store']]);
        $this->middleware('permission:permission-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:permission-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $permissions = Permission::latest('id')->paginate(10);
        if($request->has('search')){
            $permissions = Permission::where('name', 'like', "%{$request->search}%")->paginate(4);
        }
        return view('admin.pages.Permission.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.Permission.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PermissionStoreRequest $request)
    {
        Permission::create($request->validated());
        $notification = [
            'alert_type' => 'Success',
            'message' => 'Permission Created Successfully!!!'
        ];
        notify()->success($notification['message'],$notification['alert_type'],"topRight");
        return redirect()->route('permissions.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        return view('admin.pages.Permission.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(PermissionStoreRequest $request, Permission $permission)
    {
        $permission->update($request->validated());
        $notification = [
            'alert_type' => 'Success',
            'message' => 'Permission Updated Successfully!!!'
        ];
        notify()->success($notification['message'],$notification['alert_type'],"topRight");
        return redirect()->route('permissions.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();
        $notification = [
            'alert_type' => 'Success',
            'message' => 'Permission Deleted Successfully!!!'
        ];
        notify()->success($notification['message'],$notification['alert_type'],"topRight");
        return redirect()->route('permissions.index')->with($notification);
    }
}
