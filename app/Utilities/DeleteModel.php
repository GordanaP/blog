<?php

namespace App\Utilities;

abstract class DeleteModel
{
    private $model;
    private $instance;

    protected abstract function delete();

    protected function setModel($model)
    {
        $this->model = $model;

        return $this;
    }

    protected function setInstance($instance)
    {
        $this->instance = $instance;

        return $this;
    }

    protected function destroy()
    {
        is_array($this->instance)
            ? $this->removeMany($this->instance)
            : $this->instance->remove();
    }

    private function removeMany($instance)
    {
        $this->model::findMany($instance)->map->remove();
    }
}

