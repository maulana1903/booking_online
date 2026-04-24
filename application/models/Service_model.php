<?php

class Service_model extends CI_Model
{  
  public function simpan($data)
    {
      return $this->db->insert('service_online', $data);
    }
  public function getAll()
    {
      return $this->db->get('service_online')->result();
    }
  public function updateStatus($id, $status)
  {
    return $this->db->update(
      'service_online',
      ['status' => $status],
      ['id' => $id]
    );
  }
    public function getById($id)
  {
    return $this->db->get_where('service_online', ['id' => $id])->row();
  }
  public function cekBentrok($tanggal, $jam)
  {
    $requestTime = strtotime("$tanggal $jam");

    $this->db->where('tanggal', $tanggal);
    $this->db->where_in('status', ['menunggu', 'acc']);
    $query = $this->db->get('service_online')->result();

    foreach ($query as $row) {
      $existingTime = strtotime($row->tanggal . ' ' . $row->jam);
      $diff = abs($requestTime - $existingTime);

      // 2 jam = 7200 detik
      if ($diff < 7200) {
        return [
          'bentrok' => true,
          'jam_terpakai' => $row->jam
        ];
      }
    }

    return ['bentrok' => false];
  }
      public function total_service()
    {
        return $this->db->count_all('service_online');
    }

    public function total_acc()
    {
        return $this->db
            ->where('status', 'ACC')
            ->from('service_online')
            ->count_all_results();
    }

    public function total_tolak()
    {
        return $this->db
            ->where('status', 'Ditolak')
            ->from('service_online')
            ->count_all_results();
    }

    public function service_hari_ini()
    {
        return $this->db
            ->where('tanggal', date('Y-m-d'))
            ->from('service_online')
            ->count_all_results();
    }
}
