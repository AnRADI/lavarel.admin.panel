<?php

namespace App\Http\Controllers\Blog\Admin;

use Illuminate\Http\Request;
use App\Models\BlogCategories;
use App\Http\Requests\BlogCategoriesUpdateRequest;

class CategoriesController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginator = BlogCategories::paginate(5);

        return view('blog.admin.categories.index', compact('paginator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        dd(__METHOD__);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd(__METHOD__);
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
        $item = BlogCategories::find($id);
        $categoriesList = BlogCategories::all();
        $selectList = [];

        foreach($categoriesList as $categoriesItem) {
        	$selectList[$categoriesItem->id] = $categoriesItem->id . '. ' . $categoriesItem->title;
		}

        return view('blog.admin.categories.edit', compact('item', 'categoriesList', 'selectList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogCategoriesUpdateRequest $request, $id)
    {
        $item = BlogCategories::find($id);


        $data = $request->all();

        $result = $item
			->fill($data)
			->save();


        if($result) {
        	return redirect()
				->route('blog.admin.categories.edit', $item->id)
				->with(['success' => 'Успешно сохранено']);
		} else {
        	return back()
				->withErrors(['msg' => 'Ошибка сохранения'])
				->withInput();
		}
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
}
