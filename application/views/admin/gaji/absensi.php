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

                    <form method="post" action="<?php echo base_url("cek_absen/form"); ?>" enctype="multipart/form-data">
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
                            echo "<form method='post' action='" . base_url("cek_absen/import") . "'>";

                            // Buat sebuah div untuk alert validasi kosong
                        ?>
                            <div style="color: red;" id="kosong">
                              <span id="jumlah_kosong"> </span>
                            </div>

                            <?php
                            echo "<table class='table table-striped table-bordered' id='DataTable'>
                            <thead>
                                    <tr>
                                    <th>PIN</th>
                                    <th>NIP</th>
                                    <th>Nama</th>
                                    <th>Jabatan</th>
                                    <th>Departemen</th>
                                    <th>Kantor</th>
                                    <th>Tanggal</th>
                                    <th>Scan 1</th>
                                    <th>Scan 2</th>
                                    <th>Scan 3</th>
                                    <th>Scan 4</th>
                                    <th>Scan 5</th>
                                    </tr>
                                    </thead>
                                    <tbody>";

                            // echo "<table class='table table-striped table-bordered' id='DataTable'>
                            //               <thead>
                            //                       <tr>
                            //                       <th>PIN</th>
                            //                       <th>NIP</th>
                            //                       <th>Nama</th>
                            //                       <th>Jabatan</th>
                            //                       <th>Departemen</th>
                            //                       <th>Kantor</th>
                            //                       <th>Keterangan</th>
                            //                       <th>Tanggal</th>
                            //                       <th>Scan 1</th>
                            //                       <th>Scan 2</th>
                            //                       <th>Scan 3</th>
                            //                       <th>Scan 4</th>
                            //                       <th>Scan 5</th>
                            //                       </tr>
                            //                       </thead>
                            //                       <tbody>";

                            $numrow = 1;
                            $kosong = 0;

                            // Lakukan perulangan dari data yang ada di excel
                            // $sheet adalah variabel yang dikirim dari controller
                            foreach ($sheet as $row) {
                              // Ambil data pada excel sesuai Kolom
                              $pin = $row['A']; // Ambil data NIS
                              $nip = $row['B']; // Ambil data nama
                              $nama = $row['C']; // Ambil data jenis kelamin
                              $jabatan = $row['D']; // Ambil data alamat
                              $departemen = $row['E']; // Ambil data NIS
                              $kantor = $row['F']; // Ambil data nama

                              $tanggal = $row['G']; // Ambil data jenis kelamin
                              $scan_1 = $row['H']; // Ambil data alamat
                              $scan_2 = $row['I']; // Ambil data alamat
                              $scan_3 = $row['J']; // Ambil data alamat
                              $scan_4 = $row['K']; // Ambil data alamat
                              $scan_5 = $row['L']; // Ambil data alamat

                              // $keterangan = $row['G']; // Ambil data nama
                              // $tanggal = $row['H']; // Ambil data jenis kelamin
                              // $scan_1 = $row['I']; // Ambil data alamat
                              // $scan_2 = $row['J']; // Ambil data alamat
                              // $scan_3 = $row['K']; // Ambil data alamat
                              // $scan_4 = $row['L']; // Ambil data alamat
                              // $scan_5 = $row['M']; // Ambil data alamat

                              // Cek jika semua data tidak diisi
                              if ($pin == "" && $nip == "" && $nama == "" && $jabatan == "" && $departemen == "" && $kantor == "" && $tanggal == "" && $scan_1 == "" && $scan_2 == "" && $scan_3 == "" && $scan_4 == "" && $scan_5 == "")
                                // if ($pin == "" && $nip == "" && $nama == "" && $jabatan == "" && $departemen == "" && $kantor == "" && $keterangan == "" && $tanggal == "" && $scan_1 == "" && $scan_2 == "" && $scan_3 == "" && $scan_4 == "" && $scan_5 == "")
                                continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)

                              // Cek $numrow apakah lebih dari 1
                              // Artinya karena baris pertama adalah nama-nama kolom
                              // Jadi dilewat saja, tidak usah diimport
                              if ($numrow > 1) {
                                // Validasi apakah semua data telah diisi
                                $pin_td = (!empty($pin)) ? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
                                // $nip_td = (!empty($nip)) ? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
                                $nama_td = (!empty($nama)) ? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
                                $jabatan_td = (!empty($jabatan)) ? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
                                // $departemen_td = (!empty($departemen)) ? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
                                // $kantor_td = (!empty($kantor)) ? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
                                // $keterangan_td = (!empty($keterangan)) ? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
                                $tanggal_td = (!empty($tanggal)) ? "" : " style='background: #E07171;'"; // Jika Jenis Kelamin kosong, beri warna merah
                                // $scan_1_td = (!empty($scan_1)) ? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
                                // $scan_2_td = (!empty($scan_2)) ? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah

                                // Jika salah satu data ada yang kosong
                                if ($pin == "" or $nama == "" or $jabatan == "" or $tanggal == "") {
                                  $kosong++; // Tambah 1 variabel $kosong
                                }

                                echo "<tr>";
                                echo "<td" . $pin_td . ">" . $pin . "</td>";
                                echo "<td>" . $nip . "</td>";
                                echo "<td" . $nama_td . ">" . $nama . "</td>";
                                echo "<td" . $jabatan_td . ">" . $jabatan . "</td>";
                                echo "<td>" . $departemen . "</td>";
                                echo "<td>" . $kantor . "</td>";
                                echo "<td" . $tanggal_td . ">" . $tanggal . "</td>";
                                echo "<td>" . $scan_1 . "</td>";
                                echo "<td>" . $scan_2 . "</td>";
                                echo "<td>" . $scan_3 . "</td>";
                                echo "<td>" . $scan_4 . "</td>";
                                echo "<td>" . $scan_5 . "</td>";
                                echo "</tr>";

                                // echo "<tr>";
                                // echo "<td" . $pin_td . ">" . $pin . "</td>";
                                // echo "<td>" . $nip . "</td>";
                                // echo "<td" . $nama_td . ">" . $nama . "</td>";
                                // echo "<td" . $jabatan_td . ">" . $jabatan . "</td>";
                                // echo "<td>" . $departemen . "</td>";
                                // echo "<td>" . $kantor . "</td>";
                                // echo "<td>" . $keterangan . "</td>";
                                // echo "<td" . $tanggal_td . ">" . $tanggal . "</td>";
                                // echo "<td>" . $scan_1 . "</td>";
                                // echo "<td>" . $scan_2 . "</td>";
                                // echo "<td>" . $scan_3 . "</td>";
                                // echo "<td>" . $scan_4 . "</td>";
                                // echo "<td>" . $scan_5 . "</td>";
                                // echo "</tr>";
                              }

                              $numrow++; // Tambah 1 setiap kali looping

                            }
                            echo "<input type='number' name='numrow' value='$numrow' hidden>";

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

    <div class="row">
      <div class="col-12">

        <!--begin:: Widgets/Order Statistics-->
        <div class="kt-portlet">

          <!--begin::Accordion-->

          <div class="accordion accordion-solid accordion-toggle-plus" id="accordionTableAbsensi">
            <div class="card">
              <div class="card-header" id="headingTableAbsensi">
                <div class="card-title btn btn-primary text-info" data-toggle="collapse" data-target="#collapseTableAbsensi" aria-expanded="true" aria-controls="collapseTableAbsensi">
                  <strong> Data Table Absensi </strong>
                </div>
              </div>
              <div id="collapseTableAbsensi" class="collapse show" aria-labelledby="headingTableAbsensi" data-parent="#accordionTableAbsensi">
                <!-- <div class="card-body"> -->

                <div class="kt-portlet__body">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="nav-tabs-custom">

                        <div class="tab-content ">
                          <div class="row">
                            <div class="col-sm-1 text-right">
                              <strong>Bulan</strong>
                            </div>

                            <div class="col-sm-3 text-left">
                              <select name="bulan" id="bulan_absensi" class="form-control comboBox">
                                <option></option>
                                <option value="1">Januari</option>
                                <option value="2">Februari</option>
                                <option value="3">Maret</option>
                                <option value="4">April</option>
                                <option value="5">Mei</option>
                                <option value="6">Juni</option>
                                <option value="7">Juli</option>
                                <option value="8">Agustus</option>
                                <option value="9">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                              </select>
                            </div>

                            <div class="col-sm-1 text-right">
                              <strong>Tahun</strong>
                            </div>

                            <div class="col-sm-3 text-left">
                              <select name="tahun" id="tahun_absensi" class="form-control comboBox">
                                <option></option>
                                <option value="2020">2020</option>
                              </select>
                            </div>

                            <div class="col-sm-2">
                              <button type="button" onclick="return showAbsen();" class="btn btn-primary btn-flat"><i class="fa fa-search"></i></button>
                            </div>
                            <div class="col-sm-2">
                              <button type="button" onclick="return showDataAbsen();" class="btn btn-success btn-flat">Show Data Absen</button>
                            </div>

                          </div>
                          <br />
                          <div class="row">
                            <div class="col-xl-12 text-center">
                              <div id="show_absen"></div>
                            </div>
                          </div>

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



  // function showAbsen() {
  //   var cBulan = $('#bulan_absensi').val();
  //   var cTahun = $('#tahun_absensi').val();
  //   $.ajax({
  //     type: "GET",
  //     data: "cBulan=" + cBulan +
  //       "&cTahun=" + cTahun,
  //     url: "http://36.89.27.201/sips/Administrator/Transaksi/tampilkan_data_absen/",
  //     cache: false,
  //     beforeSend: function() {
  //       $('#show_absen').html("<div align='center'><img  width='20' height='20' src='<?= base_url() ?>assets/dist/img/bx_loader.gif' /></div> ");
  //     },
  //     success: function(msg) {
  //       $("#show_absen").html(msg);
  //     }
  //   });
  // }
</script>