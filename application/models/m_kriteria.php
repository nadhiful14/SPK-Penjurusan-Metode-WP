<?php 
class m_kriteria extends CI_Model {

    public function tampil_data($alternatif){
        $alt=$alternatif;
        if($alt=='0000'){
            $this->db->select('*');
    		$this->db->from('kriteria');
    		$this->db->join('alternatif', 'kriteria.id_alternatif = alternatif.id_alternatif');
    		$query = $this->db->get();
        }else{
            $this->db->select('*');
            $this->db->from('kriteria');
            $this->db->join('alternatif', 'kriteria.id_alternatif = alternatif.id_alternatif');
            $this->db->where('kriteria.id_alternatif', $alt);
            
            $query = $this->db->get();
        };

		return $query->result_array();
    }

    public function tampil_dataa(){
        
            $this->db->select('*');
            $this->db->from('kriteria');
            $this->db->join('alternatif', 'kriteria.id_alternatif = alternatif.id_alternatif');
            $query = $this->db->get();


        return $query->result_array();
    }

    public function tampil_data_alternatif(){
        $query = $this->db->get('alternatif');
        return $query->result_array();
    }

    public function tampil_bobot($alternatif){

        $alt=$alternatif;
        if($alt=='0000'){
            $this->db->select('*');
            $this->db->from('kriteria');
            $this->db->join('alternatif', 'kriteria.id_alternatif = alternatif.id_alternatif');
            $query = $this->db->get();
        }else{
            $this->db->select('*');
            $this->db->from('kriteria');
            $this->db->join('alternatif', 'kriteria.id_alternatif = alternatif.id_alternatif');
            $this->db->where('kriteria.id_alternatif', $alt);
            $query = $this->db->get();
        };


        return $query->result_array();
    }

    public function tambah_data($data){

        //Lakukan Insert Data
        $id_alt = $this->input->post('nama_alternatif');
        $query = $this->db->insert('kriteria', $data);
        //Mengambil ID Primary Key Insert
        $id = $this->db->insert_id();
        //Validasi apakah berhasil Menambah Data
        if ($query) {
            //Mencari Data Siswa
            $siswa = $this->db->get('data_mahasiswa');
            //Jika ditemukan Siswa
            if ($siswa->num_rows() > 0) {
                //Array Data Siswa untuk BatchInsert
                $data_siswa = array();
                foreach ($siswa->result() as $row) {
                    $x = array(
                        'nisn' => $row->nisn,
                        'kriteria' => $id,
                        'alternatif'=> $id_alt,
                    );
                    $data_siswa[] = $x;
                }
                $batch_insert = $this->db->insert_batch('nilai', $data_siswa);
                if ($batch_insert) {
                    //Pesan Response
                    $response = array('status' => 'success', 'message' => 'Data Subkriteria Berhasil Di Input');
                    return json_encode($response);
                } else {
                    //Pesan Response
                    $response = array('status' => 'error', 'message' => 'Telah Terjadi kesalahan');
                    return json_encode($response);
                }
            } else {
                //Pesan Response
                $response = array('status' => 'success', 'message' => 'Data Subkriteria Berhasil Di Input');
                return json_encode($response);
            }
            //Jika Gagal Menambah Data
        } else {
            //Pesan Response
            $response = array('status' => 'error', 'message' => 'Telah Terjadi kesalahan');
            return json_encode($response);
        }
    }
    
    public function hapus_data($id){
        $this->db->where('id_kriteria', $id);
        $this->db->delete('kriteria');
    }

    public function ubah_data($id){
        $data = [
            "kode_kriteria" => $this->input->post('kode_kriteria', true),
            "id_alternatif" => $this->input->post('nama_alternatif', true),
            "nama_kriteria" => $this->input->post('nama_kriteria', true),
            "bobot" => $this->input->post('bobot', true),
            "normalisasi_bobot" => $this->input->post('normalisasi_bobot', true),
        ];
        $this->db->where('id_kriteria', $id);
        $this->db->update('kriteria', $data);
    }






    public function lihat_bobot_subkriteria($data) {

        $this->db->select('*');
        $this->db->from('kriteria');
        $this->db->join('alternatif', 'kriteria.id_alternatif = alternatif.id_alternatif');
        $this->db->where('kriteria.id_alternatif', $data['id_kriteria']);
        return $this->db->get();
    }





    public function simpan_bobot($data) {
        $query = $this->db->select('*')->from('kriteria')->where('id_alternatif',$data['id_kriteria'])->get();
        $ret = $query->row();

        for ($x = 0; $x < count($data['id_subkriteria']); $x++) {

            $insert = array(
                'bobot' => $data['bobot'][$x],
                'normalisasi_bobot' => $data['hasil_bobot'][$x],
                'jenis' => $data['jenis'][$x],
            );
            $check = $this->db->set($insert)->where('id_kriteria', $data['id_subkriteria'][$x])->update('kriteria');

            if ($check) {
                $status = TRUE;
            } else {
                $status = FALSE;
                break;
            }

        }
        if ($status) {
            //Pesan Response
            $response = array(
                'status' => 'info',
                'message' => 'Bobot Telah Disimpan'
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