<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Input_desc extends Model
{
    protected $fillable = [
        'name',
        'description',
        'input_id',
        'labs_id',
    ];

    public function input(): BelongsTo
    {
        return $this->belongsTo(Input::class);
    }

    public function labs(): BelongsTo
    {
        return $this->belongsTo(Labs::class);
    }
}
