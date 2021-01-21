
<link href="<?=base_url()?>assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
<hr/> 
<h3><strong>Data Slip Gaji Bulan <?=$bulan?> Tahun <?=$tahun?></strong></h3>
<table class="table table-bordered table-striped DataTablePegawaiOffice" style="width: 100%">
  <thead>
   <tr>
    <th>No</th>                     
    <th>Pegawai</th>
    <th>Kode</th>
    <th>Area</th>
    <th>Outlet</th>
    <th>Supervisor</th>
    <th>Total Gaji</th>
    <th>Action</th>
  </tr>
</thead>
<tbody>
  <?php 
  $no = 0 ;
  $dbData = $this->db->query("SELECT * FROM v_gaji_2 WHERE  bulan = '".$bulan."' and tahun = '".$tahun."' ORDER BY nama_area,nama_spv ");
    foreach ($dbData->result_array() as $key => $vaData) {
  ?>
  <tr>
    <td><?=++$no?></td>
    <td><?=$vaData['nama']?></td>
    <td><?=$vaData['kode_outlet']?></td>
    <td><?=$vaData['nama_area']?></td>
    <td><?=$vaData['nama_outlet']?></td>
    <td><?=$vaData['nama_spv']?></td>
    <td><strong>Rp. <?=number_format($vaData['total'])?></strong></td>
    <td>
    <a href="<?=base_url()?>laporan/slip_gaji/<?=$vaData['id_gaji']?>" target="_blank">
      <button class="btn btn-success"><i class="fa fa-print"></i></button>
    </a>
    </td>
    
  </tr>
<?php } ?>
 </tbody>
</table>
<br/>

<a href="<?=base_url()?>laporan/slip_gaji_bulan/<?=$bulan?>/<?=$tahun?>" target="_blank" class="btn btn-primary btn-block">
  <i class="fa fa-print"></i> Cetak Semua Slip Gaji
</a>





<!-- DATA TABES SCRIPT -->
<script src="<?=base_url()?>assets/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>

<script type="text/javascript">
  $(".DataTablePegawaiOffice").dataTable({
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

   function GetDataModal(id,bulan,tahun){
    $("#operator").modal('show');
    $.ajax({
      type: "GET",
      url: "http://36.89.27.201/sips/Administrator/Transaksi/tampilkan_data_absen_detail/"+id+'/'+bulan+'/'+tahun,
      cache: false,
      success:function(msg){
        $(".modal-body").html(msg);
      }
    });
  }
</script>