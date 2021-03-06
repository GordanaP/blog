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
        return $this->hasRole('admin');
    }

    public function getIsAuthorAttribute()
    {
        return $this->hasRole('author');
    }

    public function getIsMemberAttribute()
    {
        return $this->roles->isEmpty();
    }

    public function addRoles($roles)
    {
        $this->roles()->sync($roles);
    }

    public function hasRole($role)
    {
        if (is_string($role)) {
            return $this->roles->contains('name', $role);
        }

        return (bool) $role->intersect($this->roles)->count();
    }

    public function scopeAuthors()
    {
        return static::with('roles', 'profile')->whereHas('roles', function($query){
            return $query->whereName('author');
        });
    }

    public function scopeAuthorsWithoutProfile()
    {
        return static::authors()->whereDoesntHave('profile')->get();
    }

}
