
@extends('layouts.admin')
@section('title')
  View Ad
@endsection
@section('content')


   <div class="row">


    <div class="col-12 col-md-12 col-lg-12">

             @csrf
                <div class="card">
                  <div class="card-header">
                    <h4>Ad</h4>
                  </div>
                  <div class="card-body">

                      <div class="table-responsive">

                          <table class="table">

                              <tr>
                                  <th>ID</th>  <td>{{$ad->id}}</td>
                              </tr>

                               <tr>
                                  <th>Title (Top)</th> <td>{{$ad -> title1}}</td>
                              </tr>

                               <tr>
                                  <th>Image (Top)</th>  <td>{{$ad -> image1}}</td>
                              </tr>

                               <tr>
                                  <th>Url (Top)</th>  <td>{{$ad -> url1}}</td>
                              </tr>

                              <tr>
                                <th>Title (Sidebar)</th> <td>{{$ad -> title2}}</td>
                            </tr>

                             <tr>
                                <th>Image (Sidebar)</th>  <td>{{$ad -> image2}}</td>
                            </tr>

                             <tr>
                                <th>Url (Sidebar)</th>  <td>{{$ad -> url2}}</td>
                            </tr>

                                <tr>
                                  <th>Created At</th>  <td>{{$ad->created_at}}</td>
                              </tr>



                          </table>

                          <a href="{{route('admin.ads.index')}}" class="btn btn-warning">Back</a>

                      </div>

                  </div>

                </div>
    </div>


@endsection

