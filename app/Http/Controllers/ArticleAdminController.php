<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Post;
use App\Models\Category;
use Auth;
use Validator;

class ArticleAdminController extends Controller
{
    public function index(){
        $res = Post::orderBy('created_at', 'ASC')->get();

        return view('admin.article')->with('posts', $res);
    }

    public function add(Request $request){
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:posts|max:255',
            'text' => 'required',
            'category' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/admin/article/add')
                ->withErrors($validator)
                ->withInput();
        }

        $title = $request->input('title');
        $category = $request->input('category');
        $text = $request->input('text');
        $user_id = Auth::user()->id;

        $article = Post::create(['title' => $title,
            'category_id' => $category,
            'text' => $text,
            'user_id' => $user_id
        ]);
        $article->save();
        return redirect('/article/'.$article->id);
    }

    public function addIndex(){
        $categories = Category::all();
        return view('admin.add.article')->with('categories', $categories);
    }

    public function articleEdit(Request $request, $id){
        $article = Post::find($id);
        $categories = Category::all();
        $data = [
            'article' => $article,
            'categories' => $categories,
            'active' => $article->category_id
        ];
        return view('admin.edit.article', $data);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'title' => 'required|unique:posts|max:255',
            'text' => 'required',
            'category' => 'required',
        ]);
    }

    public function update(Request $request, $id){
        $article = Post::find($id);
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:posts|max:255',
            'text' => 'required',
            'category' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/admin/article/'.$article->id.'/edit')
                ->withErrors($validator)
                ->withInput();
        }

        $title = $request->input('title');
        $category = $request->input('category');
        $text = $request->input('text');
        $user_id = Auth::user()->id;

        $article->title = $title;
        $article->text = $text;
        $article->user_id = $user_id;
        $article->category_id = $category;
        $article->save();
        return redirect('/article/'.$article->id);
    }

    public function delete($id){

    }
}
