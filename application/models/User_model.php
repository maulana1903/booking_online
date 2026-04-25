<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

  public function register($data)
  {
    return $this->db->insert('users', $data);
  }

  public function cek_email($email)
  {
    return $this->db->get_where('users', ['email' => $email])->row();
  }
  public function update($id, $data)
  {
    return $this->db->where('id', $id)->update('users', $data);
  }
  public function getAll()
  {
    return $this->db->get('users')->result();
  }
    public function getById($id)
  {
    return $this->db
              ->get_where('users', ['id' => $id])
              ->row();
  }
  public function delete($id)
  {
    return $this->db->delete('users', ['id' => $id]);
  }
  public function getJadwal()
  {
   return $this->db
    ->select('
        jadwal_karyawan.id as id_jadwal,
        jadwal_karyawan.id_karyawan,
        jadwal_karyawan.jam,
        jadwal_karyawan.tanggal,
        users.id as id_user,
        users.nama,
        users.jabatan
    ')
    ->from('jadwal_karyawan')
    ->join(
        'users',
        'users.id = jadwal_karyawan.id_karyawan',
        'inner'
    )
    ->get()
    ->result();
  }
    public function tambah_jadwal($data)
  {
    return $this->db->insert('jadwal_karyawan', $data);
  }
  public function update_jadwal($id, $data)
  {
    return $this->db
    ->where('id', $id)
    ->update('jadwal_karyawan', $data);
  }
  public function delete_jadwal($id)
  {
    return $this->db->delete('jadwal_karyawan', ['id' => $id]);
  }
  public function getIdJadwal($id)
  {
    return $this->db
              ->get_where('jadwal_karyawan', ['id' => $id])
              ->row();
  }

}