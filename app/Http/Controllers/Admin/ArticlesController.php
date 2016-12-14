<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Articles\ArticleRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Model\Article;
use App\Model\Category;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = DB::table('articles')->orderBy('id', 'DESC')->paginate(2);
        return view('admin.articles.list_articles', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = DB::table('tags')->get();
        $categories = DB::table('categories')->get();
        return view('admin.articles.add_article')->with([
            'categories'    => $categories,
            'tags'           => $tags
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $imageName = time().'.'.$request->Imagefile->getClientOriginalExtension();
        $request->Imagefile->move(public_path('resources/upload'), $imageName);
        $article = new Article([
            'title'         => $request->title,
            'description'   => $request->description,
            'author'        => Auth::user()->name,
            'content'       => $request->content,
            'image'         => $imageName
        ]);
        $article->save();

        $article->categories()->sync($request->categories, false);
        $article->tags()->sync($request->tags, false);
        return redirect()->route('articles.list')->with(['status' => 'The blog post was successfully save!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = DB::table('articles')->where('id', $id)->get();
        return view('admin.articles.edit_article', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, $id)
    {
        $imageName = time().'.'.$request->Imagefile->getClientOriginalExtension();
        $request->Imagefile->move(public_path('resources/upload'), $imageName);
        $article = DB::table('articles')
                ->where('id', $id)
                ->update([
                    'title'         => $request->title,
                    'description'   => $request->description,
                    'content'       => $request->content,
                    'image'         => $imageName
                ]);
        return redirect()->route('articles.list')->with(['status' => 'This post was successfully saved.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = DB::table('articles')->where('id', $id)->delete();
        return redirect()->route('articles.list')->with(['status' => 'The post was successfully deleted.']);
    }
}
