
@extends('layouts.admin')
@section('title')
   View Posts
@endsection



@section('content')
<div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
         
                  <div class="card-header">
                    <h4>Post ID - {{$post->id}}</h4>
                      <div class="card-header-form">
                          <a href="{{route('admin.posts.create')}}" class="btn btn-primary">Create</a>
                      </div>
                  </div>
                  <div class="card-body">
                  <div class="table-responsive">
                      <table class="table">
                       <tr>
                        <th>Title UZ</th> <td>{{$post->title_uz}}</td>
                       </tr>
                       <tr>
                        <th>Title Ru</th> <td>{{$post->title_ru}}</td>
                       </tr>
                       <tr>
                        <th>Body UZ</th> <td>{!! $post->body_uz !!}</td>
                       </tr>
                       <tr>
                        <th>Body Ru</th> <td>{!! $post->body_ru !!}</td>
                       </tr>
                       <tr>
                        <th>Categoriya</th> <td>{{$post->category->name_uz}}</td>
                       </tr>
                       <tr>
                        <th>Tag</th> <td>@foreach ($post->tags as $tag)
                            {{$tag -> name_uz}},
                        @endforeach</td>
                       </tr>
                       <tr>
                        <th>Image</th> <td><img src="/site/images/posts/{{$post->image}}" width="150" alt=""></td>
                       </tr>
                       <tr>
                        <th>Slug</th> <td>{{$post->slug}}</td>
                       </tr>
                       <tr>
                        <th>View</th> <td>{{$post->view}}</td>
                       </tr>
                       <tr>
                        <th>Meta Title</th> <td>{{$post->meta_title}}</td>
                       </tr>
                       <tr>
                        <th>Meta Description</th> <td>{{$post->meta_description}}</td>
                       </tr>
                       <tr>
                        <th>Meta Keywords</th> <td>{{$post->meta_keywords}}</td>
                       </tr>
                      </table>
                    </div>
{{--                  <div class="card-footer text-right">--}}
{{--                    <nav class="d-inline-block">--}}
{{--                     {{$categories -> links()}}--}}
{{--                    </nav>--}}
{{--                  </div>--}}
                     <a href="{{route('admin.posts.index')}}" class="btn btn-warning">Back</a>
                </div>
                
              </div>

            </div>
@endsection


