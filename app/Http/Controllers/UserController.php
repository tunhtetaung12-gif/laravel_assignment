<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'password' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required',
            'gender' => 'required|string',
            'status' => 'nullable',
            'image' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();

            $request->image->move(public_path('userImages'), $imageName);

            $data = array_merge($data, ['image' => $imageName]);
        }


        $data['status'] = $request->has('status') ? true : false;
        $data['password'] = Hash::make($data['password']);
        User::create($data);

        return redirect()->route('users.index');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }


    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $data = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6',
            'address'  => 'required|string',
            'phone'    => 'required|string|max:20',
            'gender'   => 'required|string|in:male,female,other',
            'status'   => 'nullable',
            'image'    => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        } else {
            unset($data['password']);
        }

        if ($request->hasFile('image')) {
            if ($user->image && file_exists(public_path('userImages/' . $user->image))) {
                unlink(public_path('userImages/' . $user->image));
            }
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('userImages'), $imageName);
            $data['image'] = $imageName;
        }

        $data['status'] = $request->has('status') ? true : false;

        $user->update($data);

        return redirect()->route('users.index');
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('users.index');
    }
}
