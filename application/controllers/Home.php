<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->model('User_Model');
		$this->load->model('Hima_Model');
		$this->load->model('Ukm_Model');
		$this->load->model('Pengawas_Model');
		$this->load->model('Dokumen_Model');
		$this->load->model('Aktivitas_Model');
		$this->load->library('session');
	}

	public function dashboard()
	{
		$ukm = $this->Aktivitas_Model->get_ukm();
		$hima = $this->Aktivitas_Model->get_hima();
		$data = array(
			'aktivitas' => $hima,
			'aktivitas' => $ukm);
		$this->load->view('Layout/Header');
		$this->load->view('Layout/sidebar');
		$this->load->view('Admin/dashboard/dashboard',$data);
		$this->load->view('Layout/footer');
	}

	public function si()
	{
		$this->load->view('Layout/Header');
		$this->load->view('Hima/SI/dashboard');
		$this->load->view('Layout/footer');
	}

	public function user()
	{
		$user = $this->User_Model->get();
		$data = array('user' => $user);
		$this->load->view('Layout/Header');
		$this->load->view('Layout/sidebar');
		$this->load->view('Admin/User/user', $data);
		$this->load->view('Layout/footer');
	}

	public function informasi()
	{
		$user = $this->User_Model->get();
		$data = array('user' => $user);
		$this->load->view('Layout/Header');
		$this->load->view('Layout/sidebar');
		$this->load->view('Admin/Informasi/informasi', $data);
		$this->load->view('Layout/footer');
	}

	public function pengawas()
	{
		$pengawas = $this->Pengawas_Model->get();
		$data = array('pengawas' => $pengawas);
		$this->load->view('Layout/Header');
		$this->load->view('Layout/sidebar');
		$this->load->view('Admin/Pengawas/pengawas', $data);
		$this->load->view('Layout/footer');
	}

	public function aktivitas_hima()
	{
		$hima = $this->Hima_Model->get();
		$data = array('hima' => $hima);
		$this->load->view('Layout/Header');
		$this->load->view('Layout/sidebar');
		$this->load->view('Admin/Aktivitas_Hima/aktifitas_hima', $data);
		$this->load->view('Layout/footer');
	}

	public function aktivitas_ukm()
	{
		$ukm = $this->Ukm_Model->get();
		$data = array('ukm' => $ukm);
		$this->load->view('Layout/Header');
		$this->load->view('Layout/sidebar');
		$this->load->view('Admin/Aktivitas_Ukm/aktivitas_ukm', $data);
		$this->load->view('Layout/footer');
	}

	public function pengurus_hima()
	{
		$hima = $this->Hima_Model->get();
		$data = array('hima' => $hima);
		$this->load->view('Layout/Header');
		$this->load->view('Layout/sidebar');
		$this->load->view('Admin/Pengurus_Hima/hima', $data);
		$this->load->view('Layout/footer');
	}

	public function pengurus_ukm()
	{
		$ukm = $this->Ukm_Model->get();
		$data = array('ukm' => $ukm);
		$this->load->view('Layout/Header');
		$this->load->view('Layout/sidebar');
		$this->load->view('Admin/Pengurus_Ukm/ukm', $data);
		$this->load->view('Layout/footer');
	}

	public function proposal()
	{
		$proposal = $this->Dokumen_Model->getProposal();
		$data = array('proposal' => $proposal);
		$this->load->view('Layout/Header');
		$this->load->view('Layout/sidebar');
		$this->load->view('Admin/Dokumen/proposal', $data);
		$this->load->view('Layout/footer');
	}

	public function lpj()
	{
		$lpj = $this->Dokumen_Model->getLPJ();
		$data = array('lpj' => $lpj);
		$this->load->view('Layout/Header');
		$this->load->view('Layout/sidebar');
		$this->load->view('Admin/Dokumen/lpj', $data);
		$this->load->view('Layout/footer');
	}

	public function profil($id)
	{
		$user = $this->User_Model->get_user($id);
		$data = array('user' => $user);
		$this->load->view('Layout/Header');
		$this->load->view('Layout/sidebar');
		$this->load->view('Admin/Profil/profil', $data);
		$this->load->view('Layout/footer');
	}

	public function error()
	{
		$this->load->view('Layout/header_error');
		$this->load->view('Error/error');
		$this->load->view('Layout/footer_error');
	}
}
