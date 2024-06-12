<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $timestamps = false;

    protected $casts = [
        'color' => \App\Enums\ProjectColor::class
    ];

    public function projectable(): MorphTo {
        return $this->morphTo();
    }

    public function sections(): HasMany {
        return $this->hasMany(Section::class);
    }

    public function tasks(): MorphMany {
        return $this->morphMany(Task::class, 'taskable');
    }
}
