<?php

namespace App\Services;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use App\Notifications\ArticleNotification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class  ArticleService
{
   public function CreateArticle(array $validateddata): Article {

        //verfier si category existe et le creer
        $category = Category::firstOrCreate(
            ['name'=>$validateddata['category']]
        );

        //assinger category id a notre schema de validation
        $validateddata['category_id']= $category->id;
         $validateddata['user_id']=Auth::id(); //save id de l'auteur connecter
         //verfie si image a ate envoye
        if(assert(($validateddata['image']))){
            $imagename=time().'.'.$validateddata['image']->extension();
            $validateddata['image']->move(public_path('image'),$imagename); //save image folder public
            $validateddata['image']='image/'.$imagename;   //save image en bdd
        }else{
           $validateddata['image']=null;  //if no image remain null
        }
        $article=Article::create($validateddata);
       $admin=User::where('email','ngendakuriyoleonce75@gmail.com')->first();
       $admin->notify(new ArticleNotification($article));
        return $article;
   }
    
    //afficher les articles crees par user
    public function dashboardarticles():Collection {
       return Article::with('category')->where('user_id', Auth::id())->get(); 
        
    }
     //recuperer id et article on va modifier
    public function dashboardarticlesingle(int $id):? Article{
         return Article::findOrFail($id);
       
    }
//update

   public function update(Article $article, array $validateddata): bool
{
    if (isset($validateddata['image'])) {

        // delete old image
        if ($article->image && file_exists(public_path($article->image))) {

            unlink(public_path($article->image));
        }

        // upload new image
        $imagename = time().'.'.$validateddata['image']->extension();

        $validateddata['image']->move(
            public_path('image'),
            $imagename
        );

        // save path in db
        $validateddata['image'] = 'image/'.$imagename;

    } else {

        // keep old image
        $validateddata['image'] = $article->image;
    }

    return $article->update($validateddata);
}

 public function destroy(Article $article):?bool{
         if ($article->image && file_exists(public_path($article->image))) {

            unlink(public_path($article->image));
        }
        return $article->delete();
    }
}
