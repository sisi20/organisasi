<?php
class PengurusUkm_Model extends CI_Model
{
    public $tabel = "pengurus_ukm";
    public $id = "pengurus_ukm.id";

    public function insert_pengurus_ukm($table, $data)
    {
        return $this->db->insert($table, $data);
    }

    public function get($id)
    {
        return $this->db->query("Select * from pengurus_ukm where id_user='$id'")->result();
    }

    public function get_by_id($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('pengurus_ukm')->row();
    }

    public function update($data, $id)
    {
        $this->db->where('id', $id);
        return $this->db->update('pengurus_ukm', $data);
    }

}
