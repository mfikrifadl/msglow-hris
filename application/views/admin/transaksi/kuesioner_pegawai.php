  <?php 
        if($action == "edit") {
          foreach ($field as $column) {
            $cIdKuisioner   =   $column['id_kuisioner'] ;
            $cIdPegawai     =   $column['id_pegawai'];
            $dTgl           =   String2Date($column['tanggal']);
            $cKeahlian      =   $column['keahlian'] ;
            $cKekurangan    =   $column['kekurangan_diri']  ;
            $cTantangan     =   $column['bersedia_menerima_tantangan'];
            $cInsiatif      =   $column['inisiatif_untuk_perusahaan']  ;
            $cCatatan       =   $column['catatan_dari_referensi'];
            $nBobot         =   $column['bobot_nilai'];
            $cIconButton    =   "refresh"    ;
            $cValueButton   =   "Update Data" ;
          }
          $cAction = "Update/".$cIdKuisioner."" ;
        }else{
            $cIdKuisioner   =   "" ;
            $cIdPegawai     =   "" ;
            $dTgl           =   $tanggal ;
            $cKeahlian      =   "" ;
            $cKekurangan    =   "" ;
            $cTantangan     =   "" ;
            $cInsiatif      =   "" ;
            $cCatatan       =   "" ;
            $nBobot         =   "" ;
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
            <div class="col-sm-6">
              <div class="box box-success">
                  <div class="box-header">
                      <div class="box-body"> 
                        <h3>Riwayat Kuesioner Kerja Pegawai</h3>
                        <table class="table table-striped table-bordered">
                          <thead>
                            <tr>
                              <td>No</td>
                              <td>Bulan - Tahun</td>
                              <td>Pegawai</td>
                              <td>Act</td>
                            </tr>
                          </thead>
                          <tbody>
                          <?php $no = 0;  foreach ($view as $key => $vaView) {
                           include 'detail.kuisioner.pegawai.php';
                          ?>
                          <tr>
                            <td><?=++$no?></td>
                            <td><?=($vaView['bulan'])?> - <?=($vaView['tahun'])?></td>
                            <td><?=($vaView['Pegawai'])?></td>
                            <td><a href="#modalPgw<?=$vaView['id_kuisioner']?>" data-toggle="modal" title="Lihat Detail"><i class="fa fa-eye"></i> </a></td>
                          </tr>
                          <?php } ?>
                          </tbody>
                        </table> 
                        <br/>
                        <div class="col-sm-12">
                            <a href="<?=site_url('transaksi/kuisioner_pegawai')?>">
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
          							<h3>Input Kuisioner Pegawai</h3>
          							<form method="post" enctype="multipart/form-data"
                        action="<?=site_url('transaksi_act/kuisioner_pegawai/'.$cAction.'')?>">
                          <div class="row">
                           <div class="col-sm-12">
                            <div class="form-group">
                              <label>Tanggal Kuisioner</label>
                              <input type="text"  name="dTgl" value="<?=$dTgl?>" 
                              placeholder="Tanggal" data-date-format="DD-MM-YYYY" class="datetimepicker form-control">
                            </div>
                          </div> 
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
                          <div class="col-sm-12">
                            <div class="form-group">
                               <label>Keahlian</label>
                               <textarea class="form-control" rows="5" placeholder="Keahlian" name="cKeahlian"><?=$cKeahlian?></textarea>
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <div class="form-group">
                              <label>Kekurangan Diri</label>
                              <textarea class="form-control" rows="5" placeholder="Kekurangan Diri" name="cKekurangan"><?=$cKekurangan?></textarea>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-12">
                            <div class="form-group">
                              <label>Bersedia Menerima Tantangan</label>
                              <textarea class="form-control" rows="5" placeholder="Bersedia Menerima Tantangan" name="cTantangan"><?=$cTantangan?></textarea>
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <div class="form-group">
                              <label>Inisiatif Untuk Perusahaan</label>
                                <textarea class="form-control" rows="5" placeholder="Insiatif Perusahaan" name="cInsiatif"><?=$cInsiatif?></textarea>
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <div class="form-group">
                              <label>Catatan Dari Referensi</label>
                              <textarea class="form-control" rows="5" placeholder="Catatan Dari Referensi" name="cCatatan"><?=$cCatatan?></textarea>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-4">
                            <div class="form-group">
                              <label>Bobot Nilai</label>
                              <input type="text" name="nBobot" value="<?=$nBobot?>" 
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
    				<div class="col-sm-6">
              <div class="box box-danger">
                  <div class="box-header">
                       <div class="box-body">
                        <h5><strong>Cari Riwayat Kuisioner Pegawai</strong></h5>
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
                         <button type="button" onclick="window.location.href='<?=base_url()?>transaksi/kuisioner_pegawai/view/'+document.getElementById('cIdPegawai').value" 
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
                             <td>Bulan - Tahun </td>
                             <td>Action</td>
                           </tr>
                         </thead>
                         <tbody>
                          <?php $no = 0 ; foreach ($row as $key => $vaKuisioner) { ?>
                           <tr>
                             <td><?=++$no;?></td>
                             <td><?=$vaKuisioner['Pegawai']?></td>
                             <td><?=($vaKuisioner['bulan'])?> - <?=($vaKuisioner['tahun'])?></td>
                             <td align="center">
                              <a class="btn btn-flat btn-success" title="Edit Data" href="<?=site_url('transaksi/kuisioner_pegawai/edit/'.$vaKuisioner['id_kuisioner'].'')?>">
                                <i class="fa fa-edit"></i>
                              </a>
                               <a class="btn btn-danger btn-flat"  title="Hapus Data" 
                               onclick="if(confirm('Apakah anda yakin akah menghapus data?'))
                                { window.location.href='<?=site_url('transaksi_act/kuisioner_pegawai/Delete/'.$vaKuisioner['id_kuisioner'].'')?>'}">
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