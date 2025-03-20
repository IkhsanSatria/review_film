<?php 
namespace App\Controllers\Admin;

use CodeIgniter\Controller;
use App\Models\Dasbor_model;

class Dasbor extends BaseController
{
	public function index()
	{
		checklogin();	

		$mdasbor 				= new Dasbor_model();	
		$totalfilm 				= $mdasbor->totalfilm();
		$totalsubscriber	 	= $mdasbor->totalsubscriber();
		$totalauthor			= $mdasbor->totalauthor();
		$totalgenre			 	= $mdasbor->totalgenre();
		$filmterbaru 			= $mdasbor->listingterbaru();
		$totalkomentar			= $mdasbor->totalkomentar();
		$totalrating 			= $mdasbor->totalrating();
		$data = [	'title'					=> 'Dashboard Aplikasi',
					'dasbor'				=>'Yes',
					'totalfilm'				=> $totalfilm,
					'totalsubscriber'		=> $totalsubscriber,
					'totalauthor'			=> $totalauthor,
					'totalgenre' 			=> $totalgenre,
					'filmterbaru'			=> $filmterbaru,
					'totalkomentar'			=> $totalkomentar,
					'totalrating'			=> $totalrating,
					'content'				=> 'admin/dasbor/index',
			

				];
		echo view('admin/layout/wrapper',$data);
	}
}