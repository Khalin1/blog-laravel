@extends('layouts.admin')

@section('content')
    <div class="row category-list">
        <h1>Article</h1>
        <hr>
        <a href="{{url('/admin/article/add')}}" class="btn btn-primary new-article btn-block">Add new article</a>
        <hr>
        @foreach($posts as $post)
            <div class="well well-sm category-item" id="post{{$post->id}}">
                <a class="category-name pull-left" href="{{url('/posts/'.$post->id)}}">{{$post->title}}</a>
                <span class="pull-right">
                    <a href="{{url('/admin/article/'.$post->id.'/edit')}}" class="btn btn-primary edit-article">Edit</a>
                    <button class="btn btn-danger delete-article" data-article="{{$post->id}}">Delete</button>
                </span>
            </div>
        @endforeach
    </div>
@endsection