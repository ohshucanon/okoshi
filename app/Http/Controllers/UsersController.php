<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Comment;
use App\Topic;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate(10);

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
}
