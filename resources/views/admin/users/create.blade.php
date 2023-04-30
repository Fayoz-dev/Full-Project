
@extends('layouts.admin')

@section('title')
  Create Users
@endsection
@section('content')




   <div class="row">


    <div class="col-12 col-md-12 col-lg-12">
         <form action="{{route('admin.users.store')}}" method="POST" enctype="multipart/form-data">
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
                      <label>Email</label>
                      <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" >
                          @error('email') <div class="invalid-feedback">{{$message}}</div>@enderror
                    </div>
                    <div class="form-group">
                     <label>Password</label>
                      <input type="password" name="password" class="form-control ckeditor @error('password') is-invalid @enderror"  ></input>
                       @error('password') <div class="invalid-feedback">{{$message}}</div>@enderror
                   </div>

                      <div class="form-group">
                    <label>Roles</label>
                    <select class="form-control select2" name="roles[]"  multiple style="height: 100px">
                       @foreach ($roles as $role)
                           <option value="{{$role->id}}">{{$role->name}}</option>
                       @endforeach
                    </select>
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


                </div> </div>
    </form>

   </div>
    </div>


@endsection



