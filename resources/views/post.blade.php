@extends('layouts.app')

@section('content')
    <h1>{{$post->title}}</h1>
    <div class="media">
        <div class="media-body">
            <div class="post-date">
                {{$post->created_at}}
                <span class="shows-count"><i class="fa fa-eye"></i></span><span class="show-num">{{$post->views_count}}</span>
            </div>
            <div class="media-text">
                <div class="post-content">
                    {{$post->text}}
                </div>
            </div>
            <div class="media-footer">
                <a class="pull-left like" data-postid="{{$post->id}}" href="#" title="Like this">
                    <i class="fa fa-thumbs-up"></i> Like
                </a>
                <a class="pull-left dislike" data-postid="{{$post->id}}" href="#" title="Dislike this">
                    <i class="fa fa-thumbs-down"></i> Dislike
                </a>
                <span class="rating-text">Rating: <span id="rating{{$post->id}}"> {{$post->rating}}</span></span>
            </div>
            <div class="comments">
                <h4>Comments (<span class="comment-count">{{$post->comments->count()}}</span>)</h4>
                <hr>
                @if (Auth::check())
                    <form method="post" id="addComment" data-article="{{$post->id}}">
                        <div class="form-group">
                            <label for="comment">Comment</label>
                            <textarea name="comment" class="form-control" id="comment" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary add-comment btn-block">Add</button>
                        </div>
                    </form>
                @else
                    <p class="help-block">You must be authorised</p>
                @endif
                <hr>
                <div class="comment-list">
                    @foreach($post->comments as $comment)
                        <div class="panel panel-default">
                            <div class="panel-heading">{{$comment->user->name}}
                                <span class="pull-right">
                                    {{$comment->created_at}}
                                </span>
                            </div>
                            <div class="panel-body">
                                {{$comment->text}}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection