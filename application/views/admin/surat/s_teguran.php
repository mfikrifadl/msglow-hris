 <?php 
    //SetKode
   if(date("m") == '01'){
      $cRomawai = 'I';
    }elseif(date("m") == '02'){
      $cRomawai = 'II';
    }elseif(date("m") == '03'){
      $cRomawai = 'III';
    }elseif(date("m") == '04'){
      $cRomawai = 'IV';
    }elseif(date("m") == '05'){
      $cRomawai = 'V';
    }elseif(date("m") == '06'){
      $cRomawai = 'VI';
    }elseif(date("m") == '07'){
      $cRomawai = 'VII';
    }elseif(date("m") == '08'){
      $cRomawai = 'VIII';
    }elseif(date("m") == '09'){
      $cRomawai = 'IX';
    }elseif(date("m") == '10'){
      $cRomawai = 'X';
    }elseif(date("m") == '11'){
      $cRomawai = 'XI';
    }elseif(date("m") == '12'){
      $cRomawai = 'XII';
    }

   
   
    $cNomorSuratFix = "No."."####"."/GIU-HRM/ST/".$cRomawai."/".date("Y")." ";

    foreach ($NoLast->result_array() as $key => $vaDataLast) {
      $cLastNoSurat = $vaDataLast['nomor_surat'];
    }
  
    if($NoLast->num_rows() > 0){
      $NoSuratTerakhir = $cLastNoSurat;
    }else{
      $NoSuratTerakhir = "No.0001/GIU-HRM/ST/".$cRomawai."/".date("Y")."";
    }
    

    ?>
  <?php 
        if($action == "edit") {
          foreach ($field as $column) {
            $cIdTeguran       =   $column['id_teguran'] ;
            $cIdKategoriSurat =   $column['id_kategori_surat'] ;
            $cNomorSurat      =   $column['nomor_surat']  ;
            $cIdPegawai       =   $column['id_pegawai'] ;
            $cKeterangan      =   $column['keterangan'] ;
            $dTgl             =   String2Date($column['tanggal'])  ;
            $cCreate          =   $column['create']   ;  
            $cIconButton      =   "refresh"     ;
            $cValueButton     =   "Update Data" ;
          }
          $cAction = "Update/".$cIdTeguran."" ;
        }else{
            $cIdTeguran       =   "" ;
            $cIdKategoriSurat =   "" ;
            $cNomorSurat      =   $cNomorSuratFix  ;
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
          <h3 class="box-title">Data Table Teguran Pegawai</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
      </div><!-- /.box-header -->
      <div style="display: none;" class="box-body">
        <div class="nav-tabs-custom">
        <ul class="nav nav-tabs" id="myTabs">
          <li class="active"><a href="#tab_1" data-toggle="tab">Data Teguran Pegawai </a></li> 
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
              <?php $no = 0 ; foreach ($row as $key => $vaTeguran) { ?>
                <tr>
                  <td><?=++$no;?></td>
                  <td><?=String2Date($vaTeguran['tanggal'])?></td>
                  <td><?=($vaTeguran['nomor_surat'])?></td>
                  <td><?=$vaTeguran['Nik']?></td>
                  <td><?=($vaTeguran['Pegawai'])?></td>
                  <td align="center">
                    <a class="btn-link" title="Edit Data" href="<?=site_url('surat/surat_teguran/edit/'.$vaTeguran['id_teguran'].'')?>">
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
    action="<?=site_url('surat_act/teguran_pegawai/'.$cAction.'')?>">
    <div class="container">
      <div class="col-md-12 col-sm-12">
        <div class="box box-danger">
          <div class="box-header with-border">
            <h3 class="box-title">Data Teguran</h3>
            <div class="box-tools pull-right">
              <span class="label label-danger">Input Data Teguran</span>
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div><!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div align="center">  
                <h3>SURAT TEGURAN TERTULIS</h3>
                <?php if($action != 'edit'){ ?>
                <h4>Nomor Terakhir : <strong><?=$NoSuratTerakhir?></strong></h4>
                <?php } ?>
              </div>
            </div>
            <div class="row">
             <div class="col-sm-5">
              <div class="form-group">
                <label>Nomor Surat</label>
                <input type="text" name="nNomorSurat" class="form-control" 
                 placeholder="Nomor Surat" value="<?=$cNomorSurat?>">
              </div>
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
                <textarea class="form-control" name="cKeterangan" rows="10"><?=$cKeterangan?></textarea>
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