<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_kriteria extends CI_Controller {

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
        $data['data']=$this->m_kriteria->tampil_data($alternatif);
        $data['dataa']=$this->m_kriteria->tampil_dataa();
        $data['alternatif']=$this->m_kriteria->tampil_data_alternatif();
        $data['head']='Data Kriteria';
        $this->load->view('template/header', $data);
        $this->load->view('kriteria/v_kriteria', $data);
        $this->load->view('template/footer');
        $this->load->view('kriteria/modal');
        $this->load->view('dashboard/modal');
    }

    public function tambah_data() {  
        $kode_kriteria = $this->input->post('kode_kriteria');

        if ($_POST) {
            $data = array(
                'kode_kriteria' => $this->input->post('kode_kriteria'),
                'id_alternatif' => $this->input->post('nama_alternatif'),
                'nama_kriteria' => $this->input->post('nama_kriteria'),
                'jenis' => $this->input->post('jenis')
            );
            $cek = $this->db->query("SELECT * FROM kriteria where kode_kriteria='$kode_kriteria'");
            if ($cek->num_rows() >= 1) {
                echo "<script>alert('Maaf sudah ada data Kriteria yang sama.');</script>";
                redirect('C_kriteria', 'refresh');
            } else {
            echo $this->m_kriteria->tambah_data($data);
            }
        } else {
            redirect(base_url('Dashboard'));
        }


        // $this->m_kriteria->tambah_data();

        $this->session->set_flashdata('alternatif_selected', $data['id_alternatif']);
        echo "<script>alert('Data kriteria berhasil ditambahkan');</script>";

        redirect('C_kriteria', 'refresh');
    }

    public function hapus_data(){
        $id=$this->input->post('id');
        
        $this->m_kriteria->hapus_data($id);
        echo "<script>alert('Data kriteria berhasil dihapus');</script>";
        // $this->session->set_flashdata('flash', 'Dihapus');

        redirect('C_kriteria', 'refresh');
    }

    public function ubah_data(){   
        $id=$this->input->post('id');
        
        $this->m_kriteria->ubah_data($id);
        echo "<script>alert('Data kriteria berhasil diubah');</script>";
        // $this->session->set_flashdata('flash', 'Diubah');

        redirect('C_kriteria', 'refresh');
    }

    // public function tampil_bobot() {
    //     $data['data']=$this->m_kriteria->tampil_data();
    //     $data['alternatif']=$this->m_kriteria->tampil_data_alternatif();
    //     $head['head']='Bobot Kriteria';
    //     $this->load->view('template/header', $head);
    //     $this->load->view('kriteria/v_bobot_kriteria', $data);
    //     $this->load->view('template/footer');
    //     $this->load->view('kriteria/modal');
    // }

    public function get() {
        $alternatif = $this->input->get('alternatif');
        $data['data']=$this->m_kriteria->tampil_bobot($alternatif);
        $no=0;
        $tabel=array();
                    foreach ($data['data'] as $a) {
                    $temp = array();
                        $no++;
                        $id=$a['id_kriteria'];
                        $kode_kriteria=$a['kode_kriteria'];
                        $nama_alternatif=$a['nama_alternatif'];
                        $nama_kriteria=$a['nama_kriteria'];
                        $jenis=$a['jenis'];
                        $bobot=$a['bobot'];
                        $normalisasi_bobot=$a['normalisasi_bobot'];
                        $temp[]=$no;
                        $temp[]=$kode_kriteria;
                        $temp[]=$nama_kriteria;
                        $temp[]=$jenis;
                        $temp[]="<a type=\"button\" class=\"btn btn-success btn-sm\" data-toggle=\"modal\" href=\"#modalEdit$id\">Edit</a>
                                <a type=\"button\" class=\"btn btn-danger btn-sm\" data-toggle=\"modal\" href=\"#modalHapus$id\">Hapus</a>";

                        $tabel[]=$temp;
                    }
                    echo json_encode(array('data' => $tabel));
    }



}
?>