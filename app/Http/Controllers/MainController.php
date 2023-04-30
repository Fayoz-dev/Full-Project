<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Mail;
use App\Mail\Message;
use App\Rules\GoogleRecaptcha;
use Butschster\Head\Facades\Meta;

class MainController extends Controller{


    public function index()
    {

        $specialPosts = Post::where('is_special', 1)->limit(6)->latest()->get();
        $latestPosts = Post::limit(6)->latest()->get();

        Meta::prependTitle('Bosh sahifa');
        Meta::setDescription('Yangiliklar sayti');
        Meta::setKeywords(['Awesome keyword' ,'keyword2']);

        return view('index', compact('specialPosts', 'latestPosts'));
    }

    public function categoryPosts($slug)
    {


        $category = Category::where('slug', $slug)->first();
        $posts = $category->posts()->where('slug')->limit(6)->latest()->get();
        Meta::prependTitle($category->meta_title);
        Meta::setDescription($category->meta_description);
        Meta::setKeywords($category->meta_keywords);
        return view('categoryPosts', compact('category', 'posts'));
    }

    public function postDetail($slug)
    {


        $post = Post::where('slug', $slug)->first();
        $post->increment('view');
        $post->save();

        $otherPosts = Post::where('category_id', $post->category_id)
            ->where('id', '!=', $post->id)
            ->limit(3)
            ->latest()
            ->get();
            Meta::prependTitle($post->meta_title);
            Meta::setDescription($post->meta_description);
            Meta::setKeywords($post->meta_keywords);

        return view('postDetail', compact('post', 'otherPosts'));
    }

    public function contact()
    {

        Meta::prependTitle("Biz bilan bog'laning");
        Meta::setDescription('Aloqa');
        Meta::setKeywords('konatakt');
        return view('contact');
    }

    public function sendMail(Request $request)
    {

        $data = $request->all();
        $this->validate($request,[
            'g-recaptcha-response' => ['required', new GoogleRecaptcha]
        ]);



        if($request->hasFile('file')){
            $file = $request -> file('file');
            $filename = $file->getClientOriginalName();
            $file -> move('files/', $filename);
            $data['file'] =  'files/'. $filename;
        }
        Mail::to('frasulov988@gmail.com')->send(new Message($data));

        return back()->with('message' ,'Malumot Yuborildi');
    }

    public function search(Request $request)
    {

        $key = $request->key;
        $posts = Post::where('title_uz', 'like', '%' . $key . '%')
            ->orWhere('title_ru', 'like', '%' . $key . '%')
            ->orWhere('body_uz', 'like', '%' . $key . '%')
            ->orWhere('body_ru', 'like', '%' . $key . '%')
            ->get();
        return view('search', compact('posts', 'key'));
    }
}
