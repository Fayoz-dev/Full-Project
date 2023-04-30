<?php

namespace App\Services;

use App\Models\Post;

class PostService
{

    public function store($request)
    {

        $requestData = $request->all();
        $requestData['image'] = $this->fileUpload($request->file('image'));
        $post = Post::create($requestData);
        $post->tags()->attach($request->tags);
    }

    public function update($request, $post)
    {

        $requestData = $request->all();
        $requestData['is_special'] = $request->is_special ?? 0;
        $requestData['image'] = $this->fileUpload($request->file('image'));
        $post->update($requestData);
        $post->tags()->sync($request->tags);
    }


    public function fileUpload($file)
    {

        if (isset($file)) {
            $image_name = time() . '.' . $file->getClientOriginalExtension();
            $file->move('site/images/posts', $image_name);
            return $image_name;
        }
    }


    public function upload($request)
    {

        if ($request->hasFile('upload')) {
            $filename = time() . '-' . $request->file('upload')->getClientOriginalName();
            $request->file('upload')->move('site/images/posts', $filename);
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('site/images/posts/' . $filename);
            $msg = 'Image successfully uploaded';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        }
    }
}
