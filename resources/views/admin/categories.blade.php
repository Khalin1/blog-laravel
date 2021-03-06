@extends('layouts.admin')
@section('content')

    <div class="row category-list">
        <h1>Categories</h1>
        <hr>
        <button type="button" class="btn btn-primary new-category btn-block" data-toggle="modal" data-target="#addCategory">Add new category</button>
        <hr>
        @foreach($categories as $category)
            <div class="well well-sm category-item" id="cat{{$category->id}}">
                <a class="category-name pull-left" href="{{url('/categories/'.$category->id)}}">{{$category->name}}</a>
                <span class="pull-right">
                    <button class="btn btn-primary edit-category" data-name="{{$category->name}}" data-category="{{$category->id}}">Edit</button>
                    <button class="btn btn-danger delete-category" data-name="{{$category->name}}" data-category="{{$category->id}}">Delete</button>
                </span>
            </div>
        @endforeach
    </div>
    <div class="modal fade" id="addCategory" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <form class="modal-content" id="formAddCategory">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Add new Category</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Category name</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Category name">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-add-category">Add</button>
                </div>
            </form><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <div class="modal fade" id="editCategory" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <form class="modal-content" id="formEditCategory" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Category</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">New category name</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="new category name">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection
