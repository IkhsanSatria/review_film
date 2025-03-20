<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\User_model;


class Registrasi extends BaseController
{
  public function __construct()
  {
    helper("form");
  }

  // Homepage
  public function index()
  {
    $session = \Config\Services::session();
    $validation = \Config\Services::validation();
    $muser = new User_model();
    
    // Start validasi
    if ($this->request->getMethod() === "post") {
      if (
        !$this->validate([
          "name" => [
            "rules" => "required",
            "errors " => [
              "required" => "Nama Harus diisi",
            ],
          ],
          "password" => "required|min_length[3]",
          "email" =>"required",
                    
        ])
      ) {
        // $this->session->setFlashdata("error", $this->validator->listErrors());
        // var_dump($validation->listErrors());
        // die();
        return redirect()
          ->back()
          ->withInput()
          ->with("validation", $validation);
      } else {
        // masuk database
        $data = [
          "name" => $this->request->getPost("name"),
          "email" => $this->request->getPost("email"),
          "password" => password_hash($this->request->getPost("password"),PASSWORD_DEFAULT),
          "role" => "subscriber",
      ];
      $muser->save($data);
        // masuk database
        $this->session->setFlashdata("sukses", "Registrasi Berhasil, Silahkan Login");
        return redirect()->to(base_url("registrasi/notif"));
      }
    } else {
      // End validasi
      $data = ["content" => "home/index", "validation" => $validation, "session" => $session];
      echo view("layout/wrapper", $data);
    }
    // End proses
  }

  // notif
  public function notif()
  {
        $session = \Config\Services::session();

      $data = ["title" =>"Notifikasi Registrasi","content" => "registrasi/notif", "session" => $session];
      echo view("layout/wrapper", $data);
  }
}
