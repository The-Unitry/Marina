<?php

namespace Navicula\Models;

use Illuminate\Database\Eloquent\Model;

class Box extends Model
{
    protected $fillable = ['id','depth','length','width', 'scaffold_id'];

    /**
     * Get the scaffold where the box is located.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function scaffold()
    {
        return $this->belongsTo(Scaffold::class, 'scaffold_id');
    }

    /**
     * Get the full box code, prefixed by the scaffold code.
     *
     * @return string
     */
    public function getFullCode()
    {
        return $this->scaffold->code . $this->id;
    }
}
