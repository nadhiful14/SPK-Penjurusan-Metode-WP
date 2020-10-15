<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('Login');
        }
        $this->load->model('m_user');
        $this->load->library('form_validation');
    }

    public function index() {
        $data['user'] = $this->db->get_where('login', ['email' => $this->session->userdata('email')])->row_array();
        $data['head']='User Account';
        $data['data'] = $this->db->get_where('login', ['email' => $this->session->userdata('email')])->result_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/v_user', $data);
        $this->load->view('template/footer');
        $this->load->view('dashboard/modal');
        $this->load->view('dashboard/modal_edit_user');
    }

    public function ubah_data(){   
        $id=$this->input->post('id');
        
        $this->m_user->ubah_data($id);
        $this->session->set_flashdata('flash', 'Diubah');

        redirect('User/index');
    }

    // public function tambah_data(){ 
    //     $nama_alternatif=$this->input->post('nama_alternatif');

    //     $cek = $this->db->query("SELECT * FROM alternatif where nama_alternatif='$nama_alternatif'");
    //        if ($cek->num_rows()>=1)
    //        {
    //         echo "<script>alert('Maaf sudah ada data alternatif yang sama.');</script>";
    //         redirect('User/index','refresh');
    //        } else {
    //         $this->m_user->tambah_data();
    //         // $this->session->set_flashdata('flash', 'Ditambahkan');

    //     redirect('User/index');
    //     }
    // }

    public function hapus_data(){
        $id=$this->input->post('id');
        
        $this->m_user->hapus_data($id);
        $this->session->set_flashdata('flash', 'Dihapus');

        redirect('User/index');
    }

    



}
?>