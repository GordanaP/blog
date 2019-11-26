<?php

namespace App\Services\Tag;

use App\Utilities\DeleteModel;

class TagService extends DeleteModel
{
    private $model;
    private $tag;

    public function __construct()
    {
        $this->model = 'App\Tag';
        $this->tag = request()->route('tag') ?? request('ids');
    }

    public function delete()
    {
        $this->setModel($this->model)
            ->setInstance($this->tag)
            ->destroy();
    }
}
