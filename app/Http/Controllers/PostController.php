<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the posts.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()
            ->view('post.index');
    }

    /**
     * Show the form for creating a new Post.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()
            ->view('post.create', [
                'tags' => Tag::all()->sortBy('name'),
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate the request
        $validated = $request->validate([
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
            'tags' => 'exists:tags,id'
        ]);

        // get the new tags if available
        $validated['tags'][] = array_filter(explode(',', $request->tag_text), function($tag){
            $tag = Tag::firstOrCreate([
                'name' => $tag,
            ]);
            return $tag->id;
        });

        dd($validated);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('post.show');
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
