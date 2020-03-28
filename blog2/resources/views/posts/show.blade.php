
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Post Info
            </div>
            <div class="card-body">
                <h5 class="card-title"><span class="span-txt">Title :- </span>{{$post->title}}</h5>
                <h5 class="card-title"><span class="span-txt">Description :- </span></h5>
                <p class="card-text">{{$post->description}}</p>
            </div>
        </div>
        <br/>
        <br/>
        <br/>

        <div class="card">
            <div class="card-header">
                Post Creator Info
            </div>
            <div class="card-body">
                <h5 class="card-title"><span class="span-txt">Name :- </span>{{ $post->user ? $post->user->name : 'not exist'}}</h5>
                <h5 class="card-title"><span class="span-txt">Email :- </span>{{ $post->user ? $post->user->email : 'not exist'}}</h5>
                <h5 class="card-title"><span class="span-txt">Created At :- </span>{{ date('Y-m-d', strtotime($post->created_at))}}</h5>
            </div>
        </div>
    </div>
@endsection
