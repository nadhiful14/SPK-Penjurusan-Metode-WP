                <!-- KONTEN -->



                <div class="app-main__outer"> <!-- /.tutup div app-main__outer ada di footer --> 
                    <div class="app-main__inner">

                    
                        <div class="app-page-title">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="pe-7s-users icon-gradient bg-mean-fruit"></i>
                                </div>
                                <div>Data Bobot Kriteria
                                    <div class="page-title-subheading">Halaman data bobot setiap kriteria
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

                        

                        <div class="row" id="pilihKriteria">
                            <div class="col-lg-6">
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">Pilih Kriteria</h5>
                                        <form id="formPilihKriteria">
                                            <select class="form-control" id="pilihanKriteria">
                                                    <?php 
                                                    foreach ($alternatif as $a){
                                                        $id_alternatif=$a['id_alternatif'];
                                                        $nama_alternatif=$a['nama_alternatif'];

                                                        if ($nama_alternatif != 'Lain - Lain') {
                                                            ?>
                                                            <option value="<?php echo $id_alternatif; ?>"> <?php echo $nama_alternatif; ?> </option>
                                                        <?php 
                                                    }
                                                     } ?>
                                            </select>
                                        </form>
                                    </div>
                                    <div class="card-footer">
                                        <button type="button" class="btn btn-primary" id="btnPilihKriteria">Pilih &nbsp; </button>
                                        <button type="button" class="btn btn-danger" id="resetPilihKriteria" disabled>Reset &nbsp; </button>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row" id='formPilihan' hidden>
                            <div class="col-lg-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">Bobot Kriteria</h5>
                                        <form id="formBobotKriteria">
                                            <table class="mb-0 table table-striped">
                                                <thead>
                                                    <tr style="height: 60px">
                                                        <th >ID</th>
                                                        <th >Golongan Kriteria</th>
                                                        <th >Kriteria</th>
                                                        <th >Bobot</th>
                                                        <th >Jenis Kriteria</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="bobotSubkriteria">

                                                </tbody>
                                            </table>
                                        </form>
                                    </div>
                                    <div class="card-footer">
                                        <button type="button" class="btn btn-success" id="updateBobotKriteria">Update &nbsp; <i class='glyphicon glyphicon-circle-arrow-right'></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row" id='panelBobotSubKriteria' hidden>
                            <div class="col-lg-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">Hasil Bobot Kriteria</h5>
                                        <table class="mb-0 table table-striped">
                                            <thead>
                                                <tr style="height: 50px">
                                                    <th style='width:10px'>ID</th>
                                                    <th>Golongan Kriteria</th>
                                                    <th>Kriteria</th>
                                                    <th style='width:100px'>Bobot</th>
                                                    <th style='width:150px'>Hasil Bobot</th>
                                                </tr>
                                            </thead>
                                            <tbody id="hasil_bobot_subkriteria">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                            

                         
                        
                    


            </div>    <!-- /.tutup app-main__inner 
            