<?php
namespace Encore\Admin\Crud;

class DatabaseCrud implements CrudInterface{

	private $model;

	public function __construct($model)
	{
		$this->model = $model;
	}


	public function getItems(): CrudResult
	{
		return new CrudResult($this->model::all());
	}

	public function getItem($id): CrudResult
	{
		return new CrudResult($this->model::find($id));
	}

	public function addItem(): CrudResult
	{
		// TODO: Implement addItem() method.
	}

	public function editItem($id): CrudResult
	{
		// TODO: Implement editItem() method.
	}

	public function deleteItem($id): CrudResult
	{
		// TODO: Implement deleteItem() method.
	}
}