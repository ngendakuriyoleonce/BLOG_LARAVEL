@extends("base")
@section('title',"Dashboard")
 @section('content')

<div class="p-6">
    <h1 class="text-2xl font-bold uppercase">Tablea de Bord</h1>
<div class="flex items-center justify-between my-4">
    <a  class="py-2 px-4 bg-green-500 hove:bg-green-700 text-white rounded-md "href="{{Route('create')}}">Creer un Article</a>
<form action="{{Route('logout')}}" method="post">
@csrf
 <button type="submit" class="py-2 px-4 bg-red-500 hover:bg-red-700 text-white rounded-md">Logout</button>
</form>
</div>
@if (session('success'))
    <div class="bg-green-100 text-green-500  text-center">{{session('success')}}</div>  

@elseif (session('update'))
 <div class="bg-blue-100 text-blue-500  text-center">{{session('update')}}</div> 

 @elseif (session('delete'))
 <div class="bg-red-100 text-red-500  text-center">{{session('delete')}}</div> 
@endif


<ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
@foreach ( $articles as $article)
    <li class="border border-gray-300 p-2 my-2">
<img src="{{asset($article->image)}}" alt="{{$article->title}}" class="w-full object-cover h-auto mb-4">
<p>{{$article->title}}</p>
<p>{{$article->description}}</p>
 <p>{{ $article->category->name }}</p>

<div class="flex items-center gap-2 w-full mt-6">
<a href="{{Route('article.edit',$article->id)}}" class="text-white bg-yellow-500 hover:bg-yellow-600 px-4 py-1 rounded-md">Modifier</a> 
<form action="{{Route('article.destroy',$article->id)}}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="text-white bg-red-500 hover:bg-red-600 px-4 py-1 rounded-md">Supprimer</button>
</form>
</div>
   </li>
 
@endforeach

</ul>

</div>



 @endsection
