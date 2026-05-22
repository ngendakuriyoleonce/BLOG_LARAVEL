<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Category;
use App\Services\ArticleService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class BlogController extends Controller
{
     use AuthorizesRequests;
     
     protected ArticleService $articleservice;  //utilisation de non service
    public function __construct(ArticleService  $articleservice)
    {
        $this->articleservice = $articleservice;
    }

    public function ReadCategory(){
        $categories=Category::all();
        return view('blog.create',compact('categories'));
    }
    public function CreateArticale(ArticleRequest $request){
        $validateddata=$request->validated([
        ]);

    $this->articleservice->CreateArticle($validateddata);

       return redirect()->route('dashboard')->with('success',"Article created successful");
    }


    //afficher les articles crees
    public function dashboardarticles():View{
       $articles = $this->articleservice->dashboardarticles();
        return view('dashboard',['articles'=>$articles]);
    }
    
    //recuperer id et article on va modifier
    public function dashboardarticlesingle(int $id):View{
         $article = $this->articleservice->dashboardarticlesingle($id);
        $categorie=Category::all();
        return view('blog.update',compact('article','categorie'));
    }

    //modifier article

    public function update(Request $request, int $id)
{
    $validateddata = $request->validate([
         'title' => 'required|string|max:255',
    'description' => 'required|string',
  'category_id' => 'required|exists:categories,id',
    'image' => 'nullable|image|mimes:jpeg,jpg,png,gif,webp|max:2048',
    ]);

    $article = $this->articleservice->dashboardarticlesingle($id);
   $this->authorize('update', $article);
   $this->articleservice->update($article, $validateddata);
 

    return redirect()->route('dashboard',$id)
        ->with('update', 'Article updated successful');
}

//SUPPRIMER UN ARTICLE

  public function destroy(int $id){
         $article =  $this->articleservice->dashboardarticlesingle($id);
       $this->articleservice->destroy($article);
        return redirect()->route('dashboard')
        ->with('delete', 'Article deleted successful');
    }

    //afficher tous les articles nimporte quel utulisateur
   public function index() :View {
    $articles=Article::all();
    return view('blog.index ',['articles'=>$articles]);
}
public function showArt(string $id): View{
    $article = Article::with('User','Category')->findOrFail($id);
    return view('blog.show',compact('article'));
}
}
