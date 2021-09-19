<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Auth::user()->hasRole('super admin')
            ? User::paginate(10)
            : User::whereKeyNot(Auth::id())->whereHas("roles", function ($user) {
                $user->whereNotIn("name", ["super admin"]);
            })->paginate(10);

        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('user.index')->with('success', 'User created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $roles = Role::get();
        $userRoles = $user->getRoleNames();
        return view('admin.user.view', compact('user', 'roles', 'userRoles', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.user.edit', compact('user', 'id'));
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
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);

        if ($request->password) {
            $request->validate([
                'password' => ['confirmed', Rules\Password::defaults()],
            ]);
        }

        $user = User::find($id);

        $user->name = $request->name;
        $user->email  = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();

        return redirect()->route('user.index')->with('success', 'User Updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (User::destroy($id))
            return 1;
    }

    public function storeRole(Request $request)
    {
        $request->validate([
            'role' => ['required'],
        ]);

        $user = User::find($request->id);
        $user->syncRoles($request->role);

        return redirect()->route('user.show', $request->id)->with('success', 'Role assigned');
    }
}