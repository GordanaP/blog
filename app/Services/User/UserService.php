<?php

namespace App\Services\User;

use App\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use App\Utilities\DeleteModel;
use Illuminate\Support\Facades\Hash;

class UserService extends DeleteModel
{
    protected $user;
    protected $roles;
    protected $generate_password;
    protected $password;

    public function __construct()
    {
        $this->model = 'App\User';
        $this->user = request()->route('user') ?? request('ids');
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

    // public function delete()
    // {
    //     is_array($this->user) ? User::destroy($this->user) : $this->user->delete();
    // }

    public function delete()
    {
        $this->setModel($this->model)
            ->setInstance($this->user)
            ->destroy();
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
