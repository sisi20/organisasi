<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akuntansi extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Aktivitas_Model');
    $this->load->model('PengurusHima_Model');
    $this->load->model('User_Model');
    $this->load->model('Dokumen_Model');
    $this->load->library('session');
  }

  public function akuntansi()
  {
    $this->load->view('HimpunanMhs/Akuntansi/dashboard');
  }

  public function aktivitas()
  {
    $aktivitas = $this->Aktivitas_Model->get();
    $data = array('aktivitas' => $aktivitas);
    $this->load->view('HimpunanMhs/Akuntansi/Aktivitas/Aktivitas.php', $data);
  }

  public function tambah_aktivitas()
  {
    $this->load->view('HimpunanMhs/Akuntansi/Aktivitas/TambahAktivitas.php');
  }

  public function tambah_aktivitas_action()
  {
    $id_user = $this->input->post("id_user");
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
      'id_user' => $id_user,
      'waktu' => $waktu,
      'jenis' => $jenis,
      'ket' => $ket,
      'mode' => $mode,
      'lokasi' => $lokasi,
      'gambar' => $gambar,
    );

    $insert = $this->Aktivitas_Model->insert_aktivitas('aktivitas', $data);
    if ($insert) {
      echo '<script>alert("Sukses! Anda berhasil menambah data Aktivitas.");window.location.href="' . base_url('akuntansi/aktivitas') . '";</script>';
    }
  }

  public function delete_aktivitas($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('aktivitas');
    redirect('akuntansi/aktivitas');
  }

  public function edit_aktivitas($id)
  {
    $aktivitas = $this->Aktivitas_Model->get_by_id($id);
    $data = array('aktivitas' => $aktivitas);
    $this->load->view('HimpunanMhs/Akuntansi/Aktivitas/EditAktivitas.php', $data);
  }

  public function edit_aktivtas_action()
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

    $insert = $this->Aktivitas_Model->update($data, $id);
    if ($insert) {
      echo '<script>alert("Sukses! Anda berhasil melakukan edit Aktivitas");window.location.href="' . base_url('akuntansi/aktivitas') . '";</script>';
    }
  }
  public function lpj()
  {
    $lpj = $this->Dokumen_Model->getLPJ();
    $data = array('lpj' => $lpj);
    $this->load->view('HimpunanMhs/Akuntansi/Dokumen/LPJ/vw_lpj.php', $data);
  }

  public function tambah_lpj()
  {
    $this->load->view('HimpunanMhs/Akuntansi/Dokumen/LPJ/upload_lpj.php');
  }

  public function tambah_lpj_action()
  {
    $id_user = $this->input->post("id_user");
    $priode = $this->input->post("priode");
    $ket = $this->input->post("ket");
    $file = $_FILES['file'];

    if ($file = '') {
    } else {
      $config['upload_path'] = './assets1/dokumen/lpj';
      $config['allowed_types'] = 'txt|doc|docx';
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
      'priode' => $priode,
      'file' => $file,
    );

    $insert = $this->Dokumen_Model->insert_dokumen('dokumen', $data);
    if ($insert) {
      echo '<script>alert("Sukses! Anda berhasil menambah LPJ baru.");window.location.href="' . base_url('akuntansi/lpj') . '";</script>';
    }
  }

  public function delete_lpj($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('dokumen');
    redirect('akuntansi/lpj');
  }

  public function edit_lpj($id)
  {
    $lpj = $this->Dokumen_Model->get_by_id($id);
    $data = array('lpj' => $lpj);
    $this->load->view('HimpunanMhs/Akuntansi/Dokumen/LPJ/EditLpj.php', $data);
  }

  public function edit_lpj_action()
  {
    $id_user = $this->input->post("id_user");
    $id = $this->input->post("id");
    $ket = $this->input->post("ket");
    $priode = $this->input->post("priode");
    $file = $_FILES['file'];

    if ($file = '') {
    } else {
      $config['upload_path'] = './assets1/dokumen';
      $config['allowed_types'] = 'txt|doc|docx';

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
      'priode' => $priode,
      'file' => $file,
    );

    $insert = $this->Dokumen_Model->update($data, $id);
    if ($insert) {
      echo '<script>alert("Sukses! Anda berhasil edit LPJ.");window.location.href="' . base_url('akuntansi/lpj') . '";</script>';
    }
  }

  public function proposal()
  {
    $proposal = $this->Dokumen_Model->getProposal();
    $data = array('proposal' => $proposal);
    $this->load->view('HimpunanMhs/Akuntansi/Dokumen/Proposal/proposal.php', $data);
  }

  public function tambah_proposal()
  {
    $this->load->view('HimpunanMhs/Akuntansi/Dokumen/Proposal/upload_proposal.php');
  }

  public function tambah_proposal_action()
  {
    $id_user = $this->input->post("id_user");
    $ket = $this->input->post("ket");
    $priode = $this->input->post("priode");
    $file = $_FILES['file'];

    if ($file = '') {
    } else {
      $config['upload_path'] = './assets1/dokumen/proposal';
      $config['allowed_types'] = 'txt|doc|docx';

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
      'priode' => $priode,
      'file' => $file,
    );

    $insert = $this->Dokumen_Model->insert_dokumen('dokumen', $data);
    if ($insert) {
      echo '<script>alert("Sukses! Anda berhasil menambah Proposal baru.");window.location.href="' . base_url('akuntansi/proposal') . '";</script>';
    }
  }

  public function delete_proposal($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('dokumen');
    redirect('akuntansi/proposal');
  }

  public function edit_proposal($id)
  {
    $proposal = $this->Dokumen_Model->get_by_id($id);
    $data = array('proposal' => $proposal);
    $this->load->view('HimpunanMhs/Akuntansi/Dokumen/Proposal/EditProposal.php', $data);
  }

  public function edit_proposal_action()
  {
    $id_user = $this->input->post("id_user");
    $id = $this->input->post("id");
    $ket = $this->input->post("ket");
    $priode = $this->input->post("priode");
    $file = $_FILES['file'];

    if ($file = '') {
    } else {
      $config['upload_path'] = './assets1/dokumen';
      $config['allowed_types'] = 'txt|doc|docx';
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
      'priode' => $priode,
      'file' => $file,
    );

    $insert = $this->Dokumen_Model->update($data, $id);
    if ($insert) {
      echo '<script>alert("Sukses! Anda berhasil edit data Proposal.");window.location.href="' . base_url('akuntansi/proposal') . '";</script>';
    }
  }

  public function pengurus()
  {
    $pengurus = $this->PengurusHima_Model->get();
    $data = array('pengurus' => $pengurus);
    $this->load->view('HimpunanMhs/Akuntansi/Pengurus/Pengurus.php', $data);
  }

  public function tambah_Pengurus()
  {
    $this->load->view('HimpunanMhs/Akuntansi/Pengurus/TambahPengurus.php');
  }

  public function tambah_pengurus_action()
  {
    $id_user = $this->input->post("id_user");
    $nama = $this->input->post("nama");
    $nim = $this->input->post("nim");
    $jabatan = $this->input->post("jabatan");
    $gambar = $_FILES['gambar'];

    if ($gambar = '') {
    } else {
      $config['upload_path'] = './assets1/images/pengurus';
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
      'id_user' => $id_user,
      'nama' => $nama,
      'nim' => $nim,
      'jabatan' => $jabatan,
      'gambar' => $gambar,
    );

    $insert = $this->PengurusHima_Model->insert_pengurus_hima('pengurus_hima', $data);
    if ($insert) {
      echo '<script>alert("Sukses! Anda berhasil menambah data Aktivitas.");window.location.href="' . base_url('akuntansi/pengurus') . '";</script>';
    }
  }

  public function delete_pengurus($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('pengurus');
    redirect('akuntansi/pengurus');
  }

  public function edit_pengurus($id)
  {
    $pengurus = $this->PengurusHima_Model->get_by_id($id);
    $data = array('pengurus' => $pengurus);
    $this->load->view('HimpunanMhs/Akuntansi/Pengurus/EditPengurus.php', $data);
  }

  public function edit_pengurus_action()
  {
    $id = $this->input->post("id");
    $nama = $this->input->post("nama");
    $nim = $this->input->post("nim");
    $jabatan = $this->input->post("jabatan");
    $gambar = $_FILES['gambar'];

    if ($gambar = '') {
    } else {
      $config['upload_path'] = './assets1/images/pengurus';
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
      'nama' => $nama,
      'nim' => $nim,
      'jabatan' => $jabatan,
      'gambar' => $gambar,
    );

    $insert = $this->PengurusHima_Model->update($data, $id);
    if ($insert) {
      echo '<script>alert("Sukses! Anda berhasil edit data pengurus.");window.location.href="' . base_url('akuntansi/pengurus') . '";</script>';
    }
  }
}
