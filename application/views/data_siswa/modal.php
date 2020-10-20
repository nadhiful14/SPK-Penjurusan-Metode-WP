        <!-- Button trigger modal -->


<!-- Modal TAMBAH SISWA-->
<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Siswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php echo form_open_multipart('C_data_siswa/tambah_siswa') ?>
      <div class="modal-body">

        <div class="position-relative form-group">
          <label for="nisn" class="">NISN</label>
          <input name="nisn" id="nisn" placeholder="Masukkan NISN Siswa" type="number" autocomplete="off"  class="form-control" required>
          <!-- <small class="form-text text-danger"><?= form_error('nisn');?></small> -->
        </div>
        <div class="position-relative form-group">
            <label for="nama" class="">Nama</label>
            <input name="nama" id="nama" placeholder="Masukkan Nama Siswa" autocomplete="off" type="text" class="form-control" required>
        </div>
        <div class="position-relative form-group">
            <label for="alamat" class="">Alamat</label>
            <input name="alamat" id="nama" placeholder="Masukkan Alamat Siswa" autocomplete="off" type="text" class="form-control">
        </div>
        <div class="position-relative form-group">
            <label for="jkel" class="">Jenis Kelamin</label>
            <select name="jkel" id="jkel" class="form-control" required>
              <option disabled selected value> Pilih Jenis Kelamin </option>
              <option value="Laki - Laki">Laki - Laki </option>
              <option value="Perempuan">Perempuan </option>
            </select>
        </div>
        <div class="date dates position-relative form-group">
            <label for="tempat_lahir" class="">Tempat Lahir</label>
            <input type="text" class="form-control" autocomplete="off" id="tpt_lahir" name="tpt_lahir" placeholder="Masukkan Tempat Lahir">
        </div>
        <div class="date dates position-relative form-group">
            <label for="tenggal_lahir" class="">Tanggal Lahir</label>
            <input type="text" class="form-control" autocomplete="off" id="tgl_lahir" name="tgl_lahir" placeholder="dd-mm-yyyy">
        </div>
        <div class="position-relative form-group">
            <label for="tahun" class="">Tahun Ajaran</label>
            <select name="tahun" id="tahun"  class="form-control">
                              <?php
                              $tg_awal = date('Y') - 10;
                              $tgl_akhir = date('Y');
                              for ($i = $tgl_akhir; $i >= $tg_awal; $i--) {
                                echo "
                                            <option value='$i'";
                                if (date('Y') == $i) {
                                  echo "selected";
                                }
                                echo ">$i</option>";
                              }
                              ?>
                            </select>
            <!-- <input name="tahun" id="tahun" placeholder="Masukkan Tahun Ajaran" type="text" class="form-control" autocomplete="off" required> -->
        </div>
        <div class="position-relative form-group">
            <label for="status" class="">Status</label>
            <select name="status" id="status" class="form-control" required>
              <option disabled selected value> Pilih Status Siswa </option>
              <option value="Aktif">Aktif </option>
              <option value="Nonaktif">Nonaktif </option>
            </select>
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



<!-- Modal EDIT SISWA-->
  <?php foreach($data_siswa as $a):
      $nisn=$a['nisn'];
      $nama=$a['nama'];
      $alamat=$a['alamat'];
      $tpt_lahir=$a['tpt_lahir'];
      $tgl_lahir=$a['tgl_lahir'];
      $tahun=$a['tahun'];
      $jkel=$a['jenis_kelamin'];
      $status=$a['status'];
  ?>
<div class="modal fade" id="modalEdit<?php echo $nisn?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Siswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <?php echo form_open_multipart('C_data_siswa/ubah_siswa') ?>

      <div class="modal-body">

        <div class="position-relative form-group">

        <input name="nisn" value="<?php echo $nisn;?>" type="hidden">

          <label for="nisn" class="">NISN</label>
          <input name="nisn" disabled id="nisn" placeholder="Masukkan NISN Siswa" value="<?php echo $nisn;?>" type="number" class="form-control">
          
        </div>
        <div class="position-relative form-group">
            <label for="nama" class="">Nama</label>
            <input name="nama" id="nama" placeholder="Masukkan Nama Siswa" value="<?php echo $nama;?>" type="text" class="form-control">
        </div>
        <div class="position-relative form-group">
            <label for="alamat" class="">Alamat</label>
            <input name="alamat" id="alamat" placeholder="Masukkan Alamat Siswa" value="<?php echo $alamat;?>"  type="text" class="form-control">
        </div>
        <div class="position-relative form-group">
            <label for="jkel" class="">Jenis Kelamin</label>
            <select name="jkel" id="jkel" class="form-control" required>
              <option disabled selected value> Pilih Jenis Kelamin </option>
              <option value="Laki - Laki" <?php if($jkel == 'Laki - Laki'){ echo 'selected'; } ?>>Laki - Laki</option>
              <option value="Perempuan" <?php if($jkel == 'Perempuan'){ echo 'selected'; } ?>>Perempuan</option>
            </select>
        </div>
        <div class="position-relative form-group">
            <label for="tpt_lahir" class="">Tempat Lahir</label>
            <input name="tpt_lahir" id="tpt_lahir" placeholder="Masukkan Tempat Lahir" value="<?php echo $tpt_lahir;?>"  type="text" class="form-control">
        </div>
        <div class="date dates position-relative form-group">
            <label for="examplePassword" class="">Tanggal Lahir</label>
            <input type="text" class="form-control" autocomplete="off" value="<?php echo $tgl_lahir;?>" id="tgl_lahir" name="tgl_lahir" placeholder="dd-mm-yyyy">
        </div>
        <div class="position-relative form-group">
            <label for="tahun" class="">Tahun Ajaran</label>
            <select name="tahun" id="tahun"  class="form-control">
                              <?php

                              $tg_awal = date('Y') - 10;
                              $tgl_akhir = date('Y');
                              for ($i = $tgl_akhir; $i >= $tg_awal; $i--) {
                                echo "
                                            <option value='$i'";
                                if ($i == $tahun) {
                                  echo "selected";
                                }
                                echo ">$i</option>";
                              }
                              ?>
                            </select>
            <!-- <input name="tahun" id="tahun" value="<?php echo $tahun;?>" placeholder="Masukkan Tahun Ajaran" type="text" class="form-control"> -->
        </div>
        <div class="position-relative form-group">
            <label for="status" class="">Status</label>
            <select name="status" id="status" class="form-control" required>
              <option disabled selected value> Pilih Status Siswa </option>
              <option value="Aktif" <?php if($status == 'Aktif'){ echo 'selected'; } ?>>Aktif </option>
              <option value="Nonaktif" <?php if($status == 'Nonaktif'){ echo 'selected'; } ?>>Nonaktif </option>
            </select>
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

<div class="modal fade" id="modalHapus<?php echo $nisn?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus Data Siswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <?php echo form_open_multipart('C_data_siswa/hapus_siswa') ?>

      <div class="modal-body">
        <label >Yakin Mau Menghapus Data Ini?</label>
        <input class="form-control" type="hidden" name="nisn" value="<?php echo $nisn;?>" readonly>
  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
      <?php echo form_close(); ?>
    </div>
  </div>
</div>
  <?php endforeach; ?>