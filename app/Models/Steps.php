<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Steps extends Model
{
    protected $fillable = [
        'name',
        'description',
        'labs_id',
    ];

    public function labs(): BelongsTo
    {
        return $this->belongsTo(Labs::class);
    }
}
