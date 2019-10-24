<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topic;
use App\Comment;
use App\User;

class TopicsController extends Controller
{
    public function index()
    {
        $data = ['topics' => null];
        $topics = Topic::orderBy('created_at','desc')->paginate(10);
        
        /*if(\Auth::check()) {
            $user = \Auth::user();
            $topics = $user->topics()->orderBy('created_at','desc')->paginate(1);
        */
            $data = [
                'topics' => $topics,
            ];
        return view('welcome', $data);
    }
    
    public function create()
    {
        return view('topics.create');
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:50',
            'content' => 'required|max:800',
        ]);

        $request->user()->topics()->create([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect('/');
    }
    
    public function destroy($id)
    {
        $topic = Topic::find($id);
        if (\Auth::id() === $topic->user_id)  {
            $topic->delete();
        }
        return redirect('/');
    }
    
    public function topicsdetails($id)
    {
        $topic = Topic::find($id);
        $comments = $topic->comments()->with(['user'])->get();
        
        $data = [
            
            'topic' => $topic,
            'comments' => $comments,
        ];
        
        return view('.topics.topicsdetails',$data);
    }
}
