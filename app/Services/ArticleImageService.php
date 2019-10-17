<?php

namespace App\Services\Images;

use App\Services\Images\ImageService;

class ArticleImageService extends ImageService
{
    public function manage($article, $data)
    {
        $this->setDisk('articles')
            ->setRelationship($article->image())
            ->handle($article->image, $data);
    }
}
