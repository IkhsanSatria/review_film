<?php

namespace App\Models;

use CodeIgniter\Model;

class Film_model extends Model
{
    protected $table = 'film'; // Nama tabel di database
    protected $primaryKey = 'id_film'; // Primary Key
    protected $allowedFields = [
        'id_user','nama_film', 'trailer', 'gambar_film', 'deskripsi','sinopsis','genre','negara','rating',
        'durasi', 'kategori_umur','tahun_rilis','hits'
    ];
    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;


     public function listing()
      {
        $builder = $this->db->table("film");
        $builder = $this->select("film.*,genre.nama_genre,negara.nama_negara,users.name as nama_user, users.role");
        $builder->join("users", "users.id_user = film.id_user", "LEFT");
        $builder->join("genre", "genre.id_genre = film.genre", "LEFT");
        $builder->join("negara", "negara.id_negara = film.negara", "LEFT");
        $builder->orderBy("film.id_film", "DESC");
        $query = $builder->get();
        return $query->getResultArray();
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

      public function sorting($popularDesc,$popularAsc)
      {
        $builder = $this->db->table("film");
        $builder = $this->select("film.*,genre.nama_genre,negara.nama_negara,users.name as nama_user, users.role");
        $builder->join("users", "users.id_user = film.id_user", "LEFT");
        $builder->join("genre", "genre.id_genre = film.genre", "LEFT");
        $builder->join("negara", "negara.id_negara = film.negara", "LEFT");
        if($popularDesc){
          $builder->orderBy("film.hits", "DESC");
        }
        if($popularAsc){
          $builder->orderBy("film.hits", "ASC");
        }
        $query = $builder->get();
        return $query->getResultArray();
      }

      public function cariFilm($keyword=null,$genre=null,$tahun=null)
      {
        $builder = $this->db->table("film");
        $builder = $this->select("film.*,genre.nama_genre,negara.nama_negara,users.name as nama_user, users.role");
        $builder->join("users", "users.id_user = film.id_user", "LEFT");
        $builder->join("genre", "genre.id_genre = film.genre", "LEFT");
        $builder->join("negara", "negara.id_negara = film.negara", "LEFT");
        if($keyword){
          $builder->like('film.nama_film',$keyword);
        }
        if($genre){
          $builder->where('film.genre',$genre);
        }
        if($tahun){
          $builder->where('film.tahun_rilis',$tahun);
        }
        $builder->orderBy("film.id_film", "DESC");
        $query = $builder->get();
        return $query->getResultArray();
      }

      public function totalCari($keyword=null,$genre=null,$tahun=null)
      {
        $builder = $this->db->table("film");
        $builder = $this->select("film.*,genre.nama_genre,negara.nama_negara,users.name as nama_user, users.role");
        $builder->join("users", "users.id_user = film.id_user", "LEFT");
        $builder->join("genre", "genre.id_genre = film.genre", "LEFT");
        $builder->join("negara", "negara.id_negara = film.negara", "LEFT");
        if($keyword){
          $builder->like('film.nama_film',$keyword);
        }
        if($genre){
          $builder->where('film.genre',$genre);
        }
        if($tahun){
          $builder->where('film.tahun_rilis',$tahun);
        }
        $builder->orderBy("film.id_film", "DESC");
        $query = $builder->get();
        return $query->getNumRows();
      }

       public function listing_genre($id_genre)
      {
        $builder = $this->db->table("film");
        $builder = $this->select("film.*,genre.nama_genre,negara.nama_negara,users.name as nama_user, users.role");
        $builder->join("users", "users.id_user = film.id_user", "LEFT");
        $builder->join("genre", "genre.id_genre = film.genre", "LEFT");
        $builder->join("negara", "negara.id_negara = film.negara", "LEFT");
        $builder->where("film.genre", $id_genre);
        $builder->orderBy("film.id_film", "DESC");
        $query = $builder->get();
        return $query->getResultArray();
      }


       public function listing_negara($id_negara)
      {
        $builder = $this->db->table("film");
        $builder = $this->select("film.*,genre.nama_genre,negara.nama_negara,users.name as nama_user, users.role");
        $builder->join("users", "users.id_user = film.id_user", "LEFT");
        $builder->join("genre", "genre.id_genre = film.genre", "LEFT");
        $builder->join("negara", "negara.id_negara = film.negara", "LEFT");
        $builder->where("film.negara", $id_negara);
        $builder->orderBy("film.id_film", "DESC");
        $query = $builder->get();
        return $query->getResultArray();
      }

      // function untuk menampilkan 5 film yang baru diinput
     public function listingterbaru()
       {
            $builder = $this->db->table("film");
            $builder = $this->select("film.*,genre.nama_genre,negara.nama_negara,users.name as nama_user, users.role");
            $builder->join("users", "users.id_user = film.id_user", "LEFT");
            $builder->join("genre", "genre.id_genre = film.genre", "LEFT");
            $builder->join("negara", "negara.id_negara = film.negara", "LEFT");
            $builder->orderBy("film.id_film", "DESC");
            $builder->limit(5);
            $query = $builder->get();
            return $query->getResultArray();
       }

       public function listingpopular(){
         $builder = $this->db->table("film");
         $builder = $this->select("film.*,genre.nama_genre,negara.nama_negara,users.name as nama_user, users.role");
         $builder->join("users", "users.id_user = film.id_user", "LEFT");
         $builder->join("genre", "genre.id_genre = film.genre", "LEFT");
            $builder->join("negara", "negara.id_negara = film.negara", "LEFT");
            $builder->orderBy("film.hits", "DESC");
            $builder->limit(5);
            $query = $builder->get();
            return $query->getResultArray();
       }
    
      
     // Total  film
    public function total()
    {
        $builder = $this->db->table('film');
        $query = $builder->get();
        return $query->getNumRows();
    }

     // Total  film by user
     public function total_byuser($id_user)
     {
         $builder = $this->db->table('film');
         $builder->where('id_user',$id_user);
         $query = $builder->get();
         return $query->getNumRows();
     }

    // detail
    public function detail($id_film)
    {
        $builder = $this->db->table('film');
        $builder = $this->select("film.*,genre.nama_genre,negara.nama_negara,users.name as nama_user, users.role");
        $builder->join("users", "users.id_user = film.id_user", "LEFT");
        $builder->join("genre", "genre.id_genre = film.genre", "LEFT");
        $builder->join("negara", "negara.id_negara = film.negara", "LEFT");
        $builder->where('film.id_film',$id_film);
        $builder->orderBy('film.id_film','DESC');
        $query = $builder->get();
        return $query->getRowArray();
    }

    // edit
    public function edit($data)
    {
        $builder = $this->db->table('film');
        $builder->where('id_film',$data['id_film']);
        $builder->update($data);
    }

}
