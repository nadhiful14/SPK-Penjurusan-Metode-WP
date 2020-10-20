        <!-- Button trigger modal -->


<!-- Modal TAMBAH SISWA-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Log Out</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php echo form_open_multipart('dashboard/logout') ?>
      <div class="modal-body">

        <div class="position-relative form-group">
          <label for="kode" class="">Anda akan keluar dari aplikasi?</label>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Logout</button>
      </div>
      <?php echo form_close(); ?>
    </div>
  </div>
</div>

