<?php 
namespace App\Controllers\Admin;

use CodeIgniter\Controller;
use App\Models\Rating_model;

class Rating extends BaseController
{

	// mainpage
	public function myrated()
	{
		checklogin();
		$m_rating = new Rating_model();
		$rating 	= $m_rating->listing();
		$total 	= $m_rating->total();
		
	
			$data = [	'title'			=> 'Data Rating  ('.$total.' Rating )',
						'rating'			=> $rating,
						'content'		=> 'akun/myrated'
					
					];
			echo view('layout/wrapper',$data);
		
	}

	public function listing_byuser($id_user)
    {
        $builder = $this->db->table("film");
        $builder = $this->select("film.*,genre.nama_genre,negara.nama_negara,users.name as nama_user, users.role");
        $builder->join("users", "users.id_user = film.id_user", "LEFT");
        $builder->join("genre", "genre.id_genre = film.genre", "LEFT");
        $builder->join("negara", "negara.id_negara = film.negara", "LEFT");
        $builder->where("film.id_user", $id_user);
        $builder->orderBy("film.id_film", "DESC");
        $query = $builder->get();
        return $query->getResultArray();
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