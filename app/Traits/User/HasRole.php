<?php

namespace App\Traits\User;

use App\Role;

trait HasRole
{
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function isMe($user)
    {
        return $this->id == $user->id;
    }

    public function getIsAdminAttribute()
    {
        return $this->roles->pluck('name')->contains('admin');
    }

    public function getIsAuthorAttribute()
    {
        return $this->roles->pluck('name')->contains('author');
    }

    public function getIsMemberAttribute()
    {
        return $this->roles->isEmpty();
    }

    public function addRoles($roles)
    {
        $this->roles()->sync($roles);
    }

    public static function getAuthors()
    {
        return static::with('profile')->whereHas('roles', function($query) {
            return $query->where('name', 'author');
        })->get();

    }
}
