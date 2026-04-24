<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller {
    public $session;
    public $user_model;
    public $service_model;
    private function formatWa($wa)
    {
      $wa = preg_replace('/[^0-9]/', '', $wa);

      // kalau tidak diawali 62 → tambahin
      if (substr($wa, 0, 2) != '62') {
        $wa = '62' . ltrim($wa, '0');
      }

      return $wa;
    }
    public function __construct()
    {
      parent::__construct();
      $this->load->model('User_model', 'user_model');
      $this->load->model('Service_model', 'service_model');
    }
    public function login(){
      $this->load->view('login.php');
    }
    public function adminku()
    {
        if (!$this->session->userdata('login') || 
            $this->session->userdata('role') != 'Admin') {
            redirect('admin/login');
        }

        $data['total_service'] = $this->service_model->total_service();
        $data['service_acc']   = $this->service_model->total_acc();
        $data['service_tolak'] = $this->service_model->total_tolak();
        $data['hari_ini']      = $this->service_model->service_hari_ini();

        $this->load->view('admin/index.php', $data);
    }
    public function service_online(){
      if (!$this->session->userdata('login') || 
      $this->session->userdata('role') != 'Admin') {
      redirect('admin/login');}
      $data['service']=$this->service_model->getAll();
      $this->load->view('admin/simple.php',$data);
    }
    public function acc($id)
    {
      $service = $this->service_model->getById($id);
      if (!$service) show_404();

      $this->service_model->updateStatus($id, 'acc');

      $no_wa = $this->formatWa($service->wa);

      $pesan = rawurlencode(
        "Halo {$service->nama},\n\n" .
        "Permintaan service Anda *DITERIMA (ACC)* ✔️\n" .
        "Tanggal: {$service->tanggal}\n" .
        "Jam: {$service->jam}\n" .
        "Kerusakan: {$service->kerusakan}\n\n".
        "Teknisi akan segera menuju lokasi sesuai jam pesanan.\nTerima kasih 🙏"
      );

      redirect("https://wa.me/{$no_wa}?text={$pesan}");
    }
    public function tolak($id)
    {
      $service = $this->service_model->getById($id);
      if (!$service) show_404();

      $this->service_model->updateStatus($id, 'Ditolak');

      $no_wa = $this->formatWa($service->wa);

      $pesan = rawurlencode(
        "Halo {$service->nama},\n" .
        "Tanggal: {$service->tanggal}\n" .
        "Jam: {$service->jam}\n" .
        "Kerusakan: {$service->kerusakan}\n\n".
        "Mohon maaf, permintaan service Anda *DITOLAK* ❌\n" .
        "Silakan hubungi admin untuk informasi lebih lanjut.\n\nTerima kasih 🙏"
      );

      redirect("https://wa.me/{$no_wa}?text={$pesan}");
    }
    public function superadmin(){
      if (!$this->session->userdata('login') || 
      $this->session->userdata('role') != 'Superadmin') {
      redirect('admin/login');
        }

        $data['total_service'] = $this->service_model->total_service();
        $data['service_acc']   = $this->service_model->total_acc();
        $data['service_tolak'] = $this->service_model->total_tolak();
        $data['hari_ini']      = $this->service_model->service_hari_ini();
      $this->load->view("superadmin/index.php",$data);
    }
    public function user_table(){
      if (!$this->session->userdata('login') || 
      $this->session->userdata('role') != 'Superadmin') {
      redirect('admin/login');
        }
      $data['users'] = $this->user_model->getAll();
      $this->load->view("superadmin/simple.php",$data);
    }
    public function register_admin(){
      if (!$this->session->userdata('login') || 
      $this->session->userdata('role') != 'Superadmin') {
      redirect('admin/login');
        }
      $this->load->view("superadmin/register.php");
    }
    public function register()
    {
      // kalau GET → tampilkan form
      if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      $this->load->view('admin/register');
      return;
      }
      $email = $this->input->post('email', true);

      if ($this->user_model->cek_email($email)) {
        echo "Email sudah terdaftar";
        return;
      }
      $data = [
        'nama'     => $this->input->post('nama', true),
        'email'    => $email,
        'password' => password_hash(
                      $this->input->post('password'),
                      PASSWORD_DEFAULT
                    ),
        'jabatan'  => $this->input->post('jabatan', true),
        'role'     => $this->input->post('role')
      ];

      $this->user_model->register($data);

      redirect('admin/login');
    }
    public function login_admin()
    {
      $email    = $this->input->post('email');
      $password = $this->input->post('password');
      $user = $this->user_model->cek_email($email);

      if (!$user) {
        $this->session->set_flashdata('error', 'Email tidak terdaftar');
        redirect('admin/login');
      }

      if (!password_verify($password, $user->password)) {
        $this->session->set_flashdata('error', 'Password salah');
        redirect('admin/login');
      }

      $this->session->set_userdata([
        'login' => true,
        'id'    => $user->id,
        'nama'  => $user->nama,
        'role'  => $user->role
      ]);

      if ($user->role == 'Admin') {
        redirect('admin/adminku');
      } else {
        redirect('admin/superadmin');
      }
    }

    public function logout()
    {
      $this->session->sess_destroy();
      redirect('');
    }
    public function user_edit($id){
      if (!$this->session->userdata('login') || 
      $this->session->userdata('role') != 'Superadmin') {
      redirect('admin/login');
      }
      $user = $this->user_model->getById($id);
      if (!$user) {
      show_error('Data admin tidak ditemukan');
      }
      $data['user'] = $user;
      $this->load->view("superadmin/edit_user", $data);
    }
    public function update_admin()
  {
    $id = $this->input->post('id');

    $data = [
      'nama'    => $this->input->post('nama'),
      'email'   => $this->input->post('email'),
      'jabatan' => $this->input->post('jabatan'),
      'role'    => $this->input->post('role')
    ];

    // kalau password diisi → update
    if (!empty($this->input->post('password'))) {
      $data['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
    }

    $this->user_model->update($id, $data);
    redirect('admin/superadmin');
  }
  public function hapus_admin($id)
  {
    if (!$this->session->userdata('login') || 
      $this->session->userdata('role') != 'Superadmin') {
      redirect('admin/login');
        }
    $this->user_model->delete($id);
    redirect('admin/superadmin');
  }
}