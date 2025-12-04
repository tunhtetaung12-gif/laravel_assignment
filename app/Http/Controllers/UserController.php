<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        $request->validate([
            'name'      => 'required|string|max:255',
            'email'     => 'required|email|unique:users,email',
            'password'  => 'required|string|min:6',
            'address'   => 'nullable|string',
            'phone'     => 'nullable|string|max:50',
            'gender'    => 'nullable|string',
            'image'     => 'nullable|image|max:2048',
            'status'    => 'nullable',
        ]);

        $data = $request->only(['name', 'email', 'address', 'phone', 'gender']);
        $data['password'] = bcrypt($request->password);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('userImages'), $imageName);
            $data['image'] = $imageName;
        }

        $data['status'] = $request->has('status') ? true : false;

        User::create($data);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'      => 'required|string|max:255',
            'email'     => 'required|email|unique:users,email',
            'password'  => 'required|string|min:6',
            'address'   => 'nullable|string',
            'phone'     => 'nullable|string|max:50',
            'gender'    => 'nullable|string',
            'image'     => 'nullable|image|max:2048',
            'status'    => 'nullable',
        ]);

        $data = $request->all();


        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('userImages'), $imageName);
            $data['image'] = $imageName;
        }

        $data['status'] = $request->has('status') ? true : false;

        User::create($data);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }
}
