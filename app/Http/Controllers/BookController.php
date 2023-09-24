<?php

namespace App\Http\Controllers;

use App\Http\Handlers\BookHandler;
use App\Http\Requests\BookRequest;
use App\Http\Resources\BookResource;
use App\Models\Book;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Log;

class BookController extends Controller
{
    function index(Request $request): AnonymousResourceCollection
    {
        return BookResource::collection(Book::paginate(10));
    }

    function store(BookRequest $request): JsonResponse
    {
        try {
            $book = BookHandler::storeBook($request);

            return response()->json([
                'message' => 'Success!',
                'book_uuid' => $book->uuid,
            ], 200);
        } catch (\Exception $e) {
            $context = [
                'message' => $e->getMessage(),
                'trace' => $e->getTrace(),
            ];

            Log::error('Failed to create a Book', $context);

            return response()->json($context, 500);
        }
    }

    function get(Book $book): BookResource
    {
        return new BookResource($book);
    }

    function search(Request $request)
    {
        $books = Book::search(trim($request->get('search')) ?? '')
            ->query(function ($query) {
                $query->join('details', 'books.id', 'details.detailable_id')
                    ->select(['books.uuid', 'details.title', 'details.publisher', 'details.author'])
                    ->orderBy('books.id', 'DESC');
            })
            ->paginate(10);

        return response()->json(data: $books, status: 200);
    }
}
