@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Create Category</div>
                <div class="card-body justify-content-center">
                    <form method="post" action="{{$actionUrl}}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="parent_category">Select Parent Category</label>
                            <div class="col-sm-9">
                            <select class="form-control" id="parent_category">
                                <option value="">No Parent</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" @if($edit) @if($currentCategory->parent_id == $category->id) 'selected' @endif @endif >{{$category->category_name}}</option>
                                @endforeach
                            </select>
                            <div class="col-sm-9">
                        </div>
                        @if($edit)
                            <input type="hidden" value="{{$currentCategory->id}}" name="category_id">
                        @endif
                        <div class="form-group row">
                            <label for="category_name" class="col-sm-3 col-form-label">Category Title</label>
                            <div class="col-sm-9">
                                <input value="@if($edit) $currentCategory->category_name @endif" name="category_name" type="text" class="form-control" id="category_name" placeholder="Category Name">
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="offset-sm-3 col-sm-9">
                                <button type="submit" class="btn btn-primary">@if($edit)Edit Category @else Create Category @endif</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>


@endsection