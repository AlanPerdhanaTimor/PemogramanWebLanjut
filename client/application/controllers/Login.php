<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('Admin');
    }

    public function index()
    {

            if($this->Admin->logged_id())
            {
                //jika memang session sudah terdaftar, maka redirect ke halaman dahsboard
                redirect("home");

            }else{

                //jika session belum terdaftar

                //set form validation
                $this->form_validation->set_rules('username', 'Username', 'required');
                $this->form_validation->set_rules('password', 'Password', 'required');

                //set message form validation
                $this->form_validation->set_message('required', '<div class="alert alert-danger" style="margin-top: 3px">
                    <div class="header"><b><i class="fa fa-exclamation-circle"></i> {field}</b> harus diisi</div></div>');

                //cek validasi
                if ($this->form_validation->run() == TRUE) {

                //get data dari FORM
                $username = $this->input->post("username", TRUE);
                $password = MD5($this->input->post('password', TRUE));

                //checking data via model
                $checking = $this->Admin->check_login('tbl_users', array('username' => $username), array('password' => $password));

                //jika ditemukan, maka create session
                if ($checking != FALSE) {
                    foreach ($checking as $apps) {

                        $session_data = array(
                            'user_id'   => $apps->id_user,
                            'user_name' => $apps->username,
                            'user_pass' => $apps->password,
                        );
                        //set session userdata
                        $this->session->set_userdata($session_data);

                        redirect('home/');

                    }
                }else{

                    $data['error'] = '<div class="alert alert-danger" style="margin-top: 3px">
                        <div class="header"><b><i class="fa fa-exclamation-circle"></i> ERROR</b> username atau password salah!</div></div>';
                    $this->load->view('login/index', $data);
                }

            }else{

                $this->load->view('login/index');
            }

        }

    }
    // Register user
    public function register(){
        $data['title'] = 'Sign Up';

        
        $this->form_validation->set_rules('username', 'username', 'required|callback_check_username_exists');
        $this->form_validation->set_rules('password', 'password', 'required');


        if($this->form_validation->run() === FALSE){
            $this->load->view('login/index');
            $this->load->view('register', $data);
        } else {
            // Encrypt password
            

            // Set message
            $this->session->set_flashdata('user_registered', 'You are now registered and can log in');

            redirect('login');
        }
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect('login','refresh');
	}
}