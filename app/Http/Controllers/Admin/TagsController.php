<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\Categories\CategoryRequest;

use Illuminate\Support\Facades\DB;

use App\Model\Tag;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = DB::table('tags')->orderBy('id', 'DESC')->paginate(2);
        return view('admin.tags.list_tags', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tags.add_tag');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $tag = new Tag([
            'name'          =>  $request->name,
            'description'   =>  $request->description
        ]);
        $tag->save();
        return redirect()->route('tags.list')->with(['status' => 'Add tag was successful!']);
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
        $tag = DB::table('tags')->where('id', $id)->get();
        return view('admin.tags.edit_tag', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        DB::table('tags')
            ->where('id', $id)
            ->update([
                'name'          => $request->name,
                'description'   => $request->description
            ]);
        return redirect()->route('tags.list')->with(['status' => 'Update tag was successful!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = DB::table('tags')
            ->where('id', $id)
            ->delete();
        return redirect()->route('tags.list')->with(['status' => 'Delete tag was successful!']);
    }
}
