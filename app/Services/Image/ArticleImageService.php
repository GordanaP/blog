<?php

namespace App\Services\Image;

use App\Services\Image\ImageService;

class ArticleImageService extends ImageService
{
    public function manage($article, $data)
    {
        $this->setDisk('articles')
            ->setRelationship($article->image())
            ->handle($article->image, $data);
    }
}
