@extends('template_backend.home')
@section('sub-judul','Edit Post')
@section('content')
@if(count($errors)>0)
    @foreach($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
            {{ $error }}
        </div>
    @endforeach
@endif
{{-- @if(Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{Session('success')}}
    </div>
@endif --}}
<form action="{{route('post.update',$post->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="form-group">
        <label for="">Judul</label>
        <input type="text" class="form-control" name="judul" value="{{$post->judul}}">
    </div>
    <div class="form-group">
        <label for="">Kategori</label>
        <select class="form-control" name="category_id" id="">
            @foreach($category as $categories)
                <option value="{{$categories->id}}" 
                    @if($post->category_id == $categories->id)
                        selected
                    @endif>{{$categories->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="">Pilih Tags</label>
        <select class="form-control select2" multiple="" name="tags[]">
            @foreach($tags as $tag)
                <option value="{{$tag->id}}"
                    @foreach($post->tags as $value)
                        @if($tag->id ==  $value->id)
                            selected
                        @endif
                    @endforeach>{{$tag->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="">Kontent</label>
        <textarea class="form-control" name="content" id="" cols="30" rows="10">{{$post->content}}</textarea>
    </div>
    <div class="form-group">
        <label for="">Thumbnail</label>
        <input type="file" class="form-control" name="gambar">
    </div>
    <div class="form-group">
        <button class="btn btn-primary btn-block">Update Post</button>
    </div>
</form>
@endsection