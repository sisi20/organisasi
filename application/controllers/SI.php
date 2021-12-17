<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SI extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url'));
        $this->load->model('User_Model');
        $this->load->model('Hima_Model');
        $this->load->model('Aktivitas_Model');
        $this->load->model('Dokumen_Model');
        $this->load->model('PengurusHima_Model');
        $this->load->library('session');
    }

    public function aktivitas($id)
    {
        $aktivitas = $this->Aktivitas_Model->get($id);
        $data = array('aktivitas' => $aktivitas);
        $this->load->view('Layout/Header');
        $this->load->view('Hima/SI/Aktivitas/aktivitas', $data);
        $this->load->view('Layout/footer');
    }

    public function pengurus($id)
    {
        $pengurus = $this->PengurusHima_Model->get($id);
        $data = array('pengurus' => $pengurus);
        $this->load->view('Layout/Header');
        $this->load->view('Hima/SI/Pengurus/pengurus', $data);
        $this->load->view('Layout/footer');
    }

    public function tambah_aktivitas()
    {
        $this->load->view('Layout/Header');
        $this->load->view('Hima/SI/Aktivitas/tambah');
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
            echo '<script>alert("Prodi tidak terpilih!!");window.location.href="' . base_url('/index.php/si/tambah_aktivitas') . '";</script>';
        }

        $waktu = $this->input->post("waktu");
        $jenis = $this->input->post("jenis");
        $ket = $this->input->post("ket");
        $mode = $this->input->post("mode");
        $lokasi = $this->input->post("lokasi");
        $ruangan = $this->input->post("ruangan");
        $link = $this->input->post("link");
        $gambar = $_FILES['gambar'];

        if ($gambar = '') {
        } else {
            $config['upload_path'] = './assets/aktivitas';
            $config['allowed_types'] = 'jpg|png|gif';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('gambar')) {
                redirect('home/error');
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
            echo '<script>alert("Sukses! Anda berhasil menambah data Aktivitas.");window.location.href="' . base_url('si/aktivitas/' . $id_user) . '";</script>';
        }
    }

    public function edit($id)
    {
        $aktivitas = $this->Aktivitas_Model->get_by_id($id);
        $data = array('aktivitas' => $aktivitas);
        $this->load->view('Layout/Header');
        $this->load->view('Hima/SI/Aktivitas/edit', $data);
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
                redirect('home/error');
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
        redirect('si/aktivitas/' . $id_user);
    }

    public function tambah_Pengurus()
    {
        $this->load->view('Layout/Header');
        $this->load->view('Hima/SI/Pengurus/tambah');
        $this->load->view('Layout/footer');
    }

    public function tambah_pengurus_action()
    {
        $cek_idUser = $this->input->post('id_user');
        if ($cek_idUser == 3) {
            $id_user = $cek_idUser;
            $prodi = "Akuntansi";
        } else if ($cek_idUser == 4) {
            $id_user = $cek_idUser;
            $prodi = "Sistem Informasi";
        } else if ($cek_idUser == 5) {
            $id_user = $cek_idUser;
            $prodi = "Teknik Informatika";
        } else if ($cek_idUser == 6) {
            $id_user = $cek_idUser;
            $prodi = "Teknik Mesin";
        } else if ($cek_idUser == 7) {
            $id_user = $cek_idUser;
            $prodi = "Teknik Elektronika";
        } else if ($cek_idUser == 8) {
            $id_user = $cek_idUser;
            $prodi = "Teknik Telekomunikasi";
        } else if ($cek_idUser == 9) {
            $id_user = $cek_idUser;
            $prodi = "Teknik Mekatronika";
        } else if ($cek_idUser == 10) {
            $id_user = $cek_idUser;
            $prodi = "Teknik Elektronika Telekomunikasi";
        } else if ($cek_idUser == 12) {
            $id_user = $cek_idUser;
            $prodi = "Teknik Komputer";
        } else if ($cek_idUser == 13) {
            $id_user = $cek_idUser;
            $prodi = "Teknik Listrik";
        } else {
            echo '<script>alert("Prodi tidak terpilih!!");window.location.href="' . base_url('/index.php/hima/tambah_pengurus') . '";</script>';
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
                redirect('home/error');
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
            'prodi' => $prodi,
            'gambar' => $gambar,
        );

        $insert = $this->PengurusHima_Model->insert_pengurus_hima('pengurus_hima', $data);
        if ($insert) {
            echo '<script>alert("Sukses! Anda berhasil menambah data Aktivitas.");window.location.href="' . base_url('si/pengurus/' . $id_user) . '";</script>';
        }
    }

    public function edit_pengurus($id)
    {
        $pengurus = $this->PengurusHima_Model->get_by_id($id);
        $data = array('pengurus_hima' => $pengurus);
        $this->load->view('Layout/Header');
        $this->load->view('Hima/SI/Pengurus/edit', $data);
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
                redirect('home/error');
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

        $this->PengurusHima_Model->update($data, $id);
        redirect('hima/pengurus/' . $id_user);
    }

    public function delete_aktivitas($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('aktivitas');
        redirect('si/aktivitas/4');
    }

    public function delete_pengurus($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('pengurus_hima');
        redirect('si/pengurus/4');
    }

    public function proposal($id)
    {
        $proposal = $this->Dokumen_Model->get_Proposal($id);
        $data = array('proposal' => $proposal);
        $this->load->view('Layout/Header');
        $this->load->view('Hima/SI/Dokumen/proposal', $data);
        $this->load->view('Layout/footer');
    }

    public function lpj($id)
    {
        $lpj = $this->Dokumen_Model->get_LPJ($id);
        $data = array('lpj' => $lpj);
        $this->load->view('Layout/Header');
        $this->load->view('Hima/SI/Dokumen/lpj', $data);
        $this->load->view('Layout/footer');
    }
    public function tambah_proposal()
    {
        $this->load->view('Layout/Header');
        $this->load->view('Hima/SI/Dokumen/tambah_proposal');
        $this->load->view('Layout/footer');
    }

    public function tambah_lpj()
    {
        $this->load->view('Layout/Header');
        $this->load->view('Hima/SI/Dokumen/tambah_lpj');
        $this->load->view('Layout/footer');
    }

    public function tambah_lpj_action()
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
            echo '<script>alert("Prodi tidak terpilih!!");window.location.href="' . base_url('/index.php/si/tambah_lpj') . '";</script>';
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
            echo '<script>alert("Sukses! Anda berhasil menambah LPJ baru.");window.location.href="' . base_url('si/lpj/' . $id_user) . '";</script>';
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
            echo '<script>alert("Prodi tidak terpilih!!");window.location.href="' . base_url('/index.php/si/tambah_lpj/') . '";</script>';
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
            echo '<script>alert("Sukses! Anda berhasil menambah Proposal baru.");window.location.href="' . base_url('si/proposal/' . $id_user) . '";</script>';
        }
    }

    public function edit_proposal($id)
    {
        $dokumen = $this->Dokumen_Model->get_by_id($id);
        $data = array('dokumen' => $dokumen);
        $this->load->view('Layout/Header');
        $this->load->view('Hima/SI/Dokumen/edit_proposal', $data);
        $this->load->view('Layout/footer');
    }

    public function edit_lpj($id)
    {
        $dokumen = $this->Dokumen_Model->get_by_id($id);
        $data = array('dokumen' => $dokumen);
        $this->load->view('Layout/Header');
        $this->load->view('Hima/SI/Dokumen/edit_lpj', $data);
        $this->load->view('Layout/footer');
    }

    public function edit_proposal_action()
    {
        $id_user = $this->input->post("id_user");
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
        redirect('si/proposal/' . $id_user);
    }

    public function edit_lpj_action()
    {
        $id_user = $this->input->post("id_user");
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
        redirect('si/lpj/' . $id_user);
    }

    public function delete_lpj($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('dokumen');
        redirect('si/lpj/4');
    }

    public function delete_proposal($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('dokumen');
        redirect('si/proposal/4');
    }

    public function profil($id)
    {
        $hima = $this->Hima_Model->get_prodi($id);
        $user = $this->User_Model->get_user($id);
        $data = array(
            'user' => $user,
            'hima' => $hima,
        );
        $this->load->view('Layout/Header');
        $this->load->view('Hima/SI/Profil/profil', $data);
        $this->load->view('Layout/footer');
    }

    public function ditail_profil($id)
    {
        $user = $this->User_Model->get_user($id);
        $data = array(
            'user' => $user,
        );
        $this->load->view('Layout/Header');
        $this->load->view('Hima/SI/User/user', $data);
        $this->load->view('Layout/footer');
    }

    public function ditail_hima($id)
    {
        $hima = $this->Hima_Model->get_prodi($id);
        $data = array(
            'hima' => $hima,
        );
        $this->load->view('Layout/Header');
        $this->load->view('Hima/SI/Profil/hima', $data);
        $this->load->view('Layout/footer');
    }

    public function edit_user($id)
    {
        $user = $this->User_Model->get_by_id($id);
        $data = array('user' => $user);
        $this->load->view('Layout/Header');
        $this->load->view('Hima/SI/User/edit', $data);
        $this->load->view('Layout/footer');
    }

    public function edit_profil_action()
    {
        $id = $this->input->post("id_user");
        $email = $this->input->post('email');
        $username = $this->input->post('username');
        $password = $this->input->post("password");
        $foto = $_FILES['foto'];

        if ($foto = '') {
        } else {
            $config['upload_path'] = './assets/profil';
            $config['allowed_types'] = 'jpg|png|gif';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto')) {
                redirect('home/error');
                die();
            } else {
                $foto = $this->upload->data('file_name');
            }
        }
        $data = [
            'username' => $username,
            'foto' => $foto,
            'email' => $email,
            'password' => $password,
        ];

        $this->User_Model->update($data, $id);
        redirect('si/profil/' . $id);
    }

    public function edit_hima($id)
    {
        $hima = $this->Hima_Model->get_by_id($id);
        $data = array('hima' => $hima);
        $this->load->view('Layout/Header');
        $this->load->view('Hima/SI/Profil/edit', $data);
        $this->load->view('Layout/footer');
    }

    public function edit_hima_action()
    {
        $id = $this->input->post("id");
        $id_user = $this->input->post("id_user");
        $prodi = $this->input->post('prodi');
        $akriditas = $this->input->post('akriditas');
        $tahun_berdiri = $this->input->post("tahun_berdiri");

        $data = [
            'prodi' => $prodi,
            'akriditas' => $akriditas,
            'tahun_berdiri' => $tahun_berdiri,
        ];

        $this->Hima_Model->update($data, $id);
        redirect('si/profil/' . $id_user);
    }
}
