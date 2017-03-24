<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Thunderlabid\Billing\Models\Tagihan;

use Input, Exception, Redirect, URL, TAuth, Response, Session;

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

		return view('tagihan.index', compact('tagihan'));
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

		return view('tagihan.index', compact('tagihan'));
	}

	/**
	 * create data kredit baru
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('tagihan.create', compact('tagihan'));
	}

	public function dummyget()
	{
		Session::flush();
		$data 		= [];

		if(Session::has('tagihan_detail'))
		{
			$data 	= Session::get('tagihan_detail');
		}

		return Response::json(['data' => $data]);
	}

	public function dummypost()
	{
		$data 		= [];

		if(Session::has('tagihan_detail'))
		{
			$data 	= Session::get('tagihan_detail');
		}

		if(str_is(Input::get('action'), 'create'))
		{
			$row_number 			= count($data);

			do
			{
				$row_id 			= "row_".($row_number + 1);
				$modify_key 		= array_search($row_id, array_column($data, 'DT_RowId'));
			}
			while ($modify_key);

			$input['DT_RowId']		= $row_id;
			$input 					= array_merge($input, Input::get('data')[0]);
			
			Session::put('tagihan_detail', array_merge($data, [$input]));
			
			$data 					= [$input];
		}

		if(str_is(Input::get('action'), 'edit'))
		{
			$input 					= Input::get('data');
			foreach ($input as $key => $value) 
			{
				$modify_key 		= array_search($key, array_column($data, 'DT_RowId'));

				foreach ($value as $key2 => $value2) 
				{
					$data[$modify_key][$key2] = $value2;
				}
			}

			Session::put('tagihan_detail', $data);
		}

		if(str_is(Input::get('action'), 'remove'))
		{
			$input 					= Input::get('data');
			foreach ($input as $key => $value) 
			{
				$modify_key = array_search($key, array_column($data, 'DT_RowId'));

				unset($data[$modify_key]);
			}

			Session::put('tagihan_detail', $data);
		}

		return Response::json(['data' => $data]);
	}
}
