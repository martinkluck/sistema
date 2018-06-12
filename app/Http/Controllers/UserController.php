<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Exceptions\PermissionAlreadyExists;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id','ASC')->paginate();
        return view('admin.user.index',compact('users'));
    }

    /**
     * Show the form for creating new User.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /*if (! Gate::allows('users_manage')) {
            return abort(401);
        }*/
        $roles = Role::get()->pluck('name', 'name');

        return view('admin.user.create', compact('roles'));
    }
    /**
     * Store a newly created User in storage.
     *
     * @param  \App\Http\Requests\StoreUsersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*if (! Gate::allows('users_manage')) {
            return abort(401);
        }*/
        $user = User::create($request->all());
        $user->password = bcrypt($request->password);
        $user->save();
        $roles = $request->input('roles') ? $request->input('roles') : [];
        $user->assignRole($roles);

        return redirect()->route('users.index');
    }

    public function show(User $user){
        $user->load(['permissions','roles']);
        return view('admin.user.show',compact('user'));
    }

    //Roles y permisos

    public function roles(){
        $roles = Role::all();
        return view('admin.user.role',compact('roles'));
    }

    public function setRoles(Request $request){
        if($request->name!=null){
            $role = Role::create(['name' => $request->name,'status'=>1]);
        }
        return redirect()->route('roles', compact('role'))
            ->with('info', 'Entrada creada con éxito.');
    }

    public function permissions(){
        $permissions = Permission::all();
        $roles = Role::orderBy('name','ASC')->pluck('name','id');
        return view('admin.user.permission',compact('permissions','roles'));
    }

    public function setPermissions(Request $request){
        try{
            $permission = Permission::create(['name' => $request->name,'status'=>1]);
            $role = Role::findById($request->role_id);
            $permission->assignRole($role);
            return redirect()->route('permissions', compact('permission'))
                ->with('info', 'Entrada creada con éxito.');
        }catch (PermissionAlreadyExists $e){
            return redirect()->route('permissions')
                ->with('error', 'Ya existe un permiso con ese nombre.');
        }
    }
}
