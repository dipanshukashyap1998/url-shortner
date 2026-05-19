<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Scout\Searchable;


class Company extends Model
{
        use Searchable;

    protected $fillable = [
        'name',
        'email',
        'address',
        'phone',
        'user_id',
    ];

    public function shortUrls(): HasMany
    {
        return $this->hasMany(ShortUrl::class);
    }

     public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
        ];
    }
}
