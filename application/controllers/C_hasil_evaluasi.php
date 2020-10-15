<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_hasil_evaluasi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('Login');
        }
        $this->load->model('m_hasil_evaluasi');
        $this->load->library('form_validation');
    }

    public function index() {
        $data['user'] = $this->db->get_where('login', ['email' => $this->session->userdata('email')])->row_array();
        $data['tahun']=$this->m_hasil_evaluasi->tampil_data_tahun();
        $data['head']='Data Hasil Evaluasi';
        $this->load->view('template/header', $data);
        $this->load->view('evaluasi/v_hasil_evaluasi', $data);
        $this->load->view('template/footer');
        $this->load->view('dashboard/modal');
    }

    public function table_calculate(){
        $data['vektor'] = $this->m_hasil_evaluasi->data_calc();
        $this->load->view('evaluasi/table_vektor',$data);
    }

    public function hasil(){
    	$tahun = $this->input->post('tahun');
        $data['tahun'] = $tahun;
        $data['user'] = $this->db->get_where('login', ['email' => $this->session->userdata('email')])->row_array();
        $data['data']=$this->m_hasil_evaluasi->data_calc($tahun);
        $data['alt']=$this->m_hasil_evaluasi->data_alt();
        $data['head']='Data Hasil Evaluasi';

        $this->load->view('template/header', $data);
        $this->load->view('evaluasi/V_hasil', $data);
        $this->load->view('template/footer');
        $this->load->view('dashboard/modal');
    }

    public function simpan(){

        $hoho = $this->db->truncate('hasil');

        $nisn = $this->input->post('nisn');
        $hasil = $this->input->post('hasil');


        $hasila = array();
        for ($i=0; $i < count($nisn) ; $i++) { 
            
            $data = array(
                'nisn' => $nisn[$i],
                'hasil' => $hasil[$i],
            );
            $hasila[] = $data;
        }
        $batch_insert = $this->db->insert_batch('hasil', $hasila);
        
        redirect('C_hasil_evaluasi/grafik');

        

    }

    public function grafik(){
        $data['user'] = $this->db->get_where('login', ['email' => $this->session->userdata('email')])->row_array();
        $data['grafik'] = $this->m_hasil_evaluasi->grafik();

        $data['head']='Grafik Hasil Evaluasi';
        $this->load->view('template/header', $data);
        $this->load->view('evaluasi/v_grafik', $data);
        $this->load->view('template/footer');
        $this->load->view('dashboard/modal');
        
    }













}
?>