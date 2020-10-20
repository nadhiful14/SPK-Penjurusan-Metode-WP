 <!-- FOOTER -->

                    
                    <div class="app-wrapper-footer">
                        <div class="app-footer">
                            <div class="app-footer__inner">
                                <div class="app-footer-left">
                                <strong>Copyright &copy 2020 <a href="https://web.facebook.com/nadhiful.alqolby">M. Nadhiful Qolby</a></strong>
                                </div>
                                <div class="app-footer-right">
                                   <b>APLIKASI PENJURUSAN SISWA SMAM 06 KARANGASEM PACIRAN</b>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        </div>
    </div>





<script type="text/javascript" src="<?php echo base_url('assets/scripts/main.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
<!-- jQuery -->
<script type="text/javascript" src="<?php echo base_url('assets/plugins/jquery/jquery.min.js') ?>"></script>

<!-- DATATABLES -->

<script type="text/javascript" src="<?php echo base_url('assets/datatables/jquery-3.3.1.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/datatables/jquery.dataTables.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/datatables/dataTables.bootstrap4.min.js') ?>"></script>

<script src="<?php echo base_url(); ?>assets/dataTables/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dataTables/buttons.flash.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dataTables/jszip.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dataTables/pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dataTables/vfs_fonts.js"></script>
<script src="<?php echo base_url(); ?>assets/dataTables/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dataTables/buttons.print.min.js"></script> 
<script src="<?php echo base_url(); ?>assets/dataTables/buttons.colVis.min.js"></script> 

<!-- Date Picker -->

<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap-datepicker.js') ?>"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url('assets/js/jquery.toast.js') ?>"></script>

</body>


<script>
$(function () {
    $('.dates #tgl_lahir').datepicker({
    format: 'dd-mm-yyyy',
    
    });
});
</script>

<script>
$('.custom-file-input').on('change', function(){
    let fileName = $(this).val().split('\\').pop();
    $(this).next('.custom-file-label').addClass("selected").html(fileName);
});


</script>

<script>
$(document).ready(function() {
    $('#tampil1').DataTable({
        
      'searching'   : true,
      'ordering'    : true,
      'autoWidth'   : true,
    });
} );
</script>

<script>
$(document).ready(function() {
    $('#tampilDsh').DataTable({
        
      'searching'   : true,
      'ordering'    : true,
      'autoWidth'   : true,
      "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]]
    });
} );
</script>

<script>
$(document).ready(function() {
    $('#tampil2').DataTable({
        columDefs : [
        {
          'searching'   : true,
          'ordering'    : true,
          'autoWidth'   : true,

        }],
      dom: 'Blfrtip',
    // dom :'<"top"fl>rt<"bottom"piB><"clear">',
        buttons: [
        { extend: 'print', footer:true, className: 'btn btn-sm btn-primary pull-right upper'},
        { extend: 'copy', footer:true, className: 'btn btn-sm btn-warning pull-right upper'},
        { extend: 'pdf', footer:true, className: 'btn btn-sm btn-danger pull-right upper'},
        { extend: 'excel', footer:true, className: 'btn btn-sm btn-success pull-right upper'},
        ]
    });
} );
</script>


