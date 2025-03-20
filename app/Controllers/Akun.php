<?php
namespace App\Controllers;

use App\Models\Favorite_model;
use CodeIgniter\Controller;
use App\Models\User_model;
use App\Models\Film_model;
use App\Models\Komentar_model;
use App\Models\Rating_model;
use App\Models\Genre_model;
use App\Models\Negara_model;



class Akun extends BaseController
{
  public function __construct()
  {
    helper(["form", "website"]);
    checkloginFront();
  }

  // Homepage
  public function index()
  {
    $id_user = $this->session->get("id_user");
    $muser = new User_model();
    $user = $muser->detail($id_user);
	// Start validasi
	if($this->request->getMethod() === 'post' && $this->validate(
		[
		'gambar'	=> [
			'mime_in[gambar,image/jpg,image/jpeg,image/gif,image/png]',
			'max_size[gambar,4096]'
		],
		])) {
		if(!empty($_FILES['gambar']['name'])) {

			// Image upload
			$avatar  	= $this->request->getFile('gambar');
			$namabaru 	= $avatar->getRandomName();
			$avatar->move(WRITEPATH . '../assets/upload/user/',$namabaru);
			// Create thumb
			$image = \Config\Services::image()
			->withFile(WRITEPATH . '../assets/upload/user/'.$namabaru)
			->fit(100, 100, 'center')
			->save(WRITEPATH . '../assets/upload/user/thumbs/'.$namabaru);
			// masuk database
			// masuk database
			
				$data = [	'name'			=> $this->request->getPost('name'),
							'usia'			=> $this->request->getPost('usia'),
							'email'			=> $this->request->getPost('email'),
							//'password'		=> password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
							'profile'		=> $this->request->getPost('profile'),
							'gambar'		=> $namabaru
					];
			
		}else{

			
			
				$data = [	'name'			=> $this->request->getPost('name'),
							'usia'			=> $this->request->getPost('usia'),
							'email'			=> $this->request->getPost('email'),
						//	'password'		=> password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
							'profile'		=> $this->request->getPost('profile'),
						//	'gambar'		=> $namabaru
					];
		
		}
		$muser->update($id_user,$data);
		// masuk database
		$this->session->setFlashdata('sukses','Data telah diedit');
		return redirect()->to(base_url('akun'));
	}else{
   
    $data = [
      "content" => "akun/index",
      "title"   =>"Halaman Profil User",
      "menu"    =>"My Profil",
      "session" => $this->session,
	  "aktif" => 1,
      "user" => $user,
    
    ];
    echo view("layout/wrapper", $data);
	}
  }

  public function mymovies()
  {
    $session = \Config\Services::session();
    $id_user = $this->session->get("id_user");
    $muser = new User_model();
    $user = $muser->detail($id_user);
    $m_film = new Film_model();
    $film = $m_film->listing_byuser($id_user);
    $total = $m_film->total_byuser($id_user);
    $data = [
		"title" => "Data Movies Saya  (" . $total . " Movies )",
		"menu"  => "My Movies",
		"film" => $film,
		"user" => $user,
		"total"=> $total,
		"session" => $session,
		"aktif" => 2,

		"content" => "akun/mymovies",
    ];
    echo view("layout/wrapper", $data);
  }

  public function myrated()
	{
		$session = \Config\Services::session();
		$id_user = $this->session->get("id_user");
		$muser = new User_model();
		$user = $muser->detail($id_user);
		$m_rating = new Rating_model();
		$rating = $m_rating->listing_byuser($id_user);
		$total = $m_rating->totalByUser($id_user);
		$data = [
			"title" => "Data rated Saya  (" . $total . " Movies )",
			"menu"  => "Rated Movies",
			"rating" => $rating,
			"user" => $user,
			"total"=> $total,
			"session" => $session,
			"aktif" => 3,

			"content" => "akun/myrated",
		];
		echo view("layout/wrapper", $data);
	}

	public function myfavorite()
	{
		$session = \Config\Services::session();
		$id_user = $this->session->get("id_user");
		$muser = new User_model();
		$user = $muser->detail($id_user);
		$m_favorite = new Favorite_model();
		$favorite = $m_favorite->listing_byuser($id_user);
		$total = $m_favorite->totalByUser($id_user);
		$data = [
			"title" => "My Favorite Movies  (" . $total . " Movies )",
			"menu"  => "My Favorite Movies",
			"film" => $favorite,
			"user" => $user,
			"total"=> $total,
			"session" => $session,
			"aktif" => 4,

			"content" => "akun/myfavorite",
		];
		echo view("layout/wrapper", $data);
	}


