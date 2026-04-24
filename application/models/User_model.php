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
}