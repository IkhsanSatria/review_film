<?php 
namespace App\Controllers\Admin;

use CodeIgniter\Controller;
use App\Models\Genre_model;

class Genre extends BaseController
{

	// mainpage
	public function index()
	{
		checklogin();
		$m_genre = new Genre_model();
		$genre 	= $m_genre->listing();
		$total 	= $m_genre->total();
		
	
		// Start validasi
		if($this->request->getMethod() === 'post' && $this->validate(
			[
				'nama_genre' 		=> 'required',
			])) {
			// masuk database
			
			$data = ['nama_genre'			=> $this->request->getPost('nama_genre'),
						 'created_at'				=> date("Y-m-d H:i:s")
					];
		
			$m_genre->save($data);
			// masuk database
			$this->session->setFlashdata('sukses','Data telah ditambah');
			return redirect()->to(base_url('admin/genre'));
	    }else{
			$data = [	'title'			=> 'Data Nama Genre  ('.$total['total'].' Genre )',
						'genre'			=> $genre,
						'content'		=> 'admin/genre/index'
					
					];
			echo view('admin/layout/wrapper',$data);
		}
	}

	// edit
	public function edit($id_genre)
	{
		checklogin();
		$m_genre = new Genre_model();
		$genre 	= $m_genre->detail($id_genre);
		
		// Start validasi
		if($this->request->getMethod() === 'post' && $this->validate(
			[
				'nama_genre' 		=> 'required',

            ])) {
			
					$data = ['nama_genre'			=> $this->request->getPost('nama_genre'),
					];
			
			$m_genre->update($id_genre,$data);
			// masuk database
			$this->session->setFlashdata('sukses','Data telah diedit');
			return redirect()->to(base_url('admin/genre'));
	    }else{
			$data = [	'title'			=> 'Edit Data Genre: '.$genre['nama_genre'],
						'genre'			=> $genre,
						'content'		=> 'admin/genre/edit'
						
					];
			echo view('admin/layout/wrapper',$data);
		}
	}



	public function delete($id_genre)
	{
		checklogin();
		$m_genre = new Genre_model();		
		$data = ['id_genre'	=> $id_genre];
		$m_genre->delete($data);
		// masuk database
		$this->session->setFlashdata('sukses','Data telah dihapus');
		return redirect()->to(base_url('admin/genre'));
	}
	
	
	
}