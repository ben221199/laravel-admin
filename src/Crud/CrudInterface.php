<?php
namespace Encore\Admin\Crud;

use Encore\Admin\Table\Filter\AbstractFilter;
use Encore\Admin\Table\Sort;
use Encore\Admin\Table\Tools\Paginator;

interface CrudInterface{

	/**
	 * @param AbstractFilter[] $filter
	 * @param Paginator $page
	 * @param Sort[] $sort
	 * @return CrudResult
	 */
	public function getItems($filter,$page,$sort): CrudResult;		//	GET			/items

	public function getItem($id): CrudResult;		//	GET			/items/{item}

	public function addItem(): CrudResult;			//	POST		/items

	public function editItem($id): CrudResult;		//	PUT/PATCH	/items/{item}

	public function deleteItem($id): CrudResult;	//	DELETE		/items/{item}

}