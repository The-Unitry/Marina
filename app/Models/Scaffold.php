<?php

namespace Navicula\Models;

use Illuminate\Database\Eloquent\Model;

class Scaffold extends Model
{
    protected $fillable = ['code', 'on_land'];

    /**
     * Get the boxes on this scaffold.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function boxes()
    {
        return $this->hasMany(Box::class, 'scaffold_id');
    }
}
