
@extends('layouts.admin')

@section('title')
  Create Roles
@endsection
@section('content')




   <div class="row">


    <div class="col-12 col-md-12 col-lg-12">
         <form action="{{route('admin.roles.store')}}" method="POST" enctype="multipart/form-data">
             @csrf
                <div class="card">
                  <div class="card-header">
                    <h4>Create Users</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label>Name</label>
                      <input type="text" name="name" class="form-control  @error('name') is-invalid @enderror">
                        @error('name') <div class="invalid-feedback">{{$message}}</div>@enderror
                    </div>

                      <div class="form-group">
                    <label>Permissions</label>
                     <br>
                       @foreach ($permissions as $permission)
                        <input type="checkbox" name="permissions[]" value="{{$permission -> id}}" >
                           <span for="">{{$permission -> name}}</span> &nbsp &nbsp
                       @endforeach

                  </div>
                      </div>

                        <div class="card-footer text-right">
                          <button class="btn btn-primary " type="submit">Save</button>
                        </div>


                </div>
         </div>
    </form>

   </div>
    </div>


@endsection



