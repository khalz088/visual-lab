<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Command extends Model
{
    protected $fillable = [
        'name',
        'input_id',
    ];

    public function input(): BelongsTo
    {
        return $this->belongsTo(Input::class);
    }
}
