<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        

        $this->load->library('form_validation');
        // $this->load->model('m_login');
    }

    public function index() {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/login');
        } else{
            $this->_login();
        }
    }

    private function _login(){
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('login', ['email' => $email])->row_array();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $data = [
                'email' => $user['email'],
                'level' => $user['level']
                ];
                $this->session->set_userdata($data);
                redirect('Dashboard');
            } else{
                echo "<script>alert('Maaf, Password yang anda masukkan salah');</script>";
            redirect('Login','refresh');
            }
            
        } else{
            echo "<script>alert('Maaf, akun tidak tersedia');</script>";
            redirect('Login','refresh');
        }
    }

    public function register() {

        $this->form_validation->set_rules('nama', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[login.email]');
        $this->form_validation->set_rules('password1', 'Password1', 'required|trim|min_length[5]|matches[password2]', [
            'matches' => 'Password Is Does not Match' ,
            'min_length' => 'Password Is Too Short'
            ]);
        $this->form_validation->set_rules('password2', 'Password2', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/register');
        } else{
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'level' => 'Panitia',
                'date_created' => time()

            ];
            $this->db->insert('login', $data);
            echo "<script>alert('Selamat! Akun anda berhasil Dibuat');</script>";
            redirect('Login','refresh');
        }
        
    }



}
?>