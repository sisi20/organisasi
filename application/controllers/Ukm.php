<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ukm extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->helper(array('url'));
    $this->load->model('User_Model');
    $this->load->model('Ukm_Model');
    $this->load->model('Aktivitas_Model');
    $this->load->model('PengurusUkm_Model');
    $this->load->library('session');
  }

  public function detail($id)
  {
    $aktivitas = $this->Aktivitas_Model->get($id);
    $data = array('aktivitas' => $aktivitas);
    $this->load->view('Layout/Header');
    $this->load->view('Layout/sidebar');
    $this->load->view('Admin/Aktivitas_Ukm/aktivitas', $data);
    $this->load->view('Layout/footer');
  }

  public function pengurus($id)
  {
    $pengurus = $this->PengurusUkm_Model->get($id);
    $data = array('pengurus' => $pengurus);
    $this->load->view('Layout/Header');
    $this->load->view('Layout/sidebar');
    $this->load->view('Admin/Pengurus_Ukm/pengurus', $data);
    $this->load->view('Layout/footer');
  }

  public function tambah_aktivitas()
  {
    $this->load->view('Layout/Header');
    $this->load->view('Layout/sidebar');
    $this->load->view('Admin/Aktivitas_Ukm/tambah');
    $this->load->view('Layout/footer');
  }

  public function tambah_aktivitas_action()
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
      echo '<script>alert("Prodi tidak terpilih!!");window.location.href="' . base_url('/index.php/ukm/tambah_aktivitas') . '";</script>';
    }

    $waktu = $this->input->post("waktu");
    $jenis = $this->input->post("jenis");
    $ket = $this->input->post("ket");
    $mode = $this->input->post("mode");
    $ruangan = $this->input->post("ruangan");
    $link = $this->input->post("link");
    $gambar = $_FILES['gambar'];

    if ($gambar = '') {
    } else {
      $config['upload_path'] = './assets/aktivitas';
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
      'kategori' => $kategori,
      'ruangan' => $ruangan,
      'link' => $link,
      'gambar' => $gambar,
    );

    $insert = $this->Aktivitas_Model->insert_aktivitas('aktivitas', $data);
    if ($insert) {
      echo '<script>alert("Sukses! Anda berhasil menambah data Aktivitas.");window.location.href="' . base_url('ukm/detail/' . $id_user) . '";</script>';
    }
  }

  public function edit($id)
  {
    $aktivitas = $this->Aktivitas_Model->get_by_id($id);
    $data = array('aktivitas' => $aktivitas);
    $this->load->view('Layout/Header');
    $this->load->view('Layout/sidebar');
    $this->load->view('Admin/Aktivitas_Ukm/edit', $data);
    $this->load->view('Layout/footer');
  }

  public function edit_aktivitas_action()
  {
    $id = $this->input->post("id");
    $waktu = $this->input->post("waktu");
    $id_user = $this->input->post("id_user");
    $jenis = $this->input->post("jenis");
    $ket = $this->input->post("ket");
    $mode = $this->input->post("mode");
    $ruangan = $this->input->post("ruangan");
    $link = $this->input->post("link");
    $gambar = $_FILES['gambar'];

    if ($gambar = '') {
    } else {
      $config['upload_path'] = './assets/aktivitas';
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
      'ruangan' => $ruangan,
      'link' => $link,
      'gambar' => $gambar,
    );

    $this->Aktivitas_Model->update($data, $id);
    redirect('ukm/detail/' . $id_user);
  }

  public function delete_aktivitas($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('aktivitas');
    redirect('home/aktivitas_ukm');
  }

  public function delete_pengurus($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('pengurus_ukm');
    redirect('home/pengurus_ukm');
  }

  public function tambah_Pengurus()
  {
    $this->load->view('Layout/Header');
    $this->load->view('Layout/sidebar');
    $this->load->view('Admin/Pengurus_Ukm/tambah');
    $this->load->view('Layout/footer');
  }

  public function tambah_pengurus_action()
  {
    $cek_idUser = $this->input->post('id_user');
    if($cek_idUser == 14) {
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
      echo '<script>alert("Prodi tidak terpilih!!");window.location.href="' . base_url('/index.php/ukm/tambah_pengurus') . '";</script>';
    }

    $nama = $this->input->post("nama");
    $nim = $this->input->post("nim");
    $jabatan = $this->input->post("jabatan");
    $gambar = $_FILES['gambar'];

    if ($gambar = '') {
    } else {
      $config['upload_path'] = './assets/pengurus';
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
      'kategori' => $kategori,
      'gambar' => $gambar,
    );

    $insert = $this->PengurusUkm_Model->insert_pengurus_ukm('pengurus_ukm', $data);
    if ($insert) {
      echo '<script>alert("Sukses! Anda berhasil menambah data Pengurus.");window.location.href="' . base_url('ukm/pengurus/' . $id_user) . '";</script>';
    }
  }

  public function edit_pengurus($id)
  {
    $pengurus = $this->PengurusUkm_Model->get_by_id($id);
    $data = array('pengurus_ukm' => $pengurus);
    $this->load->view('Layout/Header');
    $this->load->view('Layout/sidebar');
    $this->load->view('Admin/Pengurus_Ukm/edit', $data);
    $this->load->view('Layout/footer');
  }

  public function edit_pengurus_action()
  {
    $id_user = $this->input->post('id_user');
    $id = $this->input->post('id');
    $nama = $this->input->post("nama");
    $nim = $this->input->post("nim");
    $jabatan = $this->input->post("jabatan");
    $gambar = $_FILES['gambar'];

    if ($gambar = '') {
    } else {
      $config['upload_path'] = './assets/pengurus';
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

    $this->PengurusUkm_Model->update($data, $id);
        redirect('ukm/pengurus/' . $id_user);
  }
}
