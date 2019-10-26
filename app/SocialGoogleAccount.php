<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialGoogleAccount extends Model
{
    protected $fillable = [
        'user_id', 'provider_user_id', 'provider'
    ];

    /**
     * Retrieve associated Patient to Facebook account
     */
    public function user()
    {
        return $this->belongsTo(Patient::class);
    }
}
