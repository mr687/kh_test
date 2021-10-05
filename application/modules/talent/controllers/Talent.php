<?php defined('BASEPATH') or exit('No script direct access allowed!');

class Talent extends MX_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('TalentModel', 'm_talent');
  }

  public function about($id)
  {
    $talent = $this->m_talent->getOne($id);
    if (!$talent) show_404();

    return $this->template->call_landing_template([
      'title' => "Detail - {$talent->name}",
      'body' => $this->load->view('detail_v', compact('talent'), true)
    ]);
  }
}
