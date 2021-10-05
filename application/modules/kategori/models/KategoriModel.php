<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KategoriModel extends CI_Model
{
  protected $table = 'kategori';
  
  public $nama_kategori;

  public function getAll()
  {
    return $this->db
      ->get($this->table)
      ->result();
  }
}