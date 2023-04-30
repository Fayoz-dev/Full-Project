
@extends('layouts.admin')
@section('title')
    Ads
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
                    <h4>Ads</h4>
                      <div class="card-header-form">
                          @empty($ad)
                          <a href="{{route('admin.ads.create')}}" class="btn btn-primary">Create</a>
                          @endempty
                      </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered table-md">
                        <tbody><tr>
                          <th>T/R</th>
                          <th>Image (Top)</th>
                          <th>image (Sidebar)</th>
                          
                            <th>Action</th>
                        </tr>
                        
                            <tr>
                          <td>1</td>
                          <td>
                            <img alt="Reklama Yo'q" src="/site/images/ads/{{$ad -> image1 ?? ''}}" width="35">
                          </td>
                          <td>
                            <img alt="Reklama Yo'q" src="/site/images/ads/{{$ad -> image2 ?? ''}}" width="35">
                          </td>
                          
                          @if (!empty($ad))
                              
                          <td>
                              <div class="row">
                                 <form action="{{route('admin.ads.destroy' , $ad->id)}}" method="POST">
                                  @method('DELETE')
                                  @csrf
                                  <input class="btn btn-danger mr-2 ml-2" type="submit" onclick="return confirm('Confirm deleted !')" value="Delete">
                              </form>
                                  <a href="{{route('admin.ads.edit' , $ad->id)}}" class="btn btn-info">Edit</a>
                                  <a href="{{route('admin.ads.show' , $ad->id)}}" class="btn btn-primary ml-2">View</a>

                              </div>
                              </td>

                              @endif

                        </tr>
                        


                      </tbody></table>
                    </div>
                  </div>
              
                </div>
              </div>

            </div>
@endsection
