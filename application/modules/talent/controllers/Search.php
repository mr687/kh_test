<?php defined('BASEPATH') or exit('No script direct access allowed!');

class Search extends MX_Controller{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('TalentModel', 'm_talent');
  }

  public function index()
  {
    $page = $this->input->get('page') ?? 1;
    $search_query = $this->input->get('query') ?? '';
    $search_query = $this->security->xss_clean($search_query);

    $config['base_url'] = base_url('talent/search');
    $config['per_page'] = 5;
    $config['total_rows'] = $this->m_talent->getTotal();

    $talents = $this->m_talent->getTalents($search_query, $config['per_page'], $page - 1);
    $body = $this->load->view('search_v', compact('talents', 'config'), true);
    return $this->template->call_landing_template([
      'title' => 'Search Talents',
      'body' => $body
    ]);
  }
}