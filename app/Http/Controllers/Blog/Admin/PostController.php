<?php

namespace App\Http\Controllers\Blog\Admin;

use Carbon\Carbon;

use App\Http\Requests\BlogPostUpdateRequest;
use App\Http\Requests\BlogPostStoreRequest;

use App\Repositories\BlogPostRepository;
use App\Repositories\BlogCategoriesRepository;

use App\Models\BlogPosts;

use Illuminate\Support\Str;

class PostController extends BaseController
{

	private $blogPostRepository;
	private $blogCategoriesRepository;

	public function __construct() {

		parent::__construct();

		$this->blogPostRepository = app(BlogPostRepository::class);
		$this->blogCategoriesRepository = app(BlogCategoriesRepository::class);
	}

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$paginator = $this->blogPostRepository->getAllWidthPaginate();
    	$gg = $this->blogPostRepository->getRowIndex();


        return view('blog.admin.posts.index', compact('paginator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$selectList = $this
			->blogCategoriesRepository
			->getSelectList();


		return view('blog.admin.posts.create', compact('selectList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogPostStoreRequest $request)
    {
		$data = $request->all();

		$item = BlogPosts::create($data);


		if($item) {
			return redirect()
				->route('blog.admin.posts.edit', $item->id)
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
    public function edit($id)
    {
		$row = $this
			->blogPostRepository
			->getRow($id);

		$selectList = $this
			->blogCategoriesRepository
			->getSelectList();



		return view('blog.admin.posts.edit', compact('row','selectList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogPostUpdateRequest $request, $id)
    {
        $row = $this
			->blogPostRepository
			->getRow($id);


        if(empty($row)) {
        	return back()
				->withErrors(['msg' => "Ошибка записи [{$id}]"])
				->withInput();
		}


		$data = $request->all();

		$result = $row->update($data);


		if($result) {
			return redirect()
				->route('blog.admin.posts.edit', $row->id)
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
		$result = BlogPosts::destroy($id);

		//$result = BlogPosts::find($id)->forceDelete();

		if($result) {
			return redirect()
				->route('blog.admin.posts.index')
				->with(['success' => "Запись id[{$id}] удалена ", 'restore' => $id]);
		} else {
			return back()
				->withErrors(['msg' => 'Ошибка удаления']);
		}
    }

    public function restore($id)
	{
    	$row = $this->blogPostRepository->getDeletedRow($id);

    	$result = $row->restore();

		if($result) {
			return back()
				->with(['success' => "Запись id[{$id}] успешно восстановлена"]);
		} else {
			return back()
				->withErrors(['msg' => "Ошибка восстановления id[{$id}]"]);
		}
	}
}
