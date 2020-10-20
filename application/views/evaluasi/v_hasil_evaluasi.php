                <!-- KONTEN -->



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

                        

                        <div class="row">
                        <div class="col-lg-6">
                            <div class="main-card mb-3 card">

                            <?php echo form_open_multipart('C_hasil_evaluasi/hasil') ?>
                                <div class="card-body"><h5 class="card-title">Pilih Tahun</h5>
                                    <select name="tahun" id="tahun" class="form-control" required>
                                        <option value="0000" disabled> Pilih Tahun</option>
                                        <?php 
                                        foreach ($tahun as $a){
                                            $tahun=$a['tahun'];
                                                ?>
                                                <option value="<?php echo $tahun; ?>"> <?php echo $tahun; ?> </option>
                                            <?php
                                            
                                            
                                            
                                         } ?>
                                    </select>
                                </div>
                                <div class="card-footer"><button type="submit" id="hitung" class="btn btn-primary">Lihat Hasil</button></div>
                            </div>
                            <?php echo form_close(); ?>
                            
                        </div>
                        </div>  



                        <div class="row" id='panelEditEvaluasi' hidden >
                            <div class="col-lg-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">Hasil Evaluasi Alternatif</h5>
                                        <form class="form-horizontal" id="formEditEvaluasi">
                                            <table class="mb-0 table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th rowspan="2" style="vertical-align: middle ;text-align:center">NISN</th>
                                                        <th rowspan="2" style="vertical-align: middle ;text-align:center">Nama</th>
                                                        <th colspan="3" style="vertical-align: middle ;text-align:center">Nilai Alternatif</th>
                                                        <th rowspan="2" style="vertical-align: middle ;text-align:center">Kesimpulan</th>

                                                    </tr>
                                                    <tr>
                                                    	<th style="vertical-align: middle ;text-align:center">MIA</th>
                                                    	<th style="vertical-align: middle ;text-align:center">IIS</th>
                                                    	<th style="vertical-align: middle ;text-align:center">Bahasa</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="dataEvaluasi">

                                                </tbody>
                                            </table>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="row" hidden>
                            <div class="col-lg-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">Hasil Perhitungan Weighted Product</h5>
                                    <div class="box-body" id="daftarAlternatif">

                                	</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                            

                         
                        
                    


            </div>    <!-- /.tutup app-main__inner --> 
            
