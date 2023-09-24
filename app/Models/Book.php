<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Laravel\Scout\Searchable;

class Book extends Model
{
    use HasFactory, Searchable;

    protected $fillable = [
        'uuid',
    ];

    function detail() : MorphOne
    {
        return $this->morphOne(Detail::class, 'detailable');    
    }

    /**
     * Get the indexable data array for the model.
     *
     * @return array<string, mixed>
     */
    public function toSearchableArray(): array
    {
        return [
            'uuid' => $this->uuid,
        ];
    }

    /**
     * Modify the query used to retrieve models when making all of the models searchable.
     */
    protected function makeAllSearchableUsing(Builder $query): Builder
    {
        return $query->with('detail');
    }
}
