<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('app.roles.index');
        $roles = Role::all();
        return view('role.roles', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('app.roles.create');
        $modules = Module::all();
        return view('role.form', compact('modules'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Gate::authorize('app.roles.create');
        $this->validate($request, [
            'name'=> 'required|unique:roles|max:50',
            'permissions.*'=>'integer',
            'permissions'=>'required | array'

            ]);
        Role::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),

        ])->permissions()->sync($request->input('permissions'),[]);
        notify()->success('Role Added.','Success');
        return redirect()->route('app.roles.index');
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
        Gate::authorize('app.roles.edit');
        $modules = Module::all();
        return view('role.form', compact('modules','role'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        Gate::authorize('app.roles.edit');
        $role->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),

        ]);
        $role->permissions()->sync($request->input('permissions'));
        notify()->success('Role update.','Success');
        return redirect()->route('app.roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        Gate::authorize('app.roles.destroy');
        if ($role->deletable){
            $role->delete();
            notify()->success('Role Delete.','Success');
        }else{
            notify()->error('Role Delete.','Error');
        }
        return back();
    }
}
