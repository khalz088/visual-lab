<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class lab_session extends Model
{
    protected $fillable = [
        'labs_id',
    ];

    public function labs(): BelongsTo
    {
        return $this->belongsTo(Labs::class);
    }

    public function input_ses(): HasMany
    {
        return $this->hasMany(Input::class);
    }
}
