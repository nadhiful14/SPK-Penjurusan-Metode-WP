                <!-- KONTEN -->



                <div class="app-main__outer"> <!-- /.tutup div ada di footer --> 
                    <div class="app-main__inner">


                        <div class="app-page-title">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="pe-7s-users icon-gradient bg-mean-fruit"></i>
                                </div>
                                <div>Dashboard
                                    <div class="page-title-subheading">Halaman Dashboard Aplikasi Penjurusan Siswa 
                                    </div>
                                </div>
                            </div>
                        </div>



                        <!-- ISI -->

                        

                        <div class="row">
                            <div class="col-lg-6 col-xl-4">
                                <div class="card mb-3 widget-content">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Data Siswa</div>
                                            <div class="widget-subheading">Total data siswa</div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-success"><span><?php echo $data; ?></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-xl-4">
                                <div class="card mb-3 widget-content">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Data Kriteria</div>
                                            <div class="widget-subheading">Total data kriteria</div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-primary"><span><?php echo $kriteria; ?></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-xl-4">
                                <div class="card mb-3 widget-content">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Data Jurusan</div>
                                            <div class="widget-subheading">Total data jurusan</div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-danger"><span><?php echo $jurusan; ?></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-lg-8">
                                <div class="main-card mb-3 card">
                                    <div class="card-body">
                                    <?php 
                                        $tahun = $this->db->query("SELECT MAX(tahun) as th from data_mahasiswa")->row();
                                        $th = $tahun->th; 
                                    ?>
                                        <h5 class="card-title">Data Siswa Tahun <?php echo $th ?></h5>
                                        <table class="mb-0 table table-striped  " width="100%" id="tampilDsh">
                                            <thead>
                                                <tr>
                                                    <th style="height:40px; vertical-align: middle ;text-align:center">NISN</th>
                                                    <th style="height:40px; vertical-align: middle ;text-align:center">Nama</th>
                                                    <th style="height:40px; vertical-align: middle ;text-align:center">Tpt Lahir</th>
                                                    <th style="height:40px; vertical-align: middle ;text-align:center">Tgl Lahir</th>
                                                    <th style="height:40px; vertical-align: middle ;text-align:center">Tahun Ajaran</th>
                                                    <!-- <th style="height:40px; vertical-align: middle ;text-align:center">Status</th> -->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 0;
                                                foreach ($data_siswa as $a) :
                                                    $no++;
                                                $nisn = $a['nisn'];
                                                $nama = $a['nama'];
                                                $alamat = $a['alamat'];
                                                $tpt_lahir = $a['tpt_lahir'];
                                                $tgl_lahir = $a['tgl_lahir'];
                                                $tahun = $a['tahun'];
                                                $status = $a['status'];
                                                $jkel = $a['jenis_kelamin'];
                                                ?>
                                                <tr>
                                                    <td style="text-align:center"><?php echo $nisn; ?></td>
                                                    <td><?php echo $nama; ?></td>
                                                    <td><?php echo $tpt_lahir; ?></td>
                                                    <td><?php echo $tgl_lahir; ?></td>
                                                    <td><?php echo $tahun; ?></td>
                                                    <!-- <td><?php echo $status; ?></td> -->

                                                </tr>
                                            <?php endforeach; ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>




                            
                            <div class="col-lg-4">
                                <div class="main-card mb-3 card">
                                    <div class="card-body">
                                    <h5 class="card-title">Data Kriteria</h5>
                                       
                                        <div id="tampilr" style="min-width: 100%; max-width: 1000px; height: 350px; margin: 0 auto">
                                            <?php
                                                $jumlah = array();
                                                $nama = array();
                                              
                                                $intjumlah = array();
                                                
                                                foreach ($grafik->result_array() as $g) {

                                                  $jumlah[]=$g['jumlah_kriteria'];
                                                  $nama[]=$g['nama'];
                                                  $intjumlah[]=intval($g['jumlah_kriteria']);
                                          
                                               ?>
                                            <script src="<?php echo base_url(); ?>assets/highcharts/highcharts.js"></script>
                                            <script src="<?php echo base_url(); ?>assets/highcharts/highcharts-more.js"></script>
                                            <script src="<?php echo base_url(); ?>assets/highcharts/exporting.js"></script>
                                            <script src="<?php echo base_url(); ?>assets/highcharts/export-data.js"></script>
                                            <script type="text/javascript">
                                                var chart = Highcharts.chart('tampilr', {

                                                    title: {
                                                        text: 'Data Kriteria'
                                                    },

                                                    subtitle: {
                                                        text: 'Sumber: Data Skripsi 2020'
                                                    },

                                                    xAxis: {
                                                        categories: [<?php $arrlength = count($intjumlah);
                                                        for($x = 0; $x < $arrlength; $x++) {
                                                        echo json_encode($nama[$x]);
                                                        if($x < $arrlength-1){
                                                        echo ",";
                                                        }
                                                        }?>]
                                                    },

                                                    series: [{
                                                        type: 'column',
                                                        colorByPoint: true,
                                                        data: [<?php $arrlength = count($intjumlah);
               
                                                        for($x = 0; $x < $arrlength; $x++) {
                                                         echo json_encode(intval($intjumlah[$x]));
                                                        if($x < $arrlength-1){
                                                        echo ",";
                                                        
                                                        }
                                                        }?>],
                                                        showInLegend: false
                                                    }]

                                                });
                                               
                                            </script>
                                        </div>
                                         <?php } ?>
                                    </div>
                                </div>
                            </div>          




                        
                        </div> <!-- ROW -->              



                    


                </div>    <!-- /.tutup app-main__inner --> 
