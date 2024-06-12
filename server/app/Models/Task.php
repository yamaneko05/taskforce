<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Task extends Model
{
    use HasFactory;

    protected $casts = [
        'status' => \App\Enums\TaskStatus::class
    ];

    public function project(): BelongsTo {
        return $this->belongsTo(Project::class);
    }

    public function parent(): BelongsTo {
        return $this->belongsTo(self::class);
    }

    public function children(): HasMany {
        return $this->hasMany(self::class);
    }

    public function users(): BelongsToMany {
        return $this->belongsToMany(User::class);
    }

    public function comments(): HasMany {
        return $this->hasMany(Comment::class);
    }

    public function taskable(): MorphTo {
        return $this->morphTo();
    }
}
