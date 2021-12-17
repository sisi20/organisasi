<?php
class Hima_Model extends CI_Model
{
    public $tabel = "hima";
    public $id = "hima.id";

    public function insert_hima($table, $data)
    {
        return $this->db->insert($table, $data);
    }

    public function get()
    {
        return $this->db->query("Select * from hima")->result();
    }

    public function get_prodi($id)
    {
        return $this->db->query("Select * from hima where id_user = '$id'")->result();
    }

    public function get_by_id($id)
    {
        $this->db->where('id_user', $id);
        return $this->db->get('hima')->row();
    }

    public function update($data, $id)
    {
        $this->db->where('id', $id);
        return $this->db->update('hima', $data);
    }

}
