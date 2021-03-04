 <?php
  //SetKode
  if (date("m") == '01') {
    $cRomawai = 'I';
  } elseif (date("m") == '02') {
    $cRomawai = 'II';
  } elseif (date("m") == '03') {
    $cRomawai = 'III';
  } elseif (date("m") == '04') {
    $cRomawai = 'IV';
  } elseif (date("m") == '05') {
    $cRomawai = 'V';
  } elseif (date("m") == '06') {
    $cRomawai = 'VI';
  } elseif (date("m") == '07') {
    $cRomawai = 'VII';
  } elseif (date("m") == '08') {
    $cRomawai = 'VIII';
  } elseif (date("m") == '09') {
    $cRomawai = 'IX';
  } elseif (date("m") == '10') {
    $cRomawai = 'X';
  } elseif (date("m") == '11') {
    $cRomawai = 'XI';
  } elseif (date("m") == '12') {
    $cRomawai = 'XII';
  }
  $cLastNoSurat = "";
  foreach ($Nolast->result_array() as $key => $vaDataLast) {
    $cLastNoSurat = $vaDataLast['nomor_surat'];
  }

  $cNomorSuratFix = "";
  if (empty($cLastNoSurat) || $cLastNoSurat == "" || $cLastNoSurat == null) {
    $hasil = "0001";
    $cNomorSuratFix = "No." . $hasil . "/ST/HRD/" . $cRomawai . "/" . date("Y") . " ";
  } else {
    $hasil_hit = $cLastNoSurat + 1;
    $hasil = sprintf("%04d", $hasil_hit);
    $cNomorSuratFix = "No." . $hasil . "/ST/HRD/" . $cRomawai . "/" . date("Y") . " ";
  }
  ?>
 <?php
  if ($action == "edit") {
    $cNikPegawai = $nik_select;
    $cNamaJabatan = $nj_select;

    foreach ($field as $column) {
      $cIdSuratPeringatan =   $column['id'];
      $cIdKategoriSurat   =   $column['id_kategori_surat'];
      $dTgl               =   $column['tanggal'];
      $tgl_mulai_berlaku  =   $column['mulai_berlaku'];
      $tgl_berlaku_sampai =   $column['berlaku_sampai'];
      $jenis_sp           =   $column['Keterangan'];
      $nNomorSurat        =   $column['nomor_surat'];
      $cIdPegawai         =   $column['id_pegawai'];
      // $cNikPegawai     =   $column['nik'];
      // $cNama           =   $column['nama'];
      // $cOutlet         =   $column['outlet'];
      $cUraian            =   $column['uraian'];
      // $cKeterangan     =   $column['keterangan'];
      $cCreate            =   $column['create'];
      $cCC                =   $column['general_manager'];
      $cIconButton        =   "refresh";
      $cValueButton       =   "Update Data";
    }
    $cAction = "Update/" . $cIdSuratPeringatan . "";
  } else {
    $cIdSuratPeringatan =   "";
    $cIdKategoriSurat   =   "";
    $dTgl               =   "";
    $tgl_mulai_berlaku  =   "";
    $tgl_berlaku_sampai =   "";
    $nNomorSurat        =   $cNomorSuratFix;
    $cIdPegawai         =   "";
    $cNikPegawai        =   "";
    $cNama              =  "";
    // $cOutlet         =   "";
    $cUraian            =   "";
    // $cKeterangan     =   "";
    $cCreate            =   "Venna Rosia Marheta";
    $cCC                =   "";
    $cIconButton    =   "save";
    $cValueButton   =   "Save Data";
    $cAction        =   "Insert";
  }
  if ($cIdKategoriSurat == 3) {
    $id_kategori_sp = 'SP-I';
  } elseif ($cIdKategoriSurat == 4) {
    $id_kategori_sp = 'SP-II';
  } elseif ($cIdKategoriSurat == 5) {
    $id_kategori_sp = 'SP-III';
  }

  ?>
 <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
   <div class="row">
     <div class="col-sm-12">
       <ul class="breadcrumb">
         <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
         <li class="breadcrumb-item"><?= $menu ?></li>
         <li class="breadcrumb-item active"><?= $file ?></li>
       </ul>
     </div>
   </div>

   <div class="row">
     <div class="col-12">

       <div class="accordion accordion-solid accordion-toggle-plus" id="accordionSuratPeringatan">
         <div class="card">
           <div class="card-header" id="headingSuratPeringatan">
             <div class="card-title btn btn-primary text-info" data-toggle="collapse" data-target="#collapseSuratPeringatan" aria-expanded="true" aria-controls="collapseSuratPeringatan">
               <strong> Form Surat Peringatan </strong>
             </div>
           </div>
           <?php
           $show = "collapse show";
           $collapse = "collapse";
           ?>
           <div id="collapseSuratPeringatan" class="<?= $action == "edit" ? $show : $collapse ?>" aria-labelledby="headingSuratPeringatan" data-parent="#accordionSuratPeringatan">
             <div class="card-body">
               <!--begin::Form-->
               <div class="kt-portlet__body">
                 <div class="row">
                   <div class="col-sm-12 col-md-12">

                     <form method="post" enctype="multipart/form-data" action="<?= site_url('surat_act/sp1/' . $cAction . '') ?>">
                       <div style="text-align: center;">
                         <h3>HUMAN RESOURCES DEVELOPMENT</h3>
                         <hr />
                       </div>
                       <div class="form-group row">
                         <label for="example-text-input" class="col-1 col-form-label">Tertanggal: </label>
                         <div class="col-3">
                           <input type="date" name="dTgl" class="form-control" placeholder="Tanggal" value="<?= $dTgl ?>" required>
                         </div>
                       </div>
                       <div class="form-group row">
                         <label for="example-text-input" class="col-1 col-form-label">Perihal: </label>
                         <div class="col-3">
                           <select name="jenis_sp" class="form-control" onchange="getnomorsurat(this.value)">
                             <?php if ($action == "edit") { ?>
                               <option value="<?= $id_kategori_sp ?>"><?= $jenis_sp ?></option>
                             <?php } ?>
                             <option value="SP-I">Surat Peringatan I</option>
                             <option value="SP-II">Surat Peringatan II</option>
                             <option value="SP-III">Surat Peringatan III</option>
                           </select>
                         </div>
                       </div>
                       <div style="text-align: center;">
                         <h4 style="text-decoration: underline;">SURAT PERINGATAN</h4>                         
                         <div style="justify-content: center;display: flex;">
                           <input readonly="true" name="nNomorSurat" class="form-control text-center" style="width:30%" placeholder="Nomor Surat" value="<?= $cNomorSuratFix ?>">

                         </div>

                       </div>
                       <div class="col-12" align="left">
                         <p>
                         <h4>&emsp;&emsp;Dalam rangka menegakkan kedisiplinan dan tanggung jawab serta menjalankan peraturan perusahaan maka atas nama perusahaan, dengan ini menerangkan bahwa:</h4>
                         </p>
                       </div>
                       <div class="form-group row">
                         <label for="example-text-input" class="col-1 col-form-label">Nama :</label>
                         <div class="col-3">
                           <select class="comboBox form-control" onchange="cek_pegawai(this.value)" name="cIdPegawai">
                             <option></option>
                             <?php
                              $jsArray = "var jason = new Array();\n";
                              foreach ($pegawai as $dbRow) {
                              ?>
                               <option value="<?= $dbRow['id_pegawai'] ?>" <?php if ($dbRow['id_pegawai'] == $cIdPegawai) echo 'selected'; ?>>
                                 <?= $dbRow['nik'] ?> : <?= $dbRow['nama'] ?>
                               </option>';
                             <?php
                              }
                              ?>
                           </select>
                         </div>
                       </div>
                       <div class="form-group row">
                         <label for="example-text-input" class="col-1 col-form-label">NIK :</label>
                         <div class="col-3">
                           <?php
                            if ($action == "edit") { ?>
                             <input type="text" name="cNik" id="cNik" class="form-control" readonly="true" value="<?= $cNikPegawai ?>">

                           <?php } else { ?>
                             <input type="text" name="cNik" id="cNik" class="form-control" readonly="true">
                           <?php   } ?>

                         </div>
                       </div>
                       <div class="form-group row">
                         <label for="example-text-input" class="col-1 col-form-label">Jabatan :</label>
                         <div class="col-3">
                           <?php if ($action == "edit") { ?>
                             <input type="text" name="cJabatan" id="cJabatan" class="form-control" readonly="true" value="<?= $cNamaJabatan ?>">

                           <?php } else { ?>
                             <input type="text" name="cJabatan" id="cJabatan" class="form-control" readonly="true">
                           <?php   } ?>

                         </div>
                       </div>
                       <div class="col-12" align="left">
                         <p>
                         <h4>Maka dengan ini, Diberikan Surat Peringatan I terkait dengan tindak pelanggaran yang saudara lakukan, yakni </h4>
                         </p>
                       </div>
                       <div class="form-group">
                         <div class="col-12">
                           <?php if ($action == "edit") { ?>
                             <textarea name="cUraian" class="summernote form-control" id="kt_summernote_1"><?= $cUraian ?></textarea>

                           <?php } else { ?>
                             <textarea name="cUraian" class="summernote form-control" id="kt_summernote_1"></textarea>
                           <?php   } ?>

                         </div>

                       </div>
                       <div class="col-12 text-left">

                         <?php if ($action == "edit") { ?>
                           <p>
                           <h6>Surat Peringatan ini belaku mulai tanggal <input type="date" name="cMulai_berlaku" oninput="tigabulan(this.value)" value="<?= $tgl_mulai_berlaku ?>"> dan berakhir pada tanggal <input type="date" id="cBerlaku_sampai" name="cBerlaku_sampai" value="<?= $tgl_berlaku_sampai ?>"> </h6>
                           </p>

                         <?php } else { ?>
                           <p>
                           <h6>Surat Peringatan ini belaku mulai tanggal <input type="date" name="cMulai_berlaku" onchange="tigabulan(this.value)"> dan berakhir pada tanggal <input type="date" id="cBerlaku_sampai" name="cBerlaku_sampai"> </h6>
                           </p>
                         <?php   } ?>

                       </div>
                       <div class="col-12" align="left">
                         <p>
                           Selama masih dalam status Peringatan I, yang bersangkutan tidak diperbolehkan melanggar tata tertib kerja sebagaimana sudah diatur dalam Peraturan Perusahaan, atau bersedia menerima resiko ke tingkat lebih lanjut.
                           Harapan kami agar yang bersangkutan untuk lebih mentaati peraturan dan lebih disiplin serta tanggung jawab sebagai karyawan yang baik. Semoga dengan diterbitkan surat ini ybs bisa menerima hal ini.
                           Demikian Surat Peringatan I ini dibuat agar dapat ditaati sebagaimana mestinya. Diharapkan yang bersangkutan berkenan merubah sikap dan mampu menunjukkan sikap profesinoalisme dalam bekerja.

                         </p>
                       </div>
                       <div class="col-12" align="left">
                         <p>Atas perhatian dan kerjasamanya kami selaku manajemen mengucapkan terima kasih. Dan bisa sebagai koreksi dan intropeksi diri selanjutnya.
                         </p>
                       </div>
                       <div class="form-group row">
                         <label for="example-text-input" class="col-2 col-form-label">Manager HRD :</label>
                         <div class="col-3">
                           <?php if ($action == "edit") { ?>
                             <input type="text" name="cCreate" id="cCreate" class="form-control" value="<?= $cCreate ?>">
                           <?php } else { ?>
                             <input type="text" name="cCreate" id="cCreate" class="form-control">
                           <?php   } ?>

                         </div>
                       </div>
                       <div class="form-group row">
                         <label for="example-text-input" class="col-2 col-form-label">General Manager :</label>
                         <div class="col-3">
                           <?php if ($action == "edit") { ?>
                             <input type="text" name="cGeneral_manager" id="cGeneral_manager" class="form-control" value="<?= $cCC ?>">
                           <?php } else { ?>
                             <input type="text" name="cGeneral_manager" id="cGeneral_manager" class="form-control">
                           <?php } ?>
                         </div>
                       </div>
                       <div class="form-group">
                         <button type="submit" class="btn btn-flat btn-danger">
                           <i class="fa fa-<?= $cIconButton ?>"></i> <?= $cValueButton ?>
                         </button>
                       </div>
                     </form>

                   </div> <!-- /.col-form -->

                 </div><!-- /.row -->
               </div>
               <!--end::Portlet Data Kontak-->
             </div>
           </div>
         </div>
       </div>
       <!--end::Accordion-->

     </div>
   </div>
   <br />
   <div class="row">
     <div class="col-12">

       <div class="accordion accordion-solid accordion-toggle-plus" id="accordionDataTable">
         <div class="card">
           <div class="card-header" id="headingDataTable">
             <div class="card-title btn btn-primary text-info" data-toggle="collapse" data-target="#collapseDataTable" aria-expanded="true" aria-controls="collapseDataTable">
               <strong> Data Table Surat Peringatan Pegawai </strong>
             </div>
           </div>
           <div id="collapseDataTable" class="collapse show" aria-labelledby="headingDataTable" data-parent="#accordionDataTable">
             <div class="card-body">
               <!--begin::Form-->
               <div class="kt-portlet__body">
                 <div class="row">
                   <div class="col-sm-12 col-md-12">

                     <table class="table table-striped table-bordered" id="DataTable">
                       <thead>
                         <tr>
                           <td>No</td>
                           <td>Tanggal</td>
                           <td>Nomor Surat</td>
                           <td>Pegawai</td>
                           <td>Tipe Surat</td>
                           <td>Action</td>
                         </tr>
                       </thead>
                       <tbody>
                         <?php $no = 0;
                          foreach ($row as $key => $vaPeringatan) {
                            if ($vaPeringatan['id_kategori_surat'] == "3" || $vaPeringatan['id_kategori_surat'] == "4" || $vaPeringatan['id_kategori_surat'] == "5") {
                          ?>
                             <tr>
                               <td><?= ++$no; ?></td>
                               <td><?= ($vaPeringatan['tanggal']) ?></td>
                               <td><?= ($vaPeringatan['nomor_surat']) ?></td>
                               <td><?= ($vaPeringatan['nama']) ?></td>
                               <td><?= ($vaPeringatan['Keterangan']) ?></td>
                               <td align="center">
                                 <a class="btn-link" title="Print SP" target="_blank" href="<?= site_url('Surat_act/cetak_sp1/' . $vaPeringatan['id'] . '') ?>">
                                   <i class="fa fa-print"></i>
                                 </a>
                                 |
                                 <a class="btn-link" title="Edit SP" href="<?= site_url('hrd/sp/edit/' . $vaPeringatan['id'] . '') ?>">
                                   <i class="fa fa-pen text-info"></i>
                                 </a>
                               </td>
                             </tr>
                         <?php
                            } else {
                            }
                          } ?>
                       </tbody>
                     </table>

                   </div> <!-- /.col-form -->

                 </div><!-- /.row -->
               </div>
               <!--end::Portlet Data Kontak-->
             </div>
           </div>
         </div>
       </div>
       <!--end::Accordion-->

     </div>
   </div>


 </div>


 <script type="text/javascript">
   function getnomorsurat(jenissp) {
     if (jenissp == 'SP-I') {
       document.getElementById('nomorsrt').value = 'No.####/SP-I/HRD/<?= $cRomawai ?>/<?= date("Y") ?>';
     } else if (jenissp == 'SP-II') {
       document.getElementById('nomorsrt').value = 'No.####/SP-II/HRD/<?= $cRomawai ?>/<?= date("Y") ?>';
     } else if (jenissp == 'SP-III') {
       document.getElementById('nomorsrt').value = 'No.####/SP-III/HRD/<?= $cRomawai ?>/<?= date("Y") ?>';
     }
   }

   function cek_pegawai(data) {
     // alert(data);
     var xmlhttp = new XMLHttpRequest();
     xmlhttp.onreadystatechange = function() {
       if (this.readyState == 4 && this.status == 200) {
         hasil = (this.responseText).split('~');

         // alert (hasil);
         document.getElementById('cNik').value = hasil[0];
         document.getElementById('cJabatan').value = hasil[1];
         if (hasil[1] == '') {
           alert('Inputkan Jabatan Pegawai Terlebih Dahulu di Form Input Jabatan');
         }
       }
     };
     xmlhttp.open("GET", "<?= site_url('Transaksi_act/get_pegawai/') ?>/" + data, true);
     xmlhttp.send();
   }
 </script>