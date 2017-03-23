<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Thunderlabid\Billing\Models\Tagihan;

use Input, Exception, Redirect, URL, TAuth;

/**
 * Kelas TagihanController
 *
 * Digunakan untuk semua data Credit.
 *
 * @author     C Mooy <chelsy@thunderlab.id>
 */
class TagihanController extends Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->page_attributes->title 		= 'Tagihan';
		$this->page_attributes->active_nav 	= ['keuangan', 'tagihan'];
	}

	/**
	 * lihat semua data billing
	 *
	 * @return Response
	 */
	public function index()
	{
		$this->page_attributes->search_result 		= 'Menampilkan semua data';

		$tagihan 		= new Tagihan;

		if(Input::has('q'))
		{
			$tagihan 	= $tagihan->where('dikeluarkan_untuk', 'like', '%'.Input::get('q').'%');
			$this->page_attributes->search_result 		= 'Pencarian Nama "'.Input::get('q').'"';
		}

		$tagihan 		= $tagihan->simplePaginate(10);

		return view('tagihan.index', compact('tagihan'))
				->with('page_attributes', $this->page_attributes);
	}

	/**
	 * lihat spesifik data credit
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$tagihan 		= new Tagihan;
		$tagihan 		= $tagihan->findorfail($id);

		$this->page_attributes->search_result 		= 'Menampilkan data ';


		if(Input::has('q'))
		{
			$tagihan 	= $tagihan->where('dikeluarkan_untuk', 'like', '%'.Input::get('q').'%');
			$this->page_attributes->search_result 		= 'Pencarian Nama "'.Input::get('q').'"';
		}

		$tagihan 		= $tagihan->simplePaginate(10);

		return view('tagihan.index', compact('tagihan'))
				->with('page_attributes', $this->page_attributes);
	}
}
