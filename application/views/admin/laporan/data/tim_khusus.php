<link href="<?=base_url()?>assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
          <table class="table table-bordered table-striped DataTablePegawaiOffice">
                <thead>
                  <tr>
                    <td>Nik</td>
                    <td>Nama</td>
                    <td>Telepon</td>
                    <td>Outlet</td>
                    <td>Act</td>
                  </tr>
                </thead>
                <tbody>
                <?php
                foreach ($view as $key => $vaView) {?>
                  <tr>
                    <td><?=$vaView['nik']?></td>
                    <td><?=$vaView['nama']?></td>
                    <td><?=$vaView['telepon']?></td>
                    <td>Cooming Soon</td>
                    <td>
                    <a class="btn btn-link" title="View Data" href="<?=site_url('laporan/dt_timkhusus/'.$vaView['id_tim_khusus'].'')?>">
                      <i class="fa fa-print"></i>
                    </a>
                  </td>
                  </tr>
                <?php } ?>
                </tbody>
              </table>

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
    </script>