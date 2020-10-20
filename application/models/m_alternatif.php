<?php 
class m_alternatif extends CI_Model {

    public function tampil_alternatif(){
        $query = $this->db->get('alternatif');
        return $query->result_array();
    }


    public function tambah_data(){
        $data = [
            "kode" => $this->input->post('kode', true),
            "nama_alternatif" => $this->input->post('nama_alternatif', true),
        ];
        $this->db->insert('alternatif', $data);
    }
    
    public function hapus_data($id){
        $this->db->where('id_alternatif', $id);
        $this->db->delete('alternatif');
    }

    public function ubah_data($id){
        $data = [
            "kode" => $this->input->post('kode', true),
            "nama_alternatif" => $this->input->post('nama_alternatif', true),
        ];
        $this->db->where('id_alternatif', $id);
        $this->db->update('alternatif', $data);
    }



}
?>