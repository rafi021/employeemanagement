<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleStoreRequest;
use App\Http\Requests\RoleUpdateRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

use function GuzzleHttp\Promise\all;

class RoleController extends Controller
{
    /**
     * create a new instance of the class
     *
     * @return void
     */
    function __construct()
    {
        $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
        $this->middleware('permission:role-create', ['only' => ['create','store']]);
        $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $roles = Role::latest('id')->paginate(10);

        return view('admin.pages.Role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::select('id', 'name')->latest('id')->get();
        return view('admin.pages.Role.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleStoreRequest $request)
    {
        $role = Role::create([
            'name' => $request->input('name')
        ]);
        $role->syncPermissions($request->input('permissions'));

        $notification = [
            'alert_type' => 'success',
            'message' => 'Role created Successfully.'
        ];
        notify()->success($notification['message'],$notification['alert_type'],"topRight");
        return redirect()->route('roles.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permissions = Permission::select('id', 'name')->latest('id')->get();
        $rolepermissions = $role->permissions;
        return view('admin.pages.Role.create', compact('permissions', 'role', 'rolepermissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(RoleUpdateRequest $request, Role $role)
    {
        $role->update([
            'name' => $request->input('name')
        ]);
        $role->syncPermissions($request->input('permissions'));

        $notification = [
            'alert_type' => 'Success',
            'message' => 'Role Updated Successfully.'
        ];
        notify()->success($notification['message'],$notification['alert_type'],"topRight");
        return redirect()->route('roles.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
        $notification = [
            'alert_type' => 'success',
            'message' => 'Role Deleted Successfully.'
        ];
        notify()->success($notification['message'],$notification['alert_type'],"topRight");
        return redirect()->route('roles.index')->with($notification);
    }
}