<?php $pages = $this->uri->segment(1);
if($pages=="C_kriteria"){ ?>
<script>
$(document).ready(function() {
    var tp1 = $('#kriteria').DataTable({
        
      'searching'   : true,
      'ordering'    : true,
      'autoWidth'   : true,

      "ajax": 'C_kriteria/get?alternatif='+0000
    });

    $("#alternatif").change(function () {
        end = this.value;
        tp1.ajax.url( 'C_kriteria/get?alternatif='+end ).load();
    });
} );
</script>







<?php }else if($pages=="C_bobot_kriteria") { ?>

<script type="text/javascript">
            $(document).ready(function () {
                //Mencegah User Melakukan Submit Form dengan Menekan tombol enter
                $(window).keydown(function (event) {
                    if (event.keyCode == 13) {
                        event.preventDefault();
                        return false;
                    }
                });
                $('#resetPilihKriteria').click(function () {
                    $('#btnPilihKriteria').removeAttr('disabled');
                    $('#pilihanKriteria').removeAttr('disabled');
                    $('#resetPilihKriteria').attr('disabled', 'true');
                    $('#panelBobotSubKriteria').fadeOut(1000);
                    $('#formPilihan').fadeOut(1000);
                    //TODO Perbaiki Tombol Reset (DEBUG)
                    //Update
                    //View Bobot
                });
                $('#btnPilihKriteria').click(function () {
                    $('#resetPilihKriteria').removeAttr('disabled');
                    $('#panelBobotSubKriteria').removeAttr('hidden');
                    $('#formPilihan').removeAttr('hidden');
                    var id_kriteria = $('#pilihanKriteria').val();
                     $('#bobotSubkriteria').empty();
                        $.ajax({
                            url: '<?= base_url('C_bobot_kriteria/lihat_bobot_subkriteria') ?>',
                            data: 'id_kriteria=' + id_kriteria,
                            type: 'post',
                            dataType: 'json',
                            cache: 'false',
                            success: function (response) {
                                if (response.length > 0) {
                                    $.each(response, function (i, item) {
                                        if (item.bobot == 0) {
                                            var select = "<select class='form-control' name='bobotsubkriteria[]'><option value='0' selected='selected'>0</option><option value='1'>1 - Tidak Penting</option><option value='2'>2 - Kurang Penting</option><option value='3'>3 - Cukup Penting</option><option value='4'>4 - Penting</option><option value='5'>5 - Sangat Penting</option></select>";
                                        } else if (item.bobot == 1) {
                                            var select = "<select class='form-control' name='bobotsubkriteria[]'><option value='0'>0</option><option value='1' selected='selected'>1 - Tidak Penting</option><option value='2'>2 - Kurang Penting</option><option value='3'>3 - Cukup Penting</option><option value='4'>4 - Penting</option><option value='5'>5 - Sangat Penting</option></select>";
                                        } else if (item.bobot == 2) {
                                            var select = "<select class='form-control' name='bobotsubkriteria[]'><option value='0'>0</option><option value='1'>1</option><option value='2' selected='selected'>2 - Kurang Penting</option><option value='3'>3 - Cukup Penting</option><option value='4'>4 - Penting</option><option value='5'>5 - Sangat Penting</option></select>";
                                        } else if (item.bobot == 3) {
                                            var select = "<select class='form-control' name='bobotsubkriteria[]'><option value='0'>0</option><option value='1'>1 - Tidak Penting</option><option value='2'>2 - Kurang Penting</option><option value='3' selected='selected'>3 - Cukup Penting</option><option value='4'>4 - Penting</option><option value='5'>5 - Sangat Penting</option></select>";
                                        } else if (item.bobot == 4) {
                                            var select = "<select class='form-control' name='bobotsubkriteria[]'><option value='0'>0</option><option value='1'>1 - Tidak Penting</option><option value='2'>2 - Kurang Penting</option><option value='3'>3 - Cukup Penting</option><option value='4' selected='selected'>4 - Penting</option><option value='5'>5 - Sangat Penting</option></select>";
                                        } else if (item.bobot == 5) {
                                            var select = "<select class='form-control' name='bobotsubkriteria[]'><option value='0'>0</option><option value='1'>1 - Tidak Penting</option><option value='2'>2 - Kurang Penting</option><option value='3'>3 - Cukup Penting</option><option value='4'>4 - Penting</option><option value='5' selected='selected'>5 - Sangat Penting</option></select>";
                                        }


                                        if (item.jenis == 'Benefit') {
                                            var selecta = "<select class='form-control' name='jenis[]'><option value='Benefit' selected>Benefit</option><option value='Cost'>Cost</option>";
                                        }else if (item.jenis == 'Cost') {
                                            var selecta = "<select class='form-control' name='jenis[]'><option value='Benefit'>Benefit</option><option value='Cost' selected>Cost</option>";
                                        }

                                        $('#bobotSubkriteria').append("<tr>\n\
                                                                        <td>" + item.id_kriteria + "<input value='" + item.id_kriteria + "' type='hidden' class='form-control' name='id_subkriteria[]' readonly></td>\n\
                                                                        <td>" + item.nama_alternatif + "</td>\n\
                                                                        <td>" + item.nama_kriteria + "</td>\n\
                                                                        <td>" + select + "</td>\n\
                                                                        <td>" + selecta + "</td>\n\
                                                                    </tr>");
                                    });
                                } else {
                                    $('#bobotSubkriteria').append("<tr><td colspan='4'><center>Tidak Ada Data SubKriteria Dengan Kriteria Ini</center></td></tr>");
                                }
                            },
                            failed: function (xhr, ajaxOptions, thrownError) {
                                alert(xhr.status);
                                alert(thrownError);
                                alert(xhr.responseText);
                            },
                            error: function (xhr, ajaxOptions, thrownError) {
                                alert(xhr.status);
                                alert(thrownError);
                                alert(xhr.responseText);
                            },
                            complete: function () {
                                $('#formPilihan').fadeIn(1000);
                                $('#panelBobotSubKriteria').fadeOut(1000, function () {
                                    $('#hasil_bobot_subkriteria').empty();
                                    view_bobot(id_kriteria);
                                    $('#panelBobotSubKriteria').fadeIn(1000);
                                });
                            }
                        });
                    
                });
                $('#updateBobotKriteria').click(function () {
                    var data = $('#formBobotKriteria').serialize();
                    var id_kriteria = $('#pilihanKriteria').val();
                    console.log(data+"&id_kriteria="+id_kriteria);
                    $.ajax({
                        url: '<?= base_url('C_bobot_kriteria/simpan_bobot_subkriteria') ?>',
                        data: data +"&id_kriteria="+id_kriteria,
                        type: 'post',
                        dataType: 'json',
                        cache: 'false',
                        success: function (response) {
                            console.log(response);
                            $.toast({
                                heading: 'Information',
                                text: response.message,
                                position: 'bottom-right',
                                stack: false,
                                showHideTransition: 'slide',
                                icon: response.status
                            });
                        },
                        failed: function (xhr, ajaxOptions, thrownError) {
                            alert(xhr.status);
                            alert(thrownError);
                            alert(xhr.responseText);
                        },
                        error: function (xhr, ajaxOptions, thrownError) {
                            alert(xhr.status);
                            alert(thrownError);
                            alert(xhr.responseText);
                        },
                        complete: function () {
                            $('#panelBobotSubKriteria').fadeOut(1000, function () {
                                $('#hasil_bobot_subkriteria').empty();
                                view_bobot(id_kriteria);
                                $('#panelBobotSubKriteria').fadeIn(1000);
                            });
                        }
                    });
                });
            });
            function view_bobot(id_kriteria) {
                $.ajax({
                    url: '<?= base_url('C_bobot_kriteria/lihat_bobot_subkriteria') ?>',
                    data: 'id_kriteria=' + id_kriteria,
                    dataType: 'json',
                    type: 'post',
                    cache: false,
                    success: function (response) {
                        console.log(response);
                        if (response.length > 0) {
                            $.each(response, function (i, item) {
                                $('#hasil_bobot_subkriteria').append("<tr>\n\
                                                                        <td>" + item.id_kriteria + "</td>\n\
                                                                        <td>" + item.nama_alternatif + "</td>\n\
                                                                        <td>" + item.nama_kriteria + "</td>\n\
                                                                        <td>" + item.bobot + "</td>\n\
                                                                        <td>" + item.normalisasi_bobot + "</td>\n\
                                                                    </tr>");
                            });
                        } else {
                            $('#hasil_bobot_subkriteria').append("<tr><td colspan='4'><center>Tidak Ada Data Kriteria Dengan Alternatif Ini</center></td></tr>");
                        }
                    },
                    failed: function (xhr, ajaxOptions, thrownError) {
                        alert(xhr.status);
                        alert(thrownError);
                        alert(xhr.responseText);
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        alert(xhr.status);
                        alert(thrownError);
                        alert(xhr.responseText);
                    }
                });
            }
        </script>





<?php }else if($pages=="C_data_nilai") { ?>

<script type="text/javascript">
            $(document).ready(function () {
                //Mencegah User Melakukan Submit Form dengan Menekan tombol enter
                $(window).keydown(function (event) {
                    if (event.keyCode == 13) {
                        event.preventDefault();
                        return false;
                    }
                });
                $('#pilihKriteriaEvaluasi').click(function () {
                    // var id_kriteria = $('#id_kriteria').val();
                    var tahun = $('#tahun').val();
                    var kriteria, nilai, nilai_siswa;
                    $('#resetPilihan').removeAttr('disabled');
                    $('#panelNilaiAlternatif').removeAttr('hidden');
                    $.ajax({
                        url: '<?= base_url('C_data_nilai/daftar_evaluasi') ?>',
                        data: 'tahun=' + tahun,
                        cache: false,
                        dataType: 'json',
                        type: 'post',
                        success: function (response) {
                            $('#heading').empty();
                            $('#heading').append('<td>NISN</td>');
                            $('#heading').append('<td>Nama Siswa</td>');
                            $('#heading').append('<td>Tahun</td>');
                            $('#hasilNilaiAlternatif').empty();
                            var x, y, z;
                            kriteria = response.data_kriteria;
                            nilai = response.data_nilai;
                            console.log(nilai);
                            
                            for (x = 0; x < kriteria.length; x++) {
                                $('#heading').append('<td>' + kriteria[x].nama_kriteria + '</td>');
                            }

                            $('#heading').append('<td>Edit</td>');


                            for (y = 0; y < nilai.length; y++) {
                                var output = "";
                                output += '<tr><td>' + nilai[y].nisn + '</td><td>' + nilai[y].nama + '</td><td>' + nilai[y].tahun + '</td>'; 
                                nilai_siswa = nilai[y].nilai_siswa;
                                for (z = 0; z < nilai_siswa.length; z++) {
                                    output += '<td>' + nilai_siswa[z].nilai + '</td>';
                                }
                                output += "<td><button class='editNilai btn btn-success' dt-nisn='" + nilai[y].nisn + "'>Edit &nbsp; <i class='glyphicon glyphicon-refresh'></i></button></td></tr>";
                                console.log(output);
                                $('#hasilNilaiAlternatif').append(output);
                            }
                        },
                        complete: function () {
                            $('#panelNilaiAlternatif').fadeIn(1000);
                        }
                    });
                });



                
            $('#updateDataEvaluasi').click(function () {
                    var data = $('#formEditEvaluasi').serialize();
                    $.ajax({
                        type: 'post',
                        data: data,
                        dataType: 'json',
                        cache: false,
                        url: '<?= base_url('C_data_nilai/simpan_edit') ?>',
                        success: function (response) {
                            $.toast({
                                heading: 'Information',
                                text: response.message,
                                position: 'bottom-right',
                                stack: false,
                                showHideTransition: 'slide',
                                icon: response.status
                            });
                        },
                        failed: function (xhr, ajaxOptions, thrownError) {
                            alert(xhr.status);
                            alert(thrownError);
                            alert(xhr.responseText);
                        },
                        error: function (xhr, ajaxOptions, thrownError) {
                            alert(xhr.status);
                            alert(thrownError);
                            alert(xhr.responseText);
                        },
                        complete: function () {
                            $('#panelEditEvaluasi').fadeOut(1000);
                            $('#panelNilaiAlternatif').fadeOut(1000);
                            // var id_kriteria = $('#id_kriteria').val();
                            var tahun = $('#tahun').val();
                            var kriteria, nilai, nilai_siswa;
                            $.ajax({
                                url: '<?= base_url('C_data_nilai/daftar_evaluasi') ?>',
                                data: 'tahun=' + tahun,
                                cache: false,
                                dataType: 'json',
                                type: 'post',
                                success: function (response) {
                                    $('#heading').empty();
                                    $('#heading').append('<td>NIS</td>');
                                    $('#heading').append('<td>Nama Siswa</td>');
                                    $('#hasilNilaiAlternatif').empty();
                                    var x, y, z;
                                    console.log(response);
                                    kriteria = response.data_kriteria;
                                    nilai = response.data_nilai;

                                    for (x = 0; x < kriteria.length; x++) {
                                        $('#heading').append('<td>' + kriteria[x].nama_kriteria + '</td>');
                                    }

                                    $('#heading').append('<td>Edit</td>');
                                    for (y = 0; y < nilai.length; y++) {
                                    var output = "";
                                    output += '<tr><td>' + nilai[y].nisn + '</td><td>' + nilai[y].nama + '</td>'; 
                                    nilai_siswa = nilai[y].nilai_siswa;
                                    for (z = 0; z < nilai_siswa.length; z++) {
                                        output += '<td>' + nilai_siswa[z].nilai + '</td>';
                                    }
                                    output += "<td><button class='editNilai btn btn-success' dt-nisn='" + nilai[y].nisn + "'>Edit &nbsp; <i class='glyphicon glyphicon-refresh'></i></button></td></tr>";
                                    console.log(output);
                                    $('#hasilNilaiAlternatif').append(output);
                                    }
                                },
                                complete: function () {
                                    $('#panelNilaiAlternatif').fadeIn(1000);
                                }
                            });
                        }

                    });
                });
                $('#resetPilihan').click(function(){
                    $('#panelEditEvaluasi').fadeOut(1000);
                    $('#panelNilaiAlternatif').attr('hidden', 'true');
                    $('#pilihKriteriaEvaluasi').removeAttr('disabled');
                    $('#resetPilihan').attr('disabled','true');
                    
                });
            });


            $(document).on('click', '.editNilai', function () {
                $('#panelEditEvaluasi').removeAttr('hidden');
                var output;
                var nisn = $(this).attr("dt-nisn");
                $.ajax({
                    type: 'post',
                    data: 'nisn=' + nisn,
                    dataType: 'json',
                    cache: 'false',
                    url: '<?= base_url('C_data_nilai/data_edit') ?>',
                    success: function (response) {
                        console.log(response);
                        var n = 0;
                        $.each(response, function (i, item) {
                            n++;
                            $('#dataEvaluasi').empty();
                            output += "<tr>";
                            output += "<td><input class='form-control' type='hidden' value='" + item.id + "' name='id[]'>" + n + "</td>";
                            output += "<td>" + item.nama_kriteria + "</td>";
                            output += "<td><input class='form-control' type='number' value='" + item.nilai + "' name='nilai[]'></td>";
                            output += "</tr>";
                        });
                        $('#dataEvaluasi').append(output);
                    },
                    failed: function (xhr, ajaxOptions, thrownError) {
                        alert(xhr.status);
                        alert(thrownError);
                        alert(xhr.responseText);
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        alert(xhr.status);
                        alert(thrownError);
                        alert(xhr.responseText);
                    },
                    complete: function () {
                        $('#panelEditEvaluasi').fadeIn(1000);
                    }
                });
                //TODO TOMBOL EDIT AJAX SHOW FORM
            });
        </script>
<script>
$(document).ready(function() {
    $('#tampils').DataTable({
        
    });
} );
</script>

<?php }else if($pages=="C_hasil_evaluasi") { ?>

        <script type="text/javascript">
            $(document).ready(function(){
                $('#daftarAlternatif').load('<?=base_url('C_hasil_evaluasi/table_calculate')?>');
            });
        </script>




<?php } ?>








</html>