<?php

namespace App\Http\Controllers\Article;

use App\Entities\{Article,Category};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //search options
        $articles = Article::name($request->get('nombre'))->orderby('id', 'ASC')->paginate(10);

        $articles->each(function ($articles){
            $articles->category;
        });

        //dd($articles);
        return view('admin.articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories =  Category::pluck('nombre', 'id');

        return view('admin.articles.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation nombre required and unique
        $this->validate($request, [
            'nombre' => 'required',
            'descripcion' => 'required',
            'precio_unitario' => 'required|numeric|min:0|max:9999.99\'',
            'stock' => 'required|numeric',
        ]);

        //saves
        Article::create($request->all());

        flash('Articulo creado exitosamente!!', 'success');

        return redirect()->route('articles.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $categories =  Category::pluck('nombre', 'id');
        $article = Article::findOrFail($id);

        return view('admin.articles.edit', compact('categories', 'article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        $article->fill($request->all());
        $article->save();
        flash('Articulo Actualizado exitosamente!!', 'success');
        return redirect()->route('articles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);
        $article->delete();
        flash('Articulo borrado exitosamente!!', 'success');
        return redirect()->back();
    }
}
