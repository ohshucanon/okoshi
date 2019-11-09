<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topic;
use App\Comment;
use App\User;

class TopicsController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('topics_genre');
        if ($search)
        {
            $topics = Topic::where('topics_genre', 'LIKE', "%$search%")->orderBy('id', 'desc')->paginate(10);
        }else{
        
        $data = ['topics' => null];
        $topics = Topic::orderBy('created_at','desc')->paginate(10);
        
        }
        
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
            'topics_genre' => 'required',
        ]);

        $request->user()->topics()->create([
            'title' => $request->title,
            'content' => $request->content,
            'topics_genre' => $request->topics_genre,
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
        $comments = $topic->comments()->with(['user'])->orderBy('created_at', 'desc')->get();
        
        $data = [
            
            'topic' => $topic,
            'comments' => $comments,
        ];
        
        return view('topics.topicsdetails',$data);
    }
    
    public function edit($id)
    {
        $topic = Topic::find($id);
        
        if (\Auth::id() === $topic->user_id) {
        $topic = Topic::find($id);
        
        return view('topics.edit', [
            'topic' => $topic,
        ]);
        
        }else{
            return redirect ('/');
        }
    }
    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|max:50',
            'content' => 'required|max:800',
            'topics_genre' => 'required',
        ]);
        
        $topic = Topic::find($id);
        $topic->title = $request->title;
        $topic->content = $request->content;
        $topic->topics_genre = $request->topics_genre;
    
        $topic->save();
        
        return redirect()->route('topics.topicsdetails', [$topic]);
    }
}
