                <!-- KONTEN -->



                <div class="app-main__outer"> <!-- /.tutup div app-main__outer ada di footer --> 
                    <div class="app-main__inner">

                    
                        <div class="app-page-title">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="pe-7s-users icon-gradient bg-mean-fruit"></i>
                                </div>
                                <div>Grafik Penjurusan
                                    <div class="page-title-subheading">Halaman Grafik Penjurusan
                                    </div>
                                </div>
                            </div>
                        </div>



                        <!-- ISI -->

                        

                       



                        <div class="col-lg-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-body">
                                    <h5 class="card-title">Grafik Penjurusan Siswa</h5>
                                       
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
                                                        text: 'Grafik Penjurusan Siswa'
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



                        

                        
                            

                         
                        
                    


            </div>    <!-- /.tutup app-main__inner --> 
            
