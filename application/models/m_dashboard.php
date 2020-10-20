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

    public function grafik(){
        $query = $this->db->query("SELECT count(a.nama_kriteria) as jumlah_kriteria, b.nama_alternatif as nama from kriteria as a join alternatif as b on a.id_alternatif = b.id_alternatif GROUP BY b.nama_alternatif");
        return $query;
    }

    public function data_jurusan(){
        $query = $this->db->count_all_results('alternatif'); 
        return $query;
    }

    public function tampil_data_siswa(){
        $tahun = $this->db->query("SELECT MAX(tahun) as th from data_mahasiswa")->row();
        $th = $tahun->th;

        $this->db->select('*');
        $this->db->from('data_mahasiswa');
        $this->db->where('tahun', $th);
        $query = $this->db->get();
        return $query->result_array();
    }

    



    




    }
