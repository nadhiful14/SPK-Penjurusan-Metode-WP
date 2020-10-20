                <!-- KONTEN -->



                <div class="app-main__outer"> <!-- /.tutup div ada di footer --> 
                    <div class="app-main__inner">

                    
                        <div class="app-page-title">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="pe-7s-users icon-gradient bg-mean-fruit"></i>
                                </div>
                                <div>User Account
                                    <div class="page-title-subheading">This is an example dashboard created using build-in elements and components.
                                    </div>
                                </div>
                            </div>
                        </div>



                        <!-- ISI -->

                        <?php if($this->session->flashdata('flash')): ?>
                        <div class=" row mt-3">
                        <div class="col-lg-12">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            Data User<strong> Berhasil <?= $this->session->flashdata('flash'); ?></strong> 
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        </div>
                        </div>
                        <?php endif; ?>
                        
                        <div class="row">
                        <?php foreach ($data as $d) :
                            $id = $d['id'];
                            $nama = $d['nama'];
                            $email = $d['email'];
                            $image = $d['image'];
                            $level = $d['level'];
                            $date_created = $d['date_created'];
                         ?>
                            <div class="col-md-6">
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title"><?= $nama ?></h5>
                                        <div class="row">
                                            <div class="col-md-8">
                                                <table>
                                                <tr>
                                                    <td>Nama</i></td>
                                                    <td><?= $nama ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Email</td>
                                                    <td><?= $email ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Sebagai</td>
                                                    <td><?= $level ?></td>
                                                </tr>
                                                <tr>
                                                    <td width="100px">Dibuat Pada</td>
                                                    <td><?= date('d F Y', $date_created); ?></td>
                                                </tr>
                                                </table>
                                                
                                            </div>
                                            <div class="col-md-4">
                                                <img class="card-img " src="<?php echo base_url('assets/images/avatars/') . $image?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer justify-content-end"><a type="button" class="btn btn-success btn-sm mr-1" data-toggle="modal" href="#modalEdit<?php echo $id?>" >Edit</a><!-- <a type="button" class="btn btn-danger  btn-sm" data-toggle="modal" href="#modalHapus<?php echo $id?>" >Hapus</a> --></div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>

                        
                            

                         
                        
                    


            </div>    <!-- /.tutup app-main__inner --> 
            