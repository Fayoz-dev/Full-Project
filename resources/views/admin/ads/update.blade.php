
@extends('layouts.admin')
@section('title')
  Update Ad
@endsection
@section('content')


   <div class="row">


    <div class="col-12 col-md-12 col-lg-12">
         <form action="{{route('admin.ads.update', $ad->id)}}" method="POST">
             @csrf
             @method('PUT')
                <div class="card">
                  <div class="card-header">
                    <h4>Update Ad</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label>Title (Top)</label>
                      <input type="text" value="{{$ad->title1}}" name="title1" class="form-control  @error('title1') is-invalid @enderror">
                        @error('title1') <div class="invalid-feedback">{{$message}}</div>@enderror
                    </div>
                      
                    <div class="form-group">
                        <label>Image (Top)</label>
                        <input type="file" name="image1" class="form-control @error('image1') is-invalid @enderror">
                        <img src="/site/images/ads/{{ $ad->image1 }}" width="150" alt="">
                        @error('image1')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                          <label>Url (Top)</label>
                          <input type="text" value="{{$ad->url1}}" name="url1" class="form-control  @error('url1') is-invalid @enderror">
                            @error('url1') <div class="invalid-feedback">{{$message}}</div>@enderror
                        </div>
                     
                     </div>

                     <div class="card-body">
                        <div class="form-group">
                          <label>Title (Sidebar)</label>
                          <input type="text" value="{{$ad->title2}}" name="title2" class="form-control  @error('title2') is-invalid @enderror">
                            @error('title2') <div class="invalid-feedback">{{$message}}</div>@enderror
                        </div>
                          
                        <div class="form-group">
                            <label>Image (Sidebar)</label>
                            <input type="file" name="image2" class="form-control @error('image2') is-invalid @enderror">
                            <img src="/site/images/ads/{{ $ad->image2 }}" width="150" alt="">
                            @error('image2')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
    
                        <div class="card-body">
                            <div class="form-group">
                              <label>Url (Sidebar)</label>
                              <input type="text" value="{{$ad->url2}}" name="url2" class="form-control  @error('url2') is-invalid @enderror">
                                @error('url2') <div class="invalid-feedback">{{$message}}</div>@enderror
                            </div>
                         
                         </div>

                        <div class="card-footer text-right">
                          <button class="btn btn-primary " type="submit">Update</button>
                        </div>


                </div> 
            </div>
    </form>

   </div>
    </div>


@endsection

