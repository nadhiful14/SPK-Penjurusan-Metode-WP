                <!-- KONTEN -->



                <div class="app-main__outer"> <!-- /.tutup div app-main__outer ada di footer --> 
                    <div class="app-main__inner">

                    
                        <div class="app-page-title">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="pe-7s-users icon-gradient bg-mean-fruit"></i>
                                </div>
                                <div>Data Nilai Siswa
                                    <div class="page-title-subheading">Halaman data nilai siswa yang telah terdaftar
                                    </div>
                                </div>
                            </div>
                        </div>



                        <!-- ISI -->

                        <?php if($this->session->flashdata('flash')): ?>
                        <div class=" row mt-3">
                        <div class="col-lg-12">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            Data Kriteria<strong> Berhasil <?= $this->session->flashdata('flash'); ?></strong> 
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        </div>
                        </div>
                        <?php endif; ?>

                        

                        



                        <div class="row">
                            <div class="col-lg-6">
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">Pilih Tahun</h5>
                                    <div id="daftarAlternatif">
                                        



                                        <form id="formTambah">
                                            <select class="form-control" id='tahun' name="tahun">
                                                <?php 
                                                foreach ($tahun as $a){
                                                $tahun=$a['tahun'];

                                                    ?>
                                                    <option value="<?php echo $tahun; ?>"> <?php echo $tahun; ?> </option>
                                                <?php 
                                            
                                             } ?>
                                            </select>   
                                        </form>
                                    </div>
                                    </div>
                                    <div class='card-footer'>
                                        <button type="button" class="btn btn-primary" id="pilihKriteriaEvaluasi">Pilih Tahun <i class='glyphicon glyphicon-chevron-down'></i></button>
                                        <!-- <button type="button" class="btn btn-danger" id="resetPilihan" disabled>Reset &nbsp; <i class='glyphicon glyphicon-repeat'></i></button> -->
                                    </div>
                                </div>
                            </div>
                        </div>




                        
                        <div class="row" id='panelEditEvaluasi' hidden >
                            <div class="col-lg-6">
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">Data Evaluasi Alternatif</h5>
                                        <form class="form-horizontal" id="formEditEvaluasi">
                                            <table class="mb-0 table table-striped">
                                                <thead>
                                                    <tr>
                                                        <td style="width: 18%;">Nomor</td>
                                                        <td>Kriteria</td>
                                                        <td style="width: 28%;">Nilai</td>
                                                    </tr>
                                                </thead>
                                                <tbody id="dataEvaluasi">

                                                </tbody>
                                            </table>
                                        </form>
                                    </div>
                                    <div class="card-footer">
                                        <button type="button" class="btn btn-primary btn-sm" id="updateDataEvaluasi">Update &nbsp; <i class='glyphicon glyphicon-chevron-right'></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="row" id='panelNilaiAlternatif' hidden >
                            <div class="col-lg-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">Data Evaluasi Alternatif</h5>
                                        <table class="mb-0 table table-striped tampils table-responsive" id="tampils">
                                            <thead>
                                                <tr id='heading'>

                                                </tr>
                                            </thead>
                                            <tbody id="hasilNilaiAlternatif">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>






                        
                            

                         
                        
                    


            </div>    <!-- /.tutup app-main__inner 
            