<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Section extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function project(): BelongsTo {
        return $this->belongsTo(Project::class);
    }

    public function tasks(): MorphMany {
        return $this->morphMany(Task::class, 'taskable');
    }
}
