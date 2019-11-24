<?php

namespace App;

use App\Traits\DatePresenter;
use App\Facades\ProfileImageService;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use DatePresenter;

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

    public function remove()
    {
        ProfileImageService::removeFromStorage($this->avatar);

        optional($this->avatar)->delete();

        $this->delete();
    }
}
