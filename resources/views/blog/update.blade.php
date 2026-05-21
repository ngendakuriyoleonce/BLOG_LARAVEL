@extends("base")
@section('title',"UPDATE")
 @section('content')
<div class="max-w-lg mx-auto p-6 bg-white rounded-md shadow-md mt-6">
    @if (session('update'))
       <p class="bg-red-100 text-green-500 p-3 font-bold">{{session('upate')}}</p> 
    @endif
    <form action="{{Route('article.update',$article->id)}}" class="mt-4" method="POST" enctype="multipart/form-data">
        @csrf
       @method("PUT")
<div class="mb-6">
    <label for="title" class="block test-sm font-medium text-gray-700">Title Article: </label>
    <input type="text" name="title" class="mt-1 p-3 block w-full border border-gray-300 rounded-md shadow-md " value="{{old('title',$article->title)}}">
@error('title')
    <p class="bg-red-100 text-red-500 p-3 font-bold">{{$message}}</p>
@enderror
</div>
<div class="mb-4">
    <label for="description" class="block test-sm font-medium text-gray-700">Description article: </label>
   <textarea name="description" class="mt-1 p-3 block w-full border border-gray-300 rounded-md shadow-md">{{ old('description', $article->description) }}</textarea>
@error('description')
    <p class="bg-red-100 text-red-500 p-3 font-bold">{{$message}}</p>
@enderror
</div>
<div class="mb-4">
    <label for="category" class="block test-sm font-medium text-gray-700"> category: </label>
    <select name="category_id" id="category"  class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-md">
        @foreach ($categorie as $category)

        <option value="{{$category -> id}}" {{$article->category_id == $category -> id ? "selected" :""}}>
            {{$category -> name}}
        </option>
    @endforeach
    </select>
</div>
<div class="mb-4">
    <img src="{{asset($article->image)}}" alt="{{$article->title}}" class="w-full object-cover h-auto mb-4">

    <label for="image" class="block test-sm font-medium text-gray-700">image: </label>
    <input type="file" name="image" class="mt-1 p-3 block w-full border border-gray-300 rounded-md shadow-md">
@error('password_cofrimation')
    <p class="bg-red-100 text-red-500 p-3 font-bold">{{$message}}</p>
@enderror
</div>
<button type="submit" class="w-full py-2 px-4 bg-gray-500 hover:bg-gray-900 text-white rounded-md">modifier un Article</button>

</form>
</div>
 @endsection