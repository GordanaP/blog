<?php

namespace App\Services\Images;

use Storage;

abstract class ImageService
{
    private $disk;
    private $relationship;
    private $imagePathName = 'path';

    protected abstract function manage($model, $data);

    public function getUrl($image = null)
    {
        $pathName = $this->imagePathName;

        return Storage::url(optional($image)->$pathName);
    }

    public function removeStoragePath($image = null)
    {
        $pathName = $this->imagePathName;

        Storage::delete(optional($image)->$pathName);
    }

    protected function setDisk($disk)
    {
        $this->disk = $disk;

        return $this;
    }

    protected function setRelationship($relationship)
    {
        $this->relationship = $relationship;

        return $this;
    }

    protected function handle($image, $data = null)
    {
        if($data) {
            $image == null ? $this->add($data) : $this->update($image, $data);
        }
    }

    private function update($image, $data)
    {
        $this->removeStoragePath($image);

        $this->save($image, $data);
    }

    private function save($image, $data)
    {
        $pathName = $this->imagePathName;

        $image->$pathName = $this->makeStoragePath($data);

        $image->save();
    }

    private function add($data)
    {
        $this->relationship->create($this->path($data));
    }

    protected function path($data)
    {
        return [
            $this->imagePathName => $this->makeStoragePath($data)
        ];
    }

    private function makeStoragePath($data = null)
    {
        return optional($data)->store($this->disk);
    }
}