<?php

namespace App\Services\Images;

use App\Services\Images\ImageService;

class ProfileImageService extends ImageService
{
    public function manage($profile, $data)
    {
        $this->setDisk('profiles')
            ->setRelationship($profile->avatar())
            ->handle($profile->avatar, $data);
    }
}