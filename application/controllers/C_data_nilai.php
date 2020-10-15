<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_data_nilai extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('Login');
        }
        $this->load->model('m_data_nilai');
        $this->load->library('form_validation');
    }

    public function index() {
        $data['user'] = $this->db->get_where('login', ['email' => $this->session->userdata('email')])->row_array();
        $data['data']=$this->m_data_nilai->tampil_data();
        $data['tahun']=$this->m_data_nilai->tampil_tahun();
        $data['alternatif']=$this->m_data_nilai->tampil_data_alternatif();
        $data['head']='Data Nilai Siswa';
        $this->load->view('template/header', $data);
        $this->load->view('data_siswa/v_data_nilai', $data);
        $this->load->view('template/footer');
        $this->load->view('dashboard/modal');
    }


    function daftar_evaluasi() {
        //$id = 1;
        // $id = $this->input->post('id_kriteria');
        $tahun = $this->input->post('tahun');
        // $data_kriteria = $this->db->select('*')->from('kriteria')->where('id_alternatif', $id)->get()->result_array();
        $data_kriteria = $this->db->select('*')->from('kriteria')->order_by('id_alternatif', 'asc')->get()->result_array();

        $data_siswa = $this->db->select('*')->from('data_mahasiswa')->where('status', 'Aktif')->where('tahun', $tahun)->get()->result();
        
        //echo "<pre>";
        //print_r($data_siswa);
        //echo "</pre>";
        
        $data_nilai = array();
        $x = 0;
        foreach ($data_siswa as $row) {
            $data_nilai[$x]['nama'] = $row->nama;
            $data_nilai[$x]['nisn'] = $row->nisn;
            $data_nilai[$x]['tahun'] = $row->tahun;
            $y = 0;
            
            $this->db->select('*')->from('nilai')->join('kriteria', 'nilai.kriteria = kriteria.id_kriteria')->join('data_mahasiswa', 'nilai.nisn = data_mahasiswa.nisn')->order_by('alternatif', 'asc')->where('nilai.nisn', $row->nisn);


            $nilai = $this->db->get()->result();

            foreach($nilai as $baris){
                $data_nilai[$x]['nilai_siswa'][$y]['id_kriteria']=$baris->id_kriteria;
                $data_nilai[$x]['nilai_siswa'][$y]['nilai']=$baris->nilai;
                $y++;
            }
            $x++;
        }
        //echo "<pre>";
        //print_r($data_nilai);
        //echo "</pre>";
        echo json_encode(array('data_kriteria'=>$data_kriteria,'data_nilai'=>$data_nilai));
    }

    public function data_edit(){
        if($_POST){
            $data = array(
                'nisn'=>$this->input->post('nisn')
            );
            
            //TODO
            $arr = $this->m_data_nilai->data_edit($data)->result();
            echo json_encode($arr);
        }else{
            redirect(base_url('Dashboard'));
        }
    }

    public function simpan_edit(){
        if($_POST){
            $data = array(
                'id'=>$this->input->post('id'),
                'nilai'=>$this->input->post('nilai')
            );
            echo $this->m_data_nilai->simpan_edit($data);   
        }else{
            redirect(base_url('Dashboard'));
        }
    }








    }
?>