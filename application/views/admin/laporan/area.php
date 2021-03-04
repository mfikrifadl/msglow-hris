
    <div class="container">
     <div class="col-sm-12">
       <ul class="breadcrumb"><li><a href="<?=base_url()?>">Home</a></li>
        <li class="">Pencarian</li>
        <li class="active">Area Kerja</li>
      </ul>                    
     </div>
    </div>
     <!-- /.DataTable -->

    <div class="container">
      <div class="col-sm-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Hasil Pencarian Pegawai Degan Domisili Area Kerja <strong><?=$this->session->userdata('WhereArea')?></strong></em>  </h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
      </div><!-- /.box-header -->
       <div class="box-body">
        <table class="table table-striped table-bordered DataTablePegawai" >
          <thead>
            <tr>
              <td>No</td>
              <td>Nama</td>
              <td>Nik</td>
              <td>Pendidikan</td>
              <td>Action</td>
            </tr>
          </thead>
          <tbody>
            <tr>
            <?php $no = 0 ; foreach ($row as $key => $vaPegawai) { ?>
              <td><?=++$no?></td>
              <td><?=$vaPegawai['nama']?></td>
              <td><?=$vaPegawai['nik']?></td>
              <td><?=$vaPegawai['nama_area']?></td>
              <td>
              <a class="btn btn-danger btn-flat" title="Detail" href="<?=site_url('transaksi/view_pegawai/'.$vaPegawai['id_pegawai'].'')?>">
                <i class="fa fa-print"></i>
              </a>
              </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
       </div>
    </div> 
    </div>  
  </div>
  