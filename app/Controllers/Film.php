<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Film_model;
use App\Models\Rating_model;
use App\Models\Genre_model;
use App\Models\Negara_model;
use App\Models\Komentar_model;
class Film extends BaseController
{
  // index
  public function index()
  {
    $m_film = new Film_model();
    $m_genre = new Genre_model();
    $genre = $m_genre->listing();
    $popularDesc = $this->request->getGet('popularDesc');
    $popularAsc = $this->request->getGet('popularAsc'); 
    $film = $m_film->listing();
    $data = [
              "title"=>"Listing Movie / Film",
              "film" => $film,
              "genre2" => $genre,
              "total" => $m_film->total(),
              "content" => "film/index"
            ];
    echo view('layout/wrapper',$data);
  }


  // list film berdasarkan genre
  public function genre($id_genre)
  {
    $m_film = new Film_model();
    $m_genre = new Genre_model();
    $film = $m_film->listing_genre($id_genre);
    $genre = $m_genre->listing();
    $nama_genre = $m_genre->detail($id_genre);

    $data = ["title"=>"Film Berdasarkan Genre","film" => $film,"menu"=>$nama_genre['nama_genre'], "genre2"=>$genre,"content" => "film/genre"];
    echo view('layout/wrapper',$data);
  }

  // list film berdasarkan negara
  public function negara($id_negara)
  {
    $m_film = new Film_model();
    $m_negara = new Negara_model();
    $film = $m_film->listing_negara($id_negara);
    $m_genre = new Genre_model();
    $nama_negara = $m_negara->detail($id_negara);
    $genre = $m_genre->listing();

    $data = ["title"=>"Film Berdasarkan Negara","film" => $film, "menu"=>$nama_negara['nama_negara'], "genre2"=>$genre,"content" => "film/negara"];
    echo view('layout/wrapper',$data);
  }




 // detail film
 public function detail($id_film)
 {
   $m_film = new Film_model();
   $film = $m_film->detail($id_film);
   $m_komentar = new Komentar_model();
   $review = $m_komentar->listingByFilm($id_film);
   $m_rating = new Rating_model();
   $rating = $m_rating->getFilmRating($id_film);
   $totalKomentar = $m_komentar->totalByFilm($id_film);
   $id_user = session()->get('id_user');
   // Update hits
   $data = ["id_film" => $film["id_film"], "hits" => $film["hits"] + 1];
   $m_film->edit($data);
   // Update hits

   $data = [
             "title" => $film["nama_film"], 
             "film" => $film,
             "rating" =>$rating,
             "review" => $review, 
             "totalKomentar" => $totalKomentar['total'],
             'id_user' => $id_user,
             "content" => "film/detail"
           ];
    echo view("layout/wrapper", $data);
 }

  public function cariFilm()
  {
    $m_film   = new Film_model();
    $m_genre = new Genre_model();
    $listingGenre = $m_genre->listing();
    $keyword  = $this->request->getVar('keyword');
    $genre    = $this->request->getVar('genre');
    $tahun    = $this->request->getVar('tahun');

    $hasil    = $m_film->cariFilm($keyword,$genre,$tahun);
    $totalCari = $m_film->totalCari($keyword,$genre,$tahun);
    $data = [
      "title"=>"Hasil Pencarian Movie / Film",
      "film" => $hasil,
      "keyword_header" => $keyword,
      "genre_header" => $genre,
      "genre2" => $listingGenre,
      "total"  => $totalCari,
      "content" => "film/cari"
    ];
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

    public function get_user_rating($id_film)
    {
        $userId = session()->get('id_user');
        $m_rating = new Rating_model();

        $rating = $m_rating->where(['id_film' => $id_film, 'id_user' => $userId])->first();
        
        return $this->response->setJSON(['rating' => $rating ? $rating['nilai_rating'] : 0]);
    }

    public function simpanReview()
    {
       $m_review = new Komentar_model();
        if ($this->request->getMethod() === 'post') {
            $filmId = $this->request->getPost('id_film');
            $userId = session()->get('id_user');  // Ambil ID user dari sesi
            $reviewText = $this->request->getPost('review_text');

           $data =[
                    'id_film' => $filmId,
                    'id_user' => $userId,
                    'komentar'=> $reviewText
                  ];
           
            $m_review->save($data);

            return $this->response->setJSON(['status' => 'success', 'message' => 'Review berhasil disimpan']);
        }
    }
    public function userRate($id_film)
    {
      $m_rating = new Rating_model();
      $userRate = $m_rating->userRate($id_film);
      $data = [
                "title"=>"Rating untuk Film : ".$userRate[0]['nama_film'],
                "rate" => $userRate,
                "total" => $m_rating->totalRate($id_film),
                "content" => "film/user_rate"
              ];
              
      echo view('layout/wrapper',$data);
    }
  

}
