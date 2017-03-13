<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Thunderlabid\Application\Queries\Navigation\NavbarService;

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
	/**
	 * Creates construct from controller to get instate some stuffs
	 */
	public function __construct()
	{
		// parent::__construct();
	}

	/**
	 * lihat semua data credit
	 *
	 * @return Response
	 */
	public function index()
	{
		$navbars 		= NavbarService::all();

		$navbar 		= view('navigation.top', compact('navbars'));

		$messages 		= 'Under Construction';
		
		$akta 			= view('errors.section', compact('messages'));
		$klien 			= view('errors.section', compact('messages'));

		return view('dashboard.index')->with('navbar', $navbar)->with('akta', $akta)->with('klien', $klien);
	}
}