	public function simpan_favorite()
    {
        $m_favorite = new Favorite_model();

        $id_user = session()->get('id_user');
        $id_film = $this->request->getPost('id_film');
        if (!$id_user) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Anda harus login untuk menambahkan favorite']);
        }

        $existingFav = $m_favorite->getUserFavorite($id_user, $id_film);

        if ($existingFav) {
            // Update fav jika user sudah memberi fav sebelumnya
            $m_favorite->delete(['id_favorite'=>$existingFav['id_favorite']]);
		
		return $this->response->setJSON(['status' => 'hapus', 'message' => 'Favorite berhasil dihapus']);

        } else {
            // Simpan fav baru
            $m_favorite->save([
                'id_user' => $id_user,
                'id_film' => $id_film,
            ]);

		return $this->response->setJSON(['status' => 'success', 'message' => 'Favorite berhasil disimpan']);
        }
    }

	public function delete_favorite($id_favorite){
		$m_favorite = new Favorite_model();		
		$data = ['id_favorite'	=> $id_favorite];
		$m_favorite->delete($data);
		// masuk database
		$this->session->setFlashdata('sukses','Data telah dihapus');
		return redirect()->to(base_url('akun/myfavorite'));
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

	public function myreview()
	{
		$session = \Config\Services::session();
		$id_user = $this->session->get("id_user");
		$muser = new User_model();
		$user = $muser->detail($id_user);
		$m_komentar = new Komentar_model();
		$komentar 	= $m_komentar->listing_byuser($id_user);
		$total 	= $m_komentar->totalByUser($id_user);
		$data = [
			"title" => "Data reviews Saya  (" . $total['total'] . " Movies )",
			"menu"  => "Rated Movies",
			"komentar"=> $komentar,
			"user" => $user,
			"total"=> $total['total'],
			"session" => $session,
			"aktif" => 5,

			"content" => "akun/myreview",
		];
		echo view("layout/wrapper", $data);
	}


  // Tambah
	public function tambah_movie()
	{
		
		$m_film 		= new Film_model();
		$m_genre 		= new Genre_model();
		$m_negara		= new Negara_model();
    $session = \Config\Services::session();
    $id_user = $this->session->get("id_user");
    $muser = new User_model();
    $user = $muser->detail($id_user);
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
	        	
	        	return redirect()->to(base_url('akun/mymovies'))->with('sukses', 'Data Berhasil di Simpan');
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
	        	return redirect()->to(base_url('akun/mymovies'))->with('sukses', 'Data Berhasil di Simpan');
	        }
	        
	    }
		$data = [	
			'title'		=> 'Tambah Film',
            "menu"      => "Tambah Film",
			"aktif"		=> 2,
			'genre'		=> $genre,
			'negara'	=> $negara,
            "user"      => $user,
            "session"   => $session,
			'content'	=> 'akun/tambah_movie'
				];
		echo view('layout/wrapper',$data);
	}

// edit
// public function edit_movie()
// {
	
// 	$m_film 		= new Film_model();
// 	$film 		= $m_film->detail($id_film);
// 	$m_genre 		= new Genre_model();
// 	$m_negara		= new Negara_model();
// $session = \Config\Services::session();
// $id_user = $this->session->get("id_user");
// $muser = new User_model();
// $user = $muser->detail($id_user);
// 	$genre = $m_genre->listing();
// 	$negara = $m_negara->listing();
// 	// Start validasi
// 	if($this->request->getMethod() === 'post' && $this->validate(
// 		[
// 			'nama_film' 	=> 'required',
// 			'gambar_film'	 	=> [
// 								'mime_in[gambar_film,image/jpg,image/jpeg,image/gif,image/png]',
// 								'max_size[gambar_film,4096]',
// 							],
// 		])) {
// 		if(!empty($_FILES['gambar_film']['name'])) {
// 			// Image upload
// 			$avatar  	= $this->request->getFile('gambar_film');
// 			$namabaru 	= str_replace(' ','-',$avatar->getName());
// 			$avatar->move(WRITEPATH . '../assets/upload/image/',$namabaru);
// 			// Create thumb
// 			$image = \Config\Services::image()
// 			->withFile(WRITEPATH . '../assets/upload/image/'.$namabaru)
// 			->fit(100, 100, 'center')
// 			->save(WRITEPATH . '../assets/upload/image/thumbs/'.$namabaru);
// 			// masuk database
// 			$data = array(
// 				'id_film'		=> $id_film,
// 				'id_user'	=> session()->get('id_user'),
// 				'nama_film'		=> $this->request->getVar('nama_film'),
// 				'trailer'			=> $this->request->getVar('trailer'),
// 				'gambar_film' 		=> $namabaru,
// 				'deskripsi'		=> $this->request->getVar('deskripsi'),
// 				'sinopsis'	=> $this->request->getVar('sinopsis'),
// 				'genre'			=> $this->request->getVar('genre'),
// 				'negara'			=> $this->request->getVar('negara'),
// 				'durasi'			=> $this->request->getVar('durasi'),
// 				'kategori_umur'			=> $this->request->getVar('kategori_umur'),
// 				'tahun_rilis'			=> $this->request->getVar('tahun_rilis'),

