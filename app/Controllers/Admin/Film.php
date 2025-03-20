<?php 
namespace App\Controllers\Admin;

use CodeIgniter\Controller;
use App\Models\Film_model;
use App\Models\Genre_model;
use App\Models\Negara_model;
use App\Models\Sinopsis_model;


class Film extends BaseController
{
	public $utama ="index";
	// index
	public function index()
	{
		checklogin();
		$m_film 		= new Film_model();
		$film 		= $m_film->listing();
		$total 			= $m_film->total();

		$data = [	'title'			=> 'Data Film ('.$total.')',
					'film'		=> $film,
					'content'		=> 'admin/film/index'
				];
		echo view('admin/layout/wrapper',$data);
	}

		
	// status_film
	public function status_film($status_film)
	{
		checklogin();
		$m_film 		= new Film_model();
		$film 		= $m_film->status_film_all($status_film);
		$total 			= $m_film->total_status_film($status_film);

		$data = [	'title'			=> $status_film.' ('.$total.')',
					'film'		=> $film,
					'content'		=> 'admin/film/index'
				];
		echo view('admin/layout/wrapper',$data);
	}

	// author
	public function author($id_user)
	{
		checklogin();
		$m_film 		= new Film_model();
		$m_user 		= new User_model();
		$user 			= $m_user->detail($id_user);
		$film 			= $m_film->author_all($id_user);
		$total 			= $m_film->total_author($id_user);

		$data = [	'title'			=> $user['name'].' ('.$total.')',
					'film'		=> $film,
					'content'		=> 'admin/film/index'
				];
		echo view('admin/layout/wrapper',$data);
	}

	// Tambah
	public function tambah()
	{
		checklogin();
		$m_film 		= new Film_model();
		$m_genre 		= new Genre_model();
		$m_negara		= new Negara_model();

		$genre = $m_genre->listing();
		$negara = $m_negara->listing();
		// Start validasi
		if($this->request->getMethod() === 'post' && $this->validate(
			[
				'nama_film' 	=> 'required',
				'gambar_film'	 	=> [
					                'mime_in[gambar_film,image/jpg,image/jpeg,image/gif,image/png]',
					                'max_size[gambar_film,4096]',
            					],
        	])) {
			if(!empty($_FILES['gambar_film']['name'])) {
				// Image upload
				$avatar  	= $this->request->getFile('gambar_film');
				$namabaru 	= str_replace(' ','-',$avatar->getName());
	            $avatar->move(WRITEPATH . '../assets/upload/image/',$namabaru);
	            // Create thumb
	            $image = \Config\Services::image()
			    ->withFile(WRITEPATH . '../assets/upload/image/'.$namabaru)
			    ->fit(100, 100, 'center')
			    ->save(WRITEPATH . '../assets/upload/image/thumbs/'.$namabaru);
	        	// masuk database
	        	$data = array(
					'id_user'	=> session()->get('id_user'),
					'nama_film'		=> $this->request->getVar('nama_film'),
					'trailer'			=> $this->request->getVar('trailer'),
					'gambar_film' 		=> $namabaru,
					'deskripsi'		=> $this->request->getVar('deskripsi'),
					'sinopsis'	=> $this->request->getVar('sinopsis'),
					'genre'			=> $this->request->getVar('genre'),
					'negara'			=> $this->request->getVar('negara'),
					'durasi'			=> $this->request->getVar('durasi'),
					'kategori_umur'			=> $this->request->getVar('kategori_umur'),
					'tahun_rilis'			=> $this->request->getVar('tahun_rilis'),
	
	        	);
	        	$m_film->save($data);
	        	
	        	return redirect()->to(base_url('admin/film/'.$this->utama))->with('sukses', 'Data Berhasil di Simpan');
	        }else{
	        	$data = array(
					'id_user'	=> session()->get('id_user'),
					'nama_film'		=> $this->request->getVar('nama_film'),
					'trailer'			=> $this->request->getVar('trailer'),
					// 'gambar_film' 		=> $namabaru,
					'deskripsi'		=> $this->request->getVar('deskripsi'),
					'sinopsis'	=> $this->request->getVar('sinopsis'),
					'genre'			=> $this->request->getVar('genre'),
					'negara'			=> $this->request->getVar('negara'),
					'durasi'			=> $this->request->getVar('durasi'),
					'kategori_umur'			=> $this->request->getVar('kategori_umur'),
					'tahun_rilis'			=> $this->request->getVar('tahun_rilis'),
	
	        	);
	        	$m_film->save($data);
	        	return redirect()->to(base_url('admin/film/'.$this->utama))->with('sukses', 'Data Berhasil di Simpan');
	        }
	        
	    }
		$data = [	'title'			=> 'Tambah Film',
					'genre'			=> $genre,
					'negara'		=> $negara,
					'content'		=> 'admin/film/tambah'
				];
		echo view('admin/layout/wrapper',$data);
	}

