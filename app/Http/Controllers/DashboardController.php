<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Input, Exception, Redirect, URL, TAuth;

/**
 * Kelas DashboardController
 *
 * Digunakan untuk semua data Credit.
 *
 * @author     C Mooy <chelsy@thunderlab.id>
 */
class DashboardController extends Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->page_attributes->title 		= 'Dashboard';
		$this->page_attributes->active_nav 	= ['dashboard'];
	}

	/**
	 * lihat semua data credit
	 *
	 * @return Response
	 */
	public function index()
	{
		$messages 		= 'Under Construction';
		
		// $akta 			= view('errors.section', compact('messages'));
		// $klien 			= view('errors.section', compact('messages'));

		return view('dashboard.index');
	}
}
