                <!-- KONTEN -->



                <div class="app-main__outer">
                    <!-- /.tutup div ada di footer -->
                    <div class="app-main__inner">


                        <div class="app-page-title">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="pe-7s-users icon-gradient bg-mean-fruit"></i>
                                </div>
                                <div>Alternatif Jurusan
                                    <div class="page-title-subheading">Halaman daftar jurusan yang tersedia
                                    </div>
                                </div>
                            </div>
                        </div>



                        <!-- ISI -->

                        <?php if ($this->session->flashdata('flash')) : ?>
                            <div class=" row mt-3">
                                <div class="col-lg-12">
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        Data Alternatif<strong> Berhasil <?= $this->session->flashdata('flash'); ?></strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>


                        <div class="row">
                            <div class="col-lg-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-body">
                                        <h5 class="card-title">Data Alternatif Pilihan Jurusan</h5>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAdd" style="margin-bottom:10px">Tambah Data</button>
                                        <table class="mb-0 table table-striped" id="tampil1">
                                            <thead>
                                                <tr>
                                                    <th style="height:40px; vertical-align: middle ;text-align:center">No</th>
                                                    <th style="height:40px; vertical-align: middle ;text-align:center">Kode Jurusan</th>
                                                    <th style="height:40px; vertical-align: middle ;text-align:center">Nama Jurusan</th>
                                                    <th style="height:40px; vertical-align: middle;text-align:center;width:150px">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 0;
                                                foreach ($data as $a) :
                                                    $no++;
                                                    $id = $a['id_alternatif'];
                                                    $kode = $a['kode'];
                                                    $nama = $a['nama_alternatif'];
                                                ?>
                                                    <?php if ($nama != 'Lain - Lain') {
                                                    ?>
                                                        <tr>

                                                            <td style="text-align:center"><?php echo $no; ?></td>
                                                            <td style="text-align:center"><?php echo $kode; ?></td>
                                                            <td style="text-align:center"><?php echo $nama; ?></td>
                                                            <td style="text-align:center;width:150px">
                                                                <a type="button" class="btn btn-success btn-sm" data-toggle="modal" href="#modalEdit<?php echo $id ?>">Edit</a>
                                                                <a type="button" class="btn btn-danger btn-sm" data-toggle="modal" href="#modalHapus<?php echo $id ?>">Hapus</a>
                                                            </td>


                                                        </tr>
                                                    <?php
                                                    } ?>
                                                <?php endforeach; ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>




                        </div>







                    </div> <!-- /.tutup app-main__inner -->