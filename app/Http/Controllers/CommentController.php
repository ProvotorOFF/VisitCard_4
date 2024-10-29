<?php

namespace App\Http\Controllers;

use App\Http\Requests\Comments\StoreRequest;
use App\Models\Brand;
use App\Models\Car;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{


    public function store(StoreRequest $request)
    {
        $model = $request->isCommentable();
        $model->comments()->save(Comment::make($request->only('text')));
        return redirect()->back();
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->back();
    }
}
