<?php

namespace App\Http\Handlers;

use App\Http\Requests\BookRequest;
use App\Models\Book;

class BookHandler
{
    /**
     * Handling book creation.
     * 
     * @param BookRequest $request Validated data.
     * 
     * @return object New Book model.
     */
    static function storeBook(BookRequest $request): object
    {
        $book = Book::create([
            'uuid' => $request->uuid,
        ]);

        $detail = $book->detail()->create([
            'isbn' => $request->isbn,
            'title' => $request->title,
            'description' => $request->description,
            'publisher' => $request->publisher,
            'author' => $request->author,
            'language' => $request->language,
            'stock' => $request->stock,
            'published_at' => $request->published_at,
        ]);

        return $book;
    }
}