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

   if($IdKategoriSurat == 24){
      $SuratKet = 'Surat Tugas Operator';
      $cKet     = "OPERATOR";
      $cJabatan = 45;
    }elseif($IdKategoriSurat == 25){
      $SuratKet = 'Surat Tugas Emergency';
      $cKet     = "EMERGENCY";
      $cJabatan = 46;
    }elseif($IdKategoriSurat == 26){
      $SuratKet = 'Surat Tugas Trainer';
      $cKet     = "TRAINER";
      $cJabatan = 47;
    }elseif($IdKategoriSurat == 27){
      $SuratKet = 'Surat Tugas Tim Dongkarak';
      $cKet     = "TIM DONGKRAK";
      $cJabatan = 48;
    }elseif($IdKategoriSurat == 28){
      $SuratKet = 'Surat Tugas Supervisor';
      $cKet     = "SUPERVISOR";
      $cJabatan = 50;
    }elseif($IdKategoriSurat == 29){
      $SuratKet = 'Surat Tugas Tim Pembina';
      $cKet     = "TIM PEMBINA";
      $cJabatan = 51;
    }elseif($IdKategoriSurat == 30){
      $SuratKet = 'Surat Tugas Tim Omset';
      $cKet     = "TIM OMSET";
      $cJabatan = 52;
    }
   
    $cNomorSuratFix = "No."."####"."/ST-".$cKet."/GIU-HR/".$cRomawai."/".date("Y")." ";

    foreach ($NoLast->result_array() as $key => $vaDataLast) {
      $cLastNoSurat = $vaDataLast['nomor_surat'];
    }
  
    if($NoLast->num_rows() > 0){
      $NoSuratTerakhir = $cLastNoSurat;
    }else{
      $NoSuratTerakhir = "No.0001/ST-".$cKet."/GIU-HR/".$cRomawai."/".date("Y")."";
    }
    

    ?>
  <?php 
        if($action == "edit") {
          foreach ($field as $column) {
            $cIdTugas         =   $column['id_tugas'] ;
            $dTgl             =   String2Date($column['tgl'])  ;
            $cIdKategoriSurat =   $column['id_kategori_surat'];
            $cNomorSurat      =   $column['nomor_surat'];
            $cIdPegawai       =   $column['id_pegawai'];
            $cIdOutlet        =   $column['id_outlet_lama'];
            $cIdJabatan       =   $column['id_jabatan'];
            $cTempat          =   $column['id_outlet_baru'];
            $cDeskripsi       =   $column['deskripsi'];
            $cIdSpv           =   $column['id_spv'];
            $cFasilitas       =   $column['fasilitas'] ;
            $cIndikator       =   $column['indikator'];
            $cTugas           =   $column['tugas'];
            $cCreate          =   $column['create'];
            $cIconButton      =   "refresh"     ;
            $cValueButton     =   "Update Data" ;
          }
          $cAction = "Update/".$cIdTugas."" ;
        }else{
            $cIdTugas         =   "" ;
            $dTgl             =   $tanggal;
            $cIdKategoriSurat =   $IdKategoriSurat ;
            $cNomorSurat      =   $cNomorSuratFix;
            $cIdPegawai       =   "";
            $cIdOutlet        =   "";
            $cIdJabatan       =   $cJabatan;
            $cTempat          =   "";
            $cDeskripsi       =   "1.
2.
3.
4.
5.
6.
7.
8.";
            $cIdSpv           =   "";
            $cFasilitas       =   "Terlampir";
            $cIndikator       =   "Terlampir";
            $cTugas           =   "";
            $cCreate          =   "Dewi M Ratnasari";
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
          <h3 class="box-title">Data Table Tugas  Pegawai</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
      </div><!-- /.box-header -->
      <div style="display: none;" class="box-body">
        <div class="nav-tabs-custom">
        <ul class="nav nav-tabs" id="myTabs">
          <li class="active"><a href="#tab_1" data-toggle="tab">Data Tugas Pegawai </a></li> 
        </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="tab_1">
            <table class="table table-striped table-bordered" id="DataTable">
              <thead>
                <tr>
                  <td>No</td>
                  <td>Tanggal</td>
                  <td>Nomor Surat</td>
                  <td>Nik Pegawai</td>
                  <td>Pegawai</td>
                  <td>Action</td>
                </tr>
              </thead>
              <tbody>
              <?php $no = 0 ; foreach ($row as $key => $vaTugas) { ?>
                <tr>
                  <td><?=++$no;?></td>
                  <td><?=String2Date($vaTugas['tgl'])?></td>
                  <td><?=($vaTugas['nomor_surat'])?></td>
                  <td><?=$vaTugas['Nik']?></td>
                  <td><?=($vaTugas['Pegawai'])?></td>
                  <td align="center">
                    <a class="btn-link" title="View Data" href="<?=site_url('laporan/lp_tugas/'.$vaTugas['id_tugas'].'')?>">
                      <i class="fa fa-print"></i>
                    </a>|
                    <a class="btn-link" title="Edit Data" href="<?=site_url('surat/tugas_pegawai/'.$vaTugas['id_kategori_surat'].'/edit/'.$vaTugas['id_tugas'].'')?>">
                      <i class="fa fa-edit"></i>
                    </a>|
                    <a class="btn-link" title="Hapus Data" onclick="if(confirm('Apakah anda yakin akah menghapus data?'))
                      { window.location.href='<?=site_url('surat_act/tugas_pegawai/Delete/'.$vaTugas['id_tugas'].'/'.$vaTugas['id_kategori_surat'].' ')?>'}">
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
    action="<?=site_url('surat_act/tugas_pegawai/'.$cAction.'')?>">
    <div class="container">
      <div class="col-md-12 col-sm-12">
        <div class="box box-danger">
          <div class="box-header with-border">
            <h3 class="box-title">Data Tugas</h3>
            <div class="box-tools pull-right">
              <span class="label label-danger">Input Data Tugas</span>
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div><!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div align="center">  
                <h3>SURAT TUGAS</h3>
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
                <label>Outlet Lama / Tempat Lama</label>
                 <select class="comboBox form-control" name="cIdOutletLama">
                  <option></option>
                    <?php foreach ($outlet as $key => $vaOutlet) { ?>
                    <option value="<?=$vaOutlet['id_outlet']?>"
                      <?php if($vaOutlet['id_outlet'] == $cIdOutlet)echo "selected"; ?>>
                          <?=$vaOutlet['kode']?> : <?=$vaOutlet['nama']?>
                      </option>
                    <?php } ?>
                 </select>
               </div>
              </div>
              <div class="col-sm-4">
              <label>Outlet Baru / Tempat Baru</label>
                 <select class="comboBox form-control" name="cIdOutletBaru">
                  <option></option>
                    <?php foreach ($outlet as $key => $vaOutlet) { ?>
                    <option value="<?=$vaOutlet['id_outlet']?>"
                      <?php if($vaOutlet['id_outlet'] == $cTempat)echo "selected"; ?>>
                          <?=$vaOutlet['kode']?> : <?=$vaOutlet['nama']?>
                      </option>
                    <?php } ?>
                 </select>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-5">
               <div class="form-group">
                <label>Jabatan</label>
                <select class="comboBox form-control" name="cIdJabatan">
                  <option></option>
                    <?php foreach ($jabatan as $key => $vaJabatan) { ?>
                    <option value="<?=$vaJabatan['id_sub_unit_kerja']?>"
                      <?php if($vaJabatan['id_sub_unit_kerja'] == $cIdJabatan)echo "selected"; ?>>
                          <?=$vaJabatan['nama_sub_unit_kerja']?>
                      </option>
                    <?php } ?>
                 </select>
               </div>
              </div>
              <div class="col-sm-5">
               <div class="form-group">
                <label>Deskripsi Pekerjaan</label>
                <textarea class="form-control" rows="10" name="cDeskripsi"><?=$cDeskripsi?></textarea>
               </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-4">
               <div class="form-group">
                <label>Atasan / SPV</label>
                 <select class="comboBox form-control" name="cIdSpv">
                  <option></option>
                    <?php foreach ($supervisor as $key => $vaSupervisor) { ?>
                    <option value="<?=$vaSupervisor['id_spv']?>"
                      <?php if($vaSupervisor['id_spv'] == $cIdSpv)echo "selected"; ?>>
                          <?=$vaSupervisor['nik']?> : <?=$vaSupervisor['nama']?>
                      </option>
                    <?php } ?>
                 </select>
               </div>
              </div>
              <div class="col-sm-4">
              <label>Fasilitas dan Tugas</label>
                 <input type="text" name="cFasilitas" class="form-control" 
                 placeholder="Fasilitas" value="<?=$cFasilitas?>">
              </div>
              <div class="col-sm-4">
              <label>Indikator Kerja</label>
                 <input type="text" name="cIndikator" class="form-control" 
                 placeholder="Indikator" value="<?=$cIndikator?>">
              </div>
            </div>
            <div class="row">
              <div class="col-sm-5">
               <div class="form-group">
                <label>Tanggal</label>
                 <div class="input-group">
                  <input type="text" name ="dTgl"
                  class="datetimepicker form-control" 
                  data-date-format="DD-MM-YYYY" value="<?=$dTgl?>"
                  placeholder="Tanggal Awal">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar-o"></i>
                    </div>
                </div>
               </div>
              </div>
              <div class="col-sm-5">
               <div class="form-group">
                <label>Masa Tugas</label>
                 <textarea class="form-control" name="cTugas"><?=$cTugas?></textarea>
               </div>
              </div>
              <div class="col-sm-2">
              <p color="red">* Masa Tugas </p>
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