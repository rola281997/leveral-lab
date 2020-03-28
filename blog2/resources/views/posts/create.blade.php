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
    <div class="container">
    <form method="POST" action="{{route('posts.store')}}">
        @csrf
        <div class="row">
            <div class="col-md-12">
        <div class="form-group">
            <strong>Title</strong>
            <input name="title" type="text" class="form-control" aria-describedby="emailHelp">
        </div>
            </div>
            <div class="col-md-12">
        <div class="form-group">
            <strong for="exampleInputPassword1">Description</strong>
            <textarea name="description" class="form-control" col="10">

      </textarea>
        </div>
            </div>
            <div class="col-md-12">
        <div class="form-group">
            <strong for="exampleInputPassword1">Users</strong>
            <select name="user_id" class="form-control">
                @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>
        </div>
            </div>
            <div class="col-md-12">
        <button type="submit" class="btn btn-success">Create</button>
            </div>
        </div>
    </form>
    </div>
@endsection
