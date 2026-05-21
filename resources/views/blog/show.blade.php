@extends("base")
@section('title',"BLOG")
 @section('content')
<div class="p-6">
    <h1 class="mt-6 text-6xl font-bold uppercase mb-6">{{$article->title}}</h1>
<img src="{{asset($article->image)}}" alt="{{$article->title}}" class="w-full object-cover h-auto mb-4">
<p>{{$article->title}}</p>
<p>{{$article->description}}</p>
<p>{{$article->Category->name}}</p>
 <p class="italic">Write By: {{ $article->User->name }}</p>
</div>

 @endsection