<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AuthorController extends Controller
{
    
    public function showAllAuthors()
    {
        return response()->json(Author::all());
    }

    public function showOneAuthor($id)
    {
        return response()->json(Author::find($id));
    }
    //Autho crud ops
    public function create(Request $request)
    {
        $author = Author::create($request->all());

        return response()->json($author, 201);
    }

    public function update($id, Request $request)
    {
        $author = Author::findOrFail($id);
        $author->update($request->all());

        return response()->json($author, 200);
    }

    public function delete($id)
    {
        Author::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }
        
    // CRUD Books
    public function createBook($author_id, Request $request)
    {
        $author = Author::find($author_id);
        $book = Book::create([
            'title' => $request->title,
            'author_id' => $author->id
        ]);
        return response()->json($book, 201);
    }
    public function updateBook($author_id, $book_id, Request $request)
    {
        $author = Author::find($author_id);
        $book = $author->books
                       ->where('id', '=', $book_id)
                       ->first()
                       ->update($request->all());
        return response()->json($book, 200);
    }
    public function deleteBook($author_id, $book_id)
    {
        $author = Author::find($author_id);
        $book = $author->books
                       ->where('id', '=', $book_id)
                       ->first()
                       ->delete();
        return response('Book Deleted Successfully', 200);
    }
    //Crud ops for comment
    public function createComment($book_id, Request $request)
    {
        $book = Book::find($book_id);
        $comment = Comment::create([
            'comment' => $request->comment,
            'book_id' => $book->id
        ]);
        return response()->json($comment, 201);
    }
    //Find books operations
    public function showAllBooks()
    {
        try {
        $author = Author::findOrFail($author_id);
        } catch(ModelNotFoundException $e) {
        return response('Author not found', 404);
        }
        $books = Book::all();
        return response()->json($books, 200);
    }
    public function showAllBooksFromAuthor($author_id)
    {
        $author = Author::find($author_id);
        $books = $author->books;
        return response()->json($books, 200);
    }
    public function showOneBook($author_id, $book_id)
    {
        $author = Author::find($author_id);
        $book = $author->books
                       ->where('id', '=', $book_id)
                       ->first();
        return response()->json($book, 200);
    }
    //Find Comments
    public function showAllComments()
    {
        $comments = Comment::all();
        return response()->json($comments, 200);
    }
    public function showAllCommentsFromBook($author_id)
    {
        $book = Book::find($book_id);
        $comments = $book->comments;
        return response()->json($comments, 200);
    }
    public function showOneComment($book_id, $comment_id)
    {
        $book = Book::find($book_id);
        $comment = $book->comments
                       ->where('id', '=', $comment_id)
                       ->first();
        return response()->json($comment, 200);
    }

}