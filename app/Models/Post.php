<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'phase_id',
        'type',
        'content',
        'title',
        'description',
        'location',
        'latitude',
        'longitude',
        'event_time',
        'event_date',
        'cover_image',
        'price',
        'tags', // Added tags to fillable attributes
    ];

    // Define the relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function phase()
    {
        return $this->belongsTo(Phase::class);
    }

    // Specify which attributes should be cast to date objects
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'event_date' => 'date', // Cast event_date as a date object
    ];
}
