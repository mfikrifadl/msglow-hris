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

 <div class="alert alert-warning" role="alert">
   <div class="alert-icon">
     <i class="flaticon-warning"></i>
   </div>
   <div class="alert-text"> <?= $keterangan ?>

     <?php if ($cek_pegawai) {
      ?>

       <p>
         <span><?= $pin ?></span>
       </p>

   </div>
 </div>
 <?php } else { ?>
   <table class="table table-striped table-bordered DataTablePegawaiPelanggaran" style="width: 100%">
     <thead>
       <tr>
         <td>No</td>
         <td>Nomor Surat</td>
         <td>Tanggal</td>
         <td>Nik</td>
         <td>Pin</td>
         <td>Nama</td>
         <td>Keterangan</td>
       </tr>
     </thead>
     <tbody>
       <tr>
         <?php $no = 0;
          foreach ($cek_pegawai->result_array() as $key => $vaPegawai) { ?>
           <td><?= ++$no ?></td>
           <td><?= $vaPegawai['nomor_surat'] ?></td>
           <td><?= ($vaPegawai['tanggal']) ?></td>
           <td><?= $vaPegawai['nik'] ?></td>
           <td><?= $vaPegawai['pin'] ?></td>
           <td><?= $vaPegawai['nama'] ?></td>
           <td><?= $vaPegawai['Keterangan'] ?></td>
       </tr>
     <?php } ?>
     </tbody>
   </table>
 <?php } ?>


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
   $(".DataTablePegawaiPelanggaran").dataTable({
     "oLanguage": {
       "sLengthMenu": "Tampilkan _MENU_ data per halaman",
       "sSearch": "Pencarian: ",
       "sZeroRecords": "Maaf, tidak ada data yang ditemukan",
       "sInfo": "Show _START_ s/d _END_ dari _TOTAL_ data",
       "sInfoEmpty": "Show 0 s/d 0 dari 0 data",
       "sInfoFiltered": "(di filter dari _MAX_ total data)",
       "oPaginate": {
         "sFirst": "Awal",
         "sLast": "Akhir",
         "sPrevious": "Sebelumnya",
         "sNext": "Selanjutnya"
       }
     }
   });
 </script>