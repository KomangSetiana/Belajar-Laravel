<?php

namespace App\Http\Controllers;

use App\Models\post;
use App\Models\Category;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\support\str;
use Illuminate\Support\Facades\Storage;

class DasboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        return view ('dasboard.posts.index',[
            'posts' => post::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dasboard.posts.create',[
            'categories' => Category::all()
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
        
        $validateData = $request->validate([
            'tittle' => 'required|max:255',
            'slug' => 'required|unique:posts',
           'category_id' => 'required',
           'image' => 'image|file|max:1024',
            'body' => 'required'
        ]);

        if($request->file('image')) {
            $validateData['image'] = $request->file('image')->store('post-images');
        }

        $validateData['user_id'] = auth()->user()->id;
        $validateData['excerpt'] = Str::limit( strip_tags($request->body), 150,'...');

        post::create($validateData);
        return redirect('/dasboard/posts')->with('success', 'New Post Has Been Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        
        return view('dasboard.posts.show',[
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(post $post)
    {
        return view('dasboard.posts.edit',[
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, post $post)
    {
        $rules = [
            'tittle' => 'required|max:255',
           'category_id' => 'required',
           'image' => 'image|file|max:1024',
            'body' => 'required'
        ];
        
        if($request->slug != $post->slug) {
            $rules['slug'] = 'required|unique:posts';
        }
        $validateData = $request->validate($rules);

        if($request->file('image')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validateData['image'] = $request->file('image')->store('post-images');
        }


        $validateData['user_id'] = auth()->user()->id;
        $validateData['excerpt'] = Str::limit( strip_tags($request->body), 150,'...');

        post::where('id', $post->id)
        ->update($validateData);
        return redirect('/dasboard/posts')->with('success', 'Post Has Been Updated');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(post $post)
    {
            if($post->image) {
                Storage::delete($post->image);
            }

        post::destroy($post->id);
        return redirect('/dasboard/posts')->with('success', 'Post Has Been Deleted');
    }
    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(post::class, 'slug', $request->tittle);
        return response()->json(['slug' => $slug]);
    }
}
