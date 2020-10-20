        <!-- Button trigger modal -->


<!-- Modal TAMBAH SISWA-->
<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Kriteria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php echo form_open_multipart('C_kriteria/tambah_data') ?>
      <div class="modal-body">

        <div class="position-relative form-group">
          <label for="kode_kriteria" class="">Kode Kriteria</label>
          <input name="kode_kriteria" id="kode_kriteria" placeholder="Masukkan Kode Kriteria" type="text" autocomplete="off" class="form-control" required>
          <!-- <small class="form-text text-danger"><?= form_error('nisn');?></small> -->
        </div>
        <div class="position-relative form-group">
            <label for="nama_alternatif" class="">Nama Jurusan</label>
            <select name="nama_alternatif" id="nama_alternatif" class="form-control" required>
            	<option disabled selected value> Pilih Jurusan </option>
            	<?php 
                foreach ($alternatif as $a){
                    $id_alternatif=$a['id_alternatif'];
                    $nama_alternatif=$a['nama_alternatif'];
                    ?>
                    <option value="<?php echo $id_alternatif; ?>"> <?php echo $nama_alternatif; ?> </option>
                <?php } ?>

            </select>
        </div>
        <div class="position-relative form-group">
            <label for="nama_kriteria" class="">Nama Kriteria</label>
            <input name="nama_kriteria" id="nama_kriteria" autocomplete="off" placeholder="Masukkan Nama Kriteria" type="text" class="form-control">
        </div>
        <div class="date dates position-relative form-group">
            <label for="jenis" class="">Jenis</label>
            <select name="jenis" id="jenis" class="form-control" required>
            	<option disabled selected value> Pilih Jenis</option>
            	<option value="Benefit">Benefit</option>
                <option value="Cost">Cost</option>
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
  <?php foreach($dataa as $a):
      $id=$a['id_kriteria'];
      $kode_kriteria=$a['kode_kriteria'];
      $id_alternatif=$a['id_alternatif'];
      $nama_kriteria=$a['nama_kriteria'];
      $jenis=$a['jenis'];
      $bobot=$a['bobot'];
      $normalisasi_bobot=$a['normalisasi_bobot'];
  ?>
<div class="modal fade" id="modalEdit<?php echo $id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data Kriteria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <?php echo form_open_multipart('C_kriteria/ubah_data') ?>

      <div class="modal-body">

        <input class="form-control" type="hidden" name="id" value="<?php echo $id;?>" readonly>

        <div class="position-relative form-group">
          <label for="kode_kriteria" class="">Kode Kriteria</label>
          <input name="kode_kriteria" id="kode_kriteria" placeholder="Masukkan Kode Kriteria" value="<?php echo $kode_kriteria;?>" type="text" class="form-control">
          
        </div>
        <div class="position-relative form-group">
            <label for="nama_alternatif" class="">Nama Jurusan</label>
            <select name="nama_alternatif" id="nama_alternatif" class="form-control" required>
                <option disabled selected value> Pilih Jurusan </option>
                <?php 
                    foreach ($alternatif as $a){
                    $id_alternatiff=$a['id_alternatif'];
                    $nama_alternatif=$a['nama_alternatif'];
                ?>
                    <option value="<?php echo $id_alternatiff; ?>" <?=$id_alternatiff== $id_alternatif? "selected" : null ?>> <?php echo $nama_alternatif; ?> </option>
                <?php } ?>
            </select>
        </div>
        <div class="position-relative form-group">
            <label for="nama_kriteria" class="">Nama Kriteria</label>
            <input name="nama_kriteria" id="nama_kriteria" placeholder="Masukkan Nama Kriteria" value="<?php echo $nama_kriteria;?>"  type="text" class="form-control">
        </div>

        <div class="position-relative form-group">
            <input type="hidden" name="bobot" value="<?= $bobot ?>">
            <input type="hidden" name="normalisasi_bobot" value="<?= $normalisasi_bobot ?>">
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
        <h5 class="modal-title" id="exampleModalLabel">Hapus Data Kriteria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <?php echo form_open_multipart('C_kriteria/hapus_data') ?>

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