 <?php 
    //SetKode
    if(date("m") == 01){
      $cRomawai = 'I';
    }elseif(date("m") == 02){
      $cRomawai = 'II';
    }elseif(date("m") == 03){
      $cRomawai = 'III';
    }elseif(date("m") == 04){
      $cRomawai = 'IV';
    }elseif(date("m") == 05){
      $cRomawai = 'V';
    }elseif(date("m") == 06){
      $cRomawai = 'VI';
    }elseif(date("m") == 07){
      $cRomawai = 'VII';
    }elseif(date("m") == 08){
      $cRomawai = 'VIII';
    }elseif(date("m") == 09){
      $cRomawai = 'IX';
    }elseif(date("m") == 10){
      $cRomawai = 'X';
    }elseif(date("m") == 11){
      $cRomawai = 'XI';
    }elseif(date("m") == 12){
      $cRomawai = 'XII';
    }

   foreach ($NoLast->result_array() as $key => $vaDataLast) {
      $cLastNoSurat = $vaDataLast['nomor_surat'];
    }
  
    if($NoLast->num_rows() > 0){
      $NoSuratTerakhir = $cLastNoSurat;
    } else{
      $NoSuratTerakhir = "No.0001/GN/HRFM-SP II/".$cRomawai."/".date("Y")."";
    }

    $cNomorSuratFix = "No."."####"."/GN/HRFM-SP II/".$cRomawai."/".date("Y")." ";
    ?>
  <?php 
        if($action == "edit") {
          foreach ($field as $column) {
            $cIdSuratPeringatan =   $column['id'];
            $cIdKategoriSurat   =   $column['id_kategori_surat'];
            $dTgl               =   String2Date($column['tanggal']);
            $nNomorSurat        =   $column['nomor_surat'];
            $cIdPegawai         =   $column['id_pegawai'];
            $cOutlet            =   $column['outlet'];
            $cUraian            =   $column['uraian'];
            $cKeterangan        =   $column['keterangan'];
            $cCreate            =   $column['create'];
            $cCC                =   $column['cc'];
            $cIconButton        =   "refresh"     ;
            $cValueButton       =   "Update Data" ;
          }
          $cAction = "Update/".$cIdSuratPeringatan."" ;
        }else{
            $cIdSuratPeringatan =   "" ;
            $cIdKategoriSurat   =   "" ;
            $dTgl               =   $tanggal ;
            $nNomorSurat        =   $cNomorSuratFix;
            $cIdPegawai         =   "" ;
            $cOutlet            =   "" ;
            $cUraian            =   "" ;
            $cKeterangan        =   "" ;
            $cCreate            =   "Dewi M. Ratnasari" ;
            $cCC                =   "" ;
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
          <h3 class="box-title">Data Table Surat Peringatan Pegawai (SP2)</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
      </div><!-- /.box-header -->
      <div style="display: none;" class="box-body">
        <div class="nav-tabs-custom">
        <ul class="nav nav-tabs" id="myTabs">
           <li class="active"><a href="#tab_1" data-toggle="tab">Data SP 2 Pegawai </a></li> 
        </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="tab_1">
            <table class="table table-striped table-bordered" id="DataTable">
              <thead>
                <tr>
                  <td>No</td>
                  <td>Tanggal</td>
                  <td>Nomor Surat</td>
                  <td>Pegawai</td>
                  <td>Tipe Surat</td>
                  <td>Action</td>
                </tr>
              </thead>
              <tbody>
              <?php $no = 0 ; foreach ($row as $key => $vaPeringatan) { 
              ?>
                <tr>
                  <td><?=++$no;?></td>
                  <td><?=String2Date($vaPeringatan['tanggal'])?></td>
                  <td><?=($vaPeringatan['nomor_surat'])?></td>
                  <td><?=($vaPeringatan['NamaPegawai'])?></td>
                  <td>Surat Peringatan 2</td>
                  <td align="center">
                    <a class="btn-link" title="View Data" target="_blank" href="<?=site_url('laporan/lp_sp/'.$vaPeringatan['id'].'/2')?>">
                      <i class="fa fa-print"></i>
                    </a>|
                    <a class="btn-link" title="Edit Data" href="<?=site_url('surat/surat_peringatan_2/edit/'.$vaPeringatan['id'].'')?>">
                      <i class="fa fa-edit"></i>
                    </a>|
                    <a class="btn-link"  title="Hapus Data" 
                      onclick="if(confirm('Apakah anda yakin akah menghapus data?'))
                      { window.location.href='<?=site_url('surat_act/surat_peringatan_2/Delete/'.$vaPeringatan['id'].'')?>'}">
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
    action="<?=site_url('surat_act/surat_peringatan_2/'.$cAction.'')?>">
    <div class="container">
      <div class="col-md-12 col-sm-12">
        <div class="box box-danger">
          <div class="box-header with-border">
            <h3 class="box-title">Form Surat Peringatan 2</h3>
            <div class="box-tools pull-right">
              <span class="label label-danger">Input (SP2)</span>
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div><!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div align="center">
               <h3>Surat Peringatan Kedua</h3><br/>
                <?php if($action != 'edit'){ ?>
                <h4>Nomor Terakhir : <strong><?=$NoSuratTerakhir?></strong></h4>
                <?php } ?>
                <input type="text" name="nNomorSurat" class="form-control" 
                style="width:30%" placeholder="Nomor Surat" value="<?=$nNomorSurat?>">
                <br/>
              </div>
              <div class="container">
                <div class="col-sm-1">&nbsp;</div>
                <div class="col-sm-9" align="left">
                  <p><h4>Dengan Hormat,</h4></p>
                  <p><h4>Berdasarkan Surat Peringatan Pertama dan hasil pengamatan terhadap sikap kerja setelah SP I terhadap saudara</h4> </p>
                </div>
              </div>
              <br/>
              <div class="container">
                <div class="col-sm-1">&nbsp;</div>
                <div class="col-sm-9" align="center">
                  <div class="row">
                    <div class="col-sm-2">NAMA</div>
                    <div class="col-sm-1">:</div>
                    <div class="col-sm-4">
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
                    <div class="col-sm-4">
                      <p color="red">*Jika Nama Operator Belum Ada Di List Harap Memasukkan Data Terlebih Dahulu ,<a href="<?=site_url('transaksi/pegawai')?>">Klik Disini</a> Untuk Menambah Data Operator</p>
                    </div>
                  </div>
                  <br/>
                  <div class="row">
                    <div class="col-sm-2">NIK</div>
                    <div class="col-sm-1">:</div>
                    <div class="col-sm-4">
                      <input type="text" name="cNik" id = "cNik" class="form-control" readonly="true">
                    </div>
                  </div>
                  <br/>
                  <div class="row">
                    <div class="col-sm-2">Operator Outlet</div>
                    <div class="col-sm-1">:</div>
                    <div class="col-sm-4">
                      <select class="comboBox form-control" name="cOutlet">
                      <option></option>
                      <?php foreach ($outlet as $key => $vaOutlet) { ?>
                      <option value="<?=$vaOutlet['id_outlet']?>"
                      <?php if($vaOutlet['id_outlet'] == $cOutlet)echo "selected"; ?>>
                       <?=$vaOutlet['kode']?> :  <?=$vaOutlet['nama']?>
                      </option>
                      <?php } ?>
                    </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="container">
                <div class="col-sm-1">&nbsp;</div>
                <div class="col-sm-9" align="left">
                  <p><h4>Kembali  melakukan tindakan/ perbuatan yang yang melanggar Tata Tertib Kerja/SOP/Job Desk dan Kepegawaian yang dilakukan pada :</h4> </p>
                </div>
              </div>
              <br/>
              <div class="container">
                <div class="col-sm-1">&nbsp;</div>
                <div class="col-sm-9" align="center">
                  <div class="row">
                    <div class="col-sm-2">Tanggal</div>
                    <div class="col-sm-1">:</div>
                    <div class="col-sm-4">
                      <input type="text" name="dTgl" 
                       class="datetimepicker form-control" data-date-format="DD-MM-YYYY"
                       placeholder="Tanggal" value="<?=$dTgl?>">
                    </div>
                  </div>
                  <br/>
                  <div class="row">
                    <div class="col-sm-2">Uraian Singkat Pelanggaran</div>
                    <div class="col-sm-1">:</div>
                    <div class="col-sm-9">
                      <textarea class="form-control" name="cUraian" placeholder="Uraian"  rows="10"><?=$cUraian?></textarea>
                    </div>
                  </div>
                  <br/>
                </div>
              </div>

              <div class="container">
                <div class="col-sm-1">&nbsp;</div>
                <div class="col-sm-9" align="left">
                  <p><h4>Demikian Surat Peringatan Kedua (SP II) ini dikeluarkan untuk menjadi perhatian.</h4> </p>
                </div>
              </div>
              <br/><br/>
              <div class="container">
                <div class="col-sm-1">&nbsp;</div>
                <div class="col-sm-9" align="left">
                  <p><h4>PT.Global Insight Utama</h4> </p>
                </div>
              </div>
              <br/>
            <div class="container">
                <div class="col-sm-1">&nbsp;</div>
                <div class="col-sm-3" align="left">
                  <input type="text" name="cCreate" class="form-control" 
                  value="<?=$cCreate?>" style"width:30%">
                </div>
                <button type="submit"  class="btn btn-flat btn-danger">
                  <i class="fa fa-<?=$cIconButton?>"></i> <?=$cValueButton?>
                </button>
            </div>             
        </form>
</section>
  
<script type="text/javascript">
    
    <?php echo $jsArray; ?>  
    function changeValue(id){  
      document.getElementById('cNik').value = jason[id].nik; 
    };
    </script>