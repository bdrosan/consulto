<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.role.index', ['roles' => Role::paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
        ]);

        $role = Role::create(['name' => $request->name]);

        return redirect()->route('role.index')->with('success', 'Role created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::find($id);
        $rolePermissions = $role->permissions->pluck('name');
        $permissions = Permission::all()->pluck('name');
        return view('admin.role.view', compact('role', 'rolePermissions', 'permissions', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::find($id);
        return view('admin.role.edit', compact('role', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required',
        ]);

        $role = Role::find($id);

        $role->name = $request->name;

        $role->save();

        return redirect()->route('role.index')->with('success', 'Role updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Role::destroy($id))
            return 1;
    }

    public function storePermission(Request $request)
    {
        $request->validate([
            'permission' => ['required'],
        ]);

        $role = Role::find($request->id);
        $role->syncPermissions($request->permission);

        return redirect()->route('role.show', $request->id)->with('success', 'Permission granted');
    }
}