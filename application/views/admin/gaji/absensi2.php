<?php
if ($action == "edit") {
  foreach ($field as $column) {
    $cIdAbsensi       =   $column['id_absensi'];
    $cIdStatusAbsensi =   $column['id_status_absensi'];
    $cIdPegawai       =   $column['id_pegawai'];
    $dTglAbsen        =   String2Date($column['tanggal_absen']);
    $cKeterangan      =   $column['keterangan'];
    $cIconButton      =   "refresh";
    $cValueButton     =   "Update Data";
  }

  $cAction = "Update/" . $cIdAbsensi . "";
} else {
  $cIdAbsensi         =   "";
  $cIdStatusAbsensi   =   "";
  $cIdPegawai         =   "";
  $dTglAbsen          =   "";
  $cKeterangan        =   "";
  $cIconButton        =   "save";
  $cValueButton       =   "Save Data";
  $cAction            =   "Insert";
}
?>
<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">


  <!-- begin:: Content -->
  <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

    <!--Begin::Dashboard 6-->
    <div class="row">
      <div class="col-sm-12">
        <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
          <li class="breadcrumb-item"><?= $menu ?></li>
          <li class="breadcrumb-item active"><?= $file ?></li>
        </ul>
      </div>
    </div>
    <!-- /.DataTable -->

    <div class="row">
      <div class="col-12">

        <!--begin:: Widgets/Order Statistics-->
        <div class="kt-portlet">

          <!--begin::Accordion-->

          <div class="accordion accordion-solid accordion-toggle-plus" id="accordionInputData">
            <div class="card">
              <div class="card-header" id="headingInputData">
                <div class="card-title btn btn-primary text-info" data-toggle="collapse" data-target="#collapseInputData" aria-expanded="true" aria-controls="collapseInputData">
                  <strong> Input Data Absensi </strong>
                </div>
              </div>
              <div id="collapseInputData" class="collapse show" aria-labelledby="headingInputData" data-parent="#accordionInputData">
                <!-- <div class="card-body"> -->

                <div class="kt-portlet__body">

                  <div class="col-md-12 col-sm-12">

                    <form method="post" action="<?php echo base_url("cek_absen2/form"); ?>" enctype="multipart/form-data">
                      <div class="row">
                        <div class="col-12">
                          <div class="form-group">
                            <!-- Buat sebuah tag form dan arahkan action nya ke controller ini lagi -->

                            <!--
                                              -- Buat sebuah input type file
                                              -- class pull-left berfungsi agar file input berada di sebelah kiri
                                              -->
                            <div class="form-group">
                              <label>Import File Excel </label>
                              <div class="input-group">
                                <input type="file" name="file" class="form-control">
                                <div class="input-group-append">
                                  <button type="submit" name="preview" class="btn btn-success input-group-text">
                                    <i class="la la-play" style="color: white;"> RUN</i>
                                  </button>
                                </div>
                              </div>
                            </div>
                            <!-- <div class="form-group">
                              <label>File Browser</label>
                              <div></div>
                              <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                              </div>
                            </div> -->
                            <!--
                                            -- BUat sebuah tombol submit untuk melakukan preview terlebih dahulu data yang akan di import
                                            -->
                            <!-- <input type="submit" name="preview" value="Preview"> -->

                          </div>
                        </div>

                      </div><!-- /.row -->
                    </form>

                    <div class="row">
                      <div class="col-sm-12 text-center">

                        <?php
                        if (isset($_POST['preview'])) { // Jika user menekan tombol Preview pada form
                          if (isset($upload_error)) { // Jika proses upload gagal
                            echo "<div style='color: red;'>" . $upload_error . "</div>"; // Muncul pesan error upload
                            //die; // stop skrip
                          } else {

                            // Buat sebuah tag form untuk proses import data ke database
                            echo "<form method='post' action='" . base_url("cek_absen2/import") . "'>";

                            // Buat sebuah div untuk alert validasi kosong
                        ?>
                            <div style="color: red;" id="kosong">
                              <span id="jumlah_kosong"> </span>
                            </div>

                            <?php
                            echo "<table class='table table-striped table-bordered' id='DataTable'>
                            <thead>
                                    <tr>
                                    <th>No</th>
                                    <th>Cloud_ID</th>
                                    <th>PIN</th>
                                    <th>Nama_Karyawan</th>
                                    <th>Tanggal_Scan</th>
                                    <th>Jam_Scan</th>
                                    <th>Verifikasi</th>
                                    <th>Tipe_Scan</th>
                                    </tr>
                                    </thead>
                                    <tbody>";                            

                            $numrow = 0;
                            $kosong = 0;

                            // Lakukan perulangan dari data yang ada di excel
                            // $sheet adalah variabel yang dikirim dari controller
                            foreach ($sheet as $row) {
                              // Ambil data pada excel sesuai Kolom
                              $cloud_id = $row['A']; // Ambil data NIS
                              $pin = $row['B']; // Ambil data nama
                              $nama_karyawan = $row['C']; // Ambil data jenis kelamin
                              $tgl_scan = $row['D']; // Ambil data alamat
                              $jam_scan = $row['E']; // Ambil data NIS
                              $verifikasi = $row['F']; // Ambil data nama
                              $tipe_scan = $row['G']; // Ambil data jenis kelamin

                              // Cek jika semua data tidak diisi
                              if ($pin == "" )
                                if ($cloud_id == "" && $pin == "" && $nama_karyawan == "" && $tgl_scan == "" && $jam_scan == "" && $verifikasi == "" && $tipe_scan == "")
                                continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)

                              // Cek $numrow apakah lebih dari 1
                              // Artinya karena baris pertama adalah nama-nama kolom
                              // Jadi dilewat saja, tidak usah diimport
                              if ($numrow > 0) {
                                //Validasi apakah semua data telah diisi
                                $cloud_id_td = (!empty($cloud_id)) ? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
                                $pin_td = (!empty($pin)) ? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
                                $nama_karyawan_td = (!empty($nama_karyawan)) ? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
                                $tgl_scan_td = (!empty($tgl_scan)) ? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
                                $jam_scan_td = (!empty($jam_scan)) ? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
                                $verifikasi_td = (!empty($verifikasi)) ? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
                                $tipe_scan_td = (!empty($tipe_scan)) ? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah

                                // Jika salah satu data ada yang kosong
                                if ($cloud_id == "" || $pin == "" || $nama_karyawan == "" || $tgl_scan == "" || $jam_scan == "" || $verifikasi == "" || $tipe_scan == "") {
                                  $kosong++; // Tambah 1 variabel $kosong
                                }

                                echo "<tr>";
                                echo "<td>" . $numrow . "</td>";
                                echo "<td>" . $cloud_id . "</td>";
                                echo "<td>" . $pin . "</td>";
                                echo "<td>" . $nama_karyawan . "</td>";
                                echo "<td>" . $tgl_scan . "</td>";
                                echo "<td>" . $jam_scan . "</td>";
                                echo "<td>" . $verifikasi . "</td>";
                                echo "<td>" . $tipe_scan . "</td>"; 
                                echo "</tr>";                                
                              }

                              $numrow++; // Tambah 1 setiap kali looping

                            }

                            $numLoop = $numrow - 1;
                            echo "<input type='number' name='numrow' value='$numLoop' hidden>";
                           // echo $numLoop;
                            echo "</tbody></table>";

                            // Cek apakah variabel kosong lebih dari 0
                            // Jika lebih dari 0, berarti ada data yang masih kosong
                            if ($kosong > 0) {
                              // echo "jumlah : $kosong";
                            ?>
                              <script>
                                document.getElementById("jumlah_kosong").innerHTML = "Semua data belum diisi, Ada <?php echo $kosong; ?> data yang belum diisi.";
                              </script>
                        <?php
                            } else {
                              // Buat sebuah tombol untuk mengimport data ke database
                              echo "
                                            <hr>

                                            
                                            <div class='row'>
                                              <div class='col-sm-6 text-right'>
                                                <button class='btn btn-success' type='submit' name='import'>Import</button>
                                              </div>
                                              <div class='col-sm-6 text-left'>
                                                <a class='btn btn-danger' href='" . base_url('cek_absen') . "'>Cancel</a>
                                              </div>
                                            </div>

                                            
                                            ";
                            }

                            echo "</form>";
                          }
                        }
                        ?>

                      </div>
                    </div>

                    <!--/.box -->
                  </div> <!-- /.col -->

                  <!-- </form> -->
                  <!-- </form> -->

                </div>

              </div>
              <!-- </div> -->
            </div>
          </div>

          <!--end::Accordion-->

        </div>
      </div>
    </div>

    <div class=" row">
      <div class="col-12">

        <!--begin:: Widgets/Order Statistics-->
        <div class="kt-portlet">

          <!--begin::Accordion-->

          <div class="accordion accordion-solid accordion-toggle-plus" id="accordionTableAbsensi">
            <div class="card">
              <div class="card-header" id="headingTableAbsensi">
                <div class="card-title btn btn-primary text-info" data-toggle="collapse" data-target="#collapseTableAbsensi" aria-expanded="true" aria-controls="collapseTableAbsensi">
                  <strong> Data Rekap Absensi </strong>
                </div>
              </div>
              <div id="collapseTableAbsensi" class="collapse show" aria-labelledby="headingTableAbsensi" data-parent="#accordionTableAbsensi">
                <!-- <div class="card-body"> -->

                <div class="row">
                  <div class="col-xl-12">
                    <!-- <div id="show_absen"></div> -->

                    <div class="kt-portlet kt-portlet--height-fluid">
                      <div class="kt-portlet">
                        <div class="kt-portlet__body">



                          <?php
                          if ($this->session->userdata('level') == 3 || $this->session->userdata('level') == 1) {
                          ?>
                            <form method="post" enctype="multipart/form-data" target="blank" action="<?= site_url('Cek_absen_act/cetak_absensi/') ?>">
                              <div class="row">
                                <div class="col-6">
                                  <div class="form-group row">
                                    <label class="col-form-label col-lg-6 col-sm-12">Tanggal Absensi Yang Di Cetak</label>
                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                      <div class="input-daterange input-group">
                                        <input type="date" name="dTgl_cetak" id="dTgl_cetak" class="form-control" data-date-format="dd-mm-yyyy" required>
                                        <button type="button" class="btn btn-outline-success btn-md btn-icon btn-icon-md" onclick="getDataAbsenImportPerHari();" value="Search">
                                          <i class="flaticon2-refresh"></i>
                                        </button>
                                      </div>
                                      <span class="form-text text-muted">date selection</span>
                                    </div>
                                  </div>
                                </div>

                                <div class="col-6">
                                  <div class='col-sm-12 text-right'>

                                    <button class='btn btn-success' name="PDF" type='submit' value="PDF">
                                      <i class="flaticon2-google-drive-file"></i>Cetak PDF
                                    </button>

                                    <button class='btn btn-brand' name="EXCEL" type='submit' value="EXCEL">
                                      <i class="fa fa-file-export"></i>Export Excel
                                    </button>

                                  </div>
                                </div>

                              </div>
                            </form>
                          <?php
                          } else {
                          }
                          //elseif ($this->session->userdata('level') == 1) {
                          ?>
                          <!-- <div class="form-group row">
                                  <label class="col-form-label col-lg-4 col-sm-12">Tanggal Absensi Yang Di Cetak</label>
                                  <div class="col-lg-8 col-md-12 col-sm-12">
                                    <div class="input-daterange input-group">
                                      <input type="date" name="dTgl_cetak" id="dTgl_cetak" class="form-control" data-date-format="dd-mm-yyyy" required>
                                      <div class="input-group-append">
                                        <span class="input-group-text"><i class="la la-ellipsis-h"></i></span>
                                      </div>
                                      <input type="date" name="dTgl_cetak_end" id="dTgl_cetak_end" class="form-control" data-date-format="dd-mm-yyyy" placeholder="Tanggal Absensi" required>
                                      <div class="input-group-append">
                                        <span class="input-group-text"></span>
                                      </div>
                                      <button type="button" class="btn btn-outline-success btn-md btn-icon btn-icon-md" onclick="getDataAbsenImport();" value="Search">
                                        <i class="flaticon2-refresh"></i>
                                      </button>
                                    </div>
                                    <span class="form-text text-muted">date range selection</span>
                                  </div>
                                </div> -->
                          <?php
                          // } 

                          ?>




                          <br />
                          <div id="data_absensi_import"></div>
                          <br />


                        </div>
                      </div>
                    </div>

                  </div>
                </div>




              </div>
              <!-- </div> -->
            </div>
          </div>

          <!--end::Accordion-->

        </div>
      </div>
    </div>




    <div class="row">



    </div>


  </div>
