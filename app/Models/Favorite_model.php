<?php

namespace App\Models;

use CodeIgniter\Model;

class Favorite_model extends Model
{
    protected $table = 'favorite';
    protected $primaryKey = 'id_favorite';
    protected $allowedFields = ['id_user', 'id_film','created_at', 'updated_at'];

    public function getFilmFavorite($id_film)
    {
        return $this->select('AVG(nilai_favorite) as average, COUNT(*) as total')
                    ->where('id_film', $id_film)
                    ->first();
    }

    public function getUserFavorite($id_user, $id_film)
    {
        return $this->where(['id_user' => $id_user, 'id_film' => $id_film])->first();
    }

    public function listing_byuser($id_user)
    {
        $builder = $this->db->table('favorite');
        $builder = $this->select('favorite.*, film.nama_film, film.gambar_film,users.name as nama_user');
        $builder->join('users', 'users.id_user = favorite.id_user', 'LEFT');
        $builder->join('film', 'film.id_film = favorite.id_film', 'LEFT');
        $builder->where('favorite.id_user', $id_user);
        $builder->orderBy('favorite.created_at', 'DESC');
        $query = $builder->get();
        return $query->getResultArray();
    }

   

   
    public function totalByUser($id_user){
        $builder = $this->db->table("favorite");
        $builder = $this->select("favorite.*");
        $builder->where("favorite.id_user", $id_user);
        $builder->orderBy("favorite.created_at", "DESC");
        $query = $builder->get();
        return $query->getNumRows();
    }

    
    
}
