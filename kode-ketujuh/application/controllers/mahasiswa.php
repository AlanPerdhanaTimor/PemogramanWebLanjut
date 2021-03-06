<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('mahasiswa_model');
		$this->load->library("form_validation");
		//$this->load->database();

		// validasi level
		if($this->session->userdata('level')!="admin") {
			redirect('login', 'refresh');
		}
		if ($this->session->userdata('level') == "user" and $this->session->userdata('status') == "Tidak Aktif") {
            $this->session->sess_destroy();
            $data['pesan'] = "Maaf Anda Belum Aktif, Tolong Hubungi Admin";
            $data['title'] = 'Login User';
            $this->load->view('auth/template/header', $data);
            $this->load->view('auth/login', $data);
        } elseif ($this->session->userdata('level') != "user" and $this->session->userdata('level') != "admin") {
            redirect('auth', 'refresh');
        }
	}

	public function index()
	{
		
		$data['title']='List Mahasiswa';
		$data['mahasiswa']=$this->mahasiswa_model->getAllmahasiswa();
		if($this->input->post('keyword')) {
			$data['mahasiswa']=$this->mahasiswa_model->cariDataMahasiswa();
		}
		$this->load->view('template/header',$data);
		$this->load->view('mahasiswa/index',$data);
		$this->load->view('template/footer');
	}
	public function tambah() {
		$data['title']='Form Menambahkan Data Mahasiswa';
		$data['jurusan']=['Teknik Informatika', 'Teknik Kimia', 'Teknik Industri', 'Teknik Mesin'];
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('nim', 'nim', 'required|numeric');
		$this->form_validation->set_rules('email', 'email', 'required|valid_email');

		if ($this->form_validation->run()== FALSE) {
			# code...
			$this->load->view('template/header',$data);
			$this->load->view('mahasiswa/tambah',$data);
			$this->load->view('template/footer');
		}else{
			$this->mahasiswa_model->tambahdatamhs();
			// untuk flashdata mempunyai 2 parameter (nama flashdata/alias, isi dari flasdatanya)
			$this->session->set_flashdata('flash-data','ditambahkan');
			redirect('mahasiswa','refresh');
		}
	}
	public function hapus($id) {
		$this->mahasiswa_model->hapusdatamhs($id);
		// untuk flashdata mempunyai 2 parameter (nama flashdata/alias, isi dari flasdatanya)
		$this->session->set_flashdata('flash-data','dihapus');
		redirect('mahasiswa', 'refresh');
	}
	public function detail($id) {
		$data['title']='Detail Mahasiswa';
		$data['mahasiswa']=$this->mahasiswa_model->getmahasiswaByID($id);
		$this->load->view('template/header',$data);
		$this->load->view('mahasiswa/detail',$data);
		$this->load->view('template/footer');
	}
	public function edit($id) {
		$data['title']='Form Edit Data Mahasiswa';
		$data['mahasiswa']=$this->mahasiswa_model->getmahasiswaByID($id);
		$data['jurusan']=['Teknik Informatika', 'Teknik Kimia', 'Teknik Industri', 'Teknik Mesin'];

		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('nim', 'Nim', 'required|numeric');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');

		if ($this->form_validation->run() == FALSE) {
			# code...
			$this->load->view('template/header',$data);
			$this->load->view('mahasiswa/edit',$data);
			$this->load->view('template/footer');
		} else {
			# code...
			$this->mahasiswa_model->ubahdatamhs();
			$this->session->set_flashdata('flash-data', 'diedit');
			redirect('mahasiswa', 'refresh');
			
		}	
	}
	
}

/* End of file Mahasiswa.php */
?>