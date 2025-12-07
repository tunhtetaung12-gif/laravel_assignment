<?php

namespace App\Repositories\User;

use App\Repositories\User\UserRepositoryInterface;

use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function index()
    {
        return User::get();
    }

    public function store($data)
    {
        return User::create($data);
    }

    public function show($id)
    {
        return User::find($id);
    }

    public function edit($id)
    {
        return User::find($id);
    }

    public function delete($id)
    {
        $user = User::find($id);
        return $user->delete();
    }
}
