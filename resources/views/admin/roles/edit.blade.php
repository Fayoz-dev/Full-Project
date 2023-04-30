
@extends('layouts.admin')
@section('title')
  Update Roles
@endsection
@section('content')


   <div class="row">


    <div class="col-12 col-md-12 col-lg-12">
         <form action="{{route('admin.roles.update', $role->id)}}" method="POST">
             @csrf
             @method('PUT')
                <div class="card">
                  <div class="card-header">
                    <h4>Update Role</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label>Name</label>
                      <input type="text" value="{{$role->name}}" name="name" class="form-control  @error('name') is-invalid @enderror">
                        @error('name') <div class="invalid-feedback">{{$message}}</div>@enderror
                    </div>
                          <div class="form-group">
                    <label>Permissions</label>
                     <br>
                       @foreach ($permissions as $permission)
                           <input type="checkbox" @if(in_array($permission->id, $rolePermissions)) checked @endif name="permissions[]" value="{{$permission -> id}}" >
                           <span for="">{{$permission -> name}}</span> &nbsp &nbsp

                         </option>

                       @endforeach

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

