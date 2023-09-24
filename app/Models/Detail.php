<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Laravel\Scout\Searchable;

class Detail extends Model
{
    use HasFactory, Searchable;

    protected $fillable = [
        'isbn',
        'title',
        'description',
        'publisher',
        'author',
        'language',
        'stock',
        'published_at',
    ];

    function detailable() : MorphTo
    {
        return $this->morphTo();
    }

    /**
     * Get the indexable data array for the model.
     *
     * @return array<string, mixed>
     */
    public function toSearchableArray(): array
    {
        return [
            'title' => $this->title,
        ];
    }
}
