<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Rating_model;

class Rating extends BaseController
{
  // index
  public function index()
  {
    $m_rating = new Rating_model();
    $rating = $m_rating->listing();

    $data = ["rating" => $rating, "content" => "rating/index"];
    echo view('layout/wrapper',$data);
  }


  

  public function simpan_rating()
    {
        $m_rating = new Rating_model();

        $id_user = session()->get('id_user');
        $id_film = $this->request->getPost('id_film');
        $nilai_rating = $this->request->getPost('nilai_rating');

        if (!$id_user) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Anda harus login untuk memberi rating']);
        }

        $existingRating = $m_rating->getUserRating($id_user, $id_film);

        if ($existingRating) {
            // Update rating jika user sudah memberi rating sebelumnya
            $m_rating->update($existingRating['id_rating'], ['nilai_rating' => $nilai_rating]);
        } else {
            // Simpan rating baru
            $m_rating->save([
                'id_user' => $id_user,
                'id_film' => $id_film,
                'nilai_rating' => $nilai_rating
            ]);
        }

        return $this->response->setJSON(['status' => 'success', 'message' => 'Rating berhasil disimpan']);
    }


}
