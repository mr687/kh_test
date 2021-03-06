<?php defined('BASEPATH') or exit('No direct script access allowed');

class Register extends MX_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->module('kategori');
    $this->load->model('TalentModel', 'm_talent');
  }

  public function index()
  {
    if ($data = $this->input->post()){
      // XSS CLEAN
      $data = $this->security->xss_clean($data);

      $isValid = $this->input_validation();
      var_dump($_FILES);
      var_dump($isValid);
      if ($isValid) {
        $this->load->library('upload');

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'jpg|png';
        $config['encrypt_name'] = TRUE;
        $config['max_size'] = '2048';

        $this->upload->initialize($config);
        $upload_data = null;
        if($this->upload->do_upload('photo'))
        {
          $upload_data = $this->upload->data();
        }else{
          $this->form_validation->set_message('photo', $this->upload->display_errors('', ''));
          return $this->template->call_landing_template([
            'title' => 'Talent Registration',
            'body' => $this->load->view('registration_v', [], true)
          ]);
        }
        $talent_id = $this->m_talent->store($data);
        $this->m_talent->savePhoto($talent_id, $upload_data['file_name']);
        return redirect('/talent/register/register_success');
      }
    }

    return $this->template->call_landing_template([
      'title' => 'Talent Registration',
      'body' => $this->load->view('registration_v', [], true)
    ]);
  }

  public function register_success()
  {
    return $this->template->call_landing_template([
      'title' => 'Registration Successfully',
      'body' => $this->load->view('registration_success_v', [], true)
    ]);
  }

  protected function input_validation()
  {
    $this->form_validation->set_rules('name', 'Nama Lengkap', 'required');
    $this->form_validation->set_rules('email', 'Alamat Email', 'trim|required|max_length[100]|valid_email|is_unique[talent.email]');
    $this->form_validation->set_rules('phone_number', 'Nomor Telepon', 'trim|required|max_length[15]|is_unique[talent.phone_number]');
    $this->form_validation->set_rules('gender', 'Jenis Kelamin', 'trim|required|in_list[female,male]');
    $this->form_validation->set_rules('age', 'Umur', 'trim|required|numeric|greater_than[1]');
    $this->form_validation->set_rules('location', 'Lokasi', 'trim|required|max_length[100]');
    $this->form_validation->set_rules('aboutme', 'Ceritakan Dirimu', 'trim|required|max_length[255]');
    $this->form_validation->set_rules('kategori[]', 'Pilih Kategorimu', 'required');
    $this->form_validation->set_rules('skills[]', 'Skill', 'required');
    if (empty($_FILES['photo']['name'])) {
      $this->form_validation->set_rules('photo', 'Foto', 'required');
    }
    return $this->form_validation->run();
  }
}