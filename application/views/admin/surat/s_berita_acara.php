
  <?php 
        if($action == "edit") {
          foreach ($field as $column) {
            $cIdBeritaAcara       =   $column['id_acara'] ;
            $cIdKategoriSurat =   $column['id_kategori_surat'] ;
            $cIdPegawai       =   $column['id_pegawai'] ;
            $cKeterangan      =   $column['keterangan'] ;
            $dTgl             =   String2Date($column['tanggal'])  ;
            $cCreate          =   $column['create']   ;  
            $cIconButton      =   "refresh"     ;
            $cValueButton     =   "Update Data" ;
          }
          $cAction = "Update/".$cIdBeritaAcara."" ;
        }else{
            $cIdBeritaAcara       =   "" ;
            $cIdKategoriSurat =   "" ;
            $cIdPegawai       =   "" ;
            $cKeterangan      =   "" ;
            $dTgl             =   $tanggal  ;
            $cCreate          =   "Dewi M Ratnasari"  ;   
            $cIconButton      =   "save"    ;
            $cValueButton     =   "Save Data" ;
            $cAction          =   "Insert" ; 
        }
    ?>
    

<section class="connectedSortable">
    <div class="container">
     <div class="col-sm-12">
       <ul class="breadcrumb"><li><a href="<?=base_url()?>">Home</a></li>
        <li class=""><?=$menu?></li>
        <li class="active"><?=$file?></li>
      </ul>                    
     </div>
    </div>
     <!-- /.DataTable -->

    <div class="container">
      <div class="col-sm-12">
      <div class="box box-primary collapsed-box">
        <div class="box-header with-border">
          <h3 class="box-title">Data Table Berita Acara</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
      </div><!-- /.box-header -->
      <div style="display: none;" class="box-body">
        <div class="nav-tabs-custom">
        <ul class="nav nav-tabs" id="myTabs">
          <li class="active"><a href="#tab_1" data-toggle="tab">Data Berita Acara </a></li> 
        </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="tab_1">
            <table class="table table-striped table-bordered" id="DataTable">
              <thead>
                <tr>
                  <td>No</td>
                  <td>Tanggal</td>
                  <td>Nomor Surat</td>
                  <td>Nik</td>
                  <td>Pegawai</td>
                  <td>Action</td>
                </tr>
              </thead>
              <tbody>
              <?php $no = 0 ; foreach ($row as $key => $vaBerita) { ?>
                <tr>
                  <td><?=++$no;?></td>
                  <td><?=String2Date($vaBerita['tanggal'])?></td>
                  <td>-</td>
                  <td><?=$vaBerita['Nik']?></td>
                  <td><?=($vaBerita['Pegawai'])?></td>
                  <td align="center">
                    <a class="btn-link" title="Edit Data" href="<?=site_url('surat/berita_acara/edit/'.$vaBerita['id_acara'].'')?>">
                      <i class="fa fa-edit"></i>
                    </a>|
                    
                  </td>
                </tr>
                <?php } ?>
                </tbody>
              </table>
          </dv>
        </div>
      </div>
      </div>
    </div> 
    </div>  
  </div>
</div>

    <form method="post" enctype="multipart/form-data"
    action="<?=site_url('surat_act/berita_acara/'.$cAction.'')?>">
    <div class="container">
      <div class="col-md-12 col-sm-12">
        <div class="box box-danger">
          <div class="box-header">
            <h3 class="box-title">Data Berita Acara</h3>
            <div class="box-tools pull-right">
              <span class="label label-danger">Input Data Berita Acara</span>
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div><!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div align="center">  
                <h3>Berita Acara </h3>
              </div>
            </div>
            <div class="row">
             <div class="col-sm-5">
              <div class="form-group">
                <label>Nama Pegawai</label>
                <select class="comboBox form-control" onchange="changeValue(this.value)"  
                name="cIdPegawai">
                  <option></option>
                  <?php       
                    foreach($pegawai as $dbRow){
                   ?>    
                  <option value="<?=$dbRow['id_pegawai']?>"
                      <?php if($dbRow['id_pegawai'] == $cIdPegawai)echo'selected'; ?>>
                      <?=$dbRow['nik']?> : <?=$dbRow['nama']?>
                  </option>
                  <?php } ?>
                </select>
              </div>
             </div>
            </div>
            <div class="row">
             <div class="col-sm-9">
              <div class="form-group">
                <label>Keterangan / (Kesalahan)</label>
                <textarea required class="form-control" name="cKeterangan" rows="10"><?=$cKeterangan?></textarea>
              </div>
             </div>
            </div>
            <div class="row">
             <div class="col-sm-6">
              <div class="form-group">
                <label>Tanggal</label>
                <input type="text" name="dTgl" class="form-control datetimepicker" data-date-format="DD-MM-YYYY" value="<?=$dTgl?>">
              </div>
             </div>
             <div class="col-sm-6">
              <div class="form-group">
                <label>TTD</label>
                <input type="text" name="cCreate" class="form-control" value="<?=$cCreate?>" placeholder="">
              </div>
             </div>
            </div>
            <br/>
            <div class="row">
               <div class="col-sm-12">
                <label>&nbsp;</label>
                <button type="submit"  class="btn btn-flat btn-primary">
                  <i class="fa fa-<?=$cIconButton?>"></i> <?=$cValueButton?>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
</section>
  
<script type="text/javascript">
    
    <?php echo $jsArray; ?>  
    function changeValue(id){  
      document.getElementById('cNik').value = jason[id].nik; 
    };
    </script>