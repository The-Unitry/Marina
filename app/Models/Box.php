<?php

namespace Navicula\Models;

use Illuminate\Database\Eloquent\Model;

class Box extends Model
{
    /**
     * Get the scaffold where the box is located.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function scaffold()
    {
        return $this->belongsTo(Scaffold::class, 'scaffold_id');
    }
}
