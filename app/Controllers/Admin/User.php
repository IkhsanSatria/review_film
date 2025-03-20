<?php 
namespace App\Controllers\Admin;

use CodeIgniter\Controller;
use App\Models\User_model;
class User extends BaseController
{

	// mainpage
	public function index()
	{
		checklogin();
		$m_user = new User_model();
		$user 	= $m_user->listing();
		$total 	= $m_user->total();
	
		
			$data = [	'title'			=> 'Data Semua User  ('.$total['total'].' Orang )',
						'user'			=> $user,
						'content'		=> 'admin/user/index',
						
					];
			echo view('admin/layout/wrapper',$data);
		
	}



	// mainpage
	public function admin()
	{
		checklogin();
		$m_user = new User_model();
		$user 	= $m_user->listing_admin();
		$total 	= $m_user->total_admin();
			// Start validasi
		if($this->request->getMethod() === 'post' && $this->validate(
			[
				'name' 		=> 'required',
				'email'		=>'is_unique[users.email]'
        	])) {
			// masuk database

			$data = [	'name'			=> $this->request->getPost('name'),
						'usia'			=> $this->request->getPost('usia'),
						'email'			=> $this->request->getPost('email'),
						'password'		=> password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
						'role'			=> $this->request->getVar('role'),
					];
			$m_user->save($data);
			// masuk database
			$this->session->setFlashdata('sukses','Data telah ditambah');
			return redirect()->to(base_url('admin/user/admin'));
	    }else{
			$data = [	'title'			=> 'User Admin ('.$total['total'].' Orang )',
						'user'			=> $user,
						'content'		=> 'admin/user/admin'
						
					];
			echo view('admin/layout/wrapper',$data);
		}
	}

	public function subscriber()
	{
		checklogin();
		$m_user = new User_model();
		$user 	= $m_user->listing_subscriber();
		$total 	= $m_user->total_subscriber();
			// Start validasi
		
			$data = [	'title'			=> 'User Subscriber ('.$total['total'].' Orang )',
						'user'			=> $user,
						'content'		=> 'admin/user/subscriber'
						
					];
			echo view('admin/layout/wrapper',$data);
		
	}

	public function author()
	{
		checklogin();
		$m_user = new User_model();
		$user 	= $m_user->listing_author();
		$total 	= $m_user->total_author();
			// Start validasi
		
			$data = [	'title'			=> 'User Author ('.$total['total'].' Orang )',
						'user'			=> $user,
						'content'		=> 'admin/user/author'
						
					];
			echo view('admin/layout/wrapper',$data);
		
	}
	

	// edit data admin
	public function edit($id_user)
	{
		checklogin();
		$m_user = new User_model();
		$user = $m_user->detail($id_user);
		// Start validasi
		if($this->request->getMethod() === 'post' && $this->validate(
			[
            'name' 	=> 'required|min_length[3]',

        	])) {
			
			// masuk database
			if(strlen($this->request->getPost('password')) >= 5 && strlen($this->request->getPost('password')) <= 32 ) {
					$data = [	
						'name'			=> $this->request->getPost('name'),
						'email'			=> $this->request->getPost('email'),
						'usia'		=> $this->request->getPost('usia'),
						'password'		=> password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
					];
			}else{
				if($user['role']=="admin"){
					$data = [	
						'name'			=> $this->request->getPost('name'),
						'email'			=> $this->request->getPost('email'),
						'usia'		=> $this->request->getPost('usia'),
					];
				}else{
					$data = [	
						'role'			=> $this->request->getPost('role'),
					
					];
				}
				
			}
			$m_user->update($id_user,$data);
			// masuk database
			$this->session->setFlashdata('sukses','Data telah diedit');
			
				return redirect()->to(base_url('admin/user'));
			
	    }else{
			$data = [	'title'			=> 'Edit Pengguna: '.$user['name'],
						'user'			=> $user,
						'content'		=> 'admin/user/edit',
						
					];
			echo view('admin/layout/wrapper',$data);
		}
	}

	// delete
	public function delete($id_user)
	{
		checklogin();
		$m_user = new User_model();
		$data = ['id_user'	=> $id_user];
		$m_user->delete($data);
		// masuk database
		$this->session->setFlashdata('sukses','Data telah dihapus');
		return redirect()->to(base_url('admin/user'));
	}
	// delete
	public function deleteUser($id_user)
	{
		checklogin();
		$m_user = new User_model();
		$data 	= ['id_user'	=> $id_user];
		$m_user->delete($data);
		// masuk database
		$this->session->setFlashdata('sukses','Data telah dihapus');
		return redirect()->to(base_url('admin/user'));
	}
	
	public function userandroid(){
		$m_user = new User_model;
		$user 	= $m_user->listingUserAndroid();
		$total	= $m_user->totaluserandroid();
		$data 	= [	'title'			=> 'User Aplikasi Android ('.$total['total'].' Orang )',
						'user'			=> $user,
						'content'		=> 'admin/user/userandroid',
				
					];
			echo view('admin/layout/wrapper',$data);
	}

	
}