<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * create a new instance of the class
     *
     * @return void
     */
    function __construct()
    {
        $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index','store']]);
        $this->middleware('permission:user-create', ['only' => ['create','store']]);
        $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::latest('id')->paginate(5)->withQueryString();
        if($request->has('search')){
            $users = User::where('username', 'like', "%{$request->search}%")
                ->orWhere('email', 'like', "%{$request->search}%")->paginate(2);
        }
        return view('admin.pages.Users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::select('id', 'name')->latest('id')->get();
        return view('admin.pages.Users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        $user = User::create([
            'username' => $request->username,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->assignRole($request->input('roles'));

        $notification = [
            'alert_type' => 'Success',
            'message' => 'User Created Successfully!!!'
        ];
        notify()->success($notification['message'],$notification['alert_type'],"topRight");
        return redirect()->route('users.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::select('id', 'name')->latest('id')->get();
        $userRole = $user->roles->all();
        return view('admin.pages.Users.edit', compact(
            'user',
            'roles',
            'userRole'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        $user->update([
            'username' => $request->username,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
        ]);

        $user->assignRole($request->input('roles'));

        if($request->password){
            $user->update([
                'password' => Hash::make($request->password)
            ]);
        }
        $notification = [
            'alert_type' => 'Success',
            'message' => 'User Updated Successfully!!!'
        ];
        notify()->info($notification['message'],$notification['alert_type'],"topRight");
        return redirect()->route('users.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if(Auth::user()->id == $user->id){
            $notification = [
                'alert_type' => 'Success',
                'message' => "You Can't Deleted this account!!!"
            ];
            notify()->error($notification['message'],$notification['alert_type'],"topRight");
            return redirect()->route('users.index')->with($notification);
        }
        $user->delete();
        $notification = [
            'alert_type' => 'Success',
            'message' => 'User Deleted Successfully!!!'
        ];
        notify()->error($notification['message'],$notification['alert_type'],"topRight");
        return redirect()->route('users.index')->with($notification);
    }
}
