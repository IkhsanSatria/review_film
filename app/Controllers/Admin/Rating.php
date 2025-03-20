<?php 
namespace App\Controllers\Admin;

use CodeIgniter\Controller;
use App\Models\Rating_model;

class Rating extends BaseController
{

	// mainpage
	public function index()
	{
		checklogin();
		$m_rating = new Rating_model();
		$rating 	= $m_rating->listing();
		$total 	= $m_rating->total();
		
	
			$data = [	'title'			=> 'Data Rating  ('.$total.' Rating )',
						'rating'			=> $rating,
						'content'		=> 'admin/rating/index'
					
					];
			echo view('admin/layout/wrapper',$data);
		
	}

	

	// edit
	public function edit($id_rating)
	{
		checklogin();
		$m_rating = new Rating_model();
		$rating 	= $m_rating->detail($id_rating);
		
		// Start validasi
		if($this->request->getMethod() === 'post' && $this->validate(
			[
				'nama_rating' 		=> 'required',

            ])) {
			
					$data = ['nama_rating'			=> $this->request->getPost('nama_rating'),
					];
			
			$m_rating->update($id_rating,$data);
			// masuk database
			$this->session->setFlashdata('sukses','Data telah diedit');
			return redirect()->to(base_url('admin/rating'));
	    }else{
			$data = [	'title'			=> 'Edit Data Rating: '.$rating['nama_rating'],
						'rating'			=> $rating,
						'content'		=> 'admin/rating/edit'
						
					];
			echo view('admin/layout/wrapper',$data);
		}
	}



	public function delete($id_rating)
	{
		checklogin();
		$m_rating = new Rating_model();		
		$data = ['id_rating'	=> $id_rating];
		$m_rating->delete($data);
		// masuk database
		$this->session->setFlashdata('sukses','Data telah dihapus');
		return redirect()->to(base_url('admin/rating'));
	}
	
	
	
}