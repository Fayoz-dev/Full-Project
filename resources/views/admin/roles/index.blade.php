@extends('layouts.admin')
@section('title')
    Roles
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
                    <h4>Roles</h4>
                      <div class="card-header-form">
                          <a href="{{route('admin.roles.create')}}" class="btn btn-primary">Create</a>
                      </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered table-md">
                        <tbody><tr>
                          <th>T/R</th>
                          <th>Name</th>
                          <th>Permissions</th>
                            <th>Action</th>
                        </tr>
                        @foreach($roles as $role)
                            <tr>
                          <td>{{$loop->iteration}}</td>
                          <td>{{$role->name}}</td>
                          <td>
                              @foreach($role->permissions as $permission)
                                  {{$permission -> name}}
                              @endforeach
                          </td>
                                <td>
                              <div class="row">
                                 <form action="{{route('admin.roles.destroy' , $role->id)}}" method="POST">
                                  @method('DELETE')
                                  @csrf
                                  <input class="btn btn-danger mr-2 ml-2" type="submit" onclick="return confirm('Confirm deleted !')" value="Delete">
                              </form>
                                  <a href="{{route('admin.roles.edit' , $role->id)}}" class="btn btn-info">Edit</a>
                                  <a href="{{route('admin.roles.show' , $role->id)}}" class="btn btn-primary ml-2">View</a>

                              </div>
                              </td>

                        </tr>
                        @endforeach


                      </tbody></table>
                    </div>
                  </div>
{{--                  <div class="card-footer text-right">--}}
{{--                    <nav class="d-inline-block">--}}
{{--                     {{$tags -> links()}}--}}
{{--                    </nav>--}}
{{--                  </div>--}}
                </div>
              </div>

            </div>
@endsection

