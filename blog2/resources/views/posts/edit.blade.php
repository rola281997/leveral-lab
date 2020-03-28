@extends('layouts.app')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


        <form method="post" action= "{{ route('posts.update', $post->id) }}">
            @method('PATCH')
            {{csrf_field()}}
            <div class="form-group">
                <label>Title</label>
                <input  type="text" name="title" value="{{$post->title}}" class="form-control"/>
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="form-control" >{{$post->description}}</textarea>
            </div>
            <div class="form-group">
                <label>Post creators</label><br/><br/>
                <select name="user_id" class="form-control">
                    @foreach($usersList as $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </select>
            </div>
            <input  type="submit" value="Update" class="btn btn-info"/>
        </form>






@endsection


