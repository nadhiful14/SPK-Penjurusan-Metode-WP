<?php 
class m_data_nilai extends CI_Model {

	public function tampil_data(){
        
            $this->db->select('*');
            $this->db->from('nilai');
            $this->db->join('alternatif', 'nilai.alternatif = alternatif.id_alternatif');
            $this->db->join('kriteria', 'nilai.kriteria = kriteria.id_kriteria');
            $this->db->join('data_mahasiswa', 'nilai.nisn = data_mahasiswa.nisn');
            $this->db->where('data_mahasiswa.status','Aktif');

            $query = $this->db->get();


        return $query->result_array();
    }

    public function tampil_data_alternatif(){
        $query = $this->db->get('alternatif');
        return $query->result_array();
    }

    public function tampil_tahun(){
        $hasil=$this->db->query("SELECT tahun FROM data_mahasiswa GROUP BY tahun DESC");
        return $hasil->result_array();
    }

    public function data_edit($data){
        $this->db->select('*');
        $this->db->from('nilai');
        $this->db->join('alternatif', 'nilai.alternatif = alternatif.id_alternatif');
        $this->db->join('kriteria', 'nilai.kriteria = kriteria.id_kriteria');
        $this->db->join('data_mahasiswa', 'nilai.nisn = data_mahasiswa.nisn');
        $this->db->where('nilai.nisn',$data['nisn']);
        $this->db->where('data_mahasiswa.status','Aktif');
        return $this->db->get();
    }

    public function simpan_edit($data){
        for($x=0;$x<count($data['id']);$x++){
            $insert = array(
                'nilai'=>$data['nilai'][$x]
            );
            $check = $this->db->set($insert)->where('id',$data['id'][$x])->update('nilai');
            if($check){
                $status=TRUE;
            }else{
                $status=FALSE;
            }
        }
        if ($status) {
            //Pesan Response
            $response = array(
                'status' => 'info',
                'message' => 'Data Evaluasi Telah Disimpan'
            );
            return json_encode($response);
        } else {
            //Pesan Response
            $response = array(
                'status' => 'error',
                'message' => 'Telah Terjadi kesalahan'
            );
            return json_encode($response);
        }
    }






    }
?>