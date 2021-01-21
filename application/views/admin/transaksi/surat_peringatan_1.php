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

  foreach ($Nolast->result_array() as $key => $vaDataLast) {
    $cLastNoSurat = $vaDataLast['nomor_surat'];
  }

  if ($Nolast->num_rows() > 0) {
    $NoSuratTerakhir = $cLastNoSurat;
  } else {
    $NoSuratTerakhir = "No.0001/SP-I/HRD/" . $cRomawai . "/" . date("Y") . "";
  }

  $cNomorSuratFix = "No." . "####" . "/SP-I/HRD/" . $cRomawai . "/" . date("Y") . " ";
  ?>
 <?php
  if ($action == "edit") {
    foreach ($field as $column) {
      $cIdSuratPeringatan =   $column['id'];
      $cIdKategoriSurat   =   $column['id_kategori_surat'];
      $dTgl               =   $column['tanggal'];
      $nNomorSurat        =   $column['nomor_surat'];
      $cIdPegawai         =   $column['id_pegawai'];
      $cOutlet            =   $column['outlet'];
      $cUraian            =   $column['uraian'];
      $cKeterangan        =   $column['keterangan'];
      $cCreate            =   $column['create'];
      $cCC                =   $column['cc'];
      $cIconButton        =   "refresh";
      $cValueButton       =   "Update Data";
    }
    $cAction = "Update/" . $cIdSuratPeringatan . "";
  } else {
    $cIdSuratPeringatan =   "";
    $cIdKategoriSurat   =   "";
    $dTgl               =   "";
    $nNomorSurat        =   $cNomorSuratFix;
    $cIdPegawai         =   "";
    $cOutlet            =   "";
    $cUraian            =   "";
    $cKeterangan        =   "";
    $cCreate            =   "Venna Rosia Marheta ";
    $cCC                =   "";
    $cIconButton    =   "save";
    $cValueButton   =   "Save Data";
    $cAction        =   "Insert";
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

       <!--begin::Portlet-->
       <div class="kt-portlet kt-portlet--height-fluid">
         <div class="kt-portlet__head">
           <div class="kt-portlet__head-label">
             <h3 class="kt-portlet__head-title">
               Data Table Surat Peringatan Pegawai (SP1)
             </h3>
           </div>
         </div>

         <div class="kt-portlet__body">
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
                ?>
                 <tr>
                   <td><?= ++$no; ?></td>
                   <td><?= ($vaPeringatan['tanggal']) ?></td>
                   <td><?= ($vaPeringatan['nomor_surat']) ?></td>
                   <td><?= ($vaPeringatan['nama']) ?></td>
                   <td><?= ($vaPeringatan['Keterangan']) ?></td>
                   <!-- <td align="center">
                     <a class="btn-link" title="View Data" target="_blank" href="<?php //site_url('laporan/lp_sp/' . $vaPeringatan['id'] . '/1') 
                                                                                  ?>">
                       <i class="fa fa-print"></i>
                     </a>|
                     <a class="btn-link" title="Edit Data" href="<?php //site_url('surat/surat_peringatan_1/edit/' . $vaPeringatan['id'] . '') 
                                                                  ?>">
                       <i class="fa fa-edit"></i>
                     </a>|
                     <a class="btn-link" title="Hapus Data" onclick="if(confirm('Apakah anda yakin akah menghapus data?')){ window.location.href='<?= site_url('surat_act/surat_peringatan_1/Delete/' . $vaPeringatan['id'] . '') ?>'}">
                       <i class="fa fa-trash-o"></i>
                     </a>
                   </td> -->
                 </tr>
               <?php } ?>
             </tbody>
           </table>
         </div>

       </div>

       <!--end::Portlet-->

     </div>
   </div>

   <div class="row">
     <div class="col-12">
       <form method="post" enctype="multipart/form-data" action="<?= site_url('surat_act/surat_peringatan_1/' . $cAction . '') ?>">
         <!--begin::Portlet-->
         <div class="kt-portlet kt-portlet--height-fluid">
           <div class="kt-portlet__head">
             <div class="kt-portlet__head-label">
               <h3 class="kt-portlet__head-title">
                 Form Surat Peringatan 1
               </h3>
             </div>
           </div>

           <div class="kt-portlet__body">
             <div style="text-align: center;">
               <h3 style="text-decoration: underline;">HUMAN RESOURCE DEVELOPMENT</h3>
               <?php if ($action != 'edit') { ?>
                 Nomor Terakhir : <strong><?= $NoSuratTerakhir ?></strong>
                 <div style="justify-content: center;display: flex;"><input type="text" name="nNomorSurat" class="form-control" style="width:30%" placeholder="Nomor Surat" value="<?= $nNomorSurat ?>"></div>
               <?php } ?>
             </div>
             <div class="col-12" align="left">
               <p>
               <h4>&emsp;&emsp;Dalam rangka menegakkan kedisiplinan dan tanggung jawab serta menjalankan peraturan perusahaan maka atas nama perusahaan, dengan ini menerangkan bahwa:</h4>
               </p>
             </div>
             <div class="form-group">
               <label>Nama :</label>
               <select class="comboBox form-control" onchange="changeValue(this.value)" name="cIdPegawai">
                 <option></option>
                 <?php
                  $jsArray = "var jason = new Array();\n";
                  foreach ($pegawai as $dbRow) {
                  ?>
                   <option value="<?= $dbRow['id_pegawai'] ?>" <?php if ($dbRow['id_pegawai'] == $cIdPegawai) echo 'selected'; ?>>
                     <?= $dbRow['nik'] ?> : <?= $dbRow['nama'] ?>
                   </option>';
                 <?php
                    $jsArray .= "jason['" . $dbRow['id_pegawai'] . "'] = 
                          {nik:'" . addslashes(($dbRow['nik'])) . "'};\n";
                  }
                  ?>
               </select>
             </div>
             <div class="form-group">
               <label>NIK :</label>
               <input type="text" name="cNik" id="cNik" class="form-control" readonly="true">
             </div>
             <div class="form-group">
               <label>Jabatan :</label>
               <input type="text" name="cJabatan" id="cJabatan" class="form-control" readonly="true">
             </div>
             <div class="col-12" align="left">
               <p>
               <h4>Telah melakukan tindakan/perbuatan yang melanggar Tata Tertib Kerja/SOP/Job Desk dan Kepegawaian yang dilakukan pada :</h4>
               </p>
             </div>
             <div class="form-group">
               <label>Tanggal</label>
               <input type="text" name="dTgl" class="datetimepicker form-control" data-date-format="DD-MM-YYYY" placeholder="Tanggal" value="<?= $dTgl ?>">
             </div>
             <div class="form-group">
               <label>Uraian Singkat Pelanggaran</label>
               <textarea class="form-control" name="cUraian" placeholder="Uraian" rows="10"><?= $cUraian ?></textarea>
             </div>
             <div class="col-12" align="left">
               <p>
               <h4>Demikian Surat Peringatan Pertama ini dikeluarkan untuk menjadi perhatian.</h4>
               </p>
             </div>
             <div class="col-12" align="left">
               <p>
               <h4>PT.Kosmetika Cantik Indonesia</h4>
               </p>
             </div>
             <div class="form-group">
               <input type="text" name="cCreate" class="form-control" value="<?= $cCreate ?>" style"width:30%">
             </div>
             <div class="form-group">
               <button type="submit" class="btn btn-flat btn-danger">
                 <i class="fa fa-<?= $cIconButton ?>"></i> <?= $cValueButton ?>
               </button>
             </div>
           </div>
         </div>

         <!--end::Portlet-->
       </form>
     </div>
   </div>
 </div>


 <script type="text/javascript">
   <?php echo $jsArray; ?>

   function changeValue(id) {
     document.getElementById('cNik').value = jason[id].nik;
     document.getElementById('cJabatan').value = jason[id].nama_jabatan;
   };
 </script>