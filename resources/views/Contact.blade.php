@extends("base")
@section('title',"CONTACT")
 @section('content')
<div class="max-w-lg mx-auto p-6 bg-white rounded-md shadow-md mt-6">
    @if (session('success'))
       <p class="bg-blue-100 text-green-500 p-3 font-bold">{{session('success')}}</p> 
    @endif
    <form action="{{route('SentMail')}}" class="mt-4" method="POST" enctype="multipart/form-data">
        @csrf
<div class="mb-6">
    <label for="title" class="block test-sm font-medium text-gray-700"> Name: </label>
    <input type="text" name="name" class="mt-1 p-3 block w-full border border-gray-300 rounded-md shadow-md " value="{{old('name')}}">
@error('name')
    <p class="bg-red-100 text-red-500 p-3 font-bold">{{$message}}</p>
@enderror
</div>
<div class="mb-6">
    <label for="title" class="block test-sm font-medium text-gray-700">Email: </label>
    <input type="text" name="email" class="mt-1 p-3 block w-full border border-gray-300 rounded-md shadow-md " value="{{old('email')}}">
@error('email')
    <p class="bg-red-100 text-red-500 p-3 font-bold">{{$message}}</p>
@enderror
</div>
<div class="mb-4">
    <label for="description" class="block test-sm font-medium text-gray-700">Message: </label>
    <textarea type="text" name="message" class="mt-1 p-3 block w-full border border-gray-300 rounded-md shadow-md" value="{{old('message')}}"></textarea>
@error('message')
    <p class="bg-red-100 text-red-500 p-3 font-bold">{{$message}}</p>
@enderror
</div>

<button type="submit" class="w-full py-2 px-4 bg-gray-500 hover:bg-gray-900 text-white rounded-md">Send</button>

</form>
</div>
 @endsection
