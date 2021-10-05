<?php defined('BASEPATH') or exit('No direct script access allowed!');

class Kategori extends MX_Controller{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('kategoriModel', 'm_kategori');
  }

  public function call_select_multi()
  {
    $categories = $this->m_kategori->getAll();
    $options = [
      '' => '-- Pilih kategori'
    ];
    foreach ($categories as $value) {
      $options[$value->id] = $value->nama_kategori;
    }
    return $this->load->view('partials/select_multi_v', compact('options'));
  }
}