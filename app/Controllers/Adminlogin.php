<?php 
namespace App\Controllers;

use CodeIgniter\Controller;

use App\Models\User_model;
use \Config\App;
use App\Libraries\Auth;

class Adminlogin extends BaseController
{

	public function __construct()
	{
		helper('form');
	}

	// Homepage
	public function index()
	{
		$session = \Config\Services::session();
		$m_user 		= new User_model();

		// Start validasi
		

		if($this->request->getMethod() === 'post' && $this->validate(
			[
            'email' 	=> 'required|min_length[3]',
            'password'  => 'required|min_length[3]',
        	])) {
			$email 	= $this->request->getPost('email');
			$password 	= $this->request->getPost('password');
			$user 		= $m_user->checkUser($email);
			// Proses login
			if($user['role']=="admin") {
				// Jika email nya ada maka cek passwordnya
				if(password_verify($password, $user['password'])){
				$this->session->set('email',$email);
				$this->session->set('id_user',$user['id_user']);
				$this->session->set('role',$user['role']);
				$this->session->set('name',$user['name']);
				$this->session->setFlashdata('sukses', 'Hai '.$user['name'].', Anda berhasil login');
				return redirect()->to(base_url('admin/dasbor'));
				}else{
				// jika username password salah
				$this->session->setFlashdata('warning','Email atau password salah');
				return redirect()->to(base_url('adminlogin'));
				//var_dump(sha1($this->request->getPost('password')));
				}
	    }else{
	    	// jika username password salah
				$this->session->setFlashdata('warning','Email atau password salah');
				return redirect()->to(base_url('adminlogin'));
			}
		}else{
			// End validasi
			$data = [	'title'			=> 'Login Administrator',
						'session'		=> $session
					];
			echo view('adminlogin/index',$data);
		}
		// End proses
	}

	// lupa
	public function lupa()
	{
		$session = \Config\Services::session();
		$m_user 		= new User_model();
		if($this->request->getMethod() === 'post'){
			//tangkap pesan error dari fungsi validateForm
			$this->validateForm();
			return redirect()->to(base_url('adminlogin/lupa'));
		}else{
		$data = [	'title'			=> 'Lupa Password',
					'session'		=> $session
				];
		echo view('adminlogin/lupa',$data);
		}
	}

	private function validateForm() 
	{
		$email = \Config\Services::email();

		$m_user 		= new User_model();
		$error = [];
						
		$validation =  \Config\Services::validation();
		$validation->setRules(
			[
				'email' => [
					'label'  => 'Email',
					'rules'  => 'trim|required|valid_email',
					'errors' => [
						'valid_email' => 'Alamat email tidak valid'
					]
				]
			]
		);

		$validate = $validation->withRequest($this->request)->run();
		
		if ($validate) 
		{		
			$user = $m_user->getUserByEmail($_POST['email']);
			if ($user) {
				
				//jika email sudah terdaftar maka update password dan kirim email
				  // siapkan token
				  $token = mt_rand(1, 100000000);
				  $data = [
					  'password'		=> sha1($token)
					  ];
				  $m_user->update($user['id_user'],$data);

				//   bagian email
				$email->setFrom('admin_gmacepokosari@gmail.com', 'Review Film SMK');
				$email->setTo($this->request->getPost('email'));
				$email->setSubject('New Password Aplikasi Admin Review Film');
				$email->setMessage('Ini adalah Password Baru Anda di Aplikasi Administrator Review Film : <b>' . $token . '</b>');
				//	$email->send();
				if(! $email->send()){
					echo $email->printDebugger();
					die;	 
				}else{
					$email->send();
				}
				$error[] = 'Password yang baru sudah kami kirimkan ke Email Anda. Silahkan cek Inbox atau Spam di email Anda ';
				$this->session->setFlashdata('sukses','Password yang baru sudah kami kirimkan ke Email Anda. Silahkan cek Inbox atau Spam di email Anda ');

			} else {
				$error[] = 'Email belum terdaftar, silakan Masukkan Email yang sudah Terdaftar';
				$this->session->setFlashdata('gagal','Email belum terdaftar, silakan Masukkan Email yang sudah Terdaftar ');
			}
		} else {
			$error = $validation->getErrors();
		}

		return $error;
	}


	
	// Logout
	public function logout()
	{
		$this->session->destroy();
		return redirect()->to(base_url('adminlogin'));
	}
}