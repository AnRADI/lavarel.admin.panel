<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Models\BlogCategories;
use App\Http\Requests\BlogCategoriesUpdateRequest;
use App\Http\Requests\BlogCategoriesCreateRequest;
use App\Repositories\BlogCategoriesRepository;
use Illuminate\Support\Str;

class CategoriesController extends BaseController
{
	private $blogCategoriesRepository;

	public function __construct() {

		parent::__construct();

		$this->blogCategoriesRepository = app(BlogCategoriesRepository::class);
	}

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginator = $this->blogCategoriesRepository->getAllWidthPaginate(5);

        return view('blog.admin.categories.index', compact('paginator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = new BlogCategories();
        $categoriesList = $this
			->blogCategoriesRepository
			->getForComboBox();

		$selectList = [];

		foreach($categoriesList as $categoriesItem) {
			$selectList[$categoriesItem->id] = $categoriesItem->id . '. ' . $categoriesItem->title;
		}

        return view('blog.admin.categories.edit', compact('item', 'selectList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogCategoriesCreateRequest $request)
    {
		$data = $request->all();

        if(empty($data['slug'])) {
			$data['slug'] = Str::slug($data['title']);
		}

        $item = BlogCategories::create($data);



        if($item) {
        	return redirect()
				->route('blog.admin.categories.index')
				->with(['success' => 'Успешно сохранено']);
		} else {
        	return back()
				->withErrors(['msg' => 'Ошибка сохранения'])
				->withInput();
		}


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
    public function edit($id, BlogCategoriesRepository $blogCategoriesRepository)
    {
        $item = $blogCategoriesRepository->getEdit($id);
        $categoriesList = $blogCategoriesRepository->getForComboBox();
        $selectList = [];

        foreach($categoriesList as $categoriesItem) {
        	$selectList[$categoriesItem->id] = $categoriesItem->id . '. ' . $categoriesItem->title;
		}

        return view('blog.admin.categories.edit', compact('item','selectList'));
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

        $result = $item->update($data);


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
