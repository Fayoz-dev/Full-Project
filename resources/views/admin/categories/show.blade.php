
@extends('layouts.admin')
@section('title')
  View Category
@endsection
@section('content')


   <div class="row">


    <div class="col-12 col-md-12 col-lg-12">

             @csrf
                <div class="card">
                  <div class="card-header">
                    <h4>Category ID - {{$category->id}}</h4>
                  </div>
                  <div class="card-body">

                      <div class="table-responsive">

                          <table class="table">

                              <tr>
                                  <th>ID</th>  <td>{{$category->id}}</td>
                              </tr>

                               <tr>
                                  <th>Name UZ</th> <td>{{$category->name_uz}}</td>
                              </tr>

                               <tr>
                                  <th>Name RU</th>  <td>{{$category->name_ru}}</td>
                              </tr>

                               <tr>
                                  <th>Slug</th>  <td>{{$category->slug}}</td>
                              </tr>

                               <tr>
                                  <th>Meta Title</th>  <td>{{$category->meta_title}}</td>
                              </tr>

                               <tr>
                                  <th>Meta Description</th>  <td>{{$category->meta_description}}</td>
                              </tr>

                               <tr>
                                  <th>Meta Keywords</th>  <td>{{$category->meta_keywords}}</td>
                              </tr>

                                <tr>
                                  <th>Created At</th>  <td>{{$category->created_at}}</td>
                              </tr>



                          </table>

                          <a href="{{route('admin.categories.index')}}" class="btn btn-warning">Back</a>

                      </div>

                  </div>

                </div>
    </div>


@endsection

