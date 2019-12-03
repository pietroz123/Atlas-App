<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'co_city';

    // Disable timestamps
    public $timestamps = false;

    // Relationships
    public function state() {
        return $this->belongsTo('App\State', 'co_state', 'co_state');
    }
}
