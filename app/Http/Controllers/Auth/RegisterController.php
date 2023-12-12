<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }
    protected function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'age' => ['required', 'numeric', 'min:10', 'max:100'],
            'gender' => ['required', 'max:255'],
            'user_photo' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if ($validator->fails()) {
            return redirect('register')
                ->withErrors($validator)
                ->withInput();
        }


        if ($request->hasFile('user_photo')) {
            $image = $request->file('user_photo');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('user_photos', $imageName, 'public');
        } else {
            $imagePath = null; // Set a default value or handle the case where no image is provided
        }

        $user = User::create([
            'name' => $request->name,
            'ages' => $request->age,
            'gender' => $request->gender,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'user_picture' => $imagePath,
        ]);
        if ($user) {
            // Pendaftaran berhasil
            return redirect('login')->with('success', 'Registrasi berhasil! Silakan login.');
        } else {
            // Pendaftaran gagal
            return redirect('register')->with('error', 'Registrasi gagal. Silakan coba lagi.');
        }
    }
}
