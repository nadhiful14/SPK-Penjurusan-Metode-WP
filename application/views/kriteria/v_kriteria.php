                <!-- KONTEN -->



                <div class="app-main__outer"> <!-- /.tutup div app-main__outer ada di footer --> 
                    <div class="app-main__inner">

                    
                        <div class="app-page-title">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="pe-7s-users icon-gradient bg-mean-fruit"></i>
                                </div>
                                <div>Data Kriteria
                                    <div class="page-title-subheading">Halaman data kriteria dari setiap jurusan
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
                                <div class="card-body"><h5 class="card-title">Pilih Kriteria</h5>
                                    <select name="alternatif" id="alternatif" class="form-control" required>
                                        <option value="0000"> Pilih Kriteria</option>
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
                                </div>
                                <div class="card-footer"><small>*Pilih Kriteria Terlebih Dahulu untuk melihat data</small></div>
                            </div>
                        </div>
                        </div>

                        <div class="row">
                        <div class="col-lg-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">Data Kriteria Setiap Jurusan</h5>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAdd" style="margin-bottom:10px">Tambah Data</button>
                                        <table class="mb-0 table table-striped" width="100%" id="kriteria">
                                            <thead>
                                                <tr >
                                                    <th style="height:40px; vertical-align: middle ;text-align:center">No</th>
                                                    <th style="height:40px; vertical-align: middle ;text-align:center">Kode Kriteria</th>
                                                    <th style="height:40px; vertical-align: middle ;text-align:center">Kriteria</th>
                                                    <th style="height:40px; vertical-align: middle ;text-align:center">Jenis</th>
                                                    <th style="height:40px; vertical-align: middle;text-align:center;width:150px">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                $no = 0;
                                                foreach($data AS $a):
                                                    $no++;
                                                    $id=$a['id_kriteria'];
                                                    $kode_kriteria=$a['kode_kriteria'];
                                                    $nama_alternatif=$a['nama_alternatif'];
                                                    $nama_kriteria=$a['nama_kriteria'];
                                                    $jenis=$a['jenis'];
                                                    $bobot=$a['bobot'];
                                                    $normalisasi_bobot=$a['normalisasi_bobot'];
                                                ?>
                                                <tr>
                                                    <td style="text-align:center"><?php echo $no;?></td>
                                                    <td style="text-align:center"><?php echo $kode_kriteria;?></td>
                                                    <td style="text-align:center"><?php echo $nama_kriteria;?></td>
                                                    <td style="text-align:center"><?php echo $jenis;?></td>
                                                    <td style="text-align:center;width:150px">
                                                        <a type="button" class="btn btn-success btn-sm" data-toggle="modal" href="#modalEdit<?php echo $id?>" >Edit</a>
                                                        <a type="button" class="btn btn-danger btn-sm" data-toggle="modal" href="#modalHapus<?php echo $id?>" >Hapus</a>
                                                    </td>

                                                </tr>
                                                <?php endforeach; ?>
                                            
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                        </div>

                                                    


                        </div>    
                            

                         
                        
                    


            </div>    <!-- /.tutup app-main__inner --> 
            
