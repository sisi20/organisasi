<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Informasi_Model extends CI_Model
{
    public $tabel = "informasi";
    public $id = "informasi.id";

    public function insert_informasi($table, $data)
    {
        return $this->db->insert($table, $data);
    }

    public function get()
    {
        return $this->db->query("Select * from informasi")->result();
    }

    public function get_by_id($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('informasi')->row();
    }

    public function update($data, $id)
    {
        $this->db->where('id', $id);
        return $this->db->update('informasi', $data);
    }
}
