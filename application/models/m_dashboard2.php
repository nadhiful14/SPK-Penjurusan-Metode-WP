<?php 
class m_dashboard extends CI_Model {

	public function data_siswa(){
        
         // Produces an integer, like 25
        $this->db->from('data_mahasiswa');
        $this->db->where('status', 'Aktif');
        $query = $this->db->count_all_results();

        return $query;
    }

    public function data_kriteria(){
        $query = $this->db->count_all_results('kriteria'); 
        return $query;
    }

    public function kriteria(){
        $this->db->select('*');
        $this->db->from('kriteria');
        $this->db->join('alternatif', 'kriteria.id_alternatif = alternatif.id_alternatif');
        $query = $this->db->get();

        return $query->result_array();
    }

    public function tampil_alternatif(){
        $query = $this->db->get('alternatif');
        return $query->result_array();
    }

    public function data_jurusan(){
        $query = $this->db->count_all_results('alternatif'); 
        return $query;
    }

    public function tampil_data_siswa(){
        $this->db->select('*');
        $this->db->from('data_mahasiswa');
        $this->db->where('tahun', '2019');
        $query = $this->db->get();
        return $query->result_array();
    }

    



    




    }
?>