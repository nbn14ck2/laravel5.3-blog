<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\Categories\CategoryRequest;

use Illuminate\Support\Facades\DB;

use App\Model\Category;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = DB::table('categories')->orderBy('id', 'DESC')->paginate(2);
        return view('admin.categories.list_categories', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.add_category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $category           = new Category([
            'name'          =>  $request->name,
            'description'   =>  $request->description
        ]);
        $category->save();
        return redirect()->route('categories.list')->with(['status' => 'Add category was successful!']);
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
        $category = DB::table('categories')->where('id', $id)->get();
        return view('admin.categories.edit_category', compact('category'));
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
        DB::table('categories')
            ->where('id', $id)
            ->update([
                'name'          => $request->name,
                'description'   => $request->description
            ]);
        return redirect()->route('categories.list')->with(['status' => 'Update category was successful!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category   = DB::table('categories')
                    ->where('id', $id)
                    ->delete();
        return redirect()->route('categories.list')->with(['status' => 'Delete category was successful!']);
    }
}
