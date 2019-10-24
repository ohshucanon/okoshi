<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Topic;
use App\Comment;

class CommentsController extends Controller
{
    public function store(Request $request, $topicId)
    {
        $this->validate($request, [
            'comment' => 'required|max:500',
        ]);
        $user = $request->user();
        $topic = Topic::find($topicId);
        $topic->comments()->create([
            'comment' => $request->comment,
            'user_id' => $user->id,
        ]);

        return back();
    }
    
     public function destroy($id)
    {
        $comment = Comment::find($id);
        if (\Auth::id() === $comment->user_id)  {
            $comment->delete();
        }
        return back();
    }
}
