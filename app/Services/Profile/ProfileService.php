<?php

namespace App\Services\Profile;

use App\User;
use App\Utilities\DeleteModel;
use App\Facades\ProfileImageService;

class ProfileService extends DeleteModel
{
    private $model;
    private $profile;
    private $user;
    private $avatar;

    public function __construct()
    {
        $this->model = 'App\Profile';
        $this->profile  = request()->route('profile') ?? request('ids');
        $this->user  = request()->route('user') ?? User::find(request('user_id'));
        $this->avatar = request('avatar');
    }

    public function create($data)
    {
        $profile = (new $this->model)->fill($data);

        $this->user->addProfile($profile);

        ProfileImageService::manage($profile, $this->avatar);

        return $profile;
    }

    public function update($data)
    {
        tap($this->profile)->update($data);

        ProfileImageService::manage($this->profile, $this->avatar);
    }

    public function delete()
    {
        $this->setModel($this->model)
            ->setInstance($this->profile)
            ->destroy();
    }
}
