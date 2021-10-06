<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('app.users.index');
        $users=User::all();
        return view('users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('app.users.create');
        $roles = Role::all();

        return view('users.form',compact('roles'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Gate::authorize('app.users.create');

        $this->validate($request,[
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users',
            'phone' => 'nullable|max:100|unique:users',
            'degree' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:500',
            'dob' => 'nullable|date',
            'role' => 'required',
            'password' => 'required|confirmed|min:6',
            'avatar' => 'nullable|image',
        ]);
        $user = User::create([
            'role_id' => $request->role,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'degree' => $request->degree,
            'description' => $request->description,
            'dob' => $request->dob,
            'password' => Hash::make($request->password),
            'status' => $request->filled('status')

        ]);
        if ($request->hasFile('avatar')){
            $user->addMedia($request->avatar)->toMediaCollection('avatar');
        }

        notify()->success('User Successfully Added.', 'Added');
        return redirect()->route('app.users.index');
        //return $request;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        Gate::authorize('app.users.index');
        return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        Gate::authorize('app.users.edit');
        $roles = Role::all();

        return view('users.form',compact('roles','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        Gate::authorize('app.users.edit');
        $this->validate($request,[
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'role' => 'required',
            'phone' => 'nullable|max:100|unique:users,phone,'.$user->id,
            'degree' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:500',
            'dob' => 'nullable|date',
            'password' => 'nullable|confirmed|min:6',
            'avatar' => 'nullable|image',
        ]);
        $user->update([
            'role_id' => $request->role,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'degree' => $request->degree,
            'description' => $request->description,
            'dob' => $request->dob,
            'password' =>isset($request->password) ? Hash::make($request->password):$user->password,
            'status' => $request->filled('status')

        ]);
        if ($request->hasFile('avatar')){
            $user->addMedia($request->avatar)->toMediaCollection('avatar');
        }

        notify()->success('User updated.', 'Updated');
        return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        Gate::authorize('app.users.destroy');
        $user->delete();
        notify()->success('User Delete.','Success');
        return back();
    }
}
