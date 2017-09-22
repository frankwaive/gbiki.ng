<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Post;
use App\Category;
use App\Comment;
use Session;
use Purifier;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          $categories = Category::all();
        return view('post.create')->withCategories($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         // validate the data
        $this->validate($request, array(
                'post_title'         => 'required|max:140',
                'category_id'   => 'required|integer',
                'user_id'   => 'integer',
                'post_content'          => 'required',
                'featured_img' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ));
        // store in the database
        $post = new Post;
        $post->post_title = $request->post_title;
        $post->category_id = $request->category_id;
        $post->post_content = Purifier::clean($request->post_content);
        $post->user_id = \Auth::id(); //get logged in user

        if ($request->hasFile('featured_img')) {
          $image = $request->file('featured_img');
          $filename = time() . '.' . $image->getClientOriginalExtension();
          $location = url('public/uploads/uploadedimages', $filename);
          $post->featured_img = $location;
        }

        $post->save();
        Session::flash('success', 'The blog post was successfully save!');
        return redirect()->route('post.show', $post->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = \App\Post::where('slug', $slug)->firstOrFail();
        $comment = $post->comment()->with('user')->get();
        
        return view('post.show', compact('comment','post'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
