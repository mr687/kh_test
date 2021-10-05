<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TalentModel extends CI_Model
{
  protected $table = 'talent';

  public function __construct()
  {
    parent::__construct();
  }

  public function store($data)
  {
    $data['id_kategori'] = join(';', $data['kategori']);
    unset($data['kategori']);
    $data['skills'] = join(';', $data['skills']);
    return $this->db->insert($this->table, $data);
  }

  public function getTalents($query = '', $limit = 10, $start = 0)
  {
    $this->db->like('name', $query, 'both');
    $this->db->limit($limit, $start);
    $result = $this->db
      ->get($this->table)
      ->result();
    $this->assignCategories($result);
    return $result;
  }

  public function getOne($id = null)
  {
    if (!$id) return null;
    $this->db->where('id', $id);
    $result = $this->db->get($this->table)->result();
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