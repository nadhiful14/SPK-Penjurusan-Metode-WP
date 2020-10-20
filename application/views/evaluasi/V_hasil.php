
<div class="app-main__outer"> <!-- /.tutup div app-main__outer ada di footer --> 
   <div class="app-main__inner">


      <div class="app-page-title">
         <div class="page-title-heading">
            <div class="page-title-icon">
               <i class="pe-7s-users icon-gradient bg-mean-fruit"></i>
           </div>
           <div>Hasil Evaluasi Alternatif
               <div class="page-title-subheading">Halaman hasil perhitungan penjurusan
               </div>
           </div>
       </div>
   </div>


   <!-- ISI -->

   <?php 

//    $filter_n= array();
//    $filter_a= array();
//    $filter_k= array();
//    $array_vs = array();
//    $gabungan = array();

//    foreach ($data as $row) {
//        $filter_nisn[]=$row['nisn'];
//        $filter_alternatif[] = $row['nama_alternatif'];
//        $filter_kriteria[] = $row['nama_kriteria'];
//    }
//    $filter_n = array_unique($filter_nisn);
//    $filter_a = array_unique($filter_alternatif);
//    $filter_k = array_unique($filter_kriteria);

//    foreach ($filter_n as $f) {
//        $this_nisn = $f;

//        foreach ($filter_a as $a) {
//           $this_alt = $a;

//           foreach ($data as $d) {

//              if ($d['nisn'] == $this_nisn) {

//                 if($d['nama_alternatif'] == $this_alt){



//                    $vs =  pow($d['nilai'], $d['normalisasi_bobot']);

//                 							// echo $d['nisn'] .' - '. $d['nama_alternatif']. $d['nama_kriteria'].  '=' . $vs . ' <br>' ;

//                    $gabungan[] = [$this_alt, $vs];



//                }

//            }
//        }
//    }							
// }
// $hasil=1;
// foreach ($gabungan as $g) {
//    if ($g[0] == 'IIS') {
//       $hasil = $hasil * $g[1];
//   }
// }
// echo $hasil;




   ?>



   <?php 
   $veks= array();
   $kesimpulan = array();
   foreach ($alt as $value) {
       $kesimpulan[] = $value['nama_alternatif'];
   }

    ?>


<div class="row"  >
       <div class="col-lg-12">
          <div class="main-card mb-3 card">
             <div class="card-body"><h5 class="card-title">Hasil Vektor S</h5>
               <table class="mb-0 table table-striped " id="tampil1">
                  <thead>
                     <tr>
                        <th rowspan="2" style="vertical-align: middle ;text-align:center">NISN</th>
                        <th rowspan="2" style="vertical-align: middle ;text-align:center">Nama</th>
                        <th colspan="3" style="vertical-align: middle ;text-align:center">Nilai Vektor S</th>
                    </tr>
                    <tr>
                        <?php foreach ($alt as $al) { ?>
                        <th style="vertical-align: middle ;text-align:center"><?php echo $al['nama_alternatif']; ?></th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody >
                    <?php foreach ($data as $a): 
                        $nisn = $a['nisn'];
                        $nama = $a['nama'];
                        $vektor_s =$a['vektor_s'];
                        $vektor_v =$a['vektor_v'];


                        foreach ($vektor_s as $vs) {
                            $veks[] = $vs;
                        }
                    ?>
                  <tr>
                     <td style="vertical-align: middle ;text-align:center"><?php echo $nisn; ?></td>
                     <td style="vertical-align: middle "><?php echo $nama; ?></td>

                     <?php foreach ($vektor_s as $s) {
         # code...
                        ?>
                        <td style="vertical-align: middle ;text-align:center"><?php echo $s; ?></td>
                    <?php } ?>

                   </tr>
                   
               <?php endforeach; ?>
           </tbody>
       </table>
   </div>
   </div>
   </div>
   </div>



   <div class="row"  >
       <div class="col-lg-12">
          <div class="main-card mb-3 card">
             <div class="card-body"><h5 class="card-title">Hasil Penjurusan Tahun <?php echo $tahun; ?></h5>


              <?php 
                foreach ($data as $a): 
                  $nisn = $a['nisn'];
                  $nama = $a['nama'];
                  $vektor_s =$a['vektor_s'];
                  $vektor_v =$a['vektor_v'];

                  foreach ($vektor_s as $vs) {
                    $veks[] = $vs;
                  }
                ?>

                <?php echo form_open_multipart('C_hasil_evaluasi/simpan') ?>

                <tr>
                  <td><input name="nisn[]" id="nisn" value="<?php echo $nisn; ?>" type="hidden" readonly></td>
                  <td><input name="hasil[]" id="hasil" value="
                    <?php 
                      if (count(array_unique($veks)) ==1 ) {
                       echo '-'; 
                      }else{ 
                       foreach ($vektor_v as $num => $v) {
                        echo ( $v == max($vektor_v) )?  $kesimpulan[$num] : '';
                      } 
                     }
                    ?>" type="hidden" readonly>
                  </td>
                </tr>


                <?php endforeach; ?>
                <button type="submit" style="margin-bottom: 10px" class="btn btn-primary">Lihat Grafik</button>
                <?php echo form_close(); ?>



               <table class="mb-0 table table-striped " id="tampil2">
                  <thead>
                     <tr>
                        <th rowspan="2" style="vertical-align: middle ;text-align:center">NISN</th>
                        <th rowspan="2" style="vertical-align: middle ;text-align:center">Nama</th>
                        <th colspan="3" style="vertical-align: middle ;text-align:center">Nilai Alternatif</th>
                        <th rowspan="2" style="vertical-align: middle ;text-align:center">Kesimpulan</th>

                    </tr>
                    <tr>
                        <?php foreach ($alt as $al) { ?>
                        <th style="vertical-align: middle ;text-align:center"><?php echo $al['nama_alternatif']; ?></th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody >
                    <?php foreach ($data as $a): 
                        $nisn = $a['nisn'];
                        $nama = $a['nama'];
                        $vektor_s =$a['vektor_s'];
                        $vektor_v =$a['vektor_v'];

                        foreach ($vektor_s as $vs) {
                            $veks[] = $vs;
                        }
                    ?>
                  <tr>
                     <td style="vertical-align: middle ;text-align:center"><?php echo $nisn; ?></td>
                     <td style="vertical-align: middle "><?php echo $nama; ?></td>

                     <?php foreach ($vektor_v as $v) { ?>
                      <td style="vertical-align: middle ;text-align:center"><?php echo $v; ?></td>
                     <?php } ?>

                    <td style="vertical-align: middle ;text-align:center; color: ">

                    <?php 
                        if (count(array_unique($veks)) ==1 ) {
                             echo '-'; 
                        }else{ 
                        foreach ($vektor_v as $num => $v) {
                            echo ( $v == max($vektor_v) )?  $kesimpulan[$num] : '';
                            } 
                        }
                    ?>
                    </td>
                   </tr>
                   
               <?php endforeach; ?>
           </tbody>
       </table>
   </div>
</div>
</div>
</div>





<!-- <div class="row"  >
 <div class="col-lg-12">
  <div class="main-card mb-3 card">
   <div class="card-body"><h5 class="card-title">LIHAT GRAFIK</h5>
      
      

      
   </div>
  </div>
 </div>
</div> -->












</div>    <!-- /.tutup app-main__inner --> 

