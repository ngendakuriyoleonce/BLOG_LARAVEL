<?php

namespace App\Http\Controllers;

use App\Http\Resources\ArticleResource;
use App\Models\Article;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class ArticleApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles=Article::all();
        return response()->json([
    'success' => true,
    'data' => ArticleResource::collection($articles),
]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate=$request->validate([
            'title'=>'required|string|max:255',
'description'=>'required|string',
'category_id'=>'required|integer|exists:category_id',
'user_id'=>'required|integer|exists:category_id',
'image'=>'nullable|image|mimes:jpeg,jpg,png,gif,tiff,raw,webp,heif,heic,bmp,svg|max:2048',
        ]);

     $articles=Article::create( $validate);
        return response()->json([
    'success' => true,
    'data' => new ArticleResource($articles),
],201);
    }

    /**
     * Display the specified resource.
     */
   public function show(string $id)
{
    try {

        $article = Article::findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => new ArticleResource($article)
        ]);

    } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {

        return response()->json([
            'success' => false,
            'message' => "Article Not Found",
        ], 404);

    }
}
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $validateddata = $request->validate([
         'title' => 'required|string|max:255',
    'description' => 'required|string',
  'category_id' => 'required|exists:categories,id',
    'image' => 'nullable|image|mimes:jpeg,jpg,png,gif,webp|max:2048',
    ]);
    $article=Article::FindOrFail($id);
    $article->update($validateddata);
    return response()->json([
            'success' => true,
            'data' => new ArticleResource($article)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
