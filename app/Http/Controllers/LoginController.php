<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Input, Exception, Redirect, URL, TAuth;

/**
 * Kelas LoginController
 *
 * Digunakan untuk semua data Credit.
 *
 * @author     C Mooy <chelsy@thunderlab.id>
 */
class LoginController extends Controller
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
		return view('login.index');
	}

	/**
	 * login process
	 *
	 * @return Response
	 */
	public function logging()
	{
		//get input
		$credentials				= Input::only('email', 'password');

		try
		{
			//do authenticate
			$auth			= TAuth::login($credentials);
		}
		catch(Exception $e)
		{
			if(is_array($e->getMessage()))
			{
				return Redirect::route('login.index')->withErrors($e->getMessage());
			}
			else
			{
				return Redirect::route('login.index')->withErrors([$e->getMessage()]);
			}
		}

		//function from parent to redirecting
		return Redirect::route('dashboard.index');
	}

	/**
	 * logout
	 *
	 * @return Response
	 */
	public function logout()
	{
		//do authenticate
		$auth			= TAuth::signoff();

		//function from parent to redirecting
		return Redirect::route('login.index');
	}

	/**
	 * setting which office should be activate
	 *
	 * @return Response
	 */
	public function activateOffice($idx)
	{
		try
		{
			//do authenticate
			$auth			= TAuth::setOffice($idx);
		}
		catch(Exception $e)
		{
			if(is_array($e->getMessage()))
			{
				return Redirect::route('login.index')->withErrors($e->getMessage());
			}
			else
			{
				return Redirect::route('login.index')->withErrors([$e->getMessage()]);
			}
		}

		//function from parent to redirecting
		return redirect(URL::previous());
	}
}
