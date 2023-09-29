<?php

namespace App\Http\Handlers;

use App\Http\Requests\BookRequest;
use App\Models\Book;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class BookHandler
{
    /**
     * Handling book creation.
     * 
     * @param BookRequest $request Validated data.
     * 
     * @return Book
     */
    static function storeBook(BookRequest $request): Book
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

    /**
     * Handling book searching.
     * 
     * @param string $search
     * 
     * @return LengthAwarePaginator
     */
    static function searchBook(string $search): LengthAwarePaginator
    {
        return Book::search(trim($search))
            ->paginate(10);
    }
}