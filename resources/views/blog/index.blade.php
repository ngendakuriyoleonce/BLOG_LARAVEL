@extends("base")
@section('title',"BLOG")
 @section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold uppercase">Tablea de Bord</h1>
<ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
@foreach ( $articles as $article)
    <li class="border border-gray-300 p-2 my-2">
<img src="{{asset($article->image)}}" alt="{{$article->title}}" class="w-full object-cover h-auto mb-4">
<p>{{$article->title}}</p>
<p>{{$article->description}}</p>
 <p>{{ $article->category->name }}</p>
 <a href="{{route('showArt',$article->id)}}" class="text-white bg-blue-500 hover:bg-blue-800 px-4 py-1 rounded-md">View article</a>
   </li>
 
@endforeach

</ul>

</div>

 @endsection
