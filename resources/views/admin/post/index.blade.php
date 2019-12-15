@extends('template_backend.home')
@section('sub-judul','Posts')
@section('content')
@if(Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{Session('success')}}
    </div>
@endif
<a href="{{route('post.create')}}" class="btn btn-info btn-sm">Tambah Posts</a>
<br>
<br>
<table class="table table-stripped table-hover table-sm table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Posts</th>
            <th>Kategori</th>
            <th>Daftar Tags</th>
            <th>Creator</th>
            <th>Thumbnail</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
            @foreach ($post as $posts => $hasil)
            <tr>
                <td>{{ $posts + $post->firstitem() }}</td>
                <td>{{ $hasil->judul }}</td>
                <td>{{ $hasil->category->name }}</td>
                <td>
                    @foreach($hasil->tags as $tag)
                        <ul>
                            <h6><span class="badge badge-info">{{$tag->name}}</span></h6>
                        </ul>  
                    @endforeach
                </td>
                <td>{{$hasil->users->name}}</td>
                <td><img src="{{asset($hasil->gambar)}}" alt="" style="width:100px"></td>
                <td>
                    <form action="{{route('post.destroy' , $hasil->id)}}" method="POST">
                        @csrf
                        @method('delete')
                        <a href="{{route('post.edit',$hasil->id)}}" class="btn btn-primary btn-sm">Edit</a>
                        <button type="submit" href="" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$post->links()}}
@endsection