@extends('layouts.admin')
@section('title')
    Create Tag
@endsection
@section('content')
    <div class="row">


        <div class="col-12 col-md-12 col-lg-12">
            <form action="{{ route('admin.tags.store') }}" method="POST">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h4>Create Tag</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Name (Uz)</label>
                            <input type="text" name="name_uz" class="form-control  @error('name_uz') is-invalid @enderror">
                            @error('name_uz')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Name (Ru)</label>
                            <input type="text" name="name_ru"
                                class="form-control @error('name_ru') is-invalid @enderror">
                            @error('name_uz')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
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
