<?php
class Pengawas_Model extends CI_Model
{
    public $tabel = "pengawas";
    public $id = "pengawas.id";

    public function insert_pengawas($table, $data)
    {
        return $this->db->insert($table, $data);
    }

    public function get()
    {
        return $this->db->query("Select * from pengawas")->result();
    }

    public function get_by_id($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('pengawas')->row();
    }

    public function update($data, $id)
    {
        $this->db->where('id', $id);
        return $this->db->update('pengawas', $data);
    }

}
