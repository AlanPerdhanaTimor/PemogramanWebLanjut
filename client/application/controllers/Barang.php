<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {
    
    public function index()
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'http://localhost/Kuis-1/api/barang');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);
        $data['data_barang'] = json_decode($result, TRUE);
        curl_close($curl);

        $data['title'] = 'Data barang';
        $this->load->view('Template/header',$data);
        $this->load->view('Barang/index',$data);
        $this->load->view('Template/footer');
    }
}

/* End of file barang.php */

?>