<?php 
namespace App\Models;

use CodeIgniter\Model;
class Genre_model extends Model
{
    protected $table = 'genre';
    protected $primaryKey = 'id_genre';

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id_genre','nama_genre'];

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
        $builder = $this->db->table('genre');
        $builder->orderBy('genre.id_genre','ASC');
        $query = $builder->get();
        return $query->getResultArray();
    }

    // total
    public function total()
    {
        $builder = $this->db->table('genre');
        $builder->select('COUNT(*) AS total');
        $query = $builder->get();
        return $query->getRowArray();
    }



    // detail
    public function detail($id_genre)
    {
        $builder = $this->db->table('genre');
        $builder->where('id_genre',$id_genre);
        $query = $builder->get();
        return $query->getRowArray();
    }

   
    // edit
    public function edit($data)
    {
        $builder = $this->db->table('genre');
        $builder->where('id_genre',$data['id_genre']);
        $builder->update($data);
    }

}