<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $fillable = [
        'email',
        'password',
        'phase_id', // Include phase_id to be mass assignable
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    // Relationship with Phase
    public function phase()
    {
        return $this->belongsTo(Phase::class, 'phase_id');
    }
}

