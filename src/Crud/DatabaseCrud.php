<?php
namespace Encore\Admin\Crud;

use Encore\Admin\Table\Filter\AbstractFilter;
use Encore\Admin\Table\Sort;
use Encore\Admin\Table\Tools\Paginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

class DatabaseCrud implements CrudInterface{

	/**
	 * @var Model $model
	 */
	private $model;

	public function __construct($model)
	{
		$this->model = $model;
	}


	/**
	 * @param AbstractFilter $filter
	 * @param Paginator $page
	 * @param Sort[] $sort
	 * @return CrudResult
	 */
	public function getItems($filter,$page,$sort): CrudResult
	{
		/**@var Builder $query*/
		$query = $this->model::query();

		//dd($sortType,$sortColumn);

		$query->orderBy($sort->getColumn(),$sort->getType());

		return new CrudResult($query->get());
	}

	public function getItem($id): CrudResult
	{
		return new CrudResult($this->model::query()->find($id));
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