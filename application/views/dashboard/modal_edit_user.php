        <!-- Button trigger modal -->


        <!-- Modal TAMBAH SISWA-->



        <!-- Modal EDIT SISWA-->
        <?php foreach ($data as $d) :
          $id = $d['id'];
          $nama = $d['nama'];
          $email = $d['email'];
          $image = $d['image'];
          $level = $d['level'];
          $date_created = $d['date_created'];
        ?>
          <div class="modal fade" id="modalEdit<?php echo $id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Edit Data User</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <?php echo form_open_multipart('User/ubah_data') ?>

                <div class="modal-body">

                  <input class="form-control" type="hidden" name="id" value="<?php echo $id; ?>" readonly>

                  <div class="position-relative form-group">
                    <label for="email" class="">Email</label>
                    <input name="email" id="email" placeholder="Masukkan Email" readonly value="<?php echo $email; ?>" type="email" class="form-control">
                  </div>
                  <div class="position-relative form-group">
                    <label for="nama" class="">Nama</label>
                    <input name="nama" id="nama" placeholder="Masukkan Nama" value="<?php echo $nama; ?>" type="text" class="form-control">
                  </div>
                  <div class="position-relative form-group">
                    <label for="Level" class="">Sebagai</label>
                    <input name="level" id="level" placeholder="Masukkan Level" value="<?php echo $level; ?>" type="text" class="form-control">
                  </div>
                  <div class="position-relative form-group">
                    <label for="Level" class="">Pilih Gambar</label>
                    <div class="row">
                      <div class="col-md-8">
                        <div class="custom-file">
                          <input type="file" id="image" name="image">
                          <!-- class="custom-file-input"  -->
                          <label for="image">Choose file</label>
                          <!-- class="custom-file-label" -->
                        </div>
                      </div>
                      <div class="col-md-4">
                        <img src="<?= base_url('assets/images/avatars/') . $image ?> ?>" class="img-thumbnail">
                      </div>
                    </div>
                  </div>




                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                <?php echo form_close(); ?>
              </div>
            </div>
          </div>



          <!-- Modal HAPUS SISWA-->

          <div class="modal fade" id="modalHapus<?php echo $id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Hapus Data User</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <?php echo form_open_multipart('User/hapus_data') ?>

                <div class="modal-body">
                  <label>Yakin Mau Menghapus Data Ini?</label>
                  <input class="form-control" type="hidden" name="id" value="<?php echo $id; ?>" readonly>

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                  <button type="submit" class="btn btn-primary">Hapus</button>
                </div>
                <?php echo form_close(); ?>
              </div>
            </div>
          </div>
        <?php endforeach; ?>