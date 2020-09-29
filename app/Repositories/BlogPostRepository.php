<?php

namespace App\Repositories;

use App\Models\BlogPosts as Model;


class BlogPostRepository extends CoreRepository {

	protected function getModelClass() {

		return Model::class;
	}

	public function getAllWidthPaginate() {

		$columns = [
			'id',
			'title',
			'slug',
			'is_published',
			'published_at',
			'user_id',
			'blog_category_id',
		];

		$result = $this
			->startConditions()
			->select($columns)
			->orderBy('id', 'DESC')
			->with([
				'blogCategory:id,title',
				'user:id,name',
			])
			->paginate(25);

		return $result;
	}

	public function getRowIndex() {

		$result = $this
			->startConditions()
			->where('id', 3)
			//->toBase()
			//->get();
			//->find(1);
			//->limit(2)
			->get();
			//->first();
			//->all();

		$time = \Carbon\Carbon::now();
		//dd(__METHOD__, $result);

		return $time;
	}

	public function getRow($id) {

		$result = $this
			->startConditions()
			->find($id);

		return $result;
	}

	public function getDeletedRow($id) {

		$result = $this
			->startConditions()
			->withTrashed()
			->find($id);

		return $result;
	}
}