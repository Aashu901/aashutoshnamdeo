@extends('layouts.app')
   
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    You are Admin.
                    <h3>Categories</h3>
                    <ul>
                    @foreach ($categories as $category)

                        <x-category-item :category="$category" />

                    @endforeach
                    </ul>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection