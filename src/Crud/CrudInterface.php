<?php
namespace Encore\Admin\Crud;


interface CrudInterface
{

	public function getItems(): CrudResult;		//	GET			/items

	public function getItem($id): CrudResult;		//	GET			/items/{item}

	public function addItem(): CrudResult;			//	POST		/items

	public function editItem($id): CrudResult;		//	PUT/PATCH	/items/{item}

	public function deleteItem($id): CrudResult;	//	DELETE		/items/{item}

}