<?php 
namespace App\Controllers\Admin;

use CodeIgniter\Controller;
use App\Models\Negara_model;

class Negara extends BaseController
{

	// mainpage
	public function index()
	{
		checklogin();
		$m_negara = new Negara_model();
		$negara 	= $m_negara->listing();
		$total 	= $m_negara->total();
		
	
		// Start validasi
		if($this->request->getMethod() === 'post' && $this->validate(
			[
				'nama_negara' 		=> 'required',
			])) {
			// masuk database
			
			$data = ['nama_negara'			=> $this->request->getPost('nama_negara'),
						 'created_at'				=> date("Y-m-d H:i:s")
					];
		
			$m_negara->save($data);
			// masuk database
			$this->session->setFlashdata('sukses','Data telah ditambah');
			return redirect()->to(base_url('admin/negara'));
	    }else{
			$data = [	'title'			=> 'Data Nama Negara  ('.$total['total'].' Negara )',
						'negara'			=> $negara,
						'content'		=> 'admin/negara/index'
					
					];
			echo view('admin/layout/wrapper',$data);
		}
	}

	// edit
	public function edit($id_negara)
	{
		checklogin();
		$m_negara = new Negara_model();
		$negara 	= $m_negara->detail($id_negara);
		
		// Start validasi
		if($this->request->getMethod() === 'post' && $this->validate(
			[
				'nama_negara' 		=> 'required',

            ])) {
			
					$data = ['nama_negara'			=> $this->request->getPost('nama_negara'),
					];
			
			$m_negara->update($id_negara,$data);
			// masuk database
			$this->session->setFlashdata('sukses','Data telah diedit');
			return redirect()->to(base_url('admin/negara'));
	    }else{
			$data = [	'title'			=> 'Edit Data Negara: '.$negara['nama_negara'],
						'negara'			=> $negara,
						'content'		=> 'admin/negara/edit'
						
					];
			echo view('admin/layout/wrapper',$data);
		}
	}



	public function delete($id_negara)
	{
		checklogin();
		$m_negara = new Negara_model();		
		$data = ['id_negara'	=> $id_negara];
		$m_negara->delete($data);
		// masuk database
		$this->session->setFlashdata('sukses','Data telah dihapus');
		return redirect()->to(base_url('admin/negara'));
	}
	
	
	
}