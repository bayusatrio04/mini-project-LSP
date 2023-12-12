<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
class CustomerController extends Controller
{

    public function create()
    {
        return view('admin.customers.create');
    }
    public function store(Request $request)
    {
        // Validasi data dari formulir
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'ages' => ['required', 'numeric', 'min:10', 'max:100'],
            'gender' => ['required', 'max:255'],
            'isadmin' => ['required'],
            'user_photo' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if ($request->hasFile('user_photo')) {
            $image = $request->file('user_photo');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('user_photos', $imageName, 'public');
        } else {
            $imagePath = null;
        }

        $user = User::create([
            'name' => $request->name,
            'ages' => $request->ages,
            'gender' => $request->gender,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'user_picture' => $imagePath,
        ]);

        return redirect()->route('customers.show', $user->id)->with('success', 'Customer created successfully!');
    }
    public function show($id)
    {

        $user = User::findOrFail($id);
        return view('admin.customers.show', compact('user'));
    }
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.customers.update', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'gender' => 'nullable|string',
            'ages' => 'nullable|integer|min:0',
            'user_picture' => 'nullable',

        ]);

        $data = $request->all();

        // Menghandle file gambar jika diupload
        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('customer_images', 'public');
            $data['image_path'] = $imagePath;
        }

        $user->update($data);

        return redirect()->route('customers.show', $id)->with('success', 'Customer updated successfully');
    }
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if ($user->user_picture) {

            Storage::disk('public')->delete($user->user_picture);
        }
        $user->delete();

        return redirect()->route('admin.customers')->with('success', 'Customer deleted successfully');
    }
}
