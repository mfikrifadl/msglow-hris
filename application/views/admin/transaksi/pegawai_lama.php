  <?php 
        if($action == "edit") {
          foreach ($field as $column) {
            $cIdPegawai     =   $column['id_pegawai']   ;
            $cIdKerja       =   $column['id_kerja']     ;
            $cIdArea        =   $column['id_area']      ;
            $cIdStatus      =   $column['id_status']    ;
            $cNik           =   $column['nik']          ;
            $cNama          =   $column['nama']         ;
            $cAlamat        =   $column['alamat']       ;
            $cAlamatAsal    =   $column['alamat_asal']  ;
            $cJk            =   $column['jk']           ;
            $cTempatLahir   =   $column['tempat_lahir'] ;
            $dTglLahir      =   String2Date($column['tanggal_lahir']);
            $nKtp           =   $column['no_ktp']       ;
            $cEmail         =   $column['email']        ;
            $nHandphone     =   $column['handphone']    ;
            $cOrtu          =   $column['nama_orang_tua'];
            $cHubungan      =   $column['hub_keluarga'] ;
            $nHpKeluarga    =   $column['no_keluarga']  ;
            $cReferensi     =   $column['referensi']    ;
            $nTlpReferensi  =   $column['tlp_referensi'];
            $dTglMasukKerja =   String2Date($column['tanggal_masuk_kerja']);
            $cFoto          =   $column['foto']         ;
            $nBobotNilai    =   $column['bobot_nilai']  ;
            $cIdPendidikan  =   $column['pendidikan']   ;
            $cOutlet        =   $column['outlet']       ;
            $cIconButton    =   "refresh"     ;
            $cValueButton   =   "Update Data" ;
          }
          $cAction = "Update/".$cIdPegawai."" ;
        }else{
            $cIdPegawai     =   ""   ;
            $cIdKerja       =   ""  ;
            $cIdArea        =   ""   ;
            $cIdStatus      =   ""   ;
            $cNik           =   ""   ;
            $cNama          =   ""   ;
            $cAlamat        =   ""   ;
            $cAlamatAsal    =   ""   ;
            $cJk            =   ""   ;
            $cTempatLahir   =   ""   ;
            $dTglLahir      =   date("d-m-Y")   ; 
            $nKtp           =   ""   ;
            $cEmail         =   ""   ;
            $nHandphone     =   ""   ;
            $cOrtu          =   ""   ;
            $cHubungan      =   ""   ;
            $nHpKeluarga    =   ""   ;
            $cReferensi     =   ""   ;
            $nTlpReferensi  =   ""   ;
            $dTglMasukKerja =   date("d-m-Y")   ;
            $cFoto          =   ""   ;
            $nBobotNilai    =   ""   ;
            $cIdPendidikan  =   ""   ;
            $cOutlet        =   ""   ;
            $cIconButton    =   "save"    ;
            $cValueButton   =   "Save Data" ;
            $cAction        =   "Insert" ; 
        }
    ?>
    <div class="container">
     <div class="col-sm-12">
       <ul class="breadcrumb"><li><a href="<?=base_url()?>">Home</a></li>
        <li class=""><?=$menu?></li>
        <li class="active"><?=$file?></li>
      </ul>                    
     </div>
    </div>
    <div class="container">
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs" id="myTabs">
           <li class="active"><a href="#tab_1" data-toggle="tab">Input Pegawai</a></li>  
            <li><a href="#tab_2" data-toggle="tab">Data Pegawai Dan Operator</a></li>  
        </ul>
      <div class="tab-content">
       <div class="tab-pane active" id="tab_1"><br/>
          <div class="box box-success">
                  <div class="box-header">
                      <div class="box-body">
                      <?php if($action == 'view'){ 
                        foreach ($view as $key => $vaView) {
                      ?>
                      <h3>View Data Pegawai</h3>
                      <div class="row">
                           <div class="col-sm-6">
                            <div class="form-group">
                               <label>Area Kerja</label><br/>
                               <?=(!empty($vaView['Area'])) ? $vaView['Area'] : "-"?>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                               <label>Status Karyawan</label><br/>
                                <?=(!empty($vaView['Status'])) ? $vaView['Status'] : "-"?>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-6">
                            <div class="form-group">
                               <label>Nik</label><br/>
                                <?=(!empty($vaView['nik'])) ? $vaView['nik'] : "-"?>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                               <label>Nama</label><br/>
                               <?=(!empty($vaView['nama'])) ? $vaView['nama'] : "-"?>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-6">
                            <div class="form-group">
                               <label>Pendidikan</label><br/>
                                <?=(!empty($vaView['PendidikanPegawai'])) ? $vaView['PendidikanPegawai'] : "-"?>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                               <label>Outlet</label><br/>
                               <?=(!empty($vaView['outlet'])) ? $vaView['outlet'] : "-"?>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-6">
                            <div class="form-group">
                               <label>Alamat Sekarang</label><br/>
                               <?=(!empty($vaView['alamat'])) ? $vaView['alamat'] : "-"?>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                               <label>Alamat Asal</label><br/>
                               <?=(!empty($vaView['alamat_asal'])) ? $vaView['alamat_asal'] : "-"?>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-6">
                            <div class="form-group">
                               <label>Jenis Kelamin</label><br/>
                               <?php 
                               if($vaView['jk'] == '1'){
                                $cKelamin = "Laki-Laki";
                               }else{
                                $cKelamin = "Perempuan";
                               }
                               ?>
                               <?=(!empty($cKelamin)) ? $cKelamin : "-"?>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                               <label>Tempat Lahir</label><br/>
                               <?=(!empty($vaView['tempat_lahir'])) ? $vaView['tempat_lahir'] : "-"?>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                               <label>Tanggal Lahir</label><br/>
                               <?=(!empty(String2Date($vaView['tanggal_lahir']))) ? String2Date($vaView['tanggal_lahir']) : "-"?>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                               <label>Nomor KTP</label><br/>
                               <?=(!empty($vaView['no_ktp'])) ? $vaView['no_ktp'] : "-"?>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                               <label>Email</label><br/>
                              <?=(!empty($vaView['email'])) ? $vaView['email'] : "-"?>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                               <label>Handphone</label><br/>
                               <?=(!empty($vaView['handphone'])) ? $vaView['handphone'] : "-"?>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                               <label>Nama Orang Tua</label><br/>
                               <?=(!empty($vaView['nama_orang_tua'])) ? $vaView['nama_orang_tua'] : "-"?>
                            </div>
                          </div>
                           <div class="col-sm-6">
                            <div class="form-group">
                               <label>Hubungan Keluarga</label><br/>
                               <?=(!empty($vaView['hub_keluarga'])) ? $vaView['hub_keluarga'] : "-"?>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                               <label>Handphone Keluarga Terdekat</label><br/>
                               <?=(!empty($vaView['no_keluarga'])) ? $vaView['no_keluarga'] : "-"?>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                               <label>Referensi</label><br/>
                               <?=(!empty($vaView['referensi'])) ? $vaView['referensi'] : "-"?>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-sm-6">
                            <div class="form-group">
                               <label>No Tlp Referensi</label><br/>
                               <?=(!empty($vaView['tlp_referensi'])) ? $vaView['tlp_referensi'] : "-"?>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                               <label>Tanggal Masuk Kerja </label><br/>
                               <?=String2Date($vaView['tanggal_masuk_kerja'])?>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                               <label>Foto </label><br/>
                               <?php if(empty($vaView['foto'])){ ?>
                               <img src="<?=base_url()?>upload/default.gif" height="100px">
                                <?php }else{ ?>
                               <img src="<?=base_url().$vaView['foto']?>" height="100px">
                               <?php } ?>
                            </div>
                          </div>
                           <div class="col-sm-6">
                            <div class="form-group">
                              <label>Bobot Nilai </label><br/>
                             <?=(!empty($vaView['bobot_nilai'])) ? $vaView['bobot_nilai'] : "-"?>
                            </div>
                          </div>
                        </div>
                        <?php } ?>
                        <br/>
                        <div class="row">
                          <div class="col-sm-12">
                            <a href="<?=site_url('transaksi/pegawai')?>">
                            <button type="button"  class="btn btn-flat btn-primary">
                              <i class="fa fa-hand-o-left"></i> Kembali
                            </button>
                          </a>
                          </div>
                        </div> 
                      <?php }else{ ?> 
                        <h3>Input Data Pegawai</h3>
                        <form method="post" enctype="multipart/form-data"
                        action="<?=site_url('transaksi_act/pegawai/'.$cAction.'')?>">
                          <div class="row">
                          <div class="col-sm-4">
                            <div class="form-group">
                               <label>Golongan Kerja</label>
                               <select class="comboBox form-control" name="cIdKerja">
                                 <option></option>
                                 <?php foreach ($kerja as $key => $vaKerja) { ?>
                                  <option value="<?=$vaKerja['id_kerja']?>"
                                  <?php if($vaKerja['id_kerja'] == $cIdKerja)echo "selected"; ?>>
                                  <?=$vaKerja['kerja']?>
                                  </option>
                                 <?php } ?>
                               </select>
                            </div>
                          </div>
                           <div class="col-sm-4">
                            <div class="form-group">
                               <label>Area Kerja</label>
                               <select class="comboBox form-control" name="cIdArea">
                                 <option></option>
                                 <?php foreach ($area as $key => $vaArea) { ?>
                                  <option value="<?=$vaArea['id_area']?>"
                                  <?php if($vaArea['id_area'] == $cIdArea)echo "selected"; ?>>
                                  <?=$vaArea['nama_area']?>
                                  </option>
                                 <?php } ?>
                               </select>
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="form-group">
                               <label>Status Karyawan</label>
                               <select class="comboBox form-control" name="cIdStatus">
                                 <option></option>
                                 <?php foreach ($status as $key => $vaStatus) { ?>
                                  <option value="<?=$vaStatus['id_status']?>"
                                  <?php if($vaStatus['id_status'] == $cIdStatus)echo "selected"; ?>>
                                  <?=$vaStatus['status']?>
                                  </option>
                                 <?php } ?>
                               </select>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-6">
                            <div class="form-group">
                               <label>Nik</label>
                               <Input type="text" name ="cNik" class="form-control" 
                               placeholder ="Nik Pegawai" value="<?=$cNik?>">
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                               <label>Nama</label>
                               <Input type="text" name ="cNama" class="form-control" 
                               placeholder ="Nama Pegawai" value="<?=$cNama?>">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-6">
                            <div class="form-group">
                               <label>Pendidikan</label>
                               <select class="comboBox form-control" name="cIdPendidikan">
                                 <option></option>
                                 <?php foreach ($pendidikan as $key => $vaPendidikan) { ?>
                                  <option value="<?=$vaPendidikan['id_pendidikan']?>"
                                  <?php if($vaPendidikan['id_pendidikan'] == $cIdPendidikan)echo "selected"; ?>>
                                  <?=$vaPendidikan['nama_pendidikan']?>
                                  </option>
                                 <?php } ?>
                               </select>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                               <label>Outlet</label>
                               <Input type="text" name ="cOutlet" class="form-control" 
                               placeholder ="Outlet" value="<?=$cOutlet?>">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-6">
                            <div class="form-group">
                               <label>Alamat Sekarang</label>
                               <textarea class="form-control" name="cAlamat" placeholder="Alamat"><?=$cAlamat?></textarea>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                               <label>Alamat Asal</label>
                               <textarea class="form-control" name="cAlamatAsal" placeholder="Alamat Asal"><?=$cAlamatAsal?></textarea>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-4">
                            <div class="form-group">
                               <label>Jenis Kelamin</label>
                               <select name="cJenisKelamin" class="form-control comboBox">
                                  <option></option>
                                  <option value="1"<?php if($cJk == 1)echo "selected"; ?>>Laki-Laki</option>
                                  <option value="2"<?php if($cJk == 2)echo "selected"; ?>>Perempuan</option>
                               </select>
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="form-group">
                               <label>Tempat Lahir</label>
                               <Input type="text" name ="cTempatLahir" class="form-control" 
                               placeholder ="Tempat Lahir" value="<?=$cTempatLahir?>">
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="form-group">
                               <label>Tanggal Lahir</label>
                               <Input type="text" name ="dTglLahir" class="datetimepicker form-control" 
                               data-date-format="DD-MM-YYYY" value="<?=$dTglLahir?>">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-6">
                            <div class="form-group">
                               <label>Nomor KTP</label>
                               <Input type="text" name ="nKtp" class="form-control" 
                               placeholder ="Nomor KTP" value="<?=$nKtp?>">
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                               <label>Email</label>
                               <Input type="text" name ="cEmail" class="form-control" 
                               placeholder ="Email" value="<?=$cEmail?>">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-12">
                            <div class="form-group">
                               <label>Handphone</label>
                               <Input type="text" name ="nHandphone" class="form-control" 
                              value="<?=$nHandphone?>" placeholder="Handphone">
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="form-group">
                               <label>Nama Orang Tua</label>
                               <Input type="text" name ="cOrtu" class="form-control" 
                              value="<?=$cOrtu?>" placeholder="Nama Orang Tua">
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="form-group">
                               <label>Hubungan Keluarga</label>
                               <Input type="text" name ="cHubungan" class="form-control" 
                              value="<?=$cHubungan?>" placeholder="Hubungan Keluarga">
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="form-group">
                               <label>Handphone Keluarga Terdekat</label>
                               <Input type="text" name ="nHpKeluarga" class="form-control" 
                              value="<?=$nHpKeluarga?>" placeholder="Handphone Keluarga">
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                               <label>Referensi</label>
                               <Input type="text" name ="cReferensi" class="form-control" 
                              value="<?=$cReferensi?>" placeholder="Referensi">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-6">
                            <div class="form-group">
                               <label>No Tlp Referensi</label>
                               <Input type="text" name ="nTlpReferensi" class="form-control" 
                              value="<?=$nTlpReferensi?>" placeholder="Telepon Referensi">
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="form-group">
                               <label>Tanggal Masuk Kerja </label>
                               <Input type="text" name ="dTglMasukKerja" class="datetimepicker form-control" 
                               data-date-format="DD-MM-YYYY" value="<?=$dTglMasukKerja?>">
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="form-group">
                               <label>Foto </label>
                               <Input type="file" name ="foto" class="form-control" 
                               >
                            </div>
                          </div>
                           <div class="col-sm-4">
                            <div class="form-group">
                               <label>Bobot Nilai </label>
                              <Input type="text" name ="nBobot" class="form-control" 
                              value="<?=$nBobotNilai?>" placeholder="Bobot Nilai">
                            </div>
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
                        </form>
                      <?php } ?>
                      </div>
                    </div>
                  </div>
               </div> <!-- /.Tap-pane -->
               <div class="tab-pane" id="tab_2"><br/>
                <div class="box box-danger">
                      <div class="box-header">
                          <div class="box-body">
                            <h5><strong>Cari Pegawai</strong></h5>
                            <div class="col-sm-10">
                             <select class="comboBox form-control" name="cIdPegawai" id="cIdPegawai">
                              <option></option>
                              <?php foreach ($pegawai as $key => $vaPegawai) { ?>
                                <option value="<?=$vaPegawai['id_pegawai']?>">
                                  <?=$vaPegawai['nik']?> : <?=$vaPegawai['nama']?>
                                </option>
                              <?php } ?>
                            </select>
                            </div>
                            <div class="col-sm-2">
                             <button type="button" onclick="window.location.href='<?=base_url()?>transaksi/pegawai/view/'+document.getElementById('cIdPegawai').value" 
                             class="btn btn-danger btn-flat">
                               <i class="fa fa-search"></i>
                             </button>
                            </div>
                          </div>
                      </div>
                  </div>
                  <div class="box box-info">
                    <div class="box-header">
                     <div class="box-body"> 
                      <table class="table table-striped table-bordered" id="DataTable">
                         <thead>
                           <tr>
                             <td>No</td>
                             <td>Nama</td>
                             <td>Nik</td>
                             <td>Action</td>
                           </tr>
                         </thead>
                         <tbody>
                           <tr>
                            <?php $no = 0 ; foreach ($row as $key => $vaPegawai) { ?>
                            <?php include 'detail.pegawai.php'; ?>
                              <td><?=++$no?></td>
                              <td><?=$vaPegawai['nama']?></td>
                              <td><?=$vaPegawai['nik']?></td>
                              <td>
                              <a class="btn-link" title="View Data" href="<?=site_url('transaksi/pegawai/view/'.$vaPegawai['id_pegawai'].'')?>">
                                <i class="fa fa-eye"></i>
                              </a>
                              ||
                              <a href="#modalPgw<?=$vaPegawai['id_pegawai']?>"
                              data-toggle="modal" title="detail"><i class="fa fa-pencil"></a></td>
                           </tr>
                            <?php } ?>
                         </tbody>
                       </table>
                      </div>
                    </div>
                  </div> 
               </div>
              </div> <!-- tab-content --> 
             </div> <!-- nav-tabs-custom -->
            </div> 