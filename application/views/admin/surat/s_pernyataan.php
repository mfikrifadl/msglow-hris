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

   
   
    $cNomorSuratFix = "No."."####"."/HRD/GIU-SPN/".$cRomawai."/".date("Y")." ";

   foreach ($NoLast->result_array() as $key => $vaDataLast) {
      $cLastNoSurat = $vaDataLast['nomor_surat'];
    }
  
    if($NoLast->num_rows() > 0){
      $NoSuratTerakhir = $cLastNoSurat;
    }else{
      $NoSuratTerakhir = "No.0001/HRD/GIU-SPN/".$cRomawai."/".date("Y")."";
    }
    

    ?>
  <?php 
        if($action == "edit") {
          foreach ($field as $column) {
            $cIdPernyataan    =   $column['id_pernyataan'];
            $dTgl             =   String2Date($column['tgl']);
            $cIdKategoriSurat =   $column['id_kategori_surat'];
            $cNomorSurat      =   $column['nomor_surat'];
            $cPerihal         =   $column['perihal'];
            $cLampiran        =   $column['lampiran'];
            $cIdPegawai       =   $column['id_pegawai'];
            $cIdOutlet        =   $column['id_outlet'];
            $nTelepon         =   $column['telepon'];
            $cKeterangan      =   $column['keterangan'];
            $cCreate1         =   $column['create_1'];
            $cCreate2         =   $column['create_2'];
            $cPelanggaran     =   $column['pelanggaran'];
            $cSangsi          =   $column['sangsi'];
            $cIconButton      =   "refresh"     ;
            $cValueButton     =   "Update Data" ;
          }
          $cAction = "Update/".$cIdPernyataan."" ;
        }else{
            $cIdPernyataan    =   "" ;
            $dTgl             =   $tanggal ;
            $cIdKategoriSurat =   "" ;
            $cNomorSurat      =   $cNomorSuratFix;
            $cPerihal         =   "" ;
            $cLampiran        =   "" ;
            $cIdPegawai       =   "" ;
            $cIdOutlet        =   "" ;
            $nTelepon         =   "" ;
            $cKeterangan      =   "" ;
            $cPelanggaran     =   "" ;
            $cSangsi          =   "" ;
            $cCreate1         =   "Ibu Rani" ;
            $cCreate2         =   "Ibu Dewi M.R" ;
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
          <h3 class="box-title">Data Table Pernyataan  Pegawai</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
      </div><!-- /.box-header -->
      <div style="display: none;" class="box-body">
        <div class="nav-tabs-custom">
        <ul class="nav nav-tabs" id="myTabs">
          <li class="active"><a href="#tab_1" data-toggle="tab">Data Pernyataan Pegawai </a></li> 
        </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="tab_1">
            <table class="table table-striped table-bordered" id="DataTable">
              <thead>
                <tr>
                  <td>No</td>
                  <td>Tanggal</td>
                  <td>Nomor Pernyataan</td>
                  <td>NIK Pegawai</td>
                  <td>Pegawai</td>
                  <td>Action</td>
                </tr>
              </thead>
              <tbody>
              <?php $no = 0 ; foreach ($row as $key => $vaPernyataan) { ?>
                <tr>
                  <td><?=++$no;?></td>
                  <td><?=String2Date($vaPernyataan['tgl'])?></td>
                  <td><?=($vaPernyataan['nomor_surat'])?></td>
                  <td><?=$vaPernyataan['NikPegawai']?></td>
                  <td><?=($vaPernyataan['NamaPegawai'])?></td>
                  <td align="center">
                    <a class="btn-link" title="View Data" target="_blank" href="<?=site_url('laporan/lp_pernyataan/'.$vaPernyataan['id_pernyataan'].'')?>">
                      <i class="fa fa-print"></i>
                    </a>|
                    <a class="btn-link" title="Edit Data" href="<?=site_url('surat/pernyataan_pegawai/edit/'.$vaPernyataan['id_pernyataan'].'')?>">
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
    action="<?=site_url('surat_act/pernyataan_pegawai/'.$cAction.'')?>">
    <div class="container">
      <div class="col-md-12 col-sm-12">
        <div class="box box-danger">
          <div class="box-header with-border">
            <h3 class="box-title">Data Pernyataan</h3>
            <div class="box-tools pull-right">
              <span class="label label-danger">Input Data Pernyataan</span>
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div><!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div align="center">  
                <h3>SURAT Pernyataan</h3>
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
                <label>Perihal</label>
                <input type="text" name="cPerihal" class="form-control" 
                 placeholder="Perihal" value="<?=$cPerihal?>">
              </div>
             </div>
             <div class="col-sm-4">
              <label>Lampiran</label>
                <input type="text" name="cLampiran" class="form-control" 
                placeholder="Lampiran" value="<?=$cLampiran?>">
            </div>
            </div>
            <div class="row">
              <div class="col-sm-5">
               <div class="form-group">
                <label>Outlet</label>
                    <select class="comboBox form-control" name="cIdOutlet">
                        <option></option>
                        <?php foreach ($Outlet as $key => $vaOutlet) { ?>
                        <option value="<?=$vaOutlet['id_outlet']?>"
                        <?php if($vaOutlet['id_outlet'] == $cIdOutlet)echo "selected"; ?>>
                           <?=$vaOutlet['kode']?> : <?=$vaOutlet['nama']?>
                        </option>
                        <?php } ?>
                      </select>
               </div>
              </div>
              <div class="col-sm-4">
              <p color="red">*Isi Dengan Tempat Outlet Terakhir Dari Pegawai Yang DiPernyataan</p>
            </div>
            </div>
            <div class="row">
               <div class="col-sm-4">
               <label>Telepon</label>
                <input type="text" name="nTelepon" class="form-control" 
                placeholder="Telepon" value="<?=$nTelepon?>">
              </div>
              <div class="col-sm-4">
               <label>Keterangan</label>
                <textarea class="form-control" name="cKeterangan" placeholder="Keterangan"><?=$cKeterangan?></textarea>
              </div>
              <div class="col-sm-4">
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
            <div class="row">
               <div class="col-sm-6">
               <label>Jenis Pelanggaran</label> <br/>
                <input type="radio" class="minimal-red"  name="cJenisPelanggaran" value="1" <?php if($cPelanggaran == 1)echo "checked"; ?>> Pelanggaran Berat <br/>
                <input type="radio" class="minimal-red" name="cJenisPelanggaran" value="2"  <?php if($cPelanggaran == 2)echo "checked"; ?>> Pelanggaran Sedang <br/>
                <input type="radio" class="minimal-red" name="cJenisPelanggaran" value="3"  <?php if($cPelanggaran == 3)echo "checked"; ?>> Pelanggaran Ringan <br/>
              </div>
              <div class="col-sm-6">
               <label>Sangsi</label> <br/>
                <input type="radio" class="minimal-red" name="cSangsi" value="1" <?php if($cSangsi == 1)echo "checked"; ?>> Teguran Lisan berupa Peringatan pertama <br/>
                <input type="radio" class="minimal-red" name="cSangsi" value="2" <?php if($cSangsi == 2)echo "checked"; ?>> Teguran Tertulis berupa peringatan untuk tidak mengulangi kesalahan (SP 1) <br/>
                <input type="radio" class="minimal-red" name="cSangsi" value="3" <?php if($cSangsi == 3)echo "checked"; ?>> Teguran Tertulis ke 2 dengan evaluasi 2 minggu  (SP 2) <br/>
                <input type="radio" class="minimal-red" name="cSangsi" value="4" <?php if($cSangsi == 4)echo "checked"; ?>> Pemberhentian dari pekerjaan (DIKELUARKAN DENGAN TIDAK HORMAT) <br/>
              </div>
            </div>
            <br/>
            <div class="row">
               <div class="col-sm-6">
               <label>Mengetahui</label>
                <input type="text" name="cCreate_1" class="form-control" 
                placeholder="Mengetahui" value="<?=$cCreate1?>">
              </div>
              <div class="col-sm-6">
               <label>Diketahui</label>
                <input type="text" name="cCreate_2" class="form-control" 
                placeholder="Diketahui" value="<?=$cCreate2?>">
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