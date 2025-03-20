<?php 
namespace App\Controllers\Admin;

use CodeIgniter\Controller;
use App\Models\User_model;

class Akun extends BaseController
{
	public function index()
	{
		checklogin();
		$id_user 	= $this->session->get('id_user');
		$m_user 	= new User_model();
		$user 		= $m_user->detail($id_user);
		
		// Start validasi
		if($this->request->getMethod() === 'post' && $this->validate(
			[
            'id_user' 	=> 'required',
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
				if(strlen($this->request->getPost('password')) >= 6 && strlen($this->request->getPost('password')) <= 32 ) {
					$data = [	'name'			=> $this->request->getPost('name'),
								'usia'			=> $this->request->getPost('usia'),
								'email'			=> $this->request->getPost('email'),
								'password'		=> password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
								'profile'		=> $this->request->getPost('profil'),
								'role'			=>'admin',
								'gambar'		=> $namabaru
						];
				}else{
					$data = [	'name'			=> $this->request->getPost('name'),
								'usia'			=> $this->request->getPost('usia'),
								'email'			=> $this->request->getPost('email'),
								//'password'		=> password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
								'profile'		=> $this->request->getPost('profil'),
								'role'			=>'admin',
								'gambar'		=> $namabaru
						];
				}
			}else{
				// masuk database
				if(strlen($this->request->getPost('password')) >= 6 && strlen($this->request->getPost('password')) <= 32 ) {
					$data = [	'name'			=> $this->request->getPost('name'),
								'usia'			=> $this->request->getPost('usia'),
								'email'			=> $this->request->getPost('email'),
								'password'		=> password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
								'profile'		=> $this->request->getPost('profil'),
								'role'			=>'admin'
								//'gambar'		=> $namabaru
						];
				}else{
					$data = [	'name'			=> $this->request->getPost('name'),
								'usia'			=> $this->request->getPost('usia'),
								'email'			=> $this->request->getPost('email'),
							//	'password'		=> password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
								'profile'		=> $this->request->getPost('profil'),
								'role'			=>'admin'
							//	'gambar'		=> $namabaru
						];
				}
			}
			$m_user->update($id_user,$data);
			// masuk database
			$this->session->setFlashdata('sukses','Data telah diedit');
			return redirect()->to(base_url('admin/akun'));
	    }else{
			$data = [	'title'			=> 'Update Profile: '.$user['name'],
						'user'			=> $user,
						'content'		=> 'admin/akun/index'
					];
			echo view('admin/layout/wrapper',$data);
		}
	}
}