<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Repositories\Interfaces\PostRepositoryInterface;
use App\Services\PostService;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\If_;




class PostController extends Controller
{
    public $postService;
    public $postRepository;

    public function __construct(PostService $postService, PostRepositoryInterface $postRepository)
    {
        $this->postService = $postService;
        $this->postRepository = $postRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = $this->postRepository->getAll();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.create', compact('categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

            'title_uz' => 'required',
            'title_ru' => 'required',
            'body_uz' => 'required',
            'body_ru' => 'required',
            'category_id' => 'required',

        ]);

       
        $this->postService->store($request);
        return redirect()->route('admin.posts.index')->with('success', 'Post Created Succesfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post )
    {
        $category = Category::all();
        return view('admin.posts.show', compact('post', 'category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.edit', compact('post', 'categories','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        
        $request->validate([

            'title_uz' => 'required',
            'title_ru' => 'required',
            'body_uz' => 'required',
            'body_ru' => 'required',
            'category_id' => 'required',

        ]);

       $this->postService->update($request, $post);

        return redirect()->route('admin.posts.index')->with('success', 'Post updated Succesfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post -> delete();
        return redirect()->route('admin.posts.index')->with('success', 'Post Deleted Succesfully!');
    }

    public function upload(Request $request)
    {
        $this->postService->upload($request);
       
    }
}
