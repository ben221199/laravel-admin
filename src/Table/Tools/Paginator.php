<?php

namespace Encore\Admin\Table\Tools;

use Encore\Admin\Table;
use Illuminate\Pagination\AbstractPaginator;
use Illuminate\Pagination\LengthAwarePaginator;

class TestPager extends AbstractPaginator {

	public function onFirstPage(){
		return true;
	}

	public function hasMorePages(){
		return true;
	}

	public function nextPageUrl(){
		return '<URL>';
	}

}

class Paginator extends AbstractTool
{
    /**
     * @var \Illuminate\Pagination\LengthAwarePaginator
     */
    protected $paginator = null;

    /**
     * @var bool
     */
    protected $perPageSelector = true;

    /**
     * Create a new Paginator instance.
     *
     * @param Table $table
     */
    public function __construct(Table $table, $perPageSelector = true)
    {
        $this->table = $table;
        $this->perPageSelector = $perPageSelector;

        $this->initPaginator();
    }

    /**
     * Initialize work for Paginator.
     *
     * @return void
     */
    protected function initPaginator()
    {
        //$this->paginator = $this->table->model()->eloquent();
		$this->paginator = new TestPager;//new LengthAwarePaginator([],20,5);

        //if ($this->paginator instanceof LengthAwarePaginator) {
        //    $this->paginator->appends(request()->all());
        //}
    }

    /**
     * Get Pagination links.
     *
     * @return string
     */
    protected function paginationLinks()
    {
    	return view('admin::table.pagination',[
    		'elements'		=> ['OWO',2,5,6,7],
    		'paginator'		=> $this->paginator,
		]);
        //return $this->paginator->render('admin::table.pagination');
    }

    /**
     * Get per-page selector.
     *
     * @return PerPageSelector
     */
    protected function perPageSelector()
    {
        if (!$this->perPageSelector) {
            return;
        }

        return new PerPageSelector($this->table);
    }

    /**
     * Get range infomation of paginator.
     *
     * @return string|\Symfony\Component\Translation\TranslatorInterface
     */
    protected function paginationRanger()
    {
        $parameters = [
            'first' => '[FIRST]',//$this->paginator->firstItem(),
            'last'  => '[LAST]',//$this->paginator->lastItem(),
            'total' => '[TOTAL]',//$this->paginator->total(),
        ];

        $parameters = collect($parameters)->flatMap(function ($parameter, $key) {
            return [$key => "<b>$parameter</b>"];
        });

        return trans('admin.pagination.range', $parameters->all());
    }

    /**
     * Render Paginator.
     *
     * @return string
     */
    public function render()
    {
        if (!$this->table->showPagination()) {
            return '';
        }

        return $this->paginationRanger().
            $this->paginationLinks().
            $this->perPageSelector();
    }
}
