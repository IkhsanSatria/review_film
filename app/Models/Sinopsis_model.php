<?php 
namespace App\Models;

use CodeIgniter\Model;
class Sinopsis_model extends Model
{
    protected $table = 'sinopsis';
    protected $primaryKey = 'id_sinopsis';

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id_sinopsis','id_film','id_user','isi_sinopsis'];

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
        $builder = $this->db->table('sinopsis');
        $builder->orderBy('sinopsis.id_sinopsis','ASC');
        $query = $builder->get();
        return $query->getResultArray();
    }

    // total
    public function total()
    {
        $builder = $this->db->table('sinopsis');
        $builder->select('COUNT(*) AS total');
        $query = $builder->get();
        return $query->getRowArray();
    }

    // detail
    public function detail($id_sinopsis)
    {
        $builder = $this->db->table('sinopsis');
        $builder->where('id_sinopsis',$id_sinopsis);
        $query = $builder->get();
        return $query->getRowArray();
    }

   
    // edit
    public function edit($data)
    {
        $builder = $this->db->table('sinopsis');
        $builder->where('id_sinopsis',$data['id_sinopsis']);
        $builder->update($data);
    }

}