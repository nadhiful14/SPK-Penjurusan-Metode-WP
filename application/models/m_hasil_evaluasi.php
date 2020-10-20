<?php 
class m_hasil_evaluasi extends CI_Model {

    public function tampil_data_tahun(){
        $this->db->select('*');
        $this->db->from('data_mahasiswa');
        $this->db->group_by('tahun');
        $this->db->order_by('tahun', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function data_alt(){
        $this->db->select('*');
        $this->db->from('alternatif');
        $query = $this->db->get();
        return $query->result_array();
    }

   
    public function tampil_data_menurut_tahun($tahun){
        $this->db->select('data_mahasiswa.nisn, data_mahasiswa.nama, alternatif.nama_alternatif, kriteria.nama_kriteria, nilai.nilai, kriteria.jenis, kriteria.bobot, kriteria.normalisasi_bobot, data_mahasiswa.tahun');
        $this->db->from('data_mahasiswa');
        $this->db->join('nilai', 'nilai.nisn = data_mahasiswa.nisn');
        $this->db->join('alternatif', 'alternatif.id_alternatif = nilai.alternatif');
        $this->db->join('kriteria', 'kriteria.id_kriteria = nilai.kriteria');
        $this->db->order_by('nama', 'nama_alternatif', 'asc');
        $this->db->where('tahun', $tahun);
        $query = $this->db->get();
        return $query->result_array();
    }
    

    public function data_calc($tahun){
        $data_wp = array();
        $normalisasi_bobot = array();
        $dt_alt = array();
        $data_siswa = $this->db->select('*')->from('data_mahasiswa')->where('tahun', $tahun)->where('status','Aktif')->get()->result_array();
        $kriteria = $this->db->get('kriteria')->result_array();
        $alternatif = $this->db->get('alternatif')->result_array();
        $status_bobot = $this->db->select('jenis')->from('kriteria')->get()->result_array();
               
        //Memasukkan Data Nama Siswa Kedalam Array Data Weighted Product
        for($x=0;$x<count($data_siswa);$x++){
            $data_wp[$x]['nisn'] = $data_siswa[$x]['nisn'];
            $data_wp[$x]['nama'] = $data_siswa[$x]['nama'];
        }  

        // Mengambil Data Alternatif
        for ($y=0; $y < count($alternatif); $y++) { 
            $dt_alt[$y]['dt_alt'] = $alternatif[$y]['id_alternatif'];
        }

        // Mengambil Nilai Bobot Global dan menggunakan Kode kriteria sebagai index key
        for($x=0;$x<count($kriteria);$x++){
            $normalisasi_bobot[$kriteria[$x]['id_kriteria']]=$kriteria[$x]['normalisasi_bobot'];
        }
              
        //Mengambil Nilai Siswa Mia
        for($y=0;$y<count($dt_alt);$y++){
            for($x=0;$x<count($data_siswa);$x++){
                //Mengambil Nilai PerSiswa
                $this->db->select('*');
                $this->db->from('nilai');
                $this->db->where('nisn',$data_siswa[$x]['nisn']);
                $this->db->where('alternatif',$dt_alt[$qy]['dt_alt']);
                $nilai_alternatif = $this->db->get()->result();

                // Nilai Vektor S Awal adalah 0
                $nilai_vektor = 1;
                //Perulangan Untuk Setiap Nilai Siswa
                foreach($nilai_alternatif as $nilai_alt){

                    //Menghitung nilai Vektor dengan mengkuadratkan nilai subkriteria dengan bobot global key index subkriteria
                    $nilai_vektor = $nilai_vektor * pow($nilai_alt->nilai, $normalisasi_bobot[$nilai_alt->kriteria]);   
                }
                $data_wp[$x]['vektor_s'][$y] = $nilai_vektor;
                //Mengambah Nilai Vektor S
            }
        }

        $vektor = 0;
        $vektor1 = 0;
        $vektor2 = 0;
        
        // ITUNGAN 
        // Menghitung Total Nilai Vektor V
        $vektor_s = array();
        $vektor_v = array();
        $total_vektor_s = array();
        $total_vektor_v = array();
        foreach ($data_wp as $num => $values) {


            foreach ($values['vektor_s'] as $z){
                $vektor_s[$num][] = $z;
            }
            $total_vektor_s[] = array_sum($vektor_s[$num]);
        }

        foreach ($data_wp as $num => $values) {
            $vs = $total_vektor_s[$num];
            if ($vs == 0) {
                foreach ($values['vektor_s'] as $z_ind => $nilai_vs){

                    $vektor_v[$z_ind] = 0;
                }
            }else{
                foreach ($values['vektor_s'] as $z_ind => $nilai_vs){
                    $vektor_v[$z_ind] = $nilai_vs/$vs;
                }
            }
            $data_wp[$num]['vektor_v'] = $vektor_v;
        }    
        return $data_wp;
    }

    public function simpan($data){

    }



    public function grafik(){
        $query = $this->db->query("SELECT count(hasil) as jumlah_kriteria, nisn, hasil as nama from hasil GROUP BY hasil");
        return $query;
    
    }







  

}
?>