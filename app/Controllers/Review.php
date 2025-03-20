<?php 
namespace App\Controllers\Admin;

use CodeIgniter\Controller;
use App\Models\Komentar_model;

class Komentar extends BaseController
{

	// mainpage
	public function index()
	{
		checklogin();
		$m_komentar = new Komentar_model();
		$komentar 	= $m_komentar->listing();
		$total 	= $m_komentar->total();
		
	
			$data = [	'title'			=> 'Data Komentar  ('.$total.' Komentar )',
						'komentar'			=> $komentar,
						'content'		=> 'akun/myreview'
					
					];
			echo view('layout/wrapper',$data);
		
	}

	// edit
	public function edit($id_komentar)
	{
		checklogin();
		$m_komentar = new Komentar_model();
		$komentar 	= $m_komentar->detail($id_komentar);
		
		// Start validasi
		if($this->request->getMethod() === 'post' && $this->validate(
			[
				'nama_komentar' 		=> 'required',

            ])) {
			
					$data = ['nama_komentar'			=> $this->request->getPost('nama_komentar'),
					];
			
			$m_komentar->update($id_komentar,$data);
			// masuk database
			$this->session->setFlashdata('sukses','Data telah diedit');
			return redirect()->to(base_url('admin/komentar'));
	    }else{
			$data = [	'title'			=> 'Edit Data Komentar: '.$komentar['nama_komentar'],
						'komentar'			=> $komentar,
						'content'		=> 'admin/komentar/edit'
						
					];
			echo view('admin/layout/wrapper',$data);
		}
	}



	public function delete($id_komentar)
	{
		checklogin();
		$m_komentar = new Komentar_model();		
		$data = ['id_komentar'	=> $id_komentar];
		$m_komentar->delete($data);
		// masuk database
		$this->session->setFlashdata('sukses','Data telah dihapus');
		return redirect()->to(base_url('admin/komentar'));
	}
	
	
	
}