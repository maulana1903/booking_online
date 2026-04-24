<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Core extends CI_Controller {
    public $session;
    public $service_model;
  public $upload;

    public function __construct()
    {
      parent::__construct();
      $this->load->model('Service_model', 'service_model');
      $this->load->library('upload');
    }
    public function index(){
      $this->load->view('index.php');
    }
    public function simpan()
    {
      $tanggal = $this->input->post('tanggal', true);
      $jam     = $this->input->post('jam', true);
      $cek = $this->service_model->cekBentrok($tanggal, $jam);

      if ($cek['bentrok']) {
        $jamAlternatif = date(
          'H:i',
          strtotime($cek['jam_terpakai'] . ' +2 hours')
        );

        $this->session->set_flashdata(
          'error',
          "Jadwal telah terisi. Silakan pilih jam alternatif sekitar $jamAlternatif"
        );

        redirect('');
        return;
      }

      $config['upload_path']   = './uploads/';
      $config['allowed_types'] = 'jpg|jpeg|png';
      $config['max_size']      = 2048;

      $this->upload->initialize($config);

      if (!$this->upload->do_upload('bukti_tf')) {
        $this->session->set_flashdata(
          'error',
          $this->upload->display_errors()
        );
        redirect('');
        return;
      }

      $upload = $this->upload->data();

      $data = [
        'nama'      => $this->input->post('nama', true),
        'alamat'    => $this->input->post('alamat', true),
        'wa'        => $this->input->post('wa', true),
        'tanggal'   => $tanggal,
        'jam'       => $jam,
        'gmaps'     => $this->input->post('gmaps', true),
        'kerusakan' => $this->input->post('kerusakan', true),
        'bukti_tf'  => $upload['file_name'],
        'status'    => 'menunggu'
      ];

      $this->service_model->simpan($data);

      $this->session->set_flashdata(
        'success',
        'Permintaan servis berhasil dikirim'
      );

      redirect('');
    }

}