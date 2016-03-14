@extends('layouts.app')

@section('content')

    <div class="col-md-9 post-list">
        <h1 class="post-list-title">Article</h1>
        @foreach($posts as $post)
            <div class="media post-item">
                <div class="media-body">
                    <h4 class="media-heading">
                        <a href="{{url('/article', $post->id)}}">{{$post->title}}</a>
                    </h4>
                    <div class="post-date">
                        {{$post->created_at}}
                        <span class="shows-count"><i class="fa fa-eye"></i></span><span class="show-num">{{$post->views_count}}</span>
                    </div>
                    <div class="media-text">
                        {{--<img class="media-object post-img" src="{{asset('/images/lena.jpg')}}">--}}
                        <div class="post-content">
                            {{$post->text}}
                            <a class="text-link" href="{{url('/article', $post->id)}}">Читать далее...</a>
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
                </div>
            </div>
        @endforeach
        {{$posts->links()}}
    </div>
    <div class="col-md-3">
        <div class="panel panel-default">
            <div class="panel-heading theme-right">Темы</div>
            <div class="panel-body">
                <ul class="nav nav-pills nav-stacked">
                    @if(!$activeCategory)
                        <li class="active" role="presentation"><a href="{{url('/article')}}">Все темы</a></li>
                    @else
                        <li role="presentation"><a href="{{url('/article')}}">Все темы</a></li>
                    @endif


                    @foreach($categories as $category)
                        @if($activeCategory == $category->id)
                            <li class="active" role="presentation"><a href="{{url('/article?category='.$category->id)}}">{{$category->name}}</a></li>
                        @else
                            <li role="presentation"><a href="{{url('/article?category='.$category->id)}}">{{$category->name}}</a></li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>

    </div>
@endsection
