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
            $this->db->where('alternatif',$dt_alt[$y]['dt_alt']);
            $nilai_alternatif = $this->db->get()->result();

            // Nilai Vektor S Awal adalah 0
            $nilai_vektor = 1;
            //Perulangan Untuk Setiap Nilai Siswa
            foreach($nilai_alternatif as $nilai_alt){

                //Menghitung nilai Vektor dengan mengkuadratkan nilai subkriteria dengan bobot global key index subkriteria
                $nilai_vektor = $nilai_vektor * pow($nilai_alt->nilai, $normalisasi_bobot[$nilai_alt->kriteria]);
            }
            $data_wp[$x][$y] = $nilai_vektor;
            //Mengambah Nilai Vektor S
        }
            
        }

        var_dump($data_wp);

        // //Mengambil Nilai Siswa iss
        // for($x=0;$x<count($data_siswa);$x++){
        //     //Mengambil Nilai PerSiswa
        //     $this->db->select('*');
        //     $this->db->from('nilai');
        //     $this->db->where('nisn',$data_siswa[$x]['nisn']);
        //     $this->db->where('alternatif',2);
        //     $nilai_alternatif = $this->db->get()->result();

        //     // Nilai Vektor S Awal adalah 0
        //     $nilai_vektor = 1;
        //     //Perulangan Untuk Setiap Nilai Siswa
        //     foreach($nilai_alternatif as $nilai_alt){

        //         //Menghitung nilai Vektor dengan mengkuadratkan nilai subkriteria dengan bobot global key index subkriteria
        //         $nilai_vektor = $nilai_vektor * pow($nilai_alt->nilai, $normalisasi_bobot[$nilai_alt->kriteria]);
        //     }
        //     //Mengambah Nilai Vektor S
        //     $data_wp[$x]['vektor_iis'] = $nilai_vektor;
        // }

        // //Mengambil Nilai Siswa bahasa
        // for($x=0;$x<count($data_siswa);$x++){
        //     //Mengambil Nilai PerSiswa
        //     $this->db->select('*');
        //     $this->db->from('nilai');
        //     $this->db->where('nisn',$data_siswa[$x]['nisn']);
        //     $this->db->where('alternatif',3);
        //     $nilai_alternatif = $this->db->get()->result();

        //     // Nilai Vektor S Awal adalah 0
        //     $nilai_vektor = 1;
        //     //Perulangan Untuk Setiap Nilai Siswa
        //     foreach($nilai_alternatif as $nilai_alt){

        //         //Menghitung nilai Vektor dengan mengkuadratkan nilai subkriteria dengan bobot global key index subkriteria
        //         $nilai_vektor = $nilai_vektor * pow($nilai_alt->nilai, $normalisasi_bobot[$nilai_alt->kriteria]);
        //     }
        //     //Menambah Nilai Vektor S
        //     $data_wp[$x]['vektor_bahasa'] = $nilai_vektor;
        // }

        $vektor = 0;
        $vektor1 = 0;
        $vektor2 = 0;
        //Menghitung Nilai Vektor V
        // for($x=0;$x<count($data_siswa);$x++){
        //     if (($data_wp[$x]['vektor_mia'] == 0 ) && ($data_wp[$x]['vektor_iis'] == 0) && ($data_wp[$x]['vektor_bahasa'] == 0)) {
        //         $vektor=0;
        //         $vektor1=0;
        //         $vektor2=0;
        //     }else{
            
        //         $vektor = $data_wp[$x]['vektor_mia']/($data_wp[$x]['vektor_mia']+$data_wp[$x]['vektor_iis']+$data_wp[$x]['vektor_bahasa']);
                
        //         $vektor1 = $data_wp[$x]['vektor_iis']/($data_wp[$x]['vektor_mia']+$data_wp[$x]['vektor_iis']+$data_wp[$x]['vektor_bahasa']);
                
        //         $vektor2 = $data_wp[$x]['vektor_bahasa']/($data_wp[$x]['vektor_mia']+$data_wp[$x]['vektor_iis']+$data_wp[$x]['vektor_bahasa']);
        //     }
        //     $data_wp[$x]['vektor_vmia'] = $vektor;
        //     $data_wp[$x]['vektor_viis'] = $vektor1;
        //     $data_wp[$x]['vektor_vbahasa'] = $vektor2;
        // }
        
        
        //Menghitung Total Nilai Vektor S
        $total_vektor_s = 0;
        foreach ($data_wp as $num => $values) {
            $total_vektor_s += $values['vektor_s'];
        }
        //Menghitung Nilai Vektor V dengan Membagi Nilai Vektor S Siswa dengan Total Vektor S
        for($x=0;$x<count($data_wp);$x++){
            $data_wp[$x]['vektor_v'] = $data_wp[$x]['vektor_s']/$total_vektor_s;
        }
        
        usort($data_wp, function($a, $b) {
            if ($a['vektor_v'] == $b['vektor_v'])
                return 0;
            return $a['vektor_v'] < $b['vektor_v'] ? 1 : -1;
        });
        
        
        
        return $data_wp;
    }







  

}
?>





