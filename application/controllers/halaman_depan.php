<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Halaman_depan extends CI_Controller {

	function __construct() {
		parent::__construct();

		$this->load->model('model');
	}

	function index(){

		$data = array (
			'title'		=> '.:: Login SIC Obat Penyakit ::.',
			'error'		=> '',
			'titlesistem'	=> $this->model->getTitle(),
		);
		$this->load->view('front/header',$data);
		$this->load->view('front/index');
		$this->load->view('front/footer');
	}

	function petunjuk(){

		$data = array (
			'title'		=> '.:: Petunjuk Penggunaan SIC Obat Penyakit ::.',
			'error'		=> '',
			'petunjuk'	=> $this->model->getPetunjuk(),
			'titlesistem'	=> $this->model->getTitle(),
		);
		$this->load->view('front/header',$data);
		$this->load->view('front/petunjuk_penggunaan');
		$this->load->view('front/footer');

	}

	function tentang(){

		$data = array (
			'title'		=> '.:: Tentang SIC Obat Penyakit ::.',
			'error'		=> '',
			'tentang'	=> $this->model->getTentang(),
			'titlesistem'	=> $this->model->getTitle(),
		);
		$this->load->view('front/header',$data);
		$this->load->view('front/tentang');
		$this->load->view('front/footer');

	}

	function auth(){
		if($_POST){

		$this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|xss_clean');
   
   			if($this->form_validation->run() == FALSE){
				redirect('');
			}

			$username	= $this->input->post('username');
			$password	= $this->encrypt->sha1($this->input->post('password'));
			$level		= $this->input->post('level');

			$temp		= $this->model->login("where username = '$username' and password = '$password' 
							and level = '$level'")->result_array();

			if($temp != NULL){
				$data = array(
					'id'					=> $temp[0]['id_user'],
					'nama'					=> $temp[0]['nama'],
					'username'				=> $temp[0]['username'],
					'password'				=> $temp[0]['password'],
					'level'					=> $temp[0]['level'],
				);
				$this->session->set_userdata('login',$data);
				if($data["level"] == "1"){
					redirect("administrasi/dashboard");
				}
				elseif($data["level"] == "2"){
					redirect("pimpinan/dashboard");
				}
				elseif($data["level"] == "3"){
					redirect("supplier/dashboard");
				}

				else {
					echo "ERROR! 404 Tidak Ada";
				}

			}
			else {

				$error = '
					<div class="alert alert-danger alert-dismissable fade in">
					  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					  <strong>Kesalahan!</strong> Silahkan cek kembali username, password dan level anda.
					</div>
				';
				
				$this->session->set_flashdata('error', $error);
				redirect('');

			}
		}
		else {
			redirect("");
		}
	}

}