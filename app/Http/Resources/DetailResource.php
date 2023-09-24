<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'isbn' => $this->isbn,
            'title' => $this->title,
            'description' => $this->description,
            'publisher' => $this->publisher,
            'author' => $this->author,
            'language' => $this->language,
            'stock' => $this->stock,
            'published_at' => $this->published_at,
        ];
    }
}
