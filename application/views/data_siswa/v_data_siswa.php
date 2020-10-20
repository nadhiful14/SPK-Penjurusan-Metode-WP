                <!-- KONTEN -->



                <div class="app-main__outer">
                    <!-- /.tutup div ada di footer -->
                    <div class="app-main__inner">


                        <div class="app-page-title">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="pe-7s-users icon-gradient bg-mean-fruit"></i>
                                </div>
                                <div>Data Siswa
                                    <div class="page-title-subheading">Halaman daftar siswa yang telah terdaftar
                                    </div>
                                </div>
                            </div>
                        </div>



                        <!-- ISI -->




                        <div class="row">
                            <div class="col-lg-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-body">
                                        <h5 class="card-title">Data Siswa</h5>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAdd" style="margin-bottom:10px">Tambah Data</button>
                                        <table class="mb-0 table table-striped table-responsive " width="100%" id="tampil1">
                                            <thead>
                                                <tr>
                                                    <th style="height:40px; vertical-align: middle ;text-align:center">No</th>
                                                    <th style="height:40px; vertical-align: middle ;text-align:center">NISN</th>
                                                    <th style="height:40px; vertical-align: middle ;text-align:center">Nama</th>
                                                    <th style="height:40px; vertical-align: middle ;text-align:center">Alamat</th>
                                                    <th style="height:40px; vertical-align: middle ;text-align:center">Jenis Kelamin</th>
                                                    <th style="height:40px; vertical-align: middle ;text-align:center">Tpt Lahir</th>
                                                    <th style="height:40px; vertical-align: middle ;text-align:center">Tgl Lahir</th>
                                                    <th style="height:40px; vertical-align: middle ;text-align:center">Tahun Ajaran</th>
                                                    <th style="height:40px; vertical-align: middle ;text-align:center">Status</th>
                                                    <th style="height:40px; vertical-align: middle;text-align:center;">Aksi</th>
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
                                                        <td style="text-align:center"><?php echo $no; ?></td>
                                                        <td style="text-align:center"><?php echo $nisn; ?></td>
                                                        <td><?php echo $nama; ?></td>
                                                        <td><?php echo $alamat; ?></td>
                                                        <td><?php echo $jkel; ?></td>
                                                        <td><?php echo $tpt_lahir; ?></td>
                                                        <td><?php echo $tgl_lahir; ?></td>
                                                        <td><?php echo $tahun; ?></td>
                                                        <td><?php echo $status; ?></td>
                                                        <td style="text-align:center">
                                                            <a type="button" class="btn btn-success btn-sm" data-toggle="modal" href="#modalEdit<?php echo $nisn ?>">Edit</a>
                                                            <!-- <a type="button" class="btn btn-danger btn-sm" data-toggle="modal" href="#modalHapus<?php echo $nisn ?>" >Hapus</a> -->
                                                        </td>

                                                    </tr>
                                                <?php endforeach; ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>




                        </div>







                    </div> <!-- /.tutup app-main__inner -->