<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Event extends Model
{
    protected $fillable = ['Title', 'Text', 'DateOfCreation', 'Creator'];

    protected $dates = ['DateOfCreation'];

    public function creator()
    {
        return $this->belongsTo(User::class, 'Creator');
    }

    public function participants()
    {
        return $this->belongsToMany(User::class, 'event_user', 'event_id', 'user_id')->withTimestamps();
    }
}
