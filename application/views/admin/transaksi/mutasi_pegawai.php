 <?php 
  
  $cRomawai = '';
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

   
   
  

    if($IdKategoriSurat == 11){
      $SuratKet = 'Surat Mutasi Operator';
      $cKet     = "OPERATOR";
        $cJabatan = 45;
    }elseif($IdKategoriSurat == 12){
      $SuratKet = 'Surat Mutasi Emergency';
      $cKet     = "EMERGENCY";
      $cJabatan = 46;
    }elseif($IdKategoriSurat == 13){
      $SuratKet = 'Surat Mutasi Assistant Supervisor';
      $cKet     = "ASSISTANT SUPERVISOR";
    }elseif($IdKategoriSurat == 14){
      $SuratKet = 'Surat Mutasi Supervisor';
      $cKet     = "SUPERVISOR";
      $cJabatan = 50;
    }elseif($IdKategoriSurat == 15){
      $SuratKet = 'Surat Mutasi Tim Omset';
      $cKet     = "TIM OMSET";
      $cJabatan = 52;
    }elseif($IdKategoriSurat == 16){
      $SuratKet = 'Surat Mutasi Assistant Trainer';
      $cKet     = "ASSISTANT TRAINER";
      $cJabatan = 53;
    }elseif($IdKategoriSurat == 17){
      $SuratKet = 'Surat Mutasi Kepala Trainer';
      $cKet     = "KEPALA TRAINER";
      $cJabatan = 54;
    }elseif($IdKategoriSurat == 34){
      $SuratKet = 'Surat Mutasi Tim Pendongkrak';
      $cKet     = "TIM PENDONGKRAK";
      $cJabatan = 55;
    }

    $cNomorMutasiFix = "No."."####"."/SM-".$cKet."/GIU-HR/".$cRomawai."/".date("Y")." ";

    foreach ($NoLast->result_array() as $key => $vaDataLast) {
      $cLastNoSurat = $vaDataLast['nomor_mutasi'];
    }
  
    if($NoLast->num_rows() > 0){
      $NoSuratTerakhir = $cLastNoSurat;
    } else{
      $NoSuratTerakhir = "No.0001/SM-".$cKet."/GIU-HR/".$cRomawai."/".date("Y")."";
    }
    

    ?>
  <?php 
        if($action == "edit") {
          foreach ($field as $column) {
            $cIdMutasi      =   $column['id_mutasi']  ;
            $dTglMutasi     =   String2Date($column['tanggal'])  ;
            $nNomorMutasi   =   $column['nomor_mutasi'];
            $cIdPegawai     =   $column['id_pegawai'];
            $cIdJabatanLama =   $column['id_jabatan_lama'];
            $cTempatLama    =   $column['id_outlet_lama'];
            $cAtasanLama    =   $column['id_spv_lama'];
            $cIdJabatanBaru =   $column['id_jabatan_baru'];
            $cTempatBaru    =   $column['id_outlet_baru'];
            $cAtasanBaru    =   $column['id_spv_baru'];
            $cTugas         =   $column['tugas']  ;
            $cCreate        =   $column['create'];
            $cIconButton    =   "refresh"     ;
            $cValueButton   =   "Update Data" ;
          }
          $cAction = "Update/".$cIdMutasi."" ;
        }else{
            $cIdMutasi      =   ""  ;
            $dTglMutasi     =   $tanggal  ;
            $nNomorMutasi   =   $cNomorMutasiFix  ;
            $cIdPegawai     =   ""  ;
            $cIdJabatanLama =   $cJabatan  ;
            $cTempatLama    =   ""  ;
            $cAtasanLama    =   ""  ;
            $cIdJabatanBaru =   $cJabatan  ;
            $cTempatBaru    =   ""  ;
            $cAtasanBaru    =   ""  ;
            $cTugas         =   ""  ;
            $cCreate        =   "Dewi M.Ratnasari"  ;
            $cIconButton    =   "save"    ;
            $cValueButton   =   "Save Data" ;
            $cAction        =   "Insert" ; 
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
          <h3 class="box-title">Data Table Mutasi Pegawai </h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
      </div><!-- /.box-header -->
      <div style="display: none;" class="box-body">
        <div class="nav-tabs-custom">
        <ul class="nav nav-tabs" id="myTabs">
           <li class="active"><a href="#tab_1" data-toggle="tab">Data Mutasi Pegawai </a></li> 
        </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="tab_1">
            <table class="table table-striped table-bordered" id="DataTable">
              <thead>
                <tr>
                  <td>No</td>
                  <td>Tanggal</td>
                  <td>Nomor Mutasi</td>
                  <td>Type Surat</td>
                  <td>Pegawai</td>
                  <td>Action</td>
                </tr>
              </thead>
              <tbody>
              <?php $no = 0 ; foreach ($row as $key => $vaMutasi) { ?>
                <tr>
                  <td><?=++$no;?></td>
                  <td><?=String2Date($vaMutasi['tanggal'])?></td>
                  <td><?=($vaMutasi['nomor_mutasi'])?></td>
                  <td><?=$vaMutasi['KategoriSurat']?></td>
                  <td><?=($vaMutasi['Pegawai'])?></td>
                  <td >
                    <a class="btn-link" title="View Data"  target="_blank" href="<?=site_url('laporan/lp_mutasi/'.$vaMutasi['id_mutasi'].'')?>">
                      <i class="fa fa-print"></i>
                    </a>|
                    <a class="btn-link" title="Edit Data" href="<?=site_url('surat/mutasi_pegawai/'.$vaMutasi['id_kategori_surat'].'/edit/'.$vaMutasi['id_mutasi'].'')?>">
                      <i class="fa fa-edit"></i>
                    </a>|
                     <a class="btn-link" title="Hapus Data" onclick="if(confirm('Apakah anda yakin akah menghapus data?'))
                      { window.location.href='<?=site_url('surat_act/mutasi_pegawai/Delete/'.$vaMutasi['id_mutasi'].'/'.$vaMutasi['id_kategori_surat'].' ')?>'}">
                      <i class="fa fa-trash-o"></i>
                    </a>
                    
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
    action="<?=site_url('surat_act/mutasi_pegawai/'.$cAction.'')?>">
    <div class="container">
      <div class="col-md-12 col-sm-12">
        <div class="box box-danger">
          <div class="box-header with-border">
            <h3 class="box-title">Data Mutasi</h3>
            <div class="box-tools pull-right">
              <span class="label label-danger">Input Data Mutasi</span>
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div><!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="container" align="center">  
                <h3><?=$SuratKet?></h3><br/>
                <?php if($action != 'edit'){ ?>
                <h4>Nomor Terakhir : <strong><?=$NoSuratTerakhir?></strong></h4>
                <?php } ?>
                <br/>
              </div>
              <div class="container">
                <div class="col-sm-1">&nbsp;</div>
                <div class="col-sm-9">
                  <div class="row">
                    <div class="col-sm-3">Nomor Mutasi</div>
                    <div class="col-sm-1">:</div>
                    <div class="col-sm-6">
                      <input type="text" name="nNomorMutasi" class="form-control" 
                      placeholder="Nomor Mutasi" value="<?=$nNomorMutasi?>">
                    </div>
                  </div>
                  <br/>
                  <div class="row">
                    <div class="col-sm-3">NAMA</div>
                    <div class="col-sm-1">:</div>
                    <div class="col-sm-6">
                      <select class="comboBox form-control" onchange="changeValue(this.value)"  name="cIdPegawai">
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
                  <br/>
                  <div class="row">
                    <div class="col-sm-3">NIK</div>
                    <div class="col-sm-1">:</div>
                    <div class="col-sm-6">
                      <input type="text" name="cNik" id = "cNik" class="form-control" readonly="true">
                    </div>
                  </div>
                </div>
              </div>
              <br/>
              <div class="container">
                <div class="col-sm-1">&nbsp;</div>
                <div class="col-sm-9" >
                  <div class="row">
                    <div class="col-sm-3">JABATAN LAMA</div>
                    <div class="col-sm-1">:</div>
                    <div class="col-sm-6">
                      <select class="comboBox form-control" name="cIdJabatanLama">
                        <option></option>
                        <?php foreach ($jabatan as $key => $vaJabatan) { ?>
                        <option value="<?=$vaJabatan['id_sub_unit_kerja']?>"
                        <?php if($vaJabatan['id_sub_unit_kerja'] == $cIdJabatanLama)echo "selected"; ?>>
                          <?=$vaJabatan['nama_sub_unit_kerja']?>
                        </option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <br/>
                  <div class="row">
                    <div class="col-sm-3">TEMPAT / OUTLET LAMA</div>
                    <div class="col-sm-1">:</div>
                    <div class="col-sm-6">
                      <select class="comboBox form-control" name="cTempatLama" 
                      onchange="return GetDataSpvLama(this.value);">
                        <option></option>
                        <?php foreach ($Outlet as $key => $vaOutlet) { ?>
                        <option value="<?=$vaOutlet['id_outlet']?>"
                        <?php if($vaOutlet['id_outlet'] == $cTempatLama)echo "selected"; ?>>
                          <?=$vaOutlet['nama']?>
                        </option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <br/>
                  <div class="row">
                    <div class="col-sm-3">ATASAN / SPV Lama</div>
                    <div class="col-sm-1">:</div>
                    <div class="col-sm-6">
                      <div id="SpvLama"></div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="container">
                <div class="col-sm-1">&nbsp;</div>
                <div class="col-sm-9" align="left">
                  <hr/>
                </div>
              </div>
              <br/>
              <div class="container">
                <div class="col-sm-1">&nbsp;</div>
                <div class="col-sm-9" >
                  <div class="row">
                    <div class="col-sm-3">JABATAN BARU</div>
                    <div class="col-sm-1">:</div>
                    <div class="col-sm-6">
                      <select class="comboBox form-control" name="cIdJabatanBaru">
                        <option></option>
                        <?php foreach ($jabatan as $key => $vaJabatan) { ?>
                        <option value="<?=$vaJabatan['id_sub_unit_kerja']?>"
                        <?php if($vaJabatan['id_sub_unit_kerja'] == $cIdJabatanBaru)echo "selected"; ?>>
                          <?=$vaJabatan['nama_sub_unit_kerja']?>
                        </option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <br/>
                  <div class="row">
                    <div class="col-sm-3">TEMPAT / OUTLET BARU</div>
                    <div class="col-sm-1">:</div>
                    <div class="col-sm-6">
                      <select class="comboBox form-control" name="cTempatBaru" 
                      onchange="return GetDataSpvBaru(this.value)">
                        <option></option>
                        <?php foreach ($Outlet as $key => $vaOutlet) { ?>
                        <option value="<?=$vaOutlet['id_outlet']?>"
                        <?php if($vaOutlet['id_outlet'] == $cTempatBaru)echo "selected"; ?>>
                          <?=$vaOutlet['nama']?>
                        </option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <br/>
                  <div class="row">
                    <div class="col-sm-3">ATASAN / SPV BARU</div>
                    <div class="col-sm-1">:</div>
                    <div class="col-sm-6">
                      <div id="SpvBaru"></div>
                    </div>
                  </div>
                  <br/>
                  <div class="row">
                    <div class="col-sm-3">Masa Tugas</div>
                    <div class="col-sm-1">:</div>
                    <div class="col-sm-6">
                      <textarea name="cNamaTugas" class="form-control" placeholder="Masa Tugas"><?=$cTugas?></textarea>
                    </div>
                  </div>
                  <br/>
                   <div class="row">
                    <div class="col-sm-3">Tanggal</div>
                    <div class="col-sm-1">:</div>
                    <div class="col-sm-6">
                      <input type="text"  name="dTglMutasi" 
                     class="datetimepicker form-control" data-date-format="DD-MM-YYYY"
                     placeholder="Tanggal" value="<?=$dTglMutasi?>">
                    </div>
                  </div>
                  <br/>
                  <div class="row">
                    <div class="col-sm-3">Penanggung Jawab</div>
                    <div class="col-sm-1">:</div>
                    <div class="col-sm-6">
                     <input type="text"  name="cCreate" 
                     class="form-control"
                     placeholder="Penanggung Jawab" value="<?=$cCreate?>"> 
                    </div>
                  </div>
                  <br/>
                  <button type="submit"  class="btn btn-flat btn-danger">
                  <i class="fa fa-<?=$cIconButton?>"></i> <?=$cValueButton?>
                </button>
                </div>
              </div>
              <br/><br/>
              <br/>
            
            </div>
              <input type="hidden" name="cIdSurat" value="<?=$IdKategoriSurat?>">           
        </form>
</section>
  
  <script type="text/javascript">
    
    <?php echo $jsArray; ?>  
    function changeValue(id){  
      document.getElementById('cNik').value = jason[id].nik; 
    };
  </script>

    <script>
         function GetDataSpvLama(id){
          $.ajax({
            type: "GET",
            url: "<?=base_url()?>surat/GetSpvMutasi/lama/"+id,
            cache: false,
            success:function(msg){
              $("#SpvLama").html(msg);
            }
           });
         }
         function GetDataSpvBaru(id){
          $.ajax({
            type: "GET",
            url: "<?=base_url()?>surat/GetSpvMutasi/baru/"+id,
            cache: false,
            success:function(msg){
              $("#SpvBaru").html(msg);
            }
           });
         }
      </script>
