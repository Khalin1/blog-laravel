<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;
use App\Models\Post;
use App\Models\UserPost;
use App\Models\Category;
use App\Models\Comment;
use App\User;
use Auth;
use Cookie;

class PostController extends Controller
{
    public function index(Request $request){
        $category = $request->input('category');
        if($category)
            $posts = Post::whereRaw('category_id = ?',[$category])->orderBy('created_at', 'ASC')->paginate(20);
        else
            $posts = Post::orderBy('created_at', 'ASC')->paginate(20);

        $categories = Category::all();
        $data = [
            'posts' => $posts,
            'categories' => $categories,
            'activeCategory' => $category
        ];
        return view('posts', $data);
    }

    public function showPost($id){
        $article = Post::find($id);
        //$comments = Post::find($id)->comments;
        $response = new Response();
        $viewed = Cookie::get('viewed');
        if(!$viewed){
            $cookie = Cookie::forever('viewed', 'yes');
            $article->views_count += 1;
            $article->save();
            $response->withCookie($cookie);
        }
        return view('post')->with('post', $article);
    }

    public function add_comment(Request $request, $id){
        $user_id = Auth::user()->id;
        $text = $request->input('comment');
        $comment = Comment::create(['user_id'=>$user_id,'post_id'=>$id,'text'=>$text]);
        $arResult = $comment->toArray();
        $user = User::find($user_id);
        $arResult['user'] = $user->name;
        return json_encode($arResult);
    }

    public function like($id){
        $post = Post::find($id);
        $user_id = Auth::user()->id;
        $count = UserPost::whereRaw('user_id = ? and post_id = ?', [$user_id, $id])->count();
        if($count == 0){
            $post->rating += 1;
            $post->save();
            $userPost = new UserPost();
            $userPost->user_id = $user_id;
            $userPost->post_id = $id;
            $userPost->save();
        }

        return $post->rating;
    }

    public function dislike($id){
        $post = Post::find($id);
        $user_id = Auth::user()->id;
        $count = UserPost::whereRaw('user_id = ? and post_id = ?', [$user_id, $id])->count();
        if($count == 0){
            $post->rating -= 1;
            $post->save();
            $userPost = new UserPost();
            $userPost->user_id = $user_id;
            $userPost->post_id = $id;
            $userPost->save();
        }
        return $post->rating;
    }

}
