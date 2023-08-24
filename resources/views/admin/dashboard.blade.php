@extends('layouts.app')
   
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard [ Categories ]</div>
                <div class="card-body">
                 
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