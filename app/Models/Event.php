<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
      'title',
      'text',
      'creator_id',
    ];

    public function creator(): BelongsTo
    {
      return $this->belongsTo(User::class, 'creator_id');
    }

    public function participant(): BelongsToMany
    {
      return $this->belongsToMany(User::class, 'user_events', 'event_id', 'user_id');
    }
}
