<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Profile\UpdatePasswordRequest;
use App\Http\Requests\Profile\UpdateProfileRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        Gate::authorize('app.profile.update');
        return view('profile.index');
    }

    public function update(Request $request)
    {
        // Get logged in user
        $user = Auth::user();
        // Update user info
         $this->validate($request,[
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email,'. Auth::id(),
            'avatar' => 'nullable|image',
            'phone' => 'nullable|max:100|unique:users,phone,'.$user->id,
            'degree' => 'nullable|string|max:255',
            'specialists' => 'nullable|string|max:500',
            'dob' => 'nullable|date',
        ]);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'degree' => $request->degree,
            'specialists' => $request->specialists,
            'dob' => $request->dob,
            'weight' => $request->weight,
        ]);
        // upload images
        if ($request->hasFile('avatar')) {
            $user->addMedia($request->avatar)->toMediaCollection('avatar');
        }
        // return with success msg
        notify()->success('Profile Successfully Updated.', 'Updated');
        return redirect()->back();
    }

    public function changePassword()
    {
        Gate::authorize('app.profile.password');
        return view('profile.security');
    }

    public function updatePassword(Request $request)
    {
        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->current_password, $hashedPassword)) {
            if (!Hash::check($request->password, $hashedPassword)) {
                Auth::user()->update([
                    'password' => Hash::make($request->password)
                ]);
                Auth::logout();
                notify()->success('Password Successfully Changed.', 'Success');
                return redirect()->route('login');
            } else {
                notify()->warning('New password cannot be the same as old password.', 'Warning');
            }
        } else {
            notify()->error('Current password not match.', 'Error');
        }
        return redirect()->back();

        //dd($hashedPassword);
    }
}
