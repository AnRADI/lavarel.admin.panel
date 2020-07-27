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

	public function getForComboBox() {

		$result = $this
			->startConditions()
			->selectRaw('*, CONCAT (id, ". ", title) AS id_title')
			->toBase()
			->get();

		return $result;
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