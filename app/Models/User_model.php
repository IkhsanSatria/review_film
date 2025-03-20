<?php
namespace App\Models;

use CodeIgniter\Model;

class User_model extends Model
{
  protected $table = "users";
  protected $primaryKey = "id_user";

  protected $returnType = "array";
  protected $useSoftDeletes = false;

  protected $allowedFields = ['id_user','name','usia','email','password','profile','role','gambar'];

  protected $useTimestamps = false;
  protected $createdField = "created_at";
  protected $updatedField = "updated_at";
  protected $deletedField = "deleted_at";

  protected $validationRules = [];
  protected $validationMessages = [];
  protected $skipValidation = false;


// fungsi untuk mengecek ada user di database
 public function checkUser($email) 
  {
    $sql = 'SELECT * FROM users 
        WHERE email = ?';
    
    $query = $this->db->query($sql, [$email]);
    $result = $query->getRowArray();
    
    return $result;   
  }

  // listing satgas dan admin
  public function listing()
  {
    $builder = $this->db->table("users");
    $builder = $this->select("users.*");
    $builder->orderBy("users.id_user", "DESC");
    $query = $builder->get();
    return $query->getResultArray();
  }
// listing satgas dan admin
public function listing_admin()
{
  $builder = $this->db->table("users");
  $builder = $this->select("users.*");
  $builder->where("role", "admin");
  $builder->orderBy("users.id_user", "DESC");
  $query = $builder->get();
  return $query->getResultArray();
}

public function listing_admin_terbaru(){
  $builder = $this->db->table("users");
  $builder = $this->select("users.*");
  $builder->where("role", "admin");
  $builder->orderBy("users.id_user", "DESC");
  $builder->limit(10);
  $query = $builder->get();
  return $query->getResultArray();
}

 // listing subscriber
  public function listing_subscriber()
  {
   $builder = $this->db->table("users");
    $builder = $this->select("users.*");
    $builder->where("role", "subscriber");
    $builder->orderBy("users.id_user", "DESC");
    $query = $builder->get();
    return $query->getResultArray();
  }


   public function listing_subscriber_terbaru(){
            $builder = $this->db->table("users");
            $builder = $this->select("users.*");
            $builder->where("role", "subscriber");
            $builder->orderBy("users.id_user", "DESC");
            $builder->limit(10);
            $query = $builder->get();
            return $query->getResultArray();
       }

    

  // listing author
  public function listing_author()
  {
   $builder = $this->db->table("users");
    $builder = $this->select("users.*");
    $builder->where("role", "author");
    $builder->orderBy("users.id_user", "DESC");
    $query = $builder->get();
    return $query->getResultArray();
  }


   public function listing_author_terbaru(){
            $builder = $this->db->table("users");
            $builder = $this->select("users.*");
            $builder->where("role", "author");
            $builder->orderBy("users.id_user", "DESC");
            $builder->limit(10);
            $query = $builder->get();
            return $query->getResultArray();
       }

  
// total semua user
public function total()
{
  $builder = $this->db->table("users");
  $builder->select("COUNT(*) AS total");
  $builder->orderBy("users.id_user", "DESC");
  $query = $builder->get();
  return $query->getRowArray();
}

  // total user dengan role admin
  public function total_admin()
  {
    $builder = $this->db->table("users");
    $builder->select("COUNT(*) AS total");
    $builder->where("role", "admin");
    $builder->orderBy("users.id_user", "DESC");
    $query = $builder->get();
    return $query->getRowArray();
  }

// total users dengan role subscriber
  public function total_subscriber()
  {
    $builder = $this->db->table("users");
    $builder->select("COUNT(*) AS total");
    $builder->where("role", "subscriber");
    $builder->orderBy("users.id_user", "DESC");
    $query = $builder->get();
    return $query->getRowArray();
  }

// total users dengan role author
  public function total_author()
  {
    $builder = $this->db->table("users");
    $builder->select("COUNT(*) AS total");
    $builder->where("role", "author");
    $builder->orderBy("users.id_user", "DESC");
    $query = $builder->get();
    return $query->getRowArray();
  }

  
  // detail user
  public function detail($id_user)
  {
    $builder = $this->db->table("users");
    $builder->where("id_user", $id_user);
    $builder->orderBy("users.id_user", "DESC");
    $query = $builder->get();
    return $query->getRowArray();
  }

}
