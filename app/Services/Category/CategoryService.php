<?php

namespace App\Services\Category;

use App\Utilities\DeleteModel;

class CategoryService extends DeleteModel
{
    private $model;
    private $category;

    public function __construct()
    {
        $this->model = 'App\Category';
        $this->category = request()->route('category') ?? request('ids');
    }

    public function delete()
    {
        $this->setModel($this->model)
            ->setInstance($this->category)
            ->destroy();
    }
}
