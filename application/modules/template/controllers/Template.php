<?php defined('BASEPATH') or exit('No direct script access allowed');

class Template extends MX_Controller {
  public function __construct()
  {
    parent::__construct();
  }
  public function call_landing_template($data = [])
  {
    $data['nav'] = $this->load->view('partials/nav_v', [], true);
    return $this->load->view('landing_template_v', $data);
  }
  public function call_table_template($items = [], $config = [])
  {
    $this->load->library('pagination');

    $config['num_links'] = 3;
    $config['use_page_numbers'] = TRUE;
    $config['page_query_string'] = TRUE;
    $config['query_string_segment'] = 'page';

    $config['full_tag_open']   = '<nav><ul class="pagination justify-content-center">';
    $config['full_tag_close']   = '</ul></nav>';
    $config['num_tag_open']   = '<li class="page-item">';
    $config['num_tag_close']   = '</li>';
    $config['cur_tag_open']   = '<li class="page-item active"><span class="page-link">';
    $config['cur_tag_close']   = '</span></li>';
    $config['next_tag_open']   = '<li class="page-item">';
    $config['next_tagl_close']   = '<span aria-hidden="true">&raquo;</span></li>';
    $config['prev_tag_open']   = '<li class="page-item">';
    $config['prev_tagl_close']   = '</li>';
    $config['first_tag_open']   = '<li class="page-item">';
    $config['first_tagl_close'] = '</li>';
    $config['last_tag_open']   = '<li class="page-item">';
    $config['last_tagl_close']   = '</li>';
    $config['attributes'] = array('class' => 'page-link');

    $this->pagination->initialize($config);
    
    return $this->load->view('partials/table_v', [
      'links' => $this->pagination->create_links(),
      'items' => $items
    ]);
  }
}