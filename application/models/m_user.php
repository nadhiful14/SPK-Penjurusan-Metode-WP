<?php 
class m_user extends CI_Model {

    public function tampil_data(){
        $query = $this->db->get('login');
        return $query->result_array();
    }


    // public function tambah_data(){
    //     $data = [
    //         "kode" => $this->input->post('kode', true),
    //         "nama_alternatif" => $this->input->post('nama_alternatif', true),
    //     ];
    //     $this->db->insert('alternatif', $data);
    // }
    
    public function hapus_data($id){
        $this->db->where('id', $id);
        $this->db->delete('login');
    }

    public function ubah_data($id){
        $upload_image = $_FILES['image'];

        if ($upload_image) {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']     = '4096';
            $config['upload_path'] = './assets/images/avatars/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $old_image = $data['login']['image'];
                if ($old_image != 'default.jpg') {
                    unlink(FCPATH . '/assets/images/avatars/'. $old_image);
                }

                $new_image = $this->upload->data('file_name');
                $this->db->set('image', $new_image);
            }else{
                echo $this->upload->display_errors();
            }
        }


            $id = $id;
            $nama = $this->input->post('nama', true);
            $email = $this->input->post('email', true);
            $level = $this->input->post('level', true);

        $this->db->set('nama', $nama);
        $this->db->set('email', $email);
        $this->db->set('level', $level);
        $this->db->where('id', $id);
        $this->db->update('login');
    }



}
?>