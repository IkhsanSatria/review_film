<?php

namespace App\Models;

use CodeIgniter\Model;

class Rating_model extends Model
{
    protected $table = 'rating';
    protected $primaryKey = 'id_rating';
    protected $allowedFields = ['id_user', 'id_film', 'nilai_rating', 'created_at', 'updated_at'];

    public function getFilmRating($id_film)
    {
        return $this->select('AVG(nilai_rating) as average, COUNT(*) as total')
                    ->where('id_film', $id_film)
                    ->first();
    }

    public function getUserRating($id_user, $id_film)
    {
        return $this->where(['id_user' => $id_user, 'id_film' => $id_film])->first();
    }

    public function listing_byuser($id_user)
    {
        $builder = $this->db->table('rating');
        $builder = $this->select('rating.*, film.nama_film, users.name as nama_user');
        $builder->join('users', 'users.id_user = rating.id_user', 'LEFT');
        $builder->join('film', 'film.id_film = rating.id_film', 'LEFT');
        $builder->where('rating.id_user', $id_user);
        $builder->orderBy('rating.created_at', 'DESC');
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function listing(){
        $builder = $this->db->table("rating");
        $builder = $this->select("rating.*,film.nama_film,users.name as nama_user");
        $builder->join("users", "users.id_user = rating.id_user", "LEFT");
        $builder->join("film", "film.id_film = rating.id_film", "LEFT");
        $builder->orderBy("rating.created_at", "DESC");
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function total(){
        $builder = $this->db->table("rating");
        $builder = $this->select("rating.*");
        $builder->orderBy("rating.created_at", "DESC");
        $query = $builder->get();
        return $query->getNumRows();
    }
    public function totalByUser($id_user){
        $builder = $this->db->table("rating");
        $builder = $this->select("rating.*");
        $builder->where("rating.id_user", $id_user);
        $builder->orderBy("rating.created_at", "DESC");
        $query = $builder->get();
        return $query->getNumRows();
    }

    public function userRate($id_film)
    {
        $builder = $this->db->table("rating");
        $builder = $this->select("rating.*,film.nama_film,users.name as nama_user,users.gambar, users.role");
        $builder->join("users", "users.id_user = rating.id_user", "LEFT");
        $builder->join("film", "film.id_film = rating.id_film", "LEFT");
        $builder->where("rating.id_film", $id_film);
        $builder->orderBy("rating.created_at", "DESC");
        $query = $builder->get();
        return $query->getResultArray();
        
    }
    public function totalRate($id_film)
    {
        $builder = $this->db->table("rating");
        $builder = $this->select("rating.*");
        $builder->where("rating.id_film", $id_film);
        $builder->orderBy("rating.created_at", "DESC");
        $query = $builder->get();
        return $query->getNumRows();
    }
}
