<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Question::all();
        return view('questions.index', ['posts' => $posts]);
    }

/**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('questions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = Auth::id();
        //インスタンス作成
        $post = new Question();
        
        $post->body = $request->body;
        $post->user_id = $id;

        $post->save();

       return redirect()->to('/questions');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Question $post)
    {
        $usr_id = $post->user_id;
        $user = DB::table('users')->where('id', $usr_id)->first();
        

        return view('questions.detail',['post' => $post,'user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Question::findOrFail($id);

        return view('questions.edit',['post' => $post,'id' =>$id]);     
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
        $id = $request->post_id;
        
        //レコードを検索
        $post = Question::findOrFail($id);
        $post->body = $request->body;
        
        //保存（更新）
        $post->save();
        
        return redirect()->to('/questions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Question::find($id);
        //削除
        $post->delete();

        return redirect()->to('/questions');
    }
}