
@extends('layouts.admin')
@section('title')
    Posts
@endsection

@section('css')
     <link rel="stylesheet" href="/admin/assets/bundles/datatables/datatables.min.css">
     <link rel="stylesheet" href="/admin/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">

    @endsection

@section('content')
<div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible show fade col-lg-6">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>×</span>
                        </button>
                          {{session('success')}}
                      </div>
                    </div>
                    @endif
                  <div class="card-header">
                    <h4>Posts</h4>
                      <div class="card-header-form">
                          <a href="{{route('admin.posts.create')}}" class="btn btn-primary">Create</a>
                      </div>
                  </div>
                  <div class="card-body">
                  <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>
                          <tr>
                            <th class="text-center">
                              T/R
                            </th>
                            <th>Title</th>
                              <th>Body</th>
                            <th>Category</th>
                            <th>Tags</th>
                            <th>Image</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($posts as $post)
                          <tr>
                            <td>
                              {{$loop -> iteration}}
                            </td>
                            <td>{{$post -> title_uz}}</td>
                            <td>{!! $post -> body_uz !!}</td>
                            <td>
                            {{$post->category->name_uz ?? ''}}
                            </td>
                            <td class="align-middle">
                              @foreach ($post->tags as $tag)
                               {{$tag -> name_uz}},
                              @endforeach
                             </td>
                             
                            <td>
                              <img alt="image" src="/site/images/posts/{{$post -> image}}" width="35">
                            </td>

                            <td>
                              <div class="row">
                                <div class="row">
                                  
                                      <a href="{{route('admin.posts.edit', $post->id)}}" class="btn btn-info">Edit</a>
                                      <a href="{{route('admin.posts.show', $post->id)}}" class="btn btn-primary ml-2">View</a>
                                      <form action="{{route('admin.posts.destroy' , $post->id)}}" method="POST">
                                       @method('DELETE')
                                       @csrf
                                       <input class="btn btn-danger mr-2" type="submit" onclick="return confirm('Confirm deleted !')" value="Delete">
                                   </form>
                                  
                                 </div>
                           

                             </div>
                              
                            </td>
                            
                          </tr>
                          @endforeach


                        </tbody>
                      </table>
                    </div>
{{--                  <div class="card-footer text-right">--}}
{{--                    <nav class="d-inline-block">--}}
{{--                     {{$categories -> links()}}--}}
{{--                    </nav>--}}
{{--                  </div>--}}
                </div>
              </div>

            </div>
@endsection

@section('js')
 <script src="/admin/assets/bundles/datatables/datatables.min.js"></script>
  <script src="/admin/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>

  <!-- Page Specific JS File -->
  <script src="/admin/assets/js/page/datatables.js"></script>
@endsection
