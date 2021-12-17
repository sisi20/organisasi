<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_Model extends CI_Model
{
    public $tabel = "user";
    public $id = "user.id";

    function jumlah_data()
    {
        return $this->db->get('user')->num_rows();
    }

    public function get()
    {
        return $this->db->query("Select * from user")->result();
    }

    public function get_user($id)
    {
        return $this->db->query("Select * from user where id_user = '$id'")->result();
    }

    public function get_by_id($id)
    {
        $this->db->where('id_user', $id);
        return $this->db->get('user')->row();
    }

    public function register($table, $data)
    {
        return $this->db->insert($table, $data);
    }


    public function update($data, $id)
    {
        $this->db->where('id_user', $id);
        return $this->db->update('user', $data);
    }
}
