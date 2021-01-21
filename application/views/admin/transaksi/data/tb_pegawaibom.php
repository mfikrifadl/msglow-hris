    <!-- DATA TABLES -->
    <link href="<?=base_url()?>assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
      <table class="table table-striped table-bordered DataTablePegawaiBom" >
          <thead>
            <tr>
              <td>No</td>
              <td>Id</td>
              <td style="width:20px">Nama</td>
              <td>Nik</td>
              <td>Outlet</td>
              <td>Tgl Masuk</td>
              <td>Masa Kerja</td>
              <td>Cara Bayar</td>
              <td>Rekening</td>
              <td>Action</td>
            </tr>
          </thead>
          <tbody>
            <tr>
            <?php $no = 0 ; foreach ($row as $key => $vaPegawai) { ?>
            <?php //include 'detail.pegawai.php'; ?>
              <td><?=++$no?></td>
              <td><?=$vaPegawai['id_pegawai']?></td>
              <td><?=$vaPegawai['nama']?></td>
              <td><?=$vaPegawai['nik']?></td>
              <td><?=$vaPegawai['OutletFix']?></td>
              <td><?=$vaPegawai['tanggal_masuk_kerja']?></td>
              <td><?=$vaPegawai['MasaKerja']?></td>
              <td><?=$vaPegawai['Pembayaran']?></td>
              <td><?=$vaPegawai['no_rekening']?>  - <strong><?=$vaPegawai['atas_nama']?></td>
              
              <td>
              <a class="btn btn-danger btn-flat" title="View Data" href="<?=site_url('transaksi/view_pegawai/'.$vaPegawai['id_pegawai'].'')?>">
                <i class="fa fa-eye"></i>
              </a>
              <a href="#" class="btn btn-success btn-flat edit-record" onclick="GetDataModal(<?=$vaPegawai['id_pegawai']?>);"  data-id="<?=$vaPegawai['id_pegawai']?>">
                <i class="fa fa-pencil"></i>
              </a>
              </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>

        <div class="modal fade bs-example-modal-lg" id="operator" tabindex="-1" role="dialog" aria-hidden="true">
             <div class="modal-dialog" style="border-radius:0px;width:90%;">
                <div class="modal-content">
                    <div class="modal-header bg-red">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel">View Data Pegawai</h4>
                    </div>
                    <div class="modal-body">
                    </div>
                </div>
            </div>
        </div>


<!-- DATA TABES SCRIPT -->
    <script src="<?=base_url()?>assets/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="<?=base_url()?>assets/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>

    <script type="text/javascript">
    $(".DataTablePegawaiBom").dataTable({
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
    </script>
    <script>
         function GetDataModal(id){
          $("#operator").modal('show');
          $.ajax({
            type: "GET",
            url: "<?=base_url()?>transaksi/tb_detail_pegawai/"+id,
            cache: false,
            success:function(msg){
              $(".modal-body").html(msg);
            }
           });
         }
      </script>