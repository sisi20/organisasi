<?php
class Ukm_Model extends CI_Model
{
    public $tabel = "ukm";
    public $id = "ukm.id";

    public function insert_ukm($table, $data)
    {
        return $this->db->insert($table, $data);
    }

    public function get()
    {
        return $this->db->query("Select * from ukm")->result();
    }

    public function get_by_id($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('ukm')->row();
    }

    public function update($data, $id)
    {
        $this->db->where('id', $id);
        return $this->db->update('ukm', $data);
    }

}
