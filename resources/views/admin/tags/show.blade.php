
@extends('layouts.admin')
@section('title')
  View Tag
@endsection
@section('content')


   <div class="row">


    <div class="col-12 col-md-12 col-lg-12">

             @csrf
                <div class="card">
                  <div class="card-header">
                    <h4>Tag ID - {{$tag->id}}</h4>
                  </div>
                  <div class="card-body">

                      <div class="table-responsive">

                          <table class="table">

                              <tr>
                                  <th>ID</th>  <td>{{$tag->id}}</td>
                              </tr>

                               <tr>
                                  <th>Name UZ</th> <td>{{$tag->name_uz}}</td>
                              </tr>

                               <tr>
                                  <th>Name RU</th>  <td>{{$tag->name_ru}}</td>
                              </tr>

                               <tr>
                                  <th>Slug</th>  <td>{{$tag->slug}}</td>
                              </tr>

                                <tr>
                                  <th>Created At</th>  <td>{{$tag->created_at}}</td>
                              </tr>



                          </table>

                          <a href="{{route('admin.tags.index')}}" class="btn btn-warning">Back</a>

                      </div>

                  </div>

                </div>
    </div>


@endsection

