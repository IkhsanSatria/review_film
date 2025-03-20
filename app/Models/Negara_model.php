<?php 
namespace App\Models;

use CodeIgniter\Model;
class Negara_model extends Model
{
    protected $table = 'negara';
    protected $primaryKey = 'id_negara';

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id_negara','nama_negara'];

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
        $builder = $this->db->table('negara');
        $builder->orderBy('negara.id_negara','ASC');
        $query = $builder->get();
        return $query->getResultArray();
    }

    // total
    public function total()
    {
        $builder = $this->db->table('negara');
        $builder->select('COUNT(*) AS total');
        $query = $builder->get();
        return $query->getRowArray();
    }

    // detail
    public function detail($id_negara)
    {
        $builder = $this->db->table('negara');
        $builder->where('id_negara',$id_negara);
        $query = $builder->get();
        return $query->getRowArray();
    }

   
    // edit
    public function edit($data)
    {
        $builder = $this->db->table('negara');
        $builder->where('id_negara',$data['id_negara']);
        $builder->update($data);
    }

}