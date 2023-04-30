@extends('layouts.admin')
@section('css')
    <link rel="stylesheet" href="/admin/assets/bundles/select2/dist/css/select2.min.css">
@endsection
@section('title')
    Edit Posts
@endsection
@section('content')
    <div class="row">


        <div class="col-12 col-md-12 col-lg-12">
            <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Posts</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Title (Uz)</label>
                            <input type="text" name="title_uz" value="{{ $post->title_uz }}"
                                class="form-control  @error('title_uz') is-invalid @enderror">
                            @error('title_uz')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Title (Ru)</label>
                            <input type="text" name="title_ru" value="{{ $post->title_ru }}"
                                class="form-control @error('title_ru') is-invalid @enderror">
                            @error('title_uz')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Body (Uz)</label>
                            <textarea name="body_uz" class="form-control ckeditor @error('body_uz') is-invalid @enderror">{{ $post->body_uz }}</textarea>
                            @error('body_uz')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Body (Ru)</label>
                            <textarea name="body_ru" class="form-control ckeditor @error('body_ru') is-invalid @enderror">{{ $post->body_ru }}</textarea>
                            @error('body_ru')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                            <img src="/site/images/posts/{{ $post->image }}" width="150" alt="">
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <select name="category_id" id="" class="form-control">
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                    <option {{ $post->category_id == $category->id ? 'selected' : '' }}
                                        value="{{ $category->id }}">{{ $category->name_uz }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tags</label>
                            <select class="form-control select2" name="tags[]" multiple>
                                @foreach ($tags as $tag)
                                    <option @if (in_array($tag->id, $post->tags->pluck('id')->toArray())) selected @endif value="{{ $tag->id }}">
                                        {{ $tag->name_uz }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="control-label">Is Special ?</div>
                            <label class="custom-switch mt-2">
                              <input type="checkbox" value="1" {{ $post->is_special == 1 ? 'checked' : '' }} name="is_special" class="custom-switch-input">
                              <span class="custom-switch-indicator"></span>
                              
                            </label>
                          </div>
                        <div class="form-group">
                            <label>Meta Title</label>
                            <input type="text" value="{{ $post->meta_title }}" name="meta_title" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Meta Description</label>
                            <input type="text" value="{{ $post->meta_description }}" name="meta_description"
                                class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Meta Keywords</label>
                            <input type="text" value="{{ $post->meta_keywords }}" name="meta_keywords"
                                class="form-control">
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

@section('js')
    <script src="/admin/assets/ckeditor/ckeditor.js"></script>
    <script>
        $('.ckeditor').ckeditor();
    </script>

    <script type="text/javascript">
        CKEDITOR.replace('body_uz', {
            filebrowserUploadUrl: "{{ route('admin.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
    </script>

    <script type="text/javascript">
        CKEDITOR.replace('body_ru', {
            filebrowserUploadUrl: "{{ route('admin.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
    </script>
    <script src="/admin/assets/bundles/select2/dist/js/select2.full.min.js"></script>
@endsection
