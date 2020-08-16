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
				//'blog_category:id,title',
				'blog_category' => function($query)
				{
					$query
						->select(['id', 'title']);
				},
				'user:id,name',
			])
			//->toBase()
			->paginate(25);


		return $result;
	}

	public function getEdit($id) {
		return $this->startConditions()->find($id);
	}
}