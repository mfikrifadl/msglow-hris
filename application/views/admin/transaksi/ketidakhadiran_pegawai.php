  <?php 
        if($action == "edit") {
          foreach ($field as $column) {
            $cIdKetidakhadiran    = $column['id_ketidakhadiran']  ;
            $cIdPegawai           = $column['id_pegawai'] ;
            $cIdStatus            = $column['status'] ;
            $cKeterangan          = $column['keterangan'];
            $dTgl                 = String2Date($column['tanggal']);  
            $cIconButton   =   "refresh"    ;
            $cValueButton  =   "Update Data" ;
          }
          $cAction = "Update/".$cIdKetidakhadiran."" ;
        }else{
            $cIdKetidakhadiran    = "" ;
            $cIdPegawai           = "" ;
            $cIdStatus            = "" ;
            $cKeterangan          = "" ;
            $dTgl                 = date("d-m-Y") ;
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
                        <h3>View Ketidakhadiran Pegawai</h3>
                        <table class="table table-striped table-bordered">
                          <thead>
                            <tr>
                              <td>Tanggal</td>
                              <td>Nama</td>
                              <td>Status</td>
                              <td>Keterangan</td>
                            </tr>
                          </thead>
                          <tbody>
                          <?php foreach ($view as $key => $vaView) {
                          if($vaView['status'] == 1){
                              $cStatus = "Sakit";
                            }elseif($vaView['status'] == 2){
                              $cStatus = "Izin";
                            }elseif($vaView['status'] == 3){
                              $cStatus = "Tanpa Keterangan";
                            }
                          ?>
                          <tr>
                            <td><?=String2Date($vaView['tanggal'])?></td>
                            <td><?=($vaView['Pegawai'])?></td>
                            <td><?=($cStatus)?></td>
                            <td><a href="#" data-toggle="popover" data-placement="top" data-content="<?=$vaView['keterangan']?>">
                              Keterangan</a>
                            </td>
                          </tr>
                          <?php } ?>
                          </tbody>
                        </table> 
                        <br/>
                        <div class="col-sm-12">
                            <a href="<?=site_url('transaksi/ketidakhadiran_pegawai')?>">
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
          							<h3>Input Ketidakhadiran Pegawai</h3>
          							<form method="post" enctype="multipart/form-data"
                        action="<?=site_url('transaksi_act/ketidakhadiran_pegawai/'.$cAction.'')?>">
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
                               <label>Tanggal</label>
                               <input type="text" class="form-control datetimepicker"
                               value="<?=$dTgl?>" data-date-format="DD-MM-YYYY" name="dTgl">
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                               <label>Status</label>
                               <select class="comboBox form-control" name="cIdStatus">
                                 <option></option>
                                 <option value="1"<?php if($cIdStatus == 1)echo "selected"; ?>>Sakit</option>
                                 <option value="2"<?php if($cIdStatus == 2)echo "selected"; ?>>Izin</option>
                                 <option value="3"<?php if($cIdStatus == 3)echo "selected"; ?>>Tanpa Keterangan</option>
                               </select>
                            </div>
                          </div>
                          <div class="col-sm-9">
                            <div class="form-group">
                               <label>Keterangan</label>
                               <textarea class="form-control" name="cKeterangan" placeholder="Keterangan"><?=$cKeterangan?></textarea>
                            </div>
                          </div>
                        </div><br/>
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
                        <h5><strong>Cari KetidakHadiran Pegawai</strong></h5>
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
                         <button type="button" onclick="window.location.href='<?=base_url()?>transaksi/ketidakhadiran_pegawai/view/'+document.getElementById('cIdPegawai').value" 
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
                             <td>Tanggal</td>
                             <td>Status</td>
                             <td>Action</td>
                           </tr>
                         </thead>
                         <tbody>
                          <?php $no = 0 ; foreach ($row as $key => $vaKetidakhadiran) { 
                            if($vaKetidakhadiran['status'] == 1){
                              $cStatus = "Sakit";
                            }elseif($vaKetidakhadiran['status'] == 2){
                              $cStatus = "Izin";
                            }elseif($vaKetidakhadiran['status'] == 3){
                              $cStatus = "Tanpa Keterangan";
                            }
                          ?>
                           <tr>
                             <td><?=++$no;?></td>
                             <td><?=$vaKetidakhadiran['Pegawai']?></td>
                             <td><?=String2Date($vaKetidakhadiran['tanggal'])?></td>
                             <td><?=($cStatus)?></td>
                             <td align="center">
                              <a class="btn btn-flat btn-success" title="Edit Data" href="<?=site_url('transaksi/ketidakhadiran_pegawai/edit/'.$vaKetidakhadiran['id_ketidakhadiran'].'')?>">
                                <i class="fa fa-edit"></i>
                              </a>
                               <a class="btn btn-danger btn-flat"  title="Hapus Data" 
                               onclick="if(confirm('Apakah anda yakin akah menghapus data?'))
                                { window.location.href='<?=site_url('transaksi_act/ketidakhadiran_pegawai/Delete/'.$vaKetidakhadiran['id_ketidakhadiran'].'')?>'}">
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