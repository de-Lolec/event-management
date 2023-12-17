<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
      'title',
      'text',
      'creator_id',
      'participant_id'
    ];

    public function creator(): BelongsTo
    {
      return $this->belongsTo(User::class, 'creator_id');
    }

    public function participants(): BelongsTo
    {
      return $this->belongsTo(User::class, 'participant_id');
    }
}
