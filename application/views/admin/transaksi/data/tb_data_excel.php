    <!-- DATA TABLES -->
    <!-- <link href="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" /> -->
    <link href="<?php echo base_url(); ?>assets2/plugins/custom/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets2/plugins/custom/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets2/plugins/custom/datatables.net-autofill-bs4/css/autoFill.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets2/plugins/custom/datatables.net-colreorder-bs4/css/colReorder.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets2/plugins/custom/datatables.net-fixedcolumns-bs4/css/fixedColumns.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets2/plugins/custom/datatables.net-fixedheader-bs4/css/fixedHeader.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets2/plugins/custom/datatables.net-keytable-bs4/css/keyTable.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets2/plugins/custom/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets2/plugins/custom/datatables.net-rowgroup-bs4/css/rowGroup.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets2/plugins/custom/datatables.net-rowreorder-bs4/css/rowReorder.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets2/plugins/custom/datatables.net-scroller-bs4/css/scroller.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets2/plugins/custom/datatables.net-select-bs4/css/select.bootstrap4.min.css" rel="stylesheet" type="text/css" />

   
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
                                                  <th>Keterangan</th>
                                                  <th>Tanggal</th>
                                                  <th>Scan 1</th>
                                                  <th>Scan 2</th>
                                                  <th>Scan 3</th>
                                                  <th>Scan 4</th>
                                                  <th>Scan 5</th>
                                                  </tr>
                                                  </thead>
                                                  <tbody>";

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
                            $keterangan = $row['G']; // Ambil data nama
                            $tanggal = $row['H']; // Ambil data jenis kelamin
                            $scan_1 = $row['I']; // Ambil data alamat
                            $scan_2 = $row['J']; // Ambil data alamat
                            $scan_3 = $row['K']; // Ambil data alamat
                            $scan_4 = $row['L']; // Ambil data alamat
                            $scan_5 = $row['M']; // Ambil data alamat

                            // Cek jika semua data tidak diisi
                            if ($pin == "" && $nip == "" && $nama == "" && $jabatan == "" && $departemen == "" && $kantor == "" && $keterangan == "" && $tanggal == "" && $scan_1 == "" && $scan_2 == "" && $scan_3 == "" && $scan_4 == "" && $scan_5 == "")
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
                                echo "<td" . $nip_td . ">" . $nip . "</td>";
                                echo "<td" . $nama_td . ">" . $nama . "</td>";
                                echo "<td" . $jabatan_td . ">" . $jabatan . "</td>";
                                echo "<td" . $departemen_td . ">" . $departemen . "</td>";
                                echo "<td" . $kantor_td . ">" . $kantor . "</td>";
                                echo "<td" . $keterangan_td . ">" . $keterangan . "</td>";
                                echo "<td" . $tanggal_td . ">" . $tanggal . "</td>";
                                echo "<td>" . $scan_1 . "</td>";
                                echo "<td>" . $scan_2 . "</td>";
                                echo "<td>" . $scan_3 . "</td>";
                                echo "<td>" . $scan_4 . "</td>";
                                echo "<td>" . $scan_5 . "</td>";
                                echo "</tr>";
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

    <!--begin::Modal-->
    <div class="modal fade" id="operator" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel"> <strong> View Data Pegawai </strong> </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="la la-remove"></span>
                    </button>
                </div>
                <form class="kt-form kt-form--fit kt-form--label-right">
                    <div class="modal-body">

                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--end::Modal-->

    <!-- <div class="modal fade bs-example-modal-lg" id="operator" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header bg-red">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true" class="la la-remove"></span>
            </button>
            <h5 class="modal-title" id="myModalLabel">View Data Pegawai</h5>
          </div>
          <div class="modal-body">
          </div>
        </div>
      </div>
    </div> -->   


    <!-- DATA TABES SCRIPT -->
    <!-- <script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script> -->
    <link href="<?php echo base_url(); ?>assets2/plugins/custom/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets2/plugins/custom/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets2/plugins/custom/datatables.net-autofill-bs4/css/autoFill.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets2/plugins/custom/datatables.net-colreorder-bs4/css/colReorder.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets2/plugins/custom/datatables.net-fixedcolumns-bs4/css/fixedColumns.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets2/plugins/custom/datatables.net-fixedheader-bs4/css/fixedHeader.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets2/plugins/custom/datatables.net-keytable-bs4/css/keyTable.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets2/plugins/custom/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets2/plugins/custom/datatables.net-rowgroup-bs4/css/rowGroup.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets2/plugins/custom/datatables.net-rowreorder-bs4/css/rowReorder.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets2/plugins/custom/datatables.net-scroller-bs4/css/scroller.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets2/plugins/custom/datatables.net-select-bs4/css/select.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <script type="text/javascript">
        // $(".DataTablePegawaiJos").dataTable({
        //   "oLanguage": {
        //     "sLengthMenu": "Tampilkan _MENU_ data per halaman",
        //     "sSearch": "Pencarian: ",
        //     "sZeroRecords": "Maaf, tidak ada data yang ditemukan",
        //     "sInfo": "Menampilkan _START_ s/d _END_ dari _TOTAL_ data",
        //     "sInfoEmpty": "Menampilkan 0 s/d 0 dari 0 data",
        //     "sInfoFiltered": "(di filter dari _MAX_ total data)",
        //     "oPaginate": {
        //       "sFirst": "Awal",
        //       "sLast": "Akhir",
        //       "sPrevious": "Sebelumnya",
        //       "sNext": "Selanjutnya"
        //     }
        //   }
        // });

        $("#DataTable2").dataTable({
            // scrollY: '50vh',
            scrollX: 'true',
            scrollCollapse: true,
            "oLanguage": {
                "sLengthMenu": "Tampilkan _MENU_ data per halaman",
                "sSearch": "Pencarian: ",
                "sZeroRecords": "Maaf, tidak ada data yang ditemukan",
                "sInfo": "Menampilkan _START_ s/d _END_ dari _TOTAL_ data",
                "sInfoEmpty": "Menampilkan 0 s/d 0 dari 0 data",
                "sInfoFiltered": "(di filter dari _MAX_ total data)",
                "oPaginate": {
                    "sFirst": "Awal",
                    "sLast": "Akhir",
                    "sPrevious": "Sebelumnya",
                    "sNext": "Selanjutnya"
                }
            }
        });

        function update(id) {
            var pin = $('#pin_' + id).val();
            var nip = $('#nip_' + id).val();
            var nama = $('#nama_' + id).val();
            var jabatan = $('#jabatan_' + id).val();
            var departemen = $('#departemen_' + id).val();
            var kantor = $('#kantor_' + id).val();

            var values = {
                'pin': pin,
                'nip': nip,
                'nama': nama,
                'jabatan': jabatan,
                'departemen': departemen,
                'kantor': kantor
            }

            $.ajax({
                url: "<?php echo base_url() . 'transaksi/update_master_pegawai' ?>",
                type: "POST",
                // dataType: "json",
                data: values,
                success: function(data) {
                    // var gaji_bersih = data.gaji_bersih;
                    // var denda_telat = data.denda_telat;

                    // $('#gaji_bersih_' + id).html('<b>' + gaji_bersih + '</b>');
                    // $('#denda_telat_' + id).html(denda_telat);
                },
                error: function() {
                    alert('Ada Error');
                }
            });
        }
    </script>
    <!-- <script>
      function GetDataModal(id) {
        $("#operator").modal('show');
        $.ajax({
          type: "GET",
          url: "<?= base_url() ?>transaksi/tb_detail_pegawai/" + id,
          cache: false,
          success: function(msg) {
            $(".modal-body").html(msg);
          }
        });
      }
    </script> -->