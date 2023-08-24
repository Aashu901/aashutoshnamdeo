
@props(['category'])

<div>

    <div class="d-flex">
        <li><p>{{$category->category_name}}</p></li>
        <a class="" style="margin-left: 5px;" href="{{route('admin.category.edit',$category_id = $category->id)}}">Edit</a>
        <a style="margin-left: 5px;" href="">Delete</a>
   </div>

    @foreach($category->children as $child)

        <div style="margin-left: 20px;">
             <x-category-item :category="$child" />    
        </div>

 

    @endforeach
</div>