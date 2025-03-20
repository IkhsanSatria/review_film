<?php 
namespace App\Models;

use CodeIgniter\Model;

class Dasbor_model extends Model
{

    

    // user dengan role subscriber
    public function totalsubscriber()
    {
        $builder = $this->db->table('users');
        $builder->where('role','subscriber');
        $query = $builder->get();
        return $query->getNumRows();
    }

  // user dengan role author
    public function totalauthor()
    {
        $builder = $this->db->table('users');
        $builder->where('role','author');
        $query = $builder->get();
        return $query->getNumRows();
    }


     public function totalfilm()
    {
        $builder = $this->db->table('film');
        $query = $builder->get();
        return $query->getNumRows();
    }

    // Total genre
    public function totalgenre()
    {
        $builder = $this->db->table('genre');
        $query = $builder->get();
        return $query->getNumRows();
    }

   // Total komentar
    public function totalkomentar()
    {
        $builder = $this->db->table('komentar');
        $query = $builder->get();
        return $query->getNumRows();
    }


      // Total Rating film
    public function totalrating()
    {
        $builder = $this->db->table('rating');
        $query = $builder->get();
        return $query->getNumRows();
    }

     // listing 10 film terbaru
    public function listingterbaru()
    {
        $builder = $this->db->table('film');
        $builder->select('*');
        $builder->orderBy('id_film','DESC');
        $query = $builder->get();
        return $query->getResultArray();
    }

   
}