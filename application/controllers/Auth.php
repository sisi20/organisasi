<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_Model');
        $this->load->library('session');
    }

    public function index()
    {
        $this->load->view('Layout/header');
        $this->load->view('login');
    }

    public function cek_login()
    {
        $email = $this->input->post("email");
        $password = $this->input->post("password");
        $cek_login = $this->Login_model->login($email, $password);

        if (empty($cek_login)) {
            echo '<script>alert("User tidak terdaftar !!");window.location.href="' . base_url('auth') . '";</script>';
        } else {
            $this->session->set_userdata('user', $cek_login);
            if ($this->session->userdata('user')->ket == 'Aktif') {
                if ($this->session->userdata('user')->role == '1') {
                    $_SESSION['user'] = $cek_login;
                    redirect('home/dashboard');
                } else if ($this->session->userdata('user')->role == '2') {
                    $_SESSION['user'] = $cek_login;
                    redirect('home/user');
                } else if ($this->session->userdata('user')->role == '3') {
                    $_SESSION['user'] = $cek_login;
                    redirect('home/user');
                } else if ($this->session->userdata('user')->role == '4') {
                    $_SESSION['user'] = $cek_login;
                    redirect('home/user');
                } else if ($this->session->userdata('user')->role == '5') {
                    $_SESSION['user'] = $cek_login;
                    redirect('home/user');
                } else if ($this->session->userdata('user')->role == '6') {
                    $_SESSION['user'] = $cek_login;
                    redirect('home/user');
                } else if ($this->session->userdata('user')->role == '7') {
                    $_SESSION['user'] = $cek_login;
                    redirect('home/user');
                } else if ($this->session->userdata('user')->role == '8') {
                    $_SESSION['user'] = $cek_login;
                    redirect('home/user');
                } else if ($this->session->userdata('user')->role == '9') {
                    $_SESSION['user'] = $cek_login;
                    redirect('home/user');
                } else if ($this->session->userdata('user')->role == '10') {
                    $_SESSION['user'] = $cek_login;
                    redirect('home/user');
                } else if ($this->session->userdata('user')->role == '11') {
                    $_SESSION['user'] = $cek_login;
                    redirect('home/user');
                } else if ($this->session->userdata('user')->role == '12') {
                    $_SESSION['user'] = $cek_login;
                    redirect('home/user');
                } else if ($this->session->userdata('user')->role == '13') {
                    $_SESSION['user'] = $cek_login;
                    redirect('home/user');
                } else if ($this->session->userdata('user')->role == '14') {
                    $_SESSION['user'] = $cek_login;
                    redirect('home/user');
                } else if ($this->session->userdata('user')->role == '15') {
                    $_SESSION['user'] = $cek_login;
                    redirect('home/user');
                } else if ($this->session->userdata('user')->role == '16') {
                    $_SESSION['user'] = $cek_login;
                    redirect('home/si');
                } else if ($this->session->userdata('user')->role == '17') {
                    $_SESSION['user'] = $cek_login;
                    redirect('akuntansi/akuntansi');
                } else if ($this->session->userdata('user')->role == '18') {
                    $_SESSION['user'] = $cek_login;
                    redirect('home/user');
                } else if ($this->session->userdata('user')->role == '19') {
                    $_SESSION['user'] = $cek_login;
                    redirect('home/user');
                } else if ($this->session->userdata('user')->role == '20') {
                    $_SESSION['user'] = $cek_login;
                    redirect('home/user');
                } else if ($this->session->userdata('user')->role == '21') {
                    $_SESSION['user'] = $cek_login;
                    redirect('home/user');
                } else if ($this->session->userdata('user')->role == '22') {
                    $_SESSION['user'] = $cek_login;
                    redirect('home/user');
                } else if ($this->session->userdata('user')->role == '23') {
                    $_SESSION['user'] = $cek_login;
                    redirect('home/user');
                } else if ($this->session->userdata('user')->role == '24') {
                    $_SESSION['user'] = $cek_login;
                    redirect('home/user');
                } else {
                    echo '<script>alert("Anda tidak dapat mengakses halaman ini.");window.location.href="' . base_url('auth') . '";</script>';
                }
            } else {
                echo '<script>alert("Akun Di Non Aktifkan.");window.location.href="' . base_url('auth') . '";</script>';
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        echo '<script>alert("Sukses! Anda berhasil logout."); window.location.href="' . base_url('auth') . '";
        </script>';
    }
}
