<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function profil()
    {

        $data = [

            'user_login' => get_user_login()
        ];


        return view('customer.profil', $data);
    }

    public function update_profil(Request $request, $id)
    {

        $user = User::find($id);

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'age' => ['required', 'numeric', 'min:10', 'max:100'],
            'gender' => ['required', 'max:255'],
            'user_photo' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'email' => ['required', 'string', 'email', 'max:255',  Rule::unique('users')->ignore($user->id)],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ]);

        if ($validator->fails()) {
            return redirect('profil')
                ->withErrors($validator)
                ->withInput();
        }

        $attributes = [
            'name' => $request->name,
            'age' => $request->age,
            'gender' => $request->gender,
            'email' => $request->email,
        ];

        // Update the password if it's provided
        if ($request->filled('password')) {
            $attributes['password'] = Hash::make($request->password);
        }

        // Update the user's picture if a new one is uploaded
        if ($request->hasFile('user_photo')) {

            if ($user->user_picture) {
                Storage::disk('public')->delete($user->user_picture);
            }


            $image = $request->file('user_photo');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('user_photos', $imageName, 'public');
            $attributes['user_picture'] = $imagePath;
        }

        // Update the user record
        $user->update($attributes);

        return redirect('profil')->with('success', 'Profil berhasil diperbarui.');
    }
}