</div>

<script type="text/javascript">
  function showDataAbsen() {
    $('.loding').show();
    $.ajax({
      type: "GET",
      url: "<?= site_url('transaksi/tb_absensi') ?>",
      cache: false,
      beforeSend: function() {
        $('#show_absen').html("<div align='center'><img  width='200' height='200' src='<?= base_url() ?>assets/dist/img/loading5.gif' /></div> ");
      },
      success: function(msg) {
        $("#show_absen").html(msg);
      }
    });
  }

  function GetDataAbsensi() {
    var dTgl = $('#dTgl').val();
    var dTgl_end = $('#dTgl_end').val();
    // alert(dTgl);
    if (dTgl == "") {
      new PNotify({
        text: 'Pilih Tanggal Absensi terlebih dahulu!',
        animation: 'slide',
        type: 'warning'
      });
    } else if (dTgl_end == "") {
      new PNotify({
        text: 'Pilih Tanggal Absensi terlebih dahulu!',
        animation: 'slide',
        type: 'warning'
      });
    } else {
      $.ajax({
        type: "POST",
        data: "dTgl=" + dTgl +
          "&dTgl_end=" + dTgl_end,
        url: "<?= site_url('cek_absen/get_data_absensi') ?>",
        cache: false,
        beforeSend: function() {
          $('#data_absensi').html("<div align='center'><img  width='200' height='200' src='<?= base_url() ?>assets/dist/img/loading5.gif' /></div> ");
        },
        success: function(msg) {
          $("#data_absensi").html(msg);
        }
      });
    }
  }

  function GetDataAbsensiPerHari() {
    var dTgl = $('#dTgl').val();
    // alert(dTgl);
    if (dTgl == "") {
      new PNotify({
        text: 'Pilih Tanggal Absensi terlebih dahulu!',
        animation: 'slide',
        type: 'warning'
      });
    } else {
      $.ajax({
        type: "POST",
        data: "dTgl=" + dTgl,
        url: "<?= site_url('cek_absen/get_data_absensi_per_hari') ?>",
        cache: false,
        beforeSend: function() {
          $('#data_absensi').html("<div align='center'><img  width='200' height='200' src='<?= base_url() ?>assets/dist/img/loading5.gif' /></div> ");
        },
        success: function(msg) {
          $("#data_absensi").html(msg);
        }
      });
    }
  }

  function getDataAbsenImport() {
    var dTgl_cetak = $('#dTgl_cetak').val();
    var dTgl_cetak_end = $('#dTgl_cetak_end').val();
    // alert(dTgl);
    if (dTgl_cetak == "") {
      new PNotify({
        text: 'Pilih Tanggal Absensi terlebih dahulu!',
        animation: 'slide',
        type: 'warning'
      });
    } else if (dTgl_cetak_end == "") {
      new PNotify({
        text: 'Pilih Tanggal Absensi terlebih dahulu!',
        animation: 'slide',
        type: 'warning'
      });
    } else {
      $.ajax({
        type: "POST",
        data: "dTgl_cetak=" + dTgl_cetak +
          "&dTgl_cetak_end=" + dTgl_cetak_end,
        url: "<?= site_url('cek_absen/get_data_absensi_import') ?>",
        cache: false,
        beforeSend: function() {
          $('#data_absensi_import').html("<div align='center'><img  width='200' height='200' src='<?= base_url() ?>assets/dist/img/loading5.gif' /></div> ");
        },
        success: function(msg) {
          $("#data_absensi_import").html(msg);
        }
      });
    }
  }

  function getDataAbsenImportPerHari() {
    var dTgl_cetak = $('#dTgl_cetak').val();
    //alert(dTgl_cetak);
    if (dTgl_cetak == "") {
      new PNotify({
        text: 'Pilih Tanggal Absensi terlebih dahulu!',
        animation: 'slide',
        type: 'warning'
      });
    } else {
      $.ajax({
        type: "POST",
        data: "dTgl_cetak=" + dTgl_cetak,
        url: "<?= site_url('cek_absen/get_data_absensi_import_per_hari') ?>",
        cache: false,
        beforeSend: function() {
          $('#data_absensi_import').html("<div align='center'><img  width='200' height='200' src='<?= base_url() ?>assets/dist/img/loading5.gif' /></div> ");
        },
        success: function(msg) {
          $("#data_absensi_import").html(msg);
        }
      });
    }
  }

  function run() {

    var dTgl = $('#dTgl').val();
    var dTgl_end = $('#dTgl_end').val();
    // alert(dTglAbsensi);
    if (dTgl == "") {
      new PNotify({
        text: 'Pilih Tanggal Absensi terlebih dahulu!',
        animation: 'slide',
        type: 'warning'
      });
    } else if (dTgl_end == "") {
      new PNotify({
        text: 'Pilih Tanggal Absensi terlebih dahulu!',
        animation: 'slide',
        type: 'warning'
      });
    } else {
      $.ajax({
        type: "POST",
        data: "dTgl=" + dTgl +
          "&dTgl_end=" + dTgl_end,
        url: "<?= site_url('cek_absen/import') ?>",
        cache: false,
        beforeSend: function() {
          $('#loading').html("<div align='center'><img  width='200' height='200' src='<?= base_url() ?>assets/dist/img/loading5.gif' /></div> ");
        },
        success: function(msg) {
          new PNotify({
            // title: 'Success!',
            text: 'Berhasil Compile Data Absensi.',
            type: 'success'
          });
          $('#dTgl').val("");
          $('#dTgl').focus()
          $('#loading').html("")

          //window.location.href = "<?= site_url('gaji/absensi_pegawai') ?>";
        }
      });
    }
  }

  function updateDataAbsen(id) {

    var ket_lain = $('#ket_lain_' + id).val();
    var dTgl_cetak = $('#dTgl_cetak').val();
    var nik_ket_update = $('#nik_ket_update_' + id).val();
    //alert(id+"-"+ket_lain+"-"+dTgl_cetak+"-"+nik_ket_update);

    var values = {
      'id': id,
      'dTgl_cetak': dTgl_cetak,
      'nik_ket_update': nik_ket_update,
      'ket_lain': ket_lain
    }

    $.ajax({
      url: "<?php echo base_url() . 'cek_absen_act/update_absen' ?>",
      type: "POST",
      data: values,
      success: function(data) {
        //option pesan berhasil send data
        // alert (tanggal);
      },
      error: function(data, status, error) {
        alert(data.responseText);
      }
    });
  }

  function update_ket(id) {
    var ket = $('#ket_' + id).val();
    var idAbs = $('#id_' + id).val();
    var dTgl_cetak = $('#dTgl_cetak').val();
    var nik_ket_update = $('#nik_ket_update_' + id).val();
    var values = {
      'id': id,
      'dTgl_cetak': dTgl_cetak,
      'nik_ket_update': nik_ket_update,
      'ket': ket
    };
    //alert(id+"-"+ket+"-"+dTgl_cetak+"-"+nik_ket_update);  
    if (ket == "Revisi Approval" || ket == "Revisi Approval Manager") {
      $('#rev_manager_' + id).attr('style', 'background-color: red');
      $('#rev_manager1_' + id).attr('style', 'background-color: red');
    } else {
      $('#rev_manager_' + id).attr('style', 'background-color: none');
      $('#rev_manager1_' + id).attr('style', 'background-color: none');
    }
    if (ket == "") {
      new PNotify({
        text: 'Pilih Keterangan terlebih dahulu!',
        animation: 'slide',
        type: 'warning'
      });
    } else {
      $.ajax({
        url: "<?= base_url() . 'cek_absen_act/update_absen_keterangan' ?>",
        type: "POST",
        data: values,
        success: function(data) {
          new PNotify({
            // title: 'Success!',
            text: 'Berhasil Update Keterangan Data Absensi.',
            type: 'success'
          });
          //option pesan berhasil send data
          // alert (tanggal);
        },
        error: function(data, status, error) {
          alert(data.responseText);
        }
      });
    }
  }

  function approvement(id) {

    var keterangan = $('#ket_abs_temp_' + id).val();
    var ket_lain = $('#ket_abs_lain_temp_' + id).val();
    var dTgl_cetak = $('#dTgl_cetak').val();
    var dTgl_cetak_end = $('#dTgl_cetak_end').val();
    //alert(id+keterangan+ket_lain+dTgl_cetak+dTgl_cetak_end);

    var values = {
      'id': id,
      'ket_lain': ket_lain,
      'keterangan': keterangan,
      'dTgl_cetak': dTgl_cetak,
      'dTgl_cetak_end': dTgl_cetak_end
    }

    $.ajax({
      url: "<?= base_url() . 'cek_absen_act/approvement_update' ?>",
      type: "POST",
      data: values,
      success: function(data) {
        //option pesan berhasil send data
        new PNotify({
          // title: 'Success!',
          text: 'Berhasil Approve Data Absensi.',
          type: 'success'
        });
      },
      error: function(data, status, error) {
        alert(data.responseText);
      }
    });
  }

  function reject(id) {
    //alert(id);

    var values = {
      'id': id,
    }

    $.ajax({
      url: "<?= base_url() . 'cek_absen_act/reject_update' ?>",
      type: "POST",
      data: values,
      success: function(data) {
        //option pesan berhasil send data
        new PNotify({
          // title: 'Success!',
          text: 'Berhasil Reject Data Absensi.',
          type: 'success'
        });

      },
      error: function(data, status, error) {
        alert(data.responseText);
      }
    });
  }

  function cetak_pdf() {

    var dTgl_cetak = $('#dTgl_cetak').val();
    var dTgl_cetak_end = $('#dTgl_cetak_end').val();
    //alert(dTgl_cetak + dTgl_cetak_end);
    if (dTgl_cetak == "") {
      new PNotify({
        text: 'Pilih Tanggal Absensi terlebih dahulu!',
        animation: 'slide',
        type: 'warning'
      });
    } else if (dTgl_cetak_end == "") {
      new PNotify({
        text: 'Pilih Tanggal Absensi terlebih dahulu!',
        animation: 'slide',
        type: 'warning'
      });
    } else {
      $.ajax({
        type: "POST",
        data: "dTgl_cetak=" + dTgl_cetak +
          "&dTgl_cetak_end=" + dTgl_cetak_end,
        url: "<?= site_url('cek_absen_act/cetak_absensi') ?>",
        cache: false,
        beforeSend: function() {
          $('#loading').html("<div align='center'><img  width='200' height='200' src='<?= base_url() ?>assets/dist/img/loading5.gif' /></div> ");
        },
        success: function(msg) {
          new PNotify({
            // title: 'Success!',
            text: 'Berhasil Compile Data Absensi.',
            type: 'success'
          });
          $('#dTgl_cetak').val("");
          $('#dTgl_cetak').focus()
          $('#loading').html("")

          //window.location.href = "<?= site_url('gaji/absensi_pegawai') ?>";
        }
      });
    }
  }
</script>