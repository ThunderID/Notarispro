<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	protected function __construct()
	{
		$this->page_attributes 	= new \StdClass;
		$this->page_datas 		= new \StdClass;

		\View::share('page_attributes', $this->getPageAttributes());
		\View::share('page_datas', $this->getPageAttributes());
	}

	private function &getPageAttributes() 
	{
		return $this->page_attributes;
	}

	private function &getPageDatas() 
	{
		return $this->page_datas;
	}
}
