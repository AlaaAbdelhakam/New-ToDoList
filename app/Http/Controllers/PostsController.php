<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\User;
use DB;
class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $posts = Post::latest()->paginate(10);
        // $users = User::all();
        // $users=User::find($user_id)->name;
        // $completed_posts = Post::where("is_done", true)->get();
        return view('posts.index', compact('posts'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users= User::all();
        return view('posts.create', compact('users'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Post::create(array_merge($request->only('title', 'description', 'body','user_id','is_done')));

        return redirect()->route('posts.index')
            ->withSuccess(__('Post created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit', [
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post->update($request->only('title', 'description', 'body'));

        return redirect()->route('posts.index')
            ->withSuccess(__('Post updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')
            ->withSuccess(__('Post deleted successfully.'));
    }
    // public function complete($id,Request $request)
    // {
    // $post = Post::find($id);
    // $post->is_done = true;
    // $post->save();
    // return redirect()->route('posts.index');
    // }
    public function done($id){
        $post = Post::findOrFail($id);

        $post->is_done = 1;

        $post->save();

        return redirect()->back();
    }
    public function reopen($id){
        $post = Post::findOrFail($id);

        $post->is_done = 0;

        $post->save();

        return redirect()->back();
    }
    // public function search(Request $request){
    //     // Get the search value from the request
    //     // $search = $request->input('search');
    
    //     // Search in the title and body columns from the posts table
    //     // $posts = Post::query()
    //     //     ->where('title', 'LIKE', "%{$search}%")
    //     //     ->orWhere('body', 'LIKE', "%{$search}%")
    //     //     ->get();
    //     $customer = DB::table('customers')
        
    //     ->where('customer_contact', $contact_no)
    //     ->get();        // Return the search view with the resluts compacted
    //     return view('layouts.partials.navbar', compact('posts'));
    // }
}