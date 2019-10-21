<?php

namespace App;

use App\Facades\ProfileImageService;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['first_name', 'last_name', 'biography'];

    public function getFullNameAttribute()
    {
        return ucfirst($this->first_name) .' '.ucfirst($this->last_name);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function avatar()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function hasAvatar()
    {
        return $this->avatar;
    }

    public function saveChanges(array $data)
    {
        $this->update($data);

        ProfileImageService::manage($this, request('avatar'));
    }

    public function remove()
    {
        ProfileImageService::removeFromStorage($this->avatar);

        optional($this->avatar)->delete();

        $this->delete();
    }
}
