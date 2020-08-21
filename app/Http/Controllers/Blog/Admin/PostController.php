<?php

namespace App\Http\Controllers\Blog\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\BlogPostUpdateRequest;
use App\Repositories\BlogPostRepository;
use App\Repositories\BlogCategoriesRepository;
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

        return view('blog.admin.posts.index', compact('paginator'));
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

		$data = $request->all();


		if(empty($data['slug'])) {
			$data['slug'] = Str::slug($data['title']);
		}

		if(empty($row->published_at) && $data['is_published']) {
			$data['published_at'] = Carbon::now();
		}


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

    }
}
