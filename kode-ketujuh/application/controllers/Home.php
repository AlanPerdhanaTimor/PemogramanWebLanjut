<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    //tambahkan parameter name pada index
    public function index()
    {
        $data['title']='Home';
        // $data adalah sebuah array dengan isi arraynya adalah name dan diisi $name
        // $data['name']=$name;
        $this->load->view('template/header',$data);
        //tambahkan $data pada home/index
        $this->load->view('home/index', $data);
        $this->load->view('template/footer');
        $this->load->library('session');

        // validasi level
		if($this->session->userdata('level')!="admin") {
			redirect('login', 'refresh');
		}
    }

}

/* End of file Controllername.php */
?>