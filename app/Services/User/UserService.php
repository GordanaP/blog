<?php

namespace App\Services\User;

use App\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserService
{
    protected $user;
    protected $userIds;
    protected $roles;
    protected $generate_password;
    protected $password;

    public function __construct()
    {
        $this->user = request()->route('user');
        $this->userIds = request('ids');
        $this->roles = request('role_id');
        $this->generate_password = request('generate_password');
        $this->password = request('password');
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

    public function delete()
    {
        if (is_array($this->userIds)) {
            User::destroy($this->userIds);
        } else {
            $this->user->delete();
        }
    }

    private function credentials(array $data)
    {
        if ($this->generate_password == 'auto_generate') {
            $data['password'] = Hash::make(Str::random(8));
        }

        if ($this->generate_password == 'do_not_change' || $this->password == null) {
            $data = Arr::except($data, 'password');
        }

        ! is_null($this->password) ? $data['password'] = Hash::make($this->password) : '';

        return $data;
    }
}
