<?php 
class m_data_siswa extends CI_Model {

    public function tampil_data_siswa(){
        $this->db->select('*');
        $this->db->from('data_mahasiswa');
        $this->db->order_by('tahun', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }


    public function tambah_data($data){
        
        // $this->db->insert('data_mahasiswa', $data);

        //Cek apakah ada Siswa dengan NIS sama
        $filter = $this->db->select('*')->from('data_mahasiswa')->where('nisn', $data['nisn'])->get()->num_rows();
        //Jika Tidak Ditemukan Baris Result
        if ($filter < 1) {
            //Memasukkan Data kedalam database
            $insert = $this->db->insert('data_mahasiswa', $data);
            //Seleksi apakah berhasil input
            if ($insert) {
                $kriteria = $this->db->get('kriteria');
                if ($kriteria->num_rows() > 0) {
                    $data_kriteria = array();
                    foreach ($kriteria->result() as $row) {
                        $x = array(
                            'nisn' => $data['nisn'],
                            'kriteria' => $row->id_kriteria,
                            'alternatif' => $row->id_alternatif
                        );
                        $data_kriteria[] = $x;
                    }
                    $batch_insert = $this->db->insert_batch('nilai', $data_kriteria);
                    if ($batch_insert) {
                        //Pesan Response
                        echo "<script>alert('Data Siswa Berhasil Di Inputkan');</script>";
                        redirect('C_data_siswa/index/','refresh');

                    } else {
                        //Pesan Response
                        $response = array('status' => 'error', 'message' => 'Telah Terjadi Kesalahan');
                        return json_encode($response);
                    }
                } else {
                    //Pesan Response
                    echo "<script>alert('Data Siswa Berhasil Di Inputkan');</script>";
                        redirect('C_data_siswa/index/','refresh');
                }
                //Jika Gagal
            } else {
                //Pesan Response
                $response = array('status' => 'error', 'message' => 'Telah Terjadi Kesalahan');
                return json_encode($response);
            }
            //Jika ditemukan baris result
        } else {
            echo "<script>alert('Maaf sudah ada data dengan NISN yang sama.');</script>";
            redirect('C_data_siswa/index/','refresh');
        }
    }
    
    public function hapus_data($nisn){
        $this->db->where('nisn', $nisn);
        $this->db->delete('data_mahasiswa');
    }

    public function ubah_data($nisn){
        $data = [
            "nama" => $this->input->post('nama', true),
            "alamat" => $this->input->post('alamat', true),
            "tpt_lahir" => $this->input->post('tpt_lahir', true),
            "tgl_lahir" => $this->input->post('tgl_lahir'),
            "tahun" => $this->input->post('tahun', true),
            "jenis_kelamin" => $this->input->post('jkel', true),
            "status" => $this->input->post('status', true),
        ];
        

        $this->db->where('nisn', $nisn);
        $this->db->update('data_mahasiswa', $data);
    }



}
?>