// 			);
// 			$m_film->save($data);
			
// 			return redirect()->to(base_url('akun/mymovies'))->with('sukses', 'Data Berhasil di Simpan');
// 		}else{
// 			$data = array(
// 				'id_film'		=> $id_film,
// 				'id_user'	=> session()->get('id_user'),
// 				'nama_film'		=> $this->request->getVar('nama_film'),
// 				'trailer'			=> $this->request->getVar('trailer'),
// 				// 'gambar_film' 		=> $namabaru,
// 				'deskripsi'		=> $this->request->getVar('deskripsi'),
// 				'sinopsis'	=> $this->request->getVar('sinopsis'),
// 				'genre'			=> $this->request->getVar('genre'),
// 				'negara'			=> $this->request->getVar('negara'),
// 				'durasi'			=> $this->request->getVar('durasi'),
// 				'kategori_umur'			=> $this->request->getVar('kategori_umur'),
// 				'tahun_rilis'			=> $this->request->getVar('tahun_rilis'),

// 			);
// 			$m_film->save($data);
// 			return redirect()->to(base_url('akun/mymovies'))->with('sukses', 'Data Berhasil di Simpan');
// 		}
		
// 	}
// 	$data = [	
// 		'title'		=> 'Edit Film',
// 		"menu"      => "Edit Film",
// 		"aktif"		=> 2,
// 		'genre'		=> $genre,
// 		'negara'	=> $negara,
// 		"user"      => $user,
// 		"session"   => $session,
// 		'content'	=> 'akun/edit_movie'
// 			];
// 	echo view('layout/wrapper',$data);
// }

	//Edit
	public function edit_movie($id_film)
	{
		checklogin();
		$m_film 		= new Film_model();
		$film 		= $m_film->detail($id_film);
		$m_genre 		= new Genre_model();
		$m_negara		= new Negara_model();

		$session = \Config\Services::session();
		$id_user = $this->session->get("id_user");
		$muser = new User_model();
		$user = $muser->detail($id_user);	
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
					'id_user'	=> session()->get('id_user'),
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
       		 	return redirect()->to(base_url('akun/mymovies'))->with('sukses', 'Data Berhasil di Simpan');
	        }else{
	        	$data = array(
	        		'id_film'		=> $id_film,
					'id_user'	=> session()->get('id_user'),
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
				return redirect()->to(base_url('akun/mymovies'))->with('sukses', 'Data Berhasil di Simpan');
	        }
	    }

		$data = [	
			'title'		=> 'Edit Film',
			"menu"      => "Edit Film",
			"aktif"		=> 2,
			'genre'		=> $genre,
			'negara'	=> $negara,
			"user"      => $user,
			"session"   => $session,
			'content'	=> 'akun/edit_movie'
				];
		echo view('layout/wrapper',$data);
	}
	


  // Delete
	public function delete_movie($id_film)
	{
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
		return redirect()->to(base_url('akun/mymovies'));
	}


	public function delete_rated($id_rating)
	{
		$m_rating = new Rating_model();		
		$data = ['id_rating'	=> $id_rating];
		$m_rating->delete($data);
		// masuk database
		$this->session->setFlashdata('sukses','Data telah dihapus');
		return redirect()->to(base_url('akun/myrated'));
	}

	public function delete_review($id_komentar)
	{
		$m_komentar = new Komentar_model();		
		$data = ['id_komentar'	=> $id_komentar];
		$m_komentar->delete($data);
		// masuk database
		$this->session->setFlashdata('sukses','Data telah dihapus');
		return redirect()->to(base_url('akun/myreview'));
	}
	

	public function ubahpassword()
	{
	  $id_user = $this->session->get("id_user");
	  $muser = new User_model();
	  $user = $muser->detail($id_user);	
	  if($this->request->getMethod() === 'post' ){
		$data = [	'password'	=> password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),];

		$muser->update($id_user,$data);
		return redirect()->to(base_url('akun'));

	  }else{
 
	  $data = [
		"content" => "akun/ubahpassword",
		"title"   =>"Halaman Change Password",
		"menu"    =>"Change Password",
		"session" => $this->session,
		"aktif" => 6,

		"user" => $user,
	  
	  ];
	  echo view("layout/wrapper", $data);
	}
	}
  // Logout
  public function logout()
  {
    $this->session->destroy();
    return redirect()->to(base_url("home"));
  }
}
