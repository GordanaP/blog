<?php

namespace App\Services\Role;

use App\Utilities\DeleteModel;

class RoleService extends DeleteModel
{
    private $model;
    private $role;

    public function __construct()
    {
        $this->model = 'App\Role';
        $this->role = request()->route('role') ?? request('ids');
    }

    public function delete()
    {
        $this->setModel($this->model)
            ->setInstance($this->role)
            ->destroy();
    }
}
