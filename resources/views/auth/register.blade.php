@extends("base")
@section('title',"INSCRIPTION")
 @section('content')
<div class="max-w-lg mx-auto p-6 bg-white rounded-md shadow-md mt-6">
    @if (session('success'))
       <p class="bg-red-100 text-green-500 p-3 font-bold">{{session('success')}}</p> 
    @endif
    <form action="{{Route('registration.register')}}" class="mt-4" method="POST">
        @csrf
<div class="mb-4">
    <label for="name" class="block test-sm font-medium text-gray-700">Nom: </label>
    <input type="text" name="name" class="mt-1 p-3 block w-full border border-gray-300 rounded-md shadow-md">
@error('name')
    <p class="bg-red-100 text-red-500 p-3 font-bold">{{$message}}</p>
@enderror
</div>
<div class="mb-4">
    <label for="email" class="block test-sm font-medium text-gray-700">Email: </label>
    <input type="text" name="email" class="mt-1 p-3 block w-full border border-gray-300 rounded-md shadow-md">
@error('email')
    <p class="bg-red-100 text-red-500 p-3 font-bold">{{$message}}</p>
@enderror
</div>
<div class="mb-4">
    <label for="password" class="block test-sm font-medium text-gray-700">Password: </label>
    <input type="text" name="password" class="mt-1 p-3 block w-full border border-gray-300 rounded-md shadow-md">
@error('password')
    <p class="bg-red-100 text-red-500 p-3 font-bold">{{$message}}</p>
@enderror
</div>
<div class="mb-4">
    <label for="password_confirmation" class="block test-sm font-medium text-gray-700">password de cofrimation: </label>
    <input type="text" name="password_confirmation" class="mt-1 p-3 block w-full border border-gray-300 rounded-md shadow-md">
@error('password_cofrimation')
    <p class="bg-red-100 text-red-500 p-3 font-bold">{{$message}}</p>
@enderror
</div>
<button type="submit" class="w-full py-2 px-4 bg-gray-500 hover:bg-gray-900 text-white rounded-md">INSCRIRE</button>
<p class="my-2">Deja un compte? <a href="{{Route('login')}}" class="text-red-500">Se connecter </a></p>
</form>
</div>
 @endsection
