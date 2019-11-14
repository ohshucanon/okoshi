<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Request as RequestInfo;
use App\User;
use App\Comment;
use App\Topic;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        //dd();
        $search = $request->query('activityarea');
        
        if ($search)
        {
            $users = User::where('activityarea', 'LIKE', "%$search%")->orderBy('id', 'desc')->paginate(10);
        }else{
            $users = User::orderBy('id', 'desc')->paginate(10);
        }
        
        return view('users.index', [
            'users' => $users,
        ]);
    }
    
    public function show($id)
    {   
        $user = User::find($id);
        $topics = $user->topics()->orderBy('created_at', 'desc')->paginate(10);
        
        $data = [
            'user' => $user,
            'topics' => $topics,
        ];

        $data += $this->counts($user);
        
        return view('users.show',$data);
    }
    
    public function usersdetails($id)
    {
        $user = User::find($id);
        $topics = $user->topics()->orderBy('created_at', 'desc');
        $data = [
            'user' => $user,
            'topics' => $topics,
        ];
        
        $data += $this->counts($user);
        
        return view('users.usersdetails',$data);
    }
    
    public function favorites($id)
    {
        $user = User::find($id);
        $topics = $user->favorites()->paginate(10);
        
        $data = [
            'user' => $user,
            'topics' => $topics,
        ];
        
        $data += $this->counts($user);
        
        return view('users.favorites', $data);
    }
    
    public function edit($id)
    {
        $user = User::find($id);
        
        if (\Auth::id() === $user->id) {
        $user = User::find($id);
        
        return view('users.edit', [
            'user' => $user,
        ]);
        }else{
            return redirect ('/');
        }
    }
    
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->activityarea = $request->activityarea;
        $user->activitybase = $request->activitybase;
        $user->email = $request->email;
        
        $user->save();
        
        $topics = $user->topics()->orderBy('created_at', 'desc');
        
        $data = [
            'user' => $user,
            'topics' => $topics,
        ];
        
        $data += $this->counts($user);
        
        return view('users.usersdetails',$data);
    }
    
   public function passwordEdit($id)
        {
            $user = User::find($id);
            
            if (\Auth::id() === $user->id) {
            $user = User::find($id);
            
            return view('users.passwordEdit', [
                'user' => $user,
            ]);
            }else{
                return redirect ('/');
            }
    }
    
    public function passwordUpdate(Request $request, $id)
    {
        $user = User::find($id);
        $user->password = bcrypt($request->password);
        
        $user->save();
        
        $topics = $user->topics()->orderBy('created_at', 'desc');
        
        $data = [
            'user' => $user,
            'topics' => $topics,
        ];
        
        $data += $this->counts($user);
        
        return view('users.usersdetails',$data);
    }
    
    //退会機能
    public function delete($id)
    {
        $user = User::find($id);
        
        if (\Auth::id() === $user->id) {
        
        $topics = $user->topics()->get();
        foreach ($topics as $topic){
            $topic->delete();
        }
        
        $comments = $user->comments()->get();
        foreach ($comments as $comment){
            $comment->delete();
        }
        
        $user->delete(); // softDelete
 
        return redirect()->to('/');
        
        } else {
            return redirect ('/');   
        }
    }
}
