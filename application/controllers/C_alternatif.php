<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_alternatif extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('Login');
        }
        $this->load->model('m_alternatif');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('login', ['email' => $this->session->userdata('email')])->row_array();
        $data['head'] = 'Alternatif Jurusan';
        $data['data'] = $this->m_alternatif->tampil_alternatif();
        $this->load->view('template/header', $data);
        $this->load->view('alternatif/v_alternatif', $data);
        $this->load->view('template/footer');
        $this->load->view('alternatif/modal');
        $this->load->view('dashboard/modal');
    }

    public function tambah_data()
    {
        $nama_alternatif = $this->input->post('nama_alternatif');
        $kode = $this->input->post('kode');

        $cek = $this->db->query("SELECT * FROM alternatif where nama_alternatif='$nama_alternatif' or kode='$kode'");
        if ($cek->num_rows() >= 1) {
            echo "<script>alert('Maaf sudah ada data alternatif yang sama.');</script>";
            redirect('C_alternatif/index', 'refresh');
        } else {
            $this->m_alternatif->tambah_data();
            // $this->session->set_flashdata('flash', 'Ditambahkan');
            echo "<script>alert('Data alternatif berhasil ditambahkan');</script>";

            redirect('C_alternatif/index', 'refresh');
        }
    }

    public function hapus_data()
    {
        $id = $this->input->post('id');

        $this->m_alternatif->hapus_data($id);
        // $this->session->set_flashdata('flash', 'Dihapus');

        echo "<script>alert('Data alternatif berhasil dihapus');</script>";

        redirect('C_alternatif/index', 'refresh');
    }

    public function ubah_data()
    {
        $id = $this->input->post('id');

        $this->m_alternatif->ubah_data($id);
        // $this->session->set_flashdata('flash', 'Diubah');

        echo "<script>alert('Data alternatif berhasil diubah');</script>";

        redirect('C_alternatif/index', 'refresh');
    }
}