<!-- lalalalalalallalalla -->


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
        
        //Memasukkan Data Nama Siswa Kedalam Array Data Weighted Product
        for($x=0;$x<count($data_siswa);$x++){
            $data_wp[$x]['nisn'] = $data_siswa[$x]['nisn'];
            $data_wp[$x]['nama'] = $data_siswa[$x]['nama'];
        }  

        // Mengambil Data Alternatif
        for ($y=0; $y < count($alternatif); $y++) { 
            $dt_alt[$y]['nm_alt'] = $alternatif[$y]['nama_alternatif'];
        }

        // Mengambil Nilai Bobot Global dan menggunakan Kode kriteria sebagai index key
        for($x=0;$x<count($kriteria);$x++){
            $normalisasi_bobot[$kriteria[$x]['id_kriteria']]=$kriteria[$x]['normalisasi_bobot'];
        }
        
        
        //Mengambil Nilai Siswa Mia
        for($x=0;$x<count($data_siswa);$x++){
            //Mengambil Nilai PerSiswa
            $this->db->select('*');
            $this->db->from('nilai');
            $this->db->where('nisn',$data_siswa[$x]['nisn']);
            $this->db->where('alternatif',1);
            $nilai_alternatif = $this->db->get()->result();

            // Nilai Vektor S Awal adalah 0
            $nilai_vektor = 1;
            //Perulangan Untuk Setiap Nilai Siswa
            foreach($nilai_alternatif as $nilai_alt){

                //Menghitung nilai Vektor dengan mengkuadratkan nilai subkriteria dengan bobot global key index subkriteria
                $nilai_vektor = $nilai_vektor * pow($nilai_alt->nilai, $normalisasi_bobot[$nilai_alt->kriteria]);
            }
            //Mengambah Nilai Vektor S
            $data_wp[$x]['vektor_mia'] = $nilai_vektor;
        }

        //Mengambil Nilai Siswa iss
        for($x=0;$x<count($data_siswa);$x++){
            //Mengambil Nilai PerSiswa
            $this->db->select('*');
            $this->db->from('nilai');
            $this->db->where('nisn',$data_siswa[$x]['nisn']);
            $this->db->where('alternatif',2);
            $nilai_alternatif = $this->db->get()->result();

            // Nilai Vektor S Awal adalah 0
            $nilai_vektor = 1;
            //Perulangan Untuk Setiap Nilai Siswa
            foreach($nilai_alternatif as $nilai_alt){

                //Menghitung nilai Vektor dengan mengkuadratkan nilai subkriteria dengan bobot global key index subkriteria
                $nilai_vektor = $nilai_vektor * pow($nilai_alt->nilai, $normalisasi_bobot[$nilai_alt->kriteria]);
            }
            //Mengambah Nilai Vektor S
            $data_wp[$x]['vektor_iis'] = $nilai_vektor;
        }

        //Mengambil Nilai Siswa bahasa
        for($x=0;$x<count($data_siswa);$x++){
            //Mengambil Nilai PerSiswa
            $this->db->select('*');
            $this->db->from('nilai');
            $this->db->where('nisn',$data_siswa[$x]['nisn']);
            $this->db->where('alternatif',3);
            $nilai_alternatif = $this->db->get()->result();

            // Nilai Vektor S Awal adalah 0
            $nilai_vektor = 1;
            //Perulangan Untuk Setiap Nilai Siswa
            foreach($nilai_alternatif as $nilai_alt){

                //Menghitung nilai Vektor dengan mengkuadratkan nilai subkriteria dengan bobot global key index subkriteria
                $nilai_vektor = $nilai_vektor * pow($nilai_alt->nilai, $normalisasi_bobot[$nilai_alt->kriteria]);
            }
            //Menambah Nilai Vektor S
            $data_wp[$x]['vektor_bahasa'] = $nilai_vektor;
        }

        $vektor = 0;
        $vektor1 = 0;
        $vektor2 = 0;
        //Menghitung Nilai Vektor V
        for($x=0;$x<count($data_siswa);$x++){
            if (($data_wp[$x]['vektor_mia'] == 0 ) && ($data_wp[$x]['vektor_iis'] == 0) && ($data_wp[$x]['vektor_bahasa'] == 0)) {
                $vektor=0;
                $vektor1=0;
                $vektor2=0;
            }else{
            
                $vektor = $data_wp[$x]['vektor_mia']/($data_wp[$x]['vektor_mia']+$data_wp[$x]['vektor_iis']+$data_wp[$x]['vektor_bahasa']);
                
                $vektor1 = $data_wp[$x]['vektor_iis']/($data_wp[$x]['vektor_mia']+$data_wp[$x]['vektor_iis']+$data_wp[$x]['vektor_bahasa']);
                
                $vektor2 = $data_wp[$x]['vektor_bahasa']/($data_wp[$x]['vektor_mia']+$data_wp[$x]['vektor_iis']+$data_wp[$x]['vektor_bahasa']);
            }
            $data_wp[$x]['vektor_vmia'] = $vektor;
            $data_wp[$x]['vektor_viis'] = $vektor1;
            $data_wp[$x]['vektor_vbahasa'] = $vektor2;
        }
        
        /*
        //Menghitung Total Nilai Vektor S
        $total_vektor_s = 0;
        foreach ($data_wp as $num => $values) {
            $total_vektor_s += $values['vektor_s'];
        }
        //Menghitung Nilai Vektor V dengan Membagi Nilai Vektor S Siswa dengan Total Vektor S
        for($x=0;$x<count($data_wp);$x++){
            $data_wp[$x]['vektor_v'] = $data_wp[$x]['vektor_s']/$total_vektor_s;
        }
        
        usort($data_wp, function($a, $b) {
            if ($a['vektor_v'] == $b['vektor_v'])
                return 0;
            return $a['vektor_v'] < $b['vektor_v'] ? 1 : -1;
        });
        
        
        */
        return $data_wp;
    }







  

}
?>




