<?php
class Dokumen_Model extends CI_Model
{
    public $tabel = "dokumen";
    public $id = "dokumen.id";


    public function insert_dokumen($table, $data)
    {
        return $this->db->insert($table, $data);
    }

    public function getLPJ()
    {
        return $this->db->query("Select * from dokumen where ket ='LPJ'" )->result();
    }

    public function get_LPJ($id)
    {
        return $this->db->query("Select * from dokumen where ket ='LPJ' and id_user = '$id'" )->result();
    }

    public function getProposal()
    {
        return $this->db->query("Select * from dokumen where ket ='Proposal'" )->result();
    }

    public function get_Proposal($id)
    {
        return $this->db->query("Select * from dokumen where ket ='Proposal' and id_user = '$id'" )->result();
    }

    public function get_by_id($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('dokumen')->row();
    }

    public function update($data, $id)
    {
        $this->db->where('id', $id);
        return $this->db->update('dokumen', $data);
    }

}
