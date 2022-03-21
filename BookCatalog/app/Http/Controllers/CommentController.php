<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    
    public function showAllComments()
    {
        return response()->json(Comment::all());
    }

    public function showOneComment($id)
    {
        return response()->json(Comment::find($id));
    }

    public function create(Request $request)
    {
        $comment = Comment::create($request->all());

        return response()->json($comment, 201);
    }

    public function update($id, Request $request)
    {
        $comment = Comment::findOrFail($id);
        $comment->update($request->all());

        return response()->json($comment, 200);
    }

    public function delete($id)
    {
        Comment::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }
}