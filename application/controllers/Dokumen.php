<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dokumen extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->helper(array('url'));
    $this->load->model('User_Model');
    $this->load->model('Hima_Model');
    $this->load->model('Aktivitas_Model');
    $this->load->model('PengurusHima_Model');
    $this->load->model('Dokumen_Model');
    $this->load->library('session');
  }

  public function tambah_proposal()
  {
    $this->load->view('Layout/Header');
    $this->load->view('Layout/sidebar');
    $this->load->view('Admin/Dokumen/tambah_proposal');
    $this->load->view('Layout/footer');
  }

  public function tambah_lpj()
  {
    $this->load->view('Layout/Header');
    $this->load->view('Layout/sidebar');
    $this->load->view('Admin/Dokumen/tambah_lpj');
    $this->load->view('Layout/footer');
  }

  public function tambah_lpj_action()
  {
    $cek_idUser = $this->input->post('id_user');
    if ($cek_idUser == 3) {
      $id_user = $cek_idUser;
      $kategori = "Akuntansi";
    } else if ($cek_idUser == 4) {
      $id_user = $cek_idUser;
      $kategori = "Sistem Informasi";
    } else if ($cek_idUser == 5) {
      $id_user = $cek_idUser;
      $kategori = "Teknik Informatika";
    } else if ($cek_idUser == 6) {
      $id_user = $cek_idUser;
      $kategori = "Teknik Mesin";
    } else if ($cek_idUser == 7) {
      $id_user = $cek_idUser;
      $kategori = "Teknik Elektronika";
    } else if ($cek_idUser == 8) {
      $id_user = $cek_idUser;
      $kategori = "Teknik Telekomunikasi";
    } else if ($cek_idUser == 9) {
      $id_user = $cek_idUser;
      $kategori = "Teknik Mekatronika";
    } else if ($cek_idUser == 10) {
      $id_user = $cek_idUser;
      $kategori = "Teknik Elektronika Telekomunikasi";
    } else if ($cek_idUser == 12) {
      $id_user = $cek_idUser;
      $kategori = "Teknik Komputer";
    } else if ($cek_idUser == 13) {
      $id_user = $cek_idUser;
      $kategori = "Teknik Listrik";
    } else if ($cek_idUser == 14) {
      $id_user = $cek_idUser;
      $kategori = "Voly";
    } else if ($cek_idUser == 15) {
      $id_user = $cek_idUser;
      $kategori = "Sepak Bola";
    } else if ($cek_idUser == 16) {
      $id_user = $cek_idUser;
      $kategori = "Puty";
    } else if ($cek_idUser == 17) {
      $id_user = $cek_idUser;
      $kategori = "Seni Tari";
    } else if ($cek_idUser == 18) {
      $id_user = $cek_idUser;
      $kategori = "Permadis";
    } else if ($cek_idUser == 19) {
      $id_user = $cek_idUser;
      $kategori = "Ukmi";
    } else if ($cek_idUser == 20) {
      $id_user = $cek_idUser;
      $kategori = "PMK";
    } else if ($cek_idUser == 21) {
      $id_user = $cek_idUser;
      $kategori = "PSM";
    } else if ($cek_idUser == 22) {
      $id_user = $cek_idUser;
      $kategori = "Badminton";
    } else if ($cek_idUser == 23) {
      $id_user = $cek_idUser;
      $kategori = "Mapala";
    } else if ($cek_idUser == 24) {
      $id_user = $cek_idUser;
      $kategori = "Basket";
    } else {
      echo '<script>alert("Prodi tidak terpilih!!");window.location.href="' . base_url('/index.php/dokumen/tambah_lpj') . '";</script>';
    }
    $priode = $this->input->post("priode");
    $ket = $this->input->post("ket");
    $file = $_FILES['file'];

    if ($file = '') {
    } else {
      $config['upload_path'] = './assets/dokumen';
      $config['allowed_types'] = 'pdf|doc|docx';
      $config['max_size']             = 10000;

      $this->load->library('upload', $config);
      if (!$this->upload->do_upload('file')) {
        echo "Upload Gagal";
        die();
      } else {
        $file = $this->upload->data('file_name');
      }
    }

    $data = array(
      'id_user' => $id_user,
      'ket' => $ket,
      'kategori' => $kategori,
      'priode' => $priode,
      'file' => $file,
    );

    $insert = $this->Dokumen_Model->insert_dokumen('dokumen', $data);
    if ($insert) {
      echo '<script>alert("Sukses! Anda berhasil menambah LPJ baru.");window.location.href="' . base_url('Home/lpj') . '";</script>';
    }
  }

  public function tambah_proposal_action()
  {
    $cek_idUser = $this->input->post('id_user');
    if ($cek_idUser == 3) {
      $id_user = $cek_idUser;
      $kategori = "Akuntansi";
      $gol = "HIMA";
    } else if ($cek_idUser == 4) {
      $id_user = $cek_idUser;
      $kategori = "Sistem Informasi";
      $gol = "HIMA";
    } else if ($cek_idUser == 5) {
      $id_user = $cek_idUser;
      $kategori = "Teknik Informatika";
      $gol = "HIMA";
    } else if ($cek_idUser == 6) {
      $id_user = $cek_idUser;
      $kategori = "Teknik Mesin";
      $gol = "HIMA";
    } else if ($cek_idUser == 7) {
      $id_user = $cek_idUser;
      $kategori = "Teknik Elektronika";
      $gol = "HIMA";
    } else if ($cek_idUser == 8) {
      $id_user = $cek_idUser;
      $kategori = "Teknik Telekomunikasi";
      $gol = "HIMA";
    } else if ($cek_idUser == 9) {
      $id_user = $cek_idUser;
      $kategori = "Teknik Mekatronika";
      $gol = "HIMA";
    } else if ($cek_idUser == 10) {
      $id_user = $cek_idUser;
      $kategori = "Teknik Elektronika Telekomunikasi";
      $gol = "HIMA";
    } else if ($cek_idUser == 12) {
      $id_user = $cek_idUser;
      $kategori = "Teknik Komputer";
      $gol = "HIMA";
    } else if ($cek_idUser == 13) {
      $id_user = $cek_idUser;
      $kategori = "Teknik Listrik";
      $gol = "HIMA";
    } else if ($cek_idUser == 14) {
      $id_user = $cek_idUser;
      $kategori = "Voly";
      $gol = "UKM";
    } else if ($cek_idUser == 15) {
      $id_user = $cek_idUser;
      $kategori = "Sepak Bola";
      $gol = "UKM";
    } else if ($cek_idUser == 16) {
      $id_user = $cek_idUser;
      $kategori = "Puty";
      $gol = "UKM";
    } else if ($cek_idUser == 17) {
      $id_user = $cek_idUser;
      $kategori = "Seni Tari";
      $gol = "UKM";
    } else if ($cek_idUser == 18) {
      $id_user = $cek_idUser;
      $kategori = "Permadis";
      $gol = "UKM";
    } else if ($cek_idUser == 19) {
      $id_user = $cek_idUser;
      $kategori = "Ukmi";
      $gol = "UKM";
    } else if ($cek_idUser == 20) {
      $id_user = $cek_idUser;
      $kategori = "PMK";
      $gol = "UKM";
    } else if ($cek_idUser == 21) {
      $id_user = $cek_idUser;
      $kategori = "PSM";
      $gol = "UKM";
    } else if ($cek_idUser == 22) {
      $id_user = $cek_idUser;
      $kategori = "Badminton";
      $gol = "UKM";
    } else if ($cek_idUser == 23) {
      $id_user = $cek_idUser;
      $kategori = "Mapala";
      $gol = "UKM";
    } else if ($cek_idUser == 24) {
      $id_user = $cek_idUser;
      $kategori = "Basket";
      $gol = "UKM";
    } else {
      echo '<script>alert("Prodi tidak terpilih!!");window.location.href="' . base_url('/index.php/dokumen/tambah_lpj') . '";</script>';
    }
    $priode = $this->input->post("priode");
    $ket = $this->input->post("ket");
    $file = $_FILES['file'];

    if ($file = '') {
    } else {
      $config['upload_path'] = './assets/dokumen';
      $config['allowed_types'] = 'pdf|doc|docx';
      $config['max_size']             = 10000;

      $this->load->library('upload', $config);
      if (!$this->upload->do_upload('file')) {
        echo "Upload Gagal";
        die();
      } else {
        $file = $this->upload->data('file_name');
      }
    }

    $data = array(
      'id_user' => $id_user,
      'ket' => $ket,
      'kategori' => $kategori,
      'gol' => $gol,
      'priode' => $priode,
      'file' => $file,
    );

    $insert = $this->Dokumen_Model->insert_dokumen('dokumen', $data);
    if ($insert) {
      echo '<script>alert("Sukses! Anda berhasil menambah Proposal baru.");window.location.href="' . base_url('Home/proposal') . '";</script>';
    }
  }

  public function edit_proposal($id)
  {
    $dokumen = $this->Dokumen_Model->get_by_id($id);
    $data = array('dokumen' => $dokumen);
    $this->load->view('Layout/Header');
    $this->load->view('Layout/sidebar');
    $this->load->view('Admin/Dokumen/edit_proposal', $data);
    $this->load->view('Layout/footer');
  }

  public function edit_lpj($id)
  {
    $dokumen = $this->Dokumen_Model->get_by_id($id);
    $data = array('dokumen' => $dokumen);
    $this->load->view('Layout/Header');
    $this->load->view('Layout/sidebar');
    $this->load->view('Admin/Dokumen/edit_lpj', $data);
    $this->load->view('Layout/footer');
  }

  public function edit_proposal_action()
  {
    $id = $this->input->post("id");
    $priode = $this->input->post("priode");
    $file = $_FILES['file'];

    if ($file = '') {
    } else {
      $config['upload_path'] = './assets/dokumen';
      $config['allowed_types'] = 'pdf|doc|docx';
      $config['max_size']             = 10000;

      $this->load->library('upload', $config);
      if (!$this->upload->do_upload('file')) {
        echo "Upload Gagal";
        die();
      } else {
        $file = $this->upload->data('file_name');
      }
    }

    $data = array(
      'priode' => $priode,
      'file' => $file,
    );

    $this->Dokumen_Model->update($data, $id);
    redirect('home/proposal');
  }

  public function edit_lpj_action()
  {
    $id = $this->input->post("id");
    $priode = $this->input->post("priode");
    $file = $_FILES['file'];

    if ($file = '') {
    } else {
      $config['upload_path'] = './assets/dokumen';
      $config['allowed_types'] = 'pdf|doc|docx';
      $config['max_size']             = 10000;

      $this->load->library('upload', $config);
      if (!$this->upload->do_upload('file')) {
        echo "Upload Gagal";
        die();
      } else {
        $file = $this->upload->data('file_name');
      }
    }

    $data = array(
      'priode' => $priode,
      'file' => $file,
    );

    $this->Dokumen_Model->update($data, $id);
    redirect('home/lpj');
  }

  public function delete_lpj($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('dokumen');
    redirect('home/lpj');
  }

  public function delete_proposal($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('dokumen');
    redirect('home/proposal');
  }

  public function approve_lpj($id)
  {
    $dokumen = $this->Dokumen_Model->get_by_id($id);
    $data = array('dokumen' => $dokumen);
    $this->load->view('Layout/Header');
    $this->load->view('Layout/sidebar');
    $this->load->view('Admin/Dokumen/approve_lpj', $data);
    $this->load->view('Layout/footer');
  }

  public function approve_action()
  {
    $id = $this->input->post("id");
    // $id_user = $this->input->post("id_user");
    $status = $this->input->post("status");
    $data = array(
      'status' => $status,
    );

    $this->Dokumen_Model->update($data, $id);
    redirect('home/lpj');
  }

  public function approve_proposal($id)
  {
    $dokumen = $this->Dokumen_Model->get_by_id($id);
    $data = array('dokumen' => $dokumen);
    $this->load->view('Layout/Header');
    $this->load->view('Layout/sidebar');
    $this->load->view('Admin/Dokumen/approve_proposal', $data);
    $this->load->view('Layout/footer');
  }

  public function approve_proposal_action()
  {
    $id = $this->input->post("id");
    // $id_user = $this->input->post("id_user");
    $status = $this->input->post("status");
    $data = array(
      'status' => $status,
    );

    $this->Dokumen_Model->update($data, $id);
    redirect('home/proposal');
  }
}
