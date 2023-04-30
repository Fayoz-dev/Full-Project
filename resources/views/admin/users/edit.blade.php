
@extends('layouts.admin')
@section('title')
  Update Users
@endsection
@section('content')


   <div class="row">


    <div class="col-12 col-md-12 col-lg-12">
         <form action="{{route('admin.users.update', $user->id)}}" method="POST">
             @csrf
             @method('PUT')
                <div class="card">
                  <div class="card-header">
                    <h4>Update Users</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label>Name</label>
                      <input type="text" value="{{$user->name}}" name="name" class="form-control  @error('name') is-invalid @enderror">
                        @error('name') <div class="invalid-feedback">{{$message}}</div>@enderror
                    </div>

                      <div class="form-group">
                      <label>Email</label>
                      <input type="text" value="{{$user->email}}" name="email" class="form-control  @error('email') is-invalid @enderror">
                        @error('email') <div class="invalid-feedback">{{$message}}</div>@enderror
                    </div>

                        <div class="form-group">
                      <label>Password</label>
                      <input type="password"  name="password" class="form-control  @error('password') is-invalid @enderror">
                        @error('password') <div class="invalid-feedback">{{$message}}</div>@enderror
                    </div>

                      <div class="form-group">
                      <label>Roles</label>
                      <select name="roles[]" id="" multiple class="form-control" style="height: 200px">
                          @foreach($roles as $role)
                              <option @if(in_array($role -> id , $userRoles)) selected @endif value="{{$role -> id}}">{{ $role -> name }}</option>
                          @endforeach


                      </select>
                    </div>



                     </div>

                        <div class="card-footer text-right">
                          <button class="btn btn-primary " type="submit">Update</button>
                        </div>


                </div> </div>
    </form>

   </div>
    </div>


@endsection

