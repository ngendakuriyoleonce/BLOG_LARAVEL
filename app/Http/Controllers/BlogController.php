<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class BlogController extends Controller
{
    public function ReadCategory(){
        $categories=Category::all();
        return view('blog.create',compact('categories'));
    }
    public function CreateArticale(ArticleRequest $request){
        $validateddata=$request->validated([
        ]);

        //verfier si category existe et le creer
        $category = Category::firstOrCreate(
            ['name'=>$validateddata['category']]
        );

        //assinger category id a notre schema de validation
        $validateddata['category_id']= $category->id;

        //verfie si image a ate envoye
        if($request->hasfile('image')){
            $imagename=time().'.'.$request->image->extension();
            $request->image->move(public_path('image'),$imagename); //save image folder public
            $validateddata['image']='image/'.$imagename;   //save image en bdd
        }else{
           $validateddata['image']=null;  //if no image remain null
        }
         $validateddata['user_id']=Auth::id(); //save id de l'auteur connecter
         Article::create($validateddata); //crrer notre article

       return redirect()->route('dashboard')->with('success',"Article created successful");
    }


    //afficher les articles crees
    public function dashboardarticles():View{
       $articles = Article::with('category')->where('user_id', Auth::id())->get(); 
        return view('dashboard',['articles'=>$articles]);
    }
    
    //recuperer id et article on va modifier
    public function dashboardarticlesingle(int $id):View{
         $article = Article::findOrFail($id);
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

    $article = Article::findOrFail($id);

    if ($request->hasFile('image')) {

        if ($article->image && file_exists(public_path($article->image))) {
            unlink(public_path($article->image));
        }

        $imagename = time() . '.' . $request->image->extension();

        $request->image->move(public_path('image'), $imagename);

        $validateddata['image'] = 'image/' . $imagename;

    } else {

        $validateddata['image'] = $article->image;
    }

    $article->update($validateddata);

    return redirect()->route('dashboard',$id)
        ->with('update', 'Article updated successful');
}

//SUPPRIMER UN ARTICLE

  public function destroy(int $id){
         $article = Article::findOrFail($id);
        $article->delete($id);
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
