  <?php 
        if($action == "edit") {
          foreach ($field as $column) {
            $cIdPengalaman =    $column['id_pengalaman']  ;
            $cIdPegawai    =    $column['id_pegawai']   ;
            $cPerusahaan   =    $column['perusahaan']  ;
            $cBidangUsaha  =    $column['bidang_usaha'];
            $dTglMasuk     =    String2Date($column['tanggal_masuk']);
            $dTglKeluar    =    String2Date($column['tanggal_keluar']);   
            $cJobDesk      =    $column['job_desk'];
            $cBobot        =    $column['bobot_nilai'];
            $cIconButton   =   "refresh"    ;
            $cValueButton  =   "Update Data" ;
          }
          $cAction = "Update/".$cIdPengalaman."" ;
        }else{
            $cIdPengalaman =    ""  ;
            $cIdPegawai    =    ""  ;
            $cPerusahaan   =    ""  ;
            $cBidangUsaha  =    ""  ;
            $dTglMasuk     =    ""  ;
            $dTglKeluar    =    ""  ;   
            $cJobDesk      =    ""  ;
            $cBobot        =    ""  ;
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
                        <h3>Riwayat Pengalaman Kerja Pegawai</h3>
                        <table class="table table-striped table-bordered">
                          <thead>
                            <tr>
                              <td>No</td>
                              <td>Pegawai</td>
                              <td>Perusahaan</td>
                              <td>Act</td>
                            </tr>
                          </thead>
                          <tbody>
                          <?php $no = 0;  foreach ($view as $key => $vaView) {
                           include 'detail.pengalaman.pegawai.php';
                          ?>
                          <tr>
                            <td><?=++$no?></td>
                            <td><?=($vaView['Pegawai'])?></td>
                            <td><?=($vaView['perusahaan'])?></td>
                            <td><a href="#modalPgw<?=$vaView['id_pengalaman']?>" data-toggle="modal" title="Lihat Detail"><i class="fa fa-eye"></i> </a></td>
                          </tr>
                          <?php } ?>
                          </tbody>
                        </table> 
                        <br/>
                        <div class="col-sm-12">
                            <a href="<?=site_url('transaksi/pengalaman_pegawai')?>">
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
            <div class="col-sm-5">
    					<div class="box box-success">
        					<div class="box-header">
          						<div class="box-body"> 
          							<h3>Input Pengalaman Pegawai</h3>
          							<form method="post" enctype="multipart/form-data"
                        action="<?=site_url('transaksi_act/pengalaman_pegawai/'.$cAction.'')?>">
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
                               <label>Perusahaan</label>
                               <input type="text" name="cPerusahaan" class="form-control"
                               placeholder="Perusahaan" value="<?=$cPerusahaan?>">
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label>Bidang Usaha</label>
                              <input type="text" name="cBidangUsaha" value="<?=$cBidangUsaha?>" 
                              placeholder="Bidang Usaha" class="form-control">
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label>Tanggal Masuk</label>
                              <input type="text"  name="dTglMasuk" value="<?=$dTglMasuk?>" 
                              placeholder="Tanggal Masuk" data-date-format="DD-MM-YYYY" class="datetimepicker form-control">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label>Tanggal Keluar</label>
                              <input type="text" name="dTglKeluar" value="<?=$dTglKeluar?>" 
                              placeholder="Tahun Keluar" data-date-format="DD-MM-YYYY" class="datetimepicker form-control">
                            </div>
                          </div>
                          <div class="col-sm-9">
                            <div class="form-group">
                              <label>Job Desk</label>
                              <textarea class="form-control" name="cJob" placeholder="Job Desk"><?=$cJobDesk?></textarea>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-4">
                            <div class="form-group">
                              <label>Bobot Nilai</label>
                              <input type="text" name="nBobot" value="<?=$cBobot?>" 
                              placeholder="Bobot Nilai" class="form-control">
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
    				<div class="col-sm-7">
              <div class="box box-danger">
                  <div class="box-header">
                       <div class="box-body">
                        <h5><strong>Cari Riwayat Pengalaman Pegawai</strong></h5>
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
                         <button type="button" onclick="window.location.href='<?=base_url()?>transaksi/pengalaman_pegawai/view/'+document.getElementById('cIdPegawai').value" 
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
                             <td>Perusahaan</td>
                             <td>Tanggal</td>
                             <td>Action</td>
                           </tr>
                         </thead>
                         <tbody>
                          <?php $no = 0 ; foreach ($row as $key => $vaPengalaman) { ?>
                           <tr>
                             <td><?=++$no;?></td>
                             <td><?=$vaPengalaman['Pegawai']?></td>
                             <td><?=($vaPengalaman['perusahaan'])?></td>
                             <td><?=String2Date($vaPengalaman['tanggal_masuk'])?> s/d <?=String2Date($vaPengalaman['tanggal_keluar'])?></td>
                             <td align="center">
                              <a class="btn btn-flat btn-success" title="Edit Data" href="<?=site_url('transaksi/pengalaman_pegawai/edit/'.$vaPengalaman['id_pengalaman'].'')?>">
                                <i class="fa fa-edit"></i>
                              </a>
                               <a class="btn btn-danger btn-flat"  title="Hapus Data" 
                               onclick="if(confirm('Apakah anda yakin akah menghapus data?'))
                                { window.location.href='<?=site_url('transaksi_act/pengalaman_pegawai/Delete/'.$vaPengalaman['id_pengalaman'].'')?>'}">
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