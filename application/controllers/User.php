<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url'));
        $this->load->model('User_Model');
        $this->load->library('session');
    }

    public function tambah_user()
    {
        $this->load->view('Layout/Header');
        $this->load->view('Layout/sidebar');
        $this->load->view('Admin/User/tambah');
        $this->load->view('Layout/footer');
    }

    public function Tambah_user_action()
    {

        $this->load->library('form_validation');
        $this->load->library('session');

        $this->form_validation->set_rules(
            'username',
            'Username',
            'required',
            array('required' => 'Username Wajib Di Isi')
        );
        $this->form_validation->set_rules(
            'email',
            'email',
            'required|min_length[5]|max_length[50]|is_unique[user.email]',
            array('required' => 'email Wajib Di Isi', 'is_unique' => 'Email Sudah terdaftar')
        );
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required|trim',
            array('required' => 'Password Wajib Di Isi')
        );
        $this->form_validation->set_rules(
            'kategori',
            'Kategori',
            'required',
            array('required' => 'Kategori Wajib Di Isi')
        );


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Layout/Header');
            $this->load->view('Layout/sidebar');
            $this->load->view('Admin/User/tambah');
            $this->load->view('Layout/footer');
        } else {

            $email = $this->input->post('email');
            $cek_username = $this->input->post('username');
            if ($cek_username == null) {
                echo '<script>alert("Username Kosong!!");window.location.href="' . base_url('/index.php/user/tambah_user') . '";</script>';
            } else {
                $username = $cek_username;
                $ket = "Aktif";
            }
            $cek_kategori = $this->input->post('kategori');
            if ($cek_kategori == "BEM") {
                $kategori = $cek_kategori;
                $role = 1;
            } else if ($cek_kategori == "BLM") {
                $kategori = $cek_kategori;
                $role = 2;
            } else if ($cek_kategori == "Kemahasiswaan") {
                $kategori = $cek_kategori;
                $role = 3;
            } else if ($cek_kategori == "UKMI") {
                $kategori = $cek_kategori;
                $role = 4;
            } else if ($cek_kategori == "PERMADISH") {
                $kategori = $cek_kategori;
                $role = 5;
            } else if ($cek_kategori == "SEPAK BOLA") {
                $kategori = $cek_kategori;
                $role = 6;
            } else if ($cek_kategori == "BADMINTON") {
                $kategori = $cek_kategori;
                $role = 7;
            } else if ($cek_kategori == "Voly") {
                $kategori = $cek_kategori;
                $role = 8;
            } else if ($cek_kategori == "MAPALA") {
                $kategori = $cek_kategori;
                $role = 9;
            } else if ($cek_kategori == "PUTY") {
                $kategori = $cek_kategori;
                $role = 10;
            } else if ($cek_kategori == "PMK") {
                $kategori = $cek_kategori;
                $role = 11;
            } else if ($cek_kategori == "PSM") {
                $kategori = $cek_kategori;
                $role = 12;
            } else if ($cek_kategori == "SATA") {
                $kategori = $cek_kategori;
                $role = 13;
            } else if ($cek_kategori == "BASKET") {
                $kategori = $cek_kategori;
                $role = 14;
            } else if ($cek_kategori == "TI") {
                $kategori = $cek_kategori;
                $role = 15;
            } else if ($cek_kategori == "SI") {
                $kategori = $cek_kategori;
                $role = 16;
            } else if ($cek_kategori == "AKT") {
                $kategori = $cek_kategori;
                $role = 17;
            } else if ($cek_kategori == "TK") {
                $kategori = $cek_kategori;
                $role = 18;
            } else if ($cek_kategori == "TET") {
                $kategori = $cek_kategori;
                $role = 19;
            } else if ($cek_kategori == "HMM") {
                $kategori = $cek_kategori;
                $role = 20;
            } else if ($cek_kategori == "TM") {
                $kategori = $cek_kategori;
                $role = 21;
            } else if ($cek_kategori == "TL") {
                $kategori = $cek_kategori;
                $role = 22;
            } else if ($cek_kategori == "TE") {
                $kategori = $cek_kategori;
                $role = 23;
            } else if ($cek_kategori == "TT") {
                $kategori = $cek_kategori;
                $role = 24;
            } else {
                echo '<script>alert("Kategori Telah Digunakan."); window.location.href="' . base_url('user/tambah_user') . '";
        </script>';
            }

            if ($kategori > 1) {
                echo '<script>alert("Kategori Telah Digunakan."); window.location.href="' . base_url('user/tambah_user') . '";
                </script>';
            }
            $password = $this->input->post('password');
            $data = [
                'username' => $username,
                'role' => $role,
                'kategori' => $kategori,
                'ket' => $ket,
                'email' => $email,
                'password' => $password,
            ];
            $insert = $this->User_Model->register("user", $data);
            if ($insert) {
                echo '<script>alert("Sukses! Anda berhasil melakukan register. Silahkan login untuk mengakses data.");window.location.href="' . base_url('/index.php/home/user') . '";</script>';
            }
        }
    }

    public function delete_user($id)
    {
        $this->db->where('id_user', $id);
        $this->db->delete('user');
        redirect('home/user');
    }

    public function edit($id)
    {
        $user = $this->User_Model->get_by_id($id);
        $data = array('user' => $user);
        $this->load->view('Layout/Header');
        $this->load->view('Layout/sidebar');
        $this->load->view('Admin/User/edit', $data);
        $this->load->view('Layout/footer');
    }

    public function edit_user_action()
    {
        $id = $this->input->post("id_user");
        $email = $this->input->post('email');
        $username = $this->input->post('username');
        $ket = $this->input->post('ket');
        $password = $this->input->post("password");
        $data = [
            'username' => $username,
            'ket' => $ket,
            'email' => $email,
            'password' => $password,
        ];

        $this->User_Model->update($data, $id);
        redirect('home/user');
    }

    public function edit_profil($id)
    {
        $user = $this->User_Model->get_by_id($id);
        $data = array('user' => $user);
        $this->load->view('Layout/Header');
        $this->load->view('Layout/sidebar');
        $this->load->view('Admin/Profil/edit', $data);
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
        redirect('home/profil/' . $id);
    }
}
