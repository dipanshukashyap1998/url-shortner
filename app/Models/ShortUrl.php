<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ShortUrl extends Model
{
    protected $fillable = [
        'company_id',
        'code',
        'original_url',
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}

