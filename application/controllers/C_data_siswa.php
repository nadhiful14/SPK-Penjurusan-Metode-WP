<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_data_siswa extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('Login');
        }
        $this->load->model('m_data_siswa');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('login', ['email' => $this->session->userdata('email')])->row_array();
        $data['data_siswa'] = $this->m_data_siswa->tampil_data_siswa();
        $data['head'] = 'Data Siswa';
        $this->load->view('template/header', $data);
        $this->load->view('data_siswa/v_data_siswa', $data);
        $this->load->view('template/footer');
        $this->load->view('data_siswa/modal');
        $this->load->view('dashboard/modal');
    }

    public function tambah_siswa()
    {

        $this->session->set_flashdata('flash', 'Ditambahkan');

        if ($_POST) {
            $data = array(
                "nisn" => $this->input->post('nisn', true),
                "nama" => $this->input->post('nama', true),
                "alamat" => $this->input->post('alamat', true),
                "tpt_lahir" => $this->input->post('tpt_lahir', true),
                "tgl_lahir" => $this->input->post('tgl_lahir'),
                "jenis_kelamin" => $this->input->post('jkel', true),
                "tahun" => $this->input->post('tahun', true),
                "status" => $this->input->post('status', true),
            );
            echo $this->m_data_siswa->tambah_data($data);
        } else {
            redirect(base_url('C_data_siswa/index'));
        }
    }

    public function hapus_siswa()
    {
        $nisn = $this->input->post('nisn');

        $this->m_data_siswa->hapus_data($nisn);
        $this->session->set_flashdata('flash', 'Dihapus');

        redirect('C_data_siswa/index');
    }

    public function ubah_siswa()
    {
        $nisn = $this->input->post('nisn');

        $this->m_data_siswa->ubah_data($nisn);
        // $this->session->set_flashdata('flash', 'Diubah');
        echo "<script>alert('Data siswa berhasil diubah');</script>";

        redirect('C_data_siswa/index', 'refresh');
    }
}
?>