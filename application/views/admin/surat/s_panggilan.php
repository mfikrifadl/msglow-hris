 <?php 
    //SetKode

    $cRomawai = 'VIII';
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

   if($IdKategoriSurat == 18){
      $SuratKet = 'Surat Panggilan Operator';
      $cKet     = "OPERATOR";
    }elseif($IdKategoriSurat == 19){
      $SuratKet = 'Surat Panggilan Emergency';
      $cKet     = "EMERGENCY";
    }elseif($IdKategoriSurat == 20){
      $SuratKet = 'Surat Panggilan Supervisor';
      $cKet     = "SUPERVISOR";
    }elseif($IdKategoriSurat == 21){
      $SuratKet = 'Surat Panggilan Tim Omset';
      $cKet     = "TIM OMSET";
    }elseif($IdKategoriSurat == 22){
      $SuratKet = 'Surat Panggilan Assistant Trainer';
      $cKet     = "ASSISTANT TRAINER";
    }elseif($IdKategoriSurat == 23){
      $SuratKet = 'Surat Panggilan Kepala Trainer';
      $cKet     = "KEPALA TRAINER";
    }
   
    $cNomorSuratFix = "No."."####"."/SPG-".$cKet."/GIU-HR/".$cRomawai."/".date("Y")." ";

    foreach ($NoLast->result_array() as $key => $vaDataLast) {
      $cLastNoSurat = $vaDataLast['nomor_surat'];
    }
  
    if($NoLast->num_rows() > 0){
      $NoSuratTerakhir = $cLastNoSurat;
    }else{
      $NoSuratTerakhir = "No.0001/SPG-".$cKet."/GIU-HR/".$cRomawai."/".date("Y")."";
    }
    

    ?>
  <?php 
        if($action == "edit") {
          foreach ($field as $column) {
            $cIdPanggilan     =   $column['id_panggilan'];
            $dTgl             =   String2Date($column['tgl']);
            $cIdKategoriSurat =   $column['id_kategori_surat'];
            $cNomorSurat      =   $column['nomor_surat'];
            $cIdPegawai       =   $column['id_pegawai'];
            $cUnitKerja       =   $column['unit_kerja'];
            $cUntuk           =   $column['untuk'];
            $cHari            =   String2Date($column['tanggal']);
            $cTempat          =   $column['tempat'];
            $cJam             =   $column['jam'];
            $cPakaian         =   $column['pakaian'];
            $cCreate          =   $column['create'];
            $cIconButton      =   "refresh"     ;
            $cValueButton     =   "Update Data" ;
          }
          $cAction = "Update/".$cIdPanggilan."" ;
        }else{
            $cIdPanggilan    =   "" ;
            $dTgl             =   "" ;
            $cIdKategoriSurat =   "" ;
            $cNomorSurat      =   $cNomorSuratFix ;
            $cIdPegawai       =   "" ;
            $cUnitKerja       =   "" ;
            $cUntuk           =   "" ;
            $cHari            =   $tanggal ;
            $cTempat          =   "Kantor Pusat PT GIU Mutiara Bekasi Center Blok B-09/11 Jl.Ahmad Yani, Bekasi" ;
            $cJam             =   "" ;
            $cPakaian         =   "Seragam Kerja Harian" ;
            $cCreate          =   "Dewi M. Ratnasari" ;
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
          <h3 class="box-title">Data Table Panggilan  Pegawai</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
      </div><!-- /.box-header -->
      <div style="display: none;" class="box-body">
        <div class="nav-tabs-custom">
        <ul class="nav nav-tabs" id="myTabs">
          <li class="active"><a href="#tab_1" data-toggle="tab">Data Panggilan Pegawai </a></li> 
        </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="tab_1">
            <table class="table table-striped table-bordered" id="DataTable">
              <thead>
                <tr>
                  <td>No</td>
                  <td>Tanggal</td>
                  <td>Nomor Surat</td>
                  <td>NIK Pegawai</td>
                  <td>Pegawai</td>
                  <td>Action</td>
                </tr>
              </thead>
              <tbody>
              <?php $no = 0 ; foreach ($row as $key => $vaPanggilan) { ?>
                <tr>
                  <td><?=++$no;?></td>
                  <td><?=String2Date($vaPanggilan['tgl'])?></td>
                  <td><?=($vaPanggilan['nomor_surat'])?></td>
                  <td><?=$vaPanggilan['NikPegawai']?></td>
                  <td><?=($vaPanggilan['NamaPegawai'])?></td>
                  <td align="center">
                    <a class="btn-link" title="View Data" target="_blank" href="<?=site_url('laporan/lp_Panggilan/'.$vaPanggilan['id_panggilan'].'')?>">
                      <i class="fa fa-print"></i>
                    </a>|
                    <a class="btn-link" title="Edit Data" href="<?=site_url('surat/Panggilan_pegawai/'.$vaPanggilan['id_kategori_surat'].'/edit/'.$vaPanggilan['id_panggilan'].'')?>">
                      <i class="fa fa-edit"></i>
                    </a>|
                    <a class="btn-link" title="Hapus Data" onclick="if(confirm('Apakah anda yakin akah menghapus data?'))
                      { window.location.href='<?=site_url('surat_act/panggilan_pegawai/Delete/'.$vaPanggilan['id_panggilan'].'/'.$vaPanggilan['id_kategori_surat'].' ')?>'}">
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
    action="<?=site_url('surat_act/panggilan_pegawai/'.$cAction.'')?>">
    <div class="container">
      <div class="col-md-12 col-sm-12">
        <div class="box box-danger">
          <div class="box-header with-border">
            <h3 class="box-title">Data Panggilan</h3>
            <div class="box-tools pull-right">
              <span class="label label-danger">Input Data Panggilan</span>
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div><!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div align="center">  
                <h3>SURAT PANGGILAN</h3>
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
               <input type="hidden" name="cIdSurat" value="<?=$IdKategoriSurat?>">
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
                <label>Asal Unit Kerja</label>
                <input type="text" name="cUnitKerja" value="<?=$cUnitKerja?>" 
                class="form-control" placeholder="Unit Kerja">
               </div>
              </div>
              <div class="col-sm-4">
              <p color="red">*Isi Dengan Unit Kerja Dari Pegawai yang dipilih</p>
            </div>
            </div>
            <div class="row">
              <div class="col-sm-5">
               <div class="form-group">
                <label>Dipanggil Untuk</label>
                <input type="text" name="cUntuk" value="<?=$cUntuk?>" 
                class="form-control" placeholder="Dipanggil Untuk">
               </div>
              </div>
              <div class="col-sm-4">
              <p color="red">*Isi Dengan Alasan Kenapa Memanggil Pegawai Tersebut </p>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-5">
               <div class="form-group">
                <label>Tanggal</label>
                 <div class="input-group">
                  <input type="text" name ="dTgl"
                  class="datetimepicker form-control" 
                  data-date-format="DD-MM-YYYY" value="<?=$cHari?>"
                  placeholder="Tanggal Awal">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar-o"></i>
                    </div>
                </div>
               </div>
              </div>
              <div class="col-sm-5">
               <div class="form-group">
                <label>Jam</label>
                 <div class="input-group">
                  <input type="text" name ="cJam"
                  class="Jam form-control" 
                  value="<?=$cJam?>"
                  placeholder="Jam">
                    <div class="input-group-addon">
                      <i class="fa fa-clock-o"></i>
                    </div>
                </div>
               </div>
              </div>
              <div class="col-sm-2">
              <p color="red">* Jam & Tanggal Panggilan</p>
            </div>
            </div>
            <div class="row">
              <div class="col-sm-5">
               <div class="form-group">
                <label>Tempat</label>
                 <textarea class="form-control" name="cTempat"><?=$cTempat?></textarea>
               </div>
              </div>
              <div class="col-sm-2">
              <p color="red">* Tempat Pegawai Harus Menghadap </p>
            </div>
            </div>
            <div class="row">
              <div class="col-sm-5">
               <div class="form-group">
                <label>Pakaian</label>
                <input type="text" name="cPakaian" value="<?=$cPakaian?>" 
                class="form-control" placeholder="Pakaian">
               </div>
              </div>
              <div class="col-sm-4">
              <p color="red">*Isi Dengan Pakaian Yang Harus Dikenakan Saat menerima Surat Panggilan </p>
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