<?php

namespace App\Services\User;

use App\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserService
{
    protected $user;
    protected $roles;
    protected $password;

    public function __construct()
    {
        $this->user = request()->route('user');
        $this->roles = request('role_id');
        $this->password = request('generate_password');
    }

    public function create(array $data)
    {
        return User::create($this->credentials($data))
            ->addRoles($this->roles);
    }

    public function update(array $data)
    {
        tap($this->user)->update($this->credentials($data))
            ->addRoles($this->roles);
    }

    private function credentials(array $data)
    {
        if ($this->password == 'auto_generate') {
            $data['password'] = Hash::make(Str::random(8));
        }

        if ($this->password == 'manually_generate') {
            $data['password'] = Hash::make($data['password']);
        }

        if ($this->password == 'do_not_change') {
            $data = Arr::except($data, ['password']);
        }

        return $data;
    }
}
