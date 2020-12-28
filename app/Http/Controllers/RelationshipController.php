<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PassportId;
use App\Rules;
use App\Post;
use App\User;
use App\Comment;
use Auth;
use Illuminate\Support\Facades\DB;

class RelationshipController extends Controller
{
    public function index(){
        $post = Post::get();
        return view('home', ['posts'=>$post]);
    }
    public function show($id){
        $post = Post::with(['comment'])->where('id', $id)->firstOrFail();
        return view('show', ['post' => $post]);
    }
    public function comment(Request $request){
        Comment::create([
            'comment' => $request->input('comment'),
            'post_id' => $request->input('post_id')
        ]);
        return redirect()->back();
    }
    public function store_passport_id(Request $request){
        PassportId::create([
            'passport_id'=>$request->input('passport_id'),
            'user_id'=>Auth::user()->id
        ]);
        return redirect()->back();
    }
    public function one_to_one(){
        $user_passport = User::with(['user_passport_id'])->get();
        return view('one_to_one', ['user_passport' => $user_passport]);
    }
    public function create_post(){
        return view('post');
    }
    public function store(Request $request){
        Post::create([
            'title' => $request->input('title'),
            'desc' => $request->input('desc'), 
            'user_id' => Auth::user()->id
        ]);
        return redirect()->back();
    }
    public function one_to_many(){
        $one_to_many = Post::with(['comment'])->get();
        return view('one_to_many', ['one_to_many' => $one_to_many]);
    }
    public function one_to_many_invers(){
        $one_to_many_invers = Comment::with(['post'])->get();
        return view('one_to_many_invers', ['one_to_many_invers' => $one_to_many_invers]);
    }
    public function example(){
        $student_class = User::with(['roles'])->get();
        return view('mamy_to_many', ['student_class' => $student_class]);
    }
    public function joins(){
        $result = Post::join('users', 'user_id', 'users.id')->get();
        return view('joins', ['result' => $result]);
    }
}
