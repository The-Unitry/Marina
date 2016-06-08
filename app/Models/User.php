<?php

namespace Navicula\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id', 'city', 'zip', 'address', 'phone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Return the user role.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    /**
     * Helper method to check if the user has a certain role.
     * 
     * @param $role
     * @return bool
     */
    public function is($role)
    {
        return $role === $this->role->name;
    }

    /**
     * Return true if the user is an admin.
     *
     * @return bool
     */
    public function isAdmin()
    {
        if (strpos($this->role->name, 'admin') !== false)
        {
            return true;
        }

        return false;
    }

    /**
     * Get all boats by the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function boats()
    {
        return $this->hasMany(Boat::class, 'user_id');
    }
}
