<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_bobot_kriteria extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('Login');
        }
        $this->load->model('m_kriteria');
        $this->load->library('form_validation');
    }

    public function index() {
        $data['user'] = $this->db->get_where('login', ['email' => $this->session->userdata('email')])->row_array();
        $alternatif='0000';
        $data['data']=$this->m_kriteria->tampil_bobot($alternatif);
        $data['dataa']=$this->m_kriteria->tampil_dataa();
        $data['alternatif']=$this->m_kriteria->tampil_data_alternatif();
        $data['head']='Data Bobot Kriteria';
        $this->load->view('template/header', $data);
        $this->load->view('kriteria/v_bobot_kriteria', $data);
        $this->load->view('template/footer');
        $this->load->view('kriteria/modal');
        $this->load->view('dashboard/modal');
    }

    public function simpan_bobot_subkriteria() {
        if($_POST){

            $data = array(
                'id_subkriteria'=>$this->input->post('id_subkriteria'),
                'bobot'=>$this->input->post('bobotsubkriteria'),
                'id_kriteria' => $this->input->post('id_kriteria'),
                'jenis' => $this->input->post('jenis')
            );


            for($x=0;$x<count($data['id_subkriteria']);$x++){
                if ($data['jenis'][$x] == "Cost") {
                    $temps = abs($data['bobot'][$x]/array_sum($data['bobot']));
                    $data['hasil_bobot'][$x]=-1*$temps;
                }else if ($data['jenis'][$x] == "Benefit") {
                    $data['hasil_bobot'][$x]=$data['bobot'][$x]/array_sum($data['bobot']);
                }
                
            }
            echo $this->m_kriteria->simpan_bobot($data);
        }else{
            redirect(base_url('dashboard'));
        }
    }

    


    public function lihat_bobot_subkriteria() {
        if ($_POST) {
            $data = array(
                "id_kriteria" => $this->input->post('id_kriteria')
            );
            $result = $this->m_kriteria->lihat_bobot_subkriteria($data)->result();
            echo json_encode($result);
        } else {
            redirect(base_url('dashboard'));
        }
    }



}
?>