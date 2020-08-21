<?php

namespace App\Repositories;

use App\Models\BlogCategories as Model;


class BlogCategoriesRepository extends CoreRepository {

	protected function getModelClass() {
		return Model::class;
	}

	public function getEdit($id) {
		return $this->startConditions()->find($id);
	}

	public function getSelectList() {

		$categoriesList = $this
			->startConditions()
			->selectRaw('*, CONCAT (id, ". ", title) AS id_title')
			->toBase()
			->get();

		$selectList = [];


		foreach($categoriesList as $categoriesItem) {
			$selectList[$categoriesItem->id] = $categoriesItem->id_title;
		}

		return $selectList;
	}

	public function getAllWidthPaginate($perPage = null) {

		$columns = ['id', 'title', 'parent_id'];

		$result = $this
			->startConditions()
			->select($columns)
			->toBase()
			->paginate($perPage);


		return $result;
	}

}