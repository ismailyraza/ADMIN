<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'group_id', 'phase_id', 'message'];

    // Define relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function phase()
    {
        return $this->belongsTo(Phase::class);
    }

    // Optional: Create a mutator for the message attribute to trim whitespace
    public function setMessageAttribute($value)
    {
        $this->attributes['message'] = trim($value);
    }

    // Optional: Create an accessor to format the message if needed
    public function getMessageAttribute($value)
    {
        return nl2br(e($value)); // Convert new lines to <br> tags and escape HTML
    }

    // Optional: Create a scope to filter messages by user
    public function scopeByUser($query, $userId)
    {
        return $query->where('user_id', $userId);
    }
}
