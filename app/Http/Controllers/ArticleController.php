<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Author;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::with(['author','category'])->get();
        return view('pages.article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $authors = Author::pluck('name','id')->prepend('Pilih Author', '');
        $categories = Category::pluck('name','id')->prepend('Pilih Category', '');
        return view('pages.article.create', compact(['authors','categories']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleRequest $request)
    {
        $data = $request->all();

        if ($request->hasFile('image'))
        {
            $data['image'] =  $request->file("image")?->store(
                "article/image",
                "public"
            );
        }

        Article::create($data);
        return redirect()->route('article.index')->with(['message' => 'berhasil menambah data article']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $article = Article::findOrFail($id);

        return $article;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $article = Article::findOrFail($id);
        $authors = Author::pluck('name','id')->prepend('Pilih Author', '');
        $categories = Category::pluck('name','id')->prepend('Pilih Category', '');
        return view('pages.article.edit', compact(['article','categories','authors']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();

        if (!$request->category_id || !$request->author_id) throw new \Exception('Isi Category atau Author Terlebih Dahulu');

        if ($request->hasFile('image'))
        {
            $data['image'] =  $request->file("image")?->store(
                "article/image",
                "public"
            );
        }
        $article = Article::findOrFail($id);
        $article->update($data);

        return  redirect()->route('article.index')->with(['message' => 'berhasil merubah data article']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Article::findOrFail($id)->delete();

        return  redirect()->route('article.index')->with(['message' => 'berhasil menghapus data article']);
    }
}
