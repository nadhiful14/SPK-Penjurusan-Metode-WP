        <!-- Button trigger modal -->


<!-- Modal TAMBAH SISWA-->
<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Alternatif</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php echo form_open_multipart('C_alternatif/tambah_data') ?>
      <div class="modal-body">

        <div class="position-relative form-group">
          <label for="kode" class="">Kode Jurusan</label>
          <input name="kode" id="kode" placeholder="Masukkan kode jurusan" type="text"  class="form-control" autocomplete='off' required>
          <!-- <small class="form-text text-danger"><?= form_error('nisn');?></small> -->
        </div>
        <div class="position-relative form-group">
            <label for="nama_alternatif" class="">Nama jurusan</label>
            <input name="nama_alternatif" id="nama_alternatif" placeholder="Masukkan Nama Jurusan" type="text" autocomplete='off' class="form-control" required>
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
  <?php foreach($data as $a):
      $id=$a['id_alternatif'];
      $kode=$a['kode'];
      $nama_alternatif=$a['nama_alternatif'];
  ?>
<div class="modal fade" id="modalEdit<?php echo $id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data Alternatif</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <?php echo form_open_multipart('C_alternatif/ubah_data') ?>

      <div class="modal-body">

        <input class="form-control" type="hidden" name="id" value="<?php echo $id;?>" readonly>

        <div class="position-relative form-group">
          <label for="kode" class="">Kode Jurusan</label>
          <input name="kode" id="kode" placeholder="Masukkan Kode Jurusan" value="<?php echo $kode;?>" type="text" class="form-control">
          
        </div>
        <div class="position-relative form-group">
            <label for="nama_alternatif" class="">Nama</label>
            <input name="nama_alternatif" id="nama_alternatif" placeholder="Masukkan Nama Jurusan" value="<?php echo $nama_alternatif;?>" type="text" class="form-control">
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

<div class="modal fade" id="modalHapus<?php echo $id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus Data Alternatif</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <?php echo form_open_multipart('C_alternatif/hapus_data') ?>

      <div class="modal-body">
        <label >Yakin Mau Menghapus Data Ini?</label>
        <input class="form-control" type="hidden" name="id" value="<?php echo $id;?>" readonly>
  
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