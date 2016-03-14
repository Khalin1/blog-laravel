@extends('layouts.admin')

@section('content')
    <div class="row new-article">
        <h1>Add new Article</h1>
        <hr>
        <form method="post" action="{{action('ArticleAdminController@add')}}">
            {!! csrf_field() !!}
            <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Title" value="{{ old('title') }}">
            </div>
            <div class="form-group {{ $errors->has('category') ? ' has-error' : '' }}">
                <label for="category">Title</label>
                <select name="category" id="category" class="form-control">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group {{ $errors->has('text') ? ' has-error' : '' }}">
                <label for="text">Text</label>
                <textarea class="form-control" id="text" name="text" rows="15">{{ old('text') }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Add</button>
        </form>
    <div>
@endsection