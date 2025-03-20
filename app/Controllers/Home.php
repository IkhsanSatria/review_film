<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Film_model;
use App\Models\Sinopsis_model;
use App\Models\User_model;


class Home extends BaseController
{

  // Homepage
  public function index()
  {
    $m_film   = new Film_model();
    $m_user   = new User_model();
    $film     = $m_film->listing();
    $filmpopular = $m_film->listingpopular();
    $subscriberterbaru = $m_user->listing_subscriber_terbaru();
    $data = [ 'title'     => 'Website Review Film',
          'description' => 'ini adalah website Review Film Terbaik',
          'keywords'    => 'Review Film',
          'film'     => $film,
          'filmpopular' => $filmpopular,
          'subscriberterbaru' => $subscriberterbaru,
          'content'   => 'home/index'
        ];
    echo view('layout/wrapper',$data);
  }
}