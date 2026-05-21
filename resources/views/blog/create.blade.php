@extends("base")
@section('title',"CATEGORY")
 @section('content')
<div class="max-w-lg mx-auto p-6 bg-white rounded-md shadow-md mt-6">
    @if (session('success'))
       <p class="bg-red-100 text-green-500 p-3 font-bold">{{session('success')}}</p> 
    @endif
    <form action="{{Route('create.store')}}" class="mt-4" method="POST" enctype="multipart/form-data">
        @csrf
<div class="mb-6">
    <label for="title" class="block test-sm font-medium text-gray-700">Title Article: </label>
    <input type="text" name="title" class="mt-1 p-3 block w-full border border-gray-300 rounded-md shadow-md " value="{{old('title')}}">
@error('title')
    <p class="bg-red-100 text-red-500 p-3 font-bold">{{$message}}</p>
@enderror
</div>
<div class="mb-4">
    <label for="description" class="block test-sm font-medium text-gray-700">Description article: </label>
    <textarea type="text" name="description" class="mt-1 p-3 block w-full border border-gray-300 rounded-md shadow-md" value="{{old('description')}}"></textarea>
@error('description')
    <p class="bg-red-100 text-red-500 p-3 font-bold">{{$message}}</p>
@enderror
</div>
<div class="mb-4">
    <label for="category" class="block test-sm font-medium text-gray-700"> category: </label>
    <input type="text" name="category" class="mt-1 p-3 block w-full border border-gray-300 rounded-md shadow-md" value="{{old('category')}}">
@error('category')
    <p class="bg-red-100 text-red-500 p-3 font-bold">{{$message}}</p>
@enderror
</div>
<div class="mb-4">
    <label for="image" class="block test-sm font-medium text-gray-700">image: </label>
    <input type="file" name="image" class="mt-1 p-3 block w-full border border-gray-300 rounded-md shadow-md">
@error('password_cofrimation')
    <p class="bg-red-100 text-red-500 p-3 font-bold">{{$message}}</p>
@enderror
</div>
<button type="submit" class="w-full py-2 px-4 bg-gray-500 hover:bg-gray-900 text-white rounded-md">Ajouter un Article</button>

</form>
</div>
 @endsection
