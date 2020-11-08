<?php
namespace Encore\Admin\Table;

class Sort{

	protected $column;

	protected $type;

	public function __construct($column,$type){
		$this->column = $column;
		$this->type = $type;
	}

	public function getColumn(){
		return $this->column;
	}

	public function getType(){
		return $this->type;
	}

	public function isAscending(): bool{
		return !$this->isDescending();
	}

	public function isDescending(): bool{
		return $this->getType()==='desc';
	}

}