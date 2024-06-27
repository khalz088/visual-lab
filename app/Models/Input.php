<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Input extends Model
{
    protected $fillable = [
        'type',
        'labs_id',
        'lab_session_id',
    ];

    public function labs(): BelongsTo
    {
        return $this->belongsTo(Labs::class);
    }

    public function labSession(): BelongsTo
    {
        return $this->belongsTo(lab_session::class);
    }

    public function comd(): HasMany
    {
        return $this->hasMany(Command::class);
    }

    public function input_desc(): HasOne
    {
        return $this->hasOne(Input_desc::class);
    }
}
