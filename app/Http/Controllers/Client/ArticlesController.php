<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles           = DB::table('articles')->paginate(2);
        $recent_articles    = DB::table('articles')->orderBy('id', 'DESC')->limit(2)->get();
        $categories         = DB::table('categories')->get();
        $tags                = DB::table('tags')->get();
        return view('client.articles.list_articles')->with([
            'articles'          => $articles,
            'recent_articles'   => $recent_articles,
            'categories'        => $categories,
            'tags'              => $tags
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article            = DB::table('articles')->where('id', $id)->get();
        $recent_articles    = DB::table('articles')->orderBy('id', 'DESC')->limit(2)->get();
        $categories         = DB::table('categories')->get();
        $tags               = DB::table('tags')->get();
        $count_comments     = DB::table('comments')->where('article_id', $id)->count();
        $comments           = DB::table('comments')->where('article_id', $id)->orderBy('id','DESC')->limit(3)->simplePaginate(2);      
        return view('client.articles.show_article')->with([
            'article'           => $article,
            'recent_articles'   => $recent_articles,
            'categories'        => $categories,
            'tags'              => $tags,
            'comments'          => $comments,
            'count_comments'    => $count_comments
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function comment(Request $request, $id)
    {
        $name = $request->name;
        if (!Auth::guest()){
            $name = Auth::user()->name;
        }
        DB::table('comments')->insert([
            'article_id'    => $id,
            'name'          => $name,
            'content'       =>$request->content,
            'created_at'    => date('Y-m-d H:i:s')
        ]);
        return redirect()->to('articles/'.$id.'#comments');
    }
}