	// edit
	public function edit($id_film)
	{
		checklogin();
		$m_film 		= new Film_model();
		$film 		= $m_film->detail($id_film);
		$m_genre 		= new Genre_model();
		$m_negara		= new Negara_model();

		$genre = $m_genre->listing();
		$negara = $m_negara->listing();
		// Start validasi
		if($this->request->getMethod() === 'post' && $this->validate(
			[
				'nama_film' 	=> 'required',
				'gambar_film'	 	=> [
					                'mime_in[gambar_film,image/jpg,image/jpeg,image/gif,image/png]',
					                'max_size[gambar_film,4096]',
            					],
        	])) {
			if(!empty($_FILES['gambar_film']['name'])) {
				// Image upload
				$avatar  	= $this->request->getFile('gambar_film');
				$namabaru 	= str_replace(' ','-',$avatar->getName());
	            $avatar->move(WRITEPATH . '../assets/upload/image/',$namabaru);
	            // Create thumb
	            $image = \Config\Services::image()
			    ->withFile(WRITEPATH . '../assets/upload/image/'.$namabaru)
			    ->fit(100, 100, 'center')
			    ->save(WRITEPATH . '../assets/upload/image/thumbs/'.$namabaru);
	        	// masuk database
	        	$data = array(
	        		'id_film'		=> $id_film,
					'nama_film'		=> $this->request->getVar('nama_film'),
					'trailer'		=> $this->request->getVar('trailer'),
					'gambar_film' 	=> $namabaru,
					'deskripsi'		=> $this->request->getVar('deskripsi'),
					'sinopsis'		=> $this->request->getVar('sinopsis'),
					'genre'			=> $this->request->getVar('genre'),
					'negara'		=> $this->request->getVar('negara'),
					'durasi'		=> $this->request->getVar('durasi'),
					'kategori_umur'	=> $this->request->getVar('kategori_umur'),
					'tahun_rilis'	=> $this->request->getVar('tahun_rilis'),
	
	        	);
	        	$gambar = $m_film->find($id_film);
				$filegambar = $gambar['gambar_film'];
				if(!empty($filegambar)){
					if(file_exists('../assets/upload/image/'.$filegambar)){
						unlink('../assets/upload/image/'.$filegambar);
						unlink('../assets/upload/image/thumbs/'.$filegambar);
					}
					
				}
	        	$m_film->edit($data);
       		 	return redirect()->to(base_url('admin/film'))->with('sukses', 'Data Berhasil di Simpan');
	        }else{
	        	$data = array(
	        		'id_film'		=> $id_film,
					'nama_film'		=> $this->request->getVar('nama_film'),
					'trailer'		=> $this->request->getVar('trailer'),
					// 'gambar_film' 	=> $namabaru,
					'deskripsi'		=> $this->request->getVar('deskripsi'),
					'sinopsis'		=> $this->request->getVar('sinopsis'),
					'genre'			=> $this->request->getVar('genre'),
					'negara'		=> $this->request->getVar('negara'),
					'durasi'		=> $this->request->getVar('durasi'),
					'kategori_umur'	=> $this->request->getVar('kategori_umur'),
					'tahun_rilis'	=> $this->request->getVar('tahun_rilis'),
	
	        	);
	        	$m_film->edit($data);
				return redirect()->to(base_url('admin/film'))->with('sukses', 'Data Berhasil di Simpan');
	        }
	    }

		$data = [	'title'			=> 'Edit Film: '.$film['nama_film'],
					'film'		=> $film,
					'genre'			=> $genre,
					'negara'		=> $negara,
					'content'		=> 'admin/film/edit'
				];
		echo view('admin/layout/wrapper',$data);
	}
	
	// Delete
	public function delete($id_film)
	{
		checklogin();
		$m_film = new Film_model();
		$gambar = $m_film->find($id_film);
		$filegambar = $gambar['gambar_film'];
		if(!empty($filegambar)){
			if(file_exists('../assets/upload/image/'.$filegambar)){
				unlink('../assets/upload/image/'.$filegambar);
				unlink('../assets/upload/image/thumbs/'.$filegambar);
			}
			
		}
		$data = ['id_film'	=> $id_film];
		$m_film->delete($data);
		// masuk database
		$this->session->setFlashdata('sukses','Data telah dihapus');
		return redirect()->to(base_url('admin/film'));


		
	}
}