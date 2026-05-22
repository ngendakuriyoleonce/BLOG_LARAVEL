@extends("base")
@section('title',"BLOG")
 @section('content')
<div class="p-6">
   <x-article-component :title="'Listes des articles'" :articles=" $articles "/>

</div>

 @endsection
