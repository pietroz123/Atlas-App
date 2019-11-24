<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    // Relationships
    public function city() {
        return $this->belongsTo('App\City', 'co_city', 'co_city');
    }
}
