<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Infomasi extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Informasi_model');
    $this->load->library('session');
  }

  public function informasi()
  {
    $this->load->view('Layout/Header');
    $this->load->view('Layout/sidebar');
    $this->load->view('Admin/Informasi/informasi');
    $this->load->view('Layout/footer');
  }

  public function tambah_informasi()
  {
    $this->load->view('Layout/Header');
    $this->load->view('Layout/sidebar');
    $this->load->view('Admin/Informasi/tambah');
    $this->load->view('Layout/footer');
  }

  public function tambah_informasi_action()
  {
    $waktu = $this->input->post("waktu");
    $jenis = $this->input->post("jenis");
    $ket = $this->input->post("ket");
    $mode = $this->input->post("mode");
    $lokasi = $this->input->post("lokasi");
    $gambar = $_FILES['gambar'];

    if ($gambar = '') {
    } else {
      $config['upload_path'] = './assets1/images/aktivitas';
      $config['allowed_types'] = 'jpg|png|gif';

      $this->load->library('upload', $config);
      if (!$this->upload->do_upload('gambar')) {
        echo "Upload Gagal";
        die();
      } else {
        $gambar = $this->upload->data('file_name');
      }
    }

    $data = array(
      'waktu' => $waktu,
      'jenis' => $jenis,
      'ket' => $ket,
      'mode' => $mode,
      'lokasi' => $lokasi,
      'gambar' => $gambar,
    );

    $insert = $this->Informasi_model->insert_informasi('informasi', $data);
    if ($insert) {
      echo '<script>alert("Sukses! Anda berhasil menambah data Informasi.");window.location.href="' . base_url('informasi/informasi') . '";</script>';
    }
  }

  public function delete_informasi($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('informasi');
    redirect('informasi/informasi');
  }

  public function edit_informasi($id)
  {
    $informasi = $this->Informasi_model->get_by_id($id);
    $data = array('informasi' => $informasi);
    $this->load->view('Admin/Informasi/edit.php', $data);
  }

  public function edit_informasi_action()
  {
    $id = $this->input->post("id");
    $waktu = $this->input->post("waktu");
    $jenis = $this->input->post("jenis");
    $ket = $this->input->post("ket");
    $mode = $this->input->post("mode");
    $lokasi = $this->input->post("lokasi");
    $gambar = $_FILES['gambar'];

    if ($gambar = '') {
    } else {
      $config['upload_path'] = './assets1/images/aktivitas';
      $config['allowed_types'] = 'jpg|png|gif';

      $this->load->library('upload', $config);
      if (!$this->upload->do_upload('gambar')) {
        echo "Upload Gagal";
        die();
      } else {
        $gambar = $this->upload->data('file_name');
      }
    }

    $data = array(
      'waktu' => $waktu,
      'jenis' => $jenis,
      'ket' => $ket,
      'mode' => $mode,
      'lokasi' => $lokasi,
      'gambar' => $gambar,
    );

    $insert = $this->Informasi_model->update($data, $id);
    if ($insert) {
      echo '<script>alert("Sukses! Anda berhasil melakukan edit Informasi");window.location.href="' . base_url('informasi/informasi') . '";</script>';
    }
  }
}