<?php 
       
       if (($vektor_vmia > $vektor_vbahasa) && ($vektor_vmia > $vektor_viis)){
        echo "red";
      }elseif (($vektor_vbahasa > $vektor_vmia) && ($vektor_vbahasa > $vektor_viis)) {
        echo "blue";
      }elseif (($vektor_viis > $vektor_vmia) && ($vektor_viis > $vektor_vbahasa)) {
        echo "green";
      }else{
        echo "black";
      }
      ?>


      <?php 
      if (($vektor_vmia > $vektor_vbahasa) && ($vektor_vmia > $vektor_viis)){
        echo "MIA";
      }elseif (($vektor_vbahasa > $vektor_vmia) && ($vektor_vbahasa > $vektor_viis)) {
        echo "Bahasa";
      }elseif (($vektor_viis > $vektor_vmia) && ($vektor_viis > $vektor_vbahasa)) {
        echo "IIS";
      }else{
        echo "-";
      }
      ?>




      <div class="row"  >
  <div class="col-lg-12">
    <div class="main-card mb-3 card">
      <div class="card-body"><h5 class="card-title">Hasil VEKTOR S</h5>
       <table class="mb-0 table table-striped" id="tampil1">
        <thead>
         <tr>
          <th rowspan="2" style="vertical-align: middle ;text-align:center">NISN</th>
          <th rowspan="2" style="vertical-align: middle ;text-align:center">Nama</th>
          <th colspan="3" style="vertical-align: middle ;text-align:center">Nilai Alternatif (Vektor S)</th>

        </tr>
        <tr>
          <th style="vertical-align: middle ;text-align:center">MIA</th>
          <th style="vertical-align: middle ;text-align:center">IIS</th>
          <th style="vertical-align: middle ;text-align:center">Bahasa</th>
        </tr>
      </thead>
      <tbody >
        <?php foreach ($data as $a): 
        $nisn = $a['nisn'];
        $nama = $a['nama'];
        $vektor_mia =$a['vektor_mia'];
        $vektor_iis =$a['vektor_iis'];
        $vektor_bahasa =$a['vektor_bahasa'];
        $vektor_vmia =$a['vektor_vmia'];
        $vektor_viis =$a['vektor_viis'];
        $vektor_vbahasa =$a['vektor_vbahasa'];
        ?>
        <tr>
         <td style="vertical-align: middle ;text-align:center"><?php echo $nisn; ?></td>
         <td style="vertical-align: middle ;text-align:center"><?php echo $nama; ?></td>
         <td style="vertical-align: middle ;text-align:center"><?php echo $vektor_mia; ?></td>
         <td style="vertical-align: middle ;text-align:center"><?php echo $vektor_iis; ?></td>
         <td style="vertical-align: middle ;text-align:center"><?php echo $vektor_bahasa; ?></td>

       </tr>
     <?php endforeach ?>
   </tbody>
 </table>
</div>
</div>
</div>
</div>