<?php
class PengurusHima_Model extends CI_Model
{
    public $tabel = "pengurus_hima";
    public $id = "pengurus_hima.id";

    public function insert_pengurus_hima($table, $data)
    {
        return $this->db->insert($table, $data);
    }

    public function get($id)
    {
        return $this->db->query("Select * from pengurus_hima where id_user='$id'")->result();
    }

    public function get_by_id($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('pengurus_hima')->row();
    }

    public function update($data, $id)
    {
        $this->db->where('id', $id);
        return $this->db->update('pengurus_hima', $data);
    }

}
