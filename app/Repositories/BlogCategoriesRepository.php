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
		return $this->startConditions()->all();
	}

}