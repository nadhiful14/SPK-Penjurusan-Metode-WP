<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (!$this->session->userdata('email')) {
            redirect('Login');
        }

        $this->load->model('m_dashboard');
    }

    public function index() {
        $data['user'] = $this->db->get_where('login', ['email' => $this->session->userdata('email')])->row_array();
    	$data['data'] = $this->m_dashboard->data_siswa();
    	$data['kriteria'] = $this->m_dashboard->data_kriteria();
        $data['datakriteria'] = $this->m_dashboard->kriteria();
    	$data['jurusan'] = $this->m_dashboard->data_jurusan();
        $data['alternatif'] = $this->m_dashboard->tampil_alternatif();
        $data['data_siswa'] = $this->m_dashboard->tampil_data_siswa();
        
        $data['grafik'] = $this->m_dashboard->grafik();

        

        $data['head'] = 'Dashboard';

        $this->load->view('template/header', $data);
        $this->load->view('dashboard/dashboard', $data);
        $this->load->view('template/footer');
        $this->load->view('dashboard/modal');

    }

    public function logout() {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('level');
        echo "<script>alert('Anda telah berhasil logout');</script>";
            redirect('Login','refresh');
    }


}
?>