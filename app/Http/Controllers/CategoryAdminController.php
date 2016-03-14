<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Category;
use Auth;

class CategoryAdminController extends Controller
{
    public function index(){
        $data = array(
            'categories' => Category::all()
        );
        return view('admin.categories', $data);
    }

    public function edit(Request $request, $id){
        $category = Category::find($id);
        $name = $request->input('name');
        $category->name = $name;
        $category->save();
        return json_encode(['name' => $name, 'id' => $id]);
    }

    public function delete($id){
        $category=Category::find($id);
        $category->delete();
        return json_encode(['id' => $id]);
    }

    public function add(Request $request){
        $name = $request->input('name');
        $user_id = Auth::user()->id;
        $category = new Category();
        $category->name = $name;
        $category->created_at = $user_id;
        $category->updated_at = $user_id;
        $category->save();
        return json_encode($category->toArray());
    }
}
