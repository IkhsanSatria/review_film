<?php 
namespace App\Models;

use CodeIgniter\Model;
class Komentar_model extends Model
{
    protected $table = 'komentar';
    protected $primaryKey = 'id_komentar';

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id_komentar','id_film','id_user','komentar'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    // listing
    public function listing()
    {
        $builder = $this->db->table('komentar');
        $builder->select('komentar.*, users.name as nama_user, users.gambar as gambar, film.nama_film');
        $builder->join("users", "users.id_user = komentar.id_user", "LEFT");
        $builder->join("film","film.id_film = komentar.id_film","LEFT");
        $builder->orderBy('komentar.id_komentar','ASC');
        $query = $builder->get();
        return $query->getResultArray();
    }
    public function listing_byuser($id_user)
    {
        $builder = $this->db->table('komentar');
        $builder->select('komentar.*, users.name as nama_user, users.gambar as gambar, film.nama_film');
        $builder->join("users", "users.id_user = komentar.id_user", "LEFT");
        $builder->join("film","film.id_film = komentar.id_film","LEFT");
        $builder->where('komentar.id_user',$id_user);
        $builder->orderBy('komentar.id_komentar','ASC');
        $query = $builder->get();
        return $query->getResultArray();
    }

     public function listingByFilm($id_film)
    {
        $builder = $this->db->table('komentar');
        $builder->select('komentar.*, users.name as nama_user, users.gambar as gambar');
        $builder->join("users", "users.id_user = komentar.id_user", "LEFT");
        $builder->where('komentar.id_film',$id_film);
        $builder->orderBy('komentar.id_komentar','ASC');
        $query = $builder->get();
        return $query->getResultArray();
    }

    // total
    public function total(){
        $builder = $this->db->table("komentar");
        $builder = $this->select("komentar.*");
        $builder->orderBy("komentar.created_at", "DESC");
        $query = $builder->get();
        return $query->getNumRows();
    }
    
    // public function total()
    // {
    //     $builder = $this->db->table('komentar');
    //     $builder->select('COUNT(*) AS total');
    //     $query = $builder->get();
    //     return $query->getRowArray();
    // }

    public function totalByUser($id_user){
        $builder = $this->db->table('komentar');
        $builder->select('COUNT(*) AS total');
        $builder->where('id_user',$id_user);
        $query = $builder->get();
        return $query->getRowArray();
    }

    public function totalByFilm($id_film){
        $builder = $this->db->table('komentar');
        $builder->select('COUNT(*) AS total');
        $builder->where('id_film',$id_film);
        $query = $builder->get();
        return $query->getRowArray();
    }

    // detail
    public function detail($id_komentar)
    {
        $builder = $this->db->table('komentar');
        $builder->where('id_komentar',$id_komentar);
        $query = $builder->get();
        return $query->getRowArray();
    }

   
    // edit
    public function edit($data)
    {
        $builder = $this->db->table('komentar');
        $builder->where('id_komentar',$data['id_komentar']);
        $builder->update($data);
    }

}