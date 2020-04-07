<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mobil extends CI_Controller {
    
    public function index()
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'http://localhost/kuis-1/api/Barang');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);
        $data['data_mobil'] = json_decode($result, TRUE);
        curl_close($curl);

        $data['title'] = 'Data Mobil';
        $this->load->view('Template/header',$data);
        $this->load->view('Mobil/index',$data);
        $this->load->view('Template/footer');
    }
}

/* End of file Mobil.php */

?>