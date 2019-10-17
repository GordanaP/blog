<?php

namespace App\Services\Image;

use App\Services\Image\ImageService;

class ProfileImageService extends ImageService
{
    public function manage($profile, $data)
    {
        $this->setDisk('profiles')
            ->setRelationship($profile->avatar())
            ->handle($profile->avatar, $data);
    }
}