<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TalentModel extends CI_Model
{
  protected $table = 'talent';

  public function __construct()
  {
    parent::__construct();
  }

  public function savePhoto($id, $filename)
  {
    return $this->db->insert('photo', [
      'url' => "/uploads/{$filename}",
      'id_talent' => $id
    ]);
  }

  public function store($data)
  {
    $data['id_kategori'] = join(';', $data['kategori']);
    unset($data['kategori']);
    $data['skills'] = join(';', $data['skills']);
    $this->db->insert($this->table, $data);
    $last_id = $this->db->insert_id();
    return $last_id;
  }

  public function getTalents($query = '', $limit = 10, $start = 0)
  {
    $this->db->like('x.name', $query, 'both');
    $this->db->or_like('k.nama_kategori', $query, 'both');
    $this->db->limit($limit, $start);
    $this->db->distinct();
    $this->db->select('x.*,p.url');
    $this->db->from("{$this->table} x");
    $this->db->order_by('x.id', 'desc');
    $result = $this->db
      ->join('photo p', 'p.id_talent=x.id', 'left')
      ->join('kategori k', "x.id_kategori LIKE CONCAT('%', k.id,'%')", 'left')
      ->get()
      ->result();
    $this->assignCategories($result);
    return $result;
  }

  public function getOne($id = null)
  {
    if (!$id) return null;
    $this->db->where('x.id', $id);
    $this->db->select('x.*,p.url');
    $result = $this->db
      ->join('photo p', 'p.id_talent=x.id', 'left')
      ->get("{$this->table} x")
      ->result();
    $this->assignCategories($result);
    return current($result);
  }

  public function getTotal()
  {
    return $this->db->count_all($this->table);
  }

  protected function assignCategories($talent = null)
  {
    $categories = $this->db->get('kategori')->result();
    if (is_array($talent)){
      foreach ($talent as $item) {
        $ids = explode(';', $item->id_kategori);
        $item->categories = array_map(function ($id) use ($categories) {
          return current(
            array_filter($categories, function ($item) use ($id) {
              return $item->id === $id;
            })
          )->nama_kategori;
        }, $ids);
      }
    }
    else{
      $ids = explode(';', $talent->id_kategori);
      $talent->categories = array_map(function ($id) use ($categories) {
        return current(
          array_filter($categories, function ($item) use ($id) {
            return $item->id === $id;
          })
        )->nama_kategori;
      }, $ids);
    }
  }
}