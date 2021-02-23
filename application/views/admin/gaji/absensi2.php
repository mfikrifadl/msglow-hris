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
                                    <th>NIK</th>
                                    <th>nama</th>
                                    <th>status karyawan</th>
                                    <th>tgl_mulai_kerja</th>
                                    <th>status_kepegawaian</th>
                                    <th> jk </th>
                                    <th>  agama</th>
                                    <th>  tmpt lahir</th>
                                    <th>  tgl lahir</th>
                                    <th>  pendidikan</th>
                                    <th>  jurusan</th>
                                    <th>  gol dar</th>
                                    <th>  status kawin</th>
                                    <th>  istri/suami</th>
                                    <th>  tgl lahir</th>
                                    <th>  anak 1</th>
                                    <th>  tgl lahir</th>
                                    <th>  anak 2</th>
                                    <th>  tgl lahir</th>
                                    <th>  anak 3</th>
                                    <th>  tgl lahir</th>
                                    <th>  ktp</th>
                                    <th>  alamat asal</th>
                                    <th>  alamat sekarang</th>
                                    <th>  npwp</th>
                                    <th>  hp</th>
                                    <th>  atas nama</th>
                                    <th>  no rek</th>
                                    <th>  bank</th>
                                    <th>  cabang</th>
                                    <th>  email</th>                   
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
                              $nik = $row['A']; // Ambil data NIS
                              $nama = $row['B']; // Ambil data nama
                              $statusK = $row['C']; // Ambil data jenis kelamin
                              $tgl_mulai_kerja = $row['D']; // Ambil data alamat
                              $status_kepegawaian = $row['E']; // Ambil data NIS
                              $jk = $row['F']; // Ambil data nama
                              $agama = $row['G']; // Ambil data jenis kelamin
                              $tmpt_lahir = $row['H']; // Ambil data alamat
                              $tgl_lahir = $row['I']; // Ambil data alamat
                              $pendidikan = $row['J']; // Ambil data alamat
                              $jurusan = $row['K']; // Ambil data alamat
                              $gol_dar = $row['L']; // Ambil data alamat
                              $status_kawin = $row['M'];
                              $istri_suami = $row['N'];
                              $tgl_lahir_pas = $row['O'];
                              $anak1 = $row['P'];
                              $tgl_lahir_a1 = $row['Q'];
                              $anak2 = $row['R'];
                              $tgl_lahir_a2 = $row['S'];
                              $anak3 = $row['T'];
                              $tgl_lahir_a3 = $row['U'];
                              $ktp = $row['V'];
                              $alamat_asal = $row['W'];
                              $alamat = $row['X'];
                              $npwp = $row['Y'];
                              $hp = $row['Z'];
                              $atas_nama = $row['AA'];
                              $no_rek = $row['AB'];
                              $bank = $row['AC'];
                              $cabang = $row['AD'];
                              $email = $row['AE'];
                              // $keterangan = $row['G']; // Ambil data nama
                              // $tanggal = $row['H']; // Ambil data jenis kelamin
                              // $scan_1 = $row['I']; // Ambil data alamat
                              // $scan_2 = $row['J']; // Ambil data alamat
                              // $scan_3 = $row['K']; // Ambil data alamat
                              // $scan_4 = $row['L']; // Ambil data alamat
                              // $scan_5 = $row['M']; // Ambil data alamat

                              // Cek jika semua data tidak diisi
                              if ($nik == "" )
                                // if ($pin == "" && $nip == "" && $nama == "" && $jabatan == "" && $departemen == "" && $kantor == "" && $keterangan == "" && $tanggal == "" && $scan_1 == "" && $scan_2 == "" && $scan_3 == "" && $scan_4 == "" && $scan_5 == "")
                                continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)

                              // Cek $numrow apakah lebih dari 1
                              // Artinya karena baris pertama adalah nama-nama kolom
                              // Jadi dilewat saja, tidak usah diimport
                              if ($numrow > 1) {
                                // Validasi apakah semua data telah diisi
                                // $pin_td = (!empty($pin)) ? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
                                // $nip_td = (!empty($nip)) ? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
                                // $attlog_td = (!empty($attlog)) ? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
                                // $verify_td = (!empty($verify)) ? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
                                // $departemen_td = (!empty($departemen)) ? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
                                // $kantor_td = (!empty($kantor)) ? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
                                // $keterangan_td = (!empty($keterangan)) ? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
                                // $status_scan_td = (!empty($status_scan)) ? "" : " style='background: #E07171;'"; // Jika Jenis Kelamin kosong, beri warna merah
                                // $cloud_id_td = (!empty($cloud_id)) ? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
                                // $scan_2_td = (!empty($scan_2)) ? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah

                                // Jika salah satu data ada yang kosong
                                if ($nik == "") {
                                  $kosong++; // Tambah 1 variabel $kosong
                                }

                                echo "<tr>";
                                echo "<td>" . $nik . "</td>";
                                echo "<td>" . $nama . "</td>";
                                echo "<td>" . $statusK . "</td>";
                                echo "<td>" . $tgl_mulai_kerja . "</td>";
                                echo "<td>" . $status_kepegawaian . "</td>";
                                echo "<td>" . $jk . "</td>";
                                echo "<td>" . $agama . "</td>";
                                echo "<td>" . $tmpt_lahir . "</td>";
                                echo "<td>" . $tgl_lahir . "</td>";
                                echo "<td>" . $pendidikan . "</td>";
                                echo "<td>" . $jurusan . "</td>";
                                echo "<td>" . $gol_dar . "</td>";
                                echo "<td>" . $status_kawin . "</td>";
                                echo "<td>" . $istri_suami . "</td>";
                                echo "<td>" . $tgl_lahir_pas . "</td>";
                                echo "<td>" . $anak1 . "</td>";
                                echo "<td>" . $tgl_lahir_a1 . "</td>";
                                echo "<td>" . $anak2 . "</td>";
                                echo "<td>" . $tgl_lahir_a2 . "</td>";
                                echo "<td>" . $anak3 . "</td>";
                                echo "<td>" . $tgl_lahir_a3 . "</td>";
                                echo "<td>" . $ktp . "</td>";
                                echo "<td>" . $alamat_asal . "</td>";
                                echo "<td>" . $alamat . "</td>";
                                echo "<td>" . $npwp . "</td>";
                                echo "<td>" . $hp . "</td>";
                                echo "<td>" . $atas_nama . "</td>";
                                echo "<td>" . $no_rek . "</td>";
                                echo "<td>" . $bank . "</td>";
                                echo "<td>" . $cabang . "</td>";
                                echo "<td>" . $email . "</td>";


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

                            <div class="col-sm-12">
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
</script>