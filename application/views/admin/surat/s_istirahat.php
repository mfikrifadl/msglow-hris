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

   
   
    $cNomorSuratFix = "No."."####"."/HRD-GN/".$cRomawai."/".date("Y")." ";

    foreach ($NoLast->result_array() as $key => $vaDataLast) {
      $cLastNoSurat = $vaDataLast['nomor_surat'];
    }
  
    if($NoLast->num_rows() > 0){
      $NoSuratTerakhir = $cLastNoSurat;
    }else{
      $NoSuratTerakhir = "No.0001/HRD-GN/".$cRomawai."/".date("Y")."";
    }
    

    ?>
  <?php 
        if($action == "edit") {
          foreach ($field as $column) {
            $cIdIstirahat     =   $column['id_istirahat'];
            $dTgl             =   String2Date($column['tgl']);
            $cIdKategoriSurat =   $column['id_kategori_surat'];
            $cNomorSurat      =   $column['nomor_surat'];
            $cIdPegawai       =   $column['id_pegawai'];
            $cDivisi          =   $column['divisi'];
            $cJabatan         =   $column['jabatan'];
            $dTglAwal         =   String2Date($column['tgl_awal']) ;
            $dTglAkhir        =   String2Date($column['tgl_akhir']);
            $cAlasan          =   $column['alasan'];
            $cCreate          =   $column['create']; 
            $cIconButton      =   "refresh"     ;
            $cValueButton     =   "Update Data" ;
          }
          $cAction = "Update/".$cIdIstirahat."" ;
        }else{
            $cIdIstirahat     =   ""  ;
            $dTgl             =   ""  ;
            $cIdKategoriSurat =   ""  ;
            $cNomorSurat      =   $cNomorSuratFix;
            $cIdPegawai       =   ""  ;
            $cDivisi          =   ""  ;
            $cJabatan         =   ""  ;
            $dTglAwal         =   ""  ;
            $dTglAkhir        =   ""  ;
            $cAlasan          =   ""  ;
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
          <h3 class="box-title">Data Table Istirahat  Pegawai</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
      </div><!-- /.box-header -->
      <div style="display: none;" class="box-body">
        <div class="nav-tabs-custom">
        <ul class="nav nav-tabs" id="myTabs">
          <li class="active"><a href="#tab_1" data-toggle="tab">Data Istirahat Pegawai </a></li> 
        </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="tab_1">
            <table class="table table-striped table-bordered" id="DataTable">
              <thead>
                <tr>
                  <td>No</td>
                  <td>Tanggal</td>
                  <td>Nomor Surat</td>
                  <td>Type Surat</td>
                  <td>Pegawai</td>
                  <td>Action</td>
                </tr>
              </thead>
              <tbody>
              <?php $no = 0 ; foreach ($row as $key => $vaIstirahat) { ?>
                <tr>
                  <td><?=++$no;?></td>
                  <td><?=String2Date($vaIstirahat['tgl'])?></td>
                  <td><?=($vaIstirahat['nomor_surat'])?></td>
                  <td><?=$vaIstirahat['NikPegawai']?></td>
                  <td><?=($vaIstirahat['NamaPegawai'])?></td>
                  <td align="center">
                    <a class="btn-link" title="View Data" target="_blank" href="<?=site_url('laporan/lp_istirahat/'.$vaIstirahat['id_istirahat'].'')?>">
                      <i class="fa fa-print"></i>
                    </a>|
                    <a class="btn-link" title="Edit Data" href="<?=site_url('surat/istirahat_pegawai/edit/'.$vaIstirahat['id_istirahat'].'')?>">
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
    action="<?=site_url('surat_act/istirahat_pegawai/'.$cAction.'')?>">
    <div class="container">
      <div class="col-md-12 col-sm-12">
        <div class="box box-danger">
          <div class="box-header with-border">
            <h3 class="box-title">Data Istirahat</h3>
            <div class="box-tools pull-right">
              <span class="label label-danger">Input Data Istirahat</span>
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div><!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div align="center">  
                <h3>SURAT ISTIRAHAT</h3>
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
             <div class="col-sm-4">
              <p color="red">*Lihat Nomor Terakhir Surat , Kemudian Hapus tanda pagar dan isikan
              nomor selanjutya sesuai dengan nomor terakhir surat yang tertera
              </p>
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
                    $jsArray = "var jason = new Array();\n";       
                    foreach($pegawai as $dbRow){
                   ?>    
                  <option value="<?=$dbRow['id_pegawai']?>"
                      <?php if($dbRow['id_pegawai'] == $cIdPegawai)echo'selected'; ?>>
                      <?=$dbRow['nik']?> : <?=$dbRow['nama']?>
                  </option>';    
                      <?php
                        $jsArray .= "jason['" . $dbRow['id_pegawai'] . "'] = 
                        {nik:'" . addslashes(($dbRow['nik'])) . "'};\n";    
                         }    
                      ?>
                </select>
              </div>
             </div>
             <div class="col-sm-4">
              <p color="red">*Jika Nama Operator Belum Ada Di List Harap Memasukkan Data Terlebih Dahulu ,<a href="<?=site_url('transaksi/pegawai')?>">Klik Disini</a> Untuk Menambah Data Operator</p>
            </div>
            </div>
            <div class="row">
              <div class="col-sm-5">
               <div class="form-group">
                <label>Divisi</label>
                <input type="text" name="cDivisi" value="<?=$cDivisi?>" 
                class="form-control" placeholder="Divisi">
               </div>
              </div>
              <div class="col-sm-4">
              <p color="red">*Isi Dengan Divisi Dari Pegawai yang dipilih</p>
            </div>
            </div>
            <div class="row">
              <div class="col-sm-5">
               <div class="form-group">
                <label>Jabatan</label>
                <input type="text" name="cJabatan" value="<?=$cJabatan?>" 
                class="form-control" placeholder="Jabatan Pegawai">
               </div>
              </div>
              <div class="col-sm-4">
              <p color="red">*Isi Dengan Jabatan Pegawai yang dipilih </p>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-5">
               <div class="form-group">
                <label>Tanggal Awal</label>
                 <div class="input-group">
                  <input type="text" name ="dTglAwal"
                  class="datetimepicker form-control" 
                  data-date-format="DD-MM-YYYY" value="<?=$dTglAwal?>"
                  placeholder="Tanggal Awal">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar-o"></i>
                    </div>
                </div>
               </div>
              </div>
              <div class="col-sm-5">
               <div class="form-group">
                <label>Tanggal Akhir</label>
                 <div class="input-group">
                  <input type="text" name ="dTglAkhir"
                  class="datetimepicker form-control" 
                  data-date-format="DD-MM-YYYY" value="<?=$dTglAkhir?>" 
                  placeholder="Tanggal Akhir">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar-o"></i>
                    </div>
                </div>
               </div>
              </div>
              <div class="col-sm-2">
              <p color="red">*Range Tanggal Istirahat</p>
            </div>
            </div>
            <div class="row">
              <div class="col-sm-5">
               <div class="form-group">
                <label>Alasan Mengistirahatkan Pegawai</label>
                 <textarea class="form-control"placeholder="Alasan" name="cAlasan"><?=$cAlasan?></textarea>
              </div>
            </div>
            <div class="row">
               <div class="col-sm-6">
               <label>Create</label>
                <input type="text" name="cCreate" class="form-control" value="<?=$cCreate?>" placeholder="Create"> 
              </div>
              <div class="col-sm-4">
              <p color="red">* Dapat diubah jika yang bukan bertanggung jawab Ibu Dewi </p>
              </div>
            </div>
            <br/>
            <div class="row">
               <div class="col-sm-12">
                <label>&nbsp;&nbsp;&nbsp;</label>
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