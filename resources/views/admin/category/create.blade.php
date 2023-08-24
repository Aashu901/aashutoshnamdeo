@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Create Category</div>
                <div class="card-body justify-content-center">
                    <form method="post" action="/games" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="parent_category">Select Parent Category</label>
                            <select class="form-control" id="parent_category">
                                <option value="">No Parent</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{$category->category_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group row">
                            <label for="category_name" class="col-sm-3 col-form-label">Category Title</label>
                            <div class="col-sm-9">
                                <input name="category_name" type="text" class="form-control" id="category_name" placeholder="Game Title">
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="offset-sm-3 col-sm-9">
                                <button type="submit" class="btn btn-primary">Create Category</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>


@endsection