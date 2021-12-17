<?php
class Aktivitas_Model extends CI_Model
{
    public $tabel = "aktivitas";
    public $id = "aktivitas.id";

    public function insert_aktivitas($table, $data)
    {
        return $this->db->insert($table, $data);
    }

    public function get($id)
    {
        return $this->db->query("Select * from aktivitas where id_user = '$id'")->result();
    }

    public function get_ukm()
    {
        return $this->db->query("Select COUNT(gol) as gol from aktivitas where gol = 'UKM'")->result();
    }

    public function get_hima()
    {
        return $this->db->query("Select COUNT(gol)as gol from aktivitas where gol = 'HIMA'")->result();
    }

    public function get_by_id($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('aktivitas')->row();
    }

    public function update($data, $id)
    {
        $this->db->where('id', $id);
        return $this->db->update('aktivitas', $data);
    }

}
