<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Team extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function projects(): MorphMany {
        return $this->morphMany(Project::class, 'projectable');
    }

    public function users(): BelongsToMany {
        return $this->belongsToMany(User::class);
    }
}
