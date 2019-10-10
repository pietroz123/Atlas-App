<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specialty extends Model
{
    // Disable timestamps
    public $timestamps = false;

    /**
     * The doctors that belong to the specialty.
     */
    public function doctors()
    {
        return $this->belongsToMany('App\Doctor');
    }
}
