  <?php 
        if($action == "edit") {
          foreach ($field as $column) {
            $cIdPendidikanPegawai = $column['id_pendidikan_pegawai']  ;
            $cIdPegawai           = $column['id_pegawai'] ;
            $cIdPendidikan        = $column['id_pendidikan'];
            $cNamaSekolah         = $column['nama_sekolah'];
            $cJurusan             = $column['jurusan']  ;
            $cTahunMasuk          = $column['tahun_masuk'];
            $cTahunLulus          = $column['tahun_lulus'];
            $cGelar               = $column['gelar']    ;
            $cNun                 = $column['nun_ipk']  ;
            $cIconButton   =   "refresh"    ;
            $cValueButton  =   "Update Data" ;
          }
          $cAction = "Update/".$cIdPendidikanPegawai."" ;
        }else{
            $cIdPendidikanPegawai = ""  ;
            $cIdPegawai           = ""  ;
            $cIdPendidikan        = ""  ;
            $cNamaSekolah         = ""  ;
            $cJurusan             = ""  ;
            $cTahunMasuk          = ""  ;
            $cTahunLulus          = ""  ;
            $cGelar               = ""  ;
            $cNun                 = ""  ;
            $cIconButton  = "save"    ;
            $cValueButton = "Save Data" ;
            $cAction      = "Insert" ; 
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
    		<div class="row">
    			<div class="col-sm-12 col-md-12">
    				<?php if($action == 'view'){ ?>
            <div class="col-sm-5">
              <div class="box box-success">
                  <div class="box-header">
                      <div class="box-body"> 
                        <h3>Riwayat Pendidikan Pegawai</h3>
                        <table class="table table-striped table-bordered">
                          <thead>
                            <tr>
                              <td>No</td>
                              <td>Nama</td>
                              <td>Pendidikan</td>
                              <td>Tahun</td>
                              <td>Act</td>
                            </tr>
                          </thead>
                          <tbody>
                          <?php $no = 0;  foreach ($view as $key => $vaView) {
                           include 'detail.pendidikan.pegawai.php';
                          ?>
                          <tr>
                            <td><?=++$no?></td>
                            <td><?=($vaView['Pegawai'])?></td>
                            <td><?=($vaView['Pendidikan'])?></td>
                            <td><?=($vaView['tahun_masuk'])?> - <?=($vaView['tahun_lulus'])?></td>
                            <td><a href="#modalPgw<?=$vaView['id_pendidikan_pegawai']?>" data-toggle="modal" title="Lihat Detail"><i class="fa fa-eye"></i> </a></td>
                          </tr>
                          <?php } ?>
                          </tbody>
                        </table> 
                        <br/>
                        <div class="col-sm-12">
                            <a href="<?=site_url('transaksi/pendidikan_pegawai')?>">
                            <button type="button"  class="btn btn-flat btn-info">
                              <i class="fa fa-hand-o-left"></i> Kembali
                            </button>
                          </a>
                          </div> 
                      </div>
                    </div>
                  </div>
            </div>
            <?php }else{ ?>
            <div class="col-sm-6">
    					<div class="box box-success">
        					<div class="box-header">
          						<div class="box-body"> 
          							<h3>Input Pendidikan Pegawai</h3>
          							<form method="post" enctype="multipart/form-data"
                        action="<?=site_url('transaksi_act/pendidikan_pegawai/'.$cAction.'')?>">
                          <div class="row">
                           <div class="col-sm-12">
                            <div class="form-group">
                               <label>Pilih Pegawai</label>
                               <select class="comboBox form-control" name="cIdPegawai">
                                 <option></option>
                                 <?php foreach ($pegawai as $key => $vaPegawai) { ?>
                                  <option value="<?=$vaPegawai['id_pegawai']?>"
                                  <?php if($vaPegawai['id_pegawai'] == $cIdPegawai)echo "selected"; ?>>
                                  <?=$vaPegawai['nik']?> : <?=$vaPegawai['nama']?>
                                  </option>
                                 <?php } ?>
                               </select>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                               <label>Pilih Pendidikan</label>
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
                              <label>Nama Sekolah</label>
                              <input type="text" name="cNamaSekolah" value="<?=$cNamaSekolah?>" 
                              placeholder="Nama Sekolah" class="form-control">
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label>Jurusan</label>
                              <input type="text" name="cNamaJurusan" value="<?=$cJurusan?>" 
                              placeholder="Jurusan" class="form-control">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-4">
                            <div class="form-group">
                              <label>Tahun Masuk</label>
                              <input type="text" name="cTahunMasuk" value="<?=$cTahunMasuk?>" 
                              placeholder="Tahun Masuk" class="form-control">
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="form-group">
                              <label>Tahun Keluar</label>
                              <input type="text" name="cTahunLulus" value="<?=$cTahunLulus?>" 
                              placeholder="Tahun Lulus" class="form-control">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-4">
                            <div class="form-group">
                              <label>Gelar</label>
                              <input type="text" name="cGelar" value="<?=$cGelar?>" 
                              placeholder="Gelar" class="form-control">
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="form-group">
                              <label>NUN / IPK</label>
                              <input type="text" name="cNun" value="<?=$cNun?>" 
                              placeholder="NUN / IPK" class="form-control">
                            </div>
                          </div>
                        </div>
                        <br/>
                          <?php if($action != 'edit' and $this->session->userdata('level') == 3){ ?>
                          <div class="row">
                            <div class="col-sm-12">
                              <button type="button" onclick="window.alert('Maaf Anda Tidak Mempunyai Kewenangan')"  class="btn btn-flat btn-primary">
                                <i class="fa fa-<?=$cIconButton?>"></i> <?=$cValueButton?>
                              </button>
                            </div>
                          </div> 
                        <?php }else{ ?>
                        <div class="row">
                            <div class="col-sm-12">
                              <button type="submit"  class="btn btn-flat btn-primary">
                                <i class="fa fa-<?=$cIconButton?>"></i> <?=$cValueButton?>
                              </button>
                            </div>
                          </div> 
                        <?php } ?>
                        </form>
          						</div>
          					</div>
          				</div>
    				</div>
            <?php } ?>
    				<div class="col-sm-6">
              <div class="box box-danger">
                  <div class="box-header">
                       <div class="box-body">
                        <h5><strong>Cari Riwayat Pendidikan Pegawai</strong></h5>
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
                         <button type="button" onclick="window.location.href='<?=base_url()?>transaksi/pendidikan_pegawai/view/'+document.getElementById('cIdPegawai').value" 
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
                             <td>Pegawai</td>
                             <td>Pendidikan</td>
                             <td>Tahun Lulus</td>
                             <td>Action</td>
                           </tr>
                         </thead>
                         <tbody>
                          <?php $no = 0 ; foreach ($row as $key => $vaPendidikanPegawai) { ?>
                           <tr>
                             <td><?=++$no;?></td>
                             <td><?=$vaPendidikanPegawai['Pegawai']?></td>
                             <td><?=($vaPendidikanPegawai['Pendidikan'])?></td>
                             <td><?=($vaPendidikanPegawai['tahun_lulus'])?></td>
                             <td align="center">
                              <a class="btn btn-flat btn-success" title="Edit Data" href="<?=site_url('transaksi/pendidikan_pegawai/edit/'.$vaPendidikanPegawai['id_pendidikan_pegawai'].'')?>">
                                <i class="fa fa-edit"></i>
                              </a>
                               <a class="btn btn-danger btn-flat"  title="Hapus Data" 
                               onclick="if(confirm('Apakah anda yakin akah menghapus data?'))
                                { window.location.href='<?=site_url('transaksi_act/pendidikan_pegawai/Delete/'.$vaPendidikanPegawai['id_pendidikan_pegawai'].'')?>'}">
                                <i class="fa fa-trash-o"></i>
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
    			</div>
    		</div>
    	</div> 