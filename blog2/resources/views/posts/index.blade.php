@extends('layouts.app')
@section('content')
      <div class="container-fluid m-5">
     <h2 class="center-txt"> <a href="{{route('posts.create')}}" class="btn btn-success mb-5 font-weight-bold ">Create Post</a></h2>
          <table class="table">
              <thead>
                <tr>
                  <th scope="col"><b>#Pagination Bouns</b></th>
                  <th scope="col"><b>Title</b></th>
                  <th scope="col"><b>Posted By</b></th>
                    <th scope="col"><b>Created At</b></th>
                    <th scope="col"><b>Slug</b></th>
                  <th scope="col"><b>Actions</b></th>
                </tr>
              </thead>
              <tbody>
                @foreach($posts as $post)
                <tr>
                <th scope="row">{{ $post->id }}</th>
                  <td>{{ $post->title }}</td>
                  <td>{{ $post->user ? $post->user->name : 'not exist'}}</td>
                    <td>{{ date('Y-m-d', strtotime($post->created_at))}}</td>
                    <p>{{ date('Y-m-d', strtotime($post->created_at))}}</p>
                    <td>{{$post->slug}}</td>
                <td>
                    <div class="cont">
                    <a href="{{route('posts.show',['post' => $post->id])}}" class="btn btn-info btn-sm" id="btn1">View</a>
                    <a href="{{route('posts.edit',['post' => $post->id])}}" class="btn btn-primary btn-sm" id="btn2">Edit</a>
                    <form action="{{route('posts.destroy',['post' => $post->id])}}" method="post" id="btn3">
                            {{ csrf_field() }}
                            @method('DELETE')
                            <button class="btn btn-danger btn" type="submit">Delete</button>
                    </form>
                    </div>
                </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          {!! $posts->links() !!}
      </div>

@endsection


<link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}" />
