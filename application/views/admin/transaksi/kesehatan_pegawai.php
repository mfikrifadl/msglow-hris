  <?php 
        if($action == "edit") {
          foreach ($field as $column) {
            $cIdKesehatan         = $column['id_kesehatan']  ;
            $cIdPegawai           = $column['id_pegawai'] ;
            $cPenyakit            = $column['penyakit']   ;
            $cTahun               = $column['tahun'] ;
            $cIconButton   =   "refresh"    ;
            $cValueButton  =   "Update Data" ;
          }
          $cAction = "Update/".$cIdKesehatan."" ;
        }else{
            $cIdKesehatan         = ""  ;
            $cIdPegawai           = "" ;
            $cPenyakit            = ""   ;
            $cTahun               = date("Y")  ; 
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
                        <h3>Riwayat Kesehatan Pegawai</h3>
                        <table class="table table-striped table-bordered">
                          <thead>
                            <tr>
                              <td>No</td>
                              <td>Nama</td>
                              <td>Tahun</td>
                              <td>Penyakit</td>
                            </tr>
                          </thead>
                          <tbody>
                          <?php $no = 0;  foreach ($view as $key => $vaView) {
                          ?>
                          <tr>
                            <td><?=++$no?></td>
                            <td><?=($vaView['Pegawai'])?></td>
                            <td><?=($vaView['tahun'])?></td>
                            <td><a href="#" data-toggle="popover" data-placement="top" data-content="<?=$vaView['penyakit']?>">
                              Lihat Penyakit</a>
                            </td>
                          </tr>
                          <?php } ?>
                          </tbody>
                        </table> 
                        <br/>
                        <div class="col-sm-12">
                            <a href="<?=site_url('transaksi/kesehatan_pegawai')?>">
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
          							<h3>Input Kesehatan Pegawai</h3>
          							<form method="post" enctype="multipart/form-data"
                        action="<?=site_url('transaksi_act/kesehatan_pegawai/'.$cAction.'')?>">
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
                               <label>Tahun</label>
                               <input type="text" class="form-control"
                               value="<?=$cTahun?>" name="cTahun">
                            </div>
                          </div>
                          <div class="col-sm-9">
                            <div class="form-group">
                               <label>Penyakit</label>
                               <textarea class="form-control" name="cPenyakit" placeholder="Penyakit"><?=$cPenyakit?></textarea>
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
                        <h5><strong>Cari Riwayat Kesehatan Pegawai</strong></h5>
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
                         <button type="button" onclick="window.location.href='<?=base_url()?>transaksi/kesehatan_pegawai/view/'+document.getElementById('cIdPegawai').value" 
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
                             <td>Tahun</td>
                             <td>Pegawai</td>
                             <td>Penyakit</td>
                             <td>Action</td>
                           </tr>
                         </thead>
                         <tbody>
                          <?php $no = 0 ; foreach ($row as $key => $vaKesehatan) { ?>
                           <tr>
                             <td><?=++$no;?></td>
                             <td><?=$vaKesehatan['tahun']?></td>
                             <td><?=($vaKesehatan['Pegawai'])?></td>
                             <td><a href="#" data-toggle="popover" data-placement="top" data-content="<?=$vaKesehatan['penyakit']?>">
                              Lihat Penyakit</a></td>
                             <td align="center">
                              <a class="btn btn-flat btn-success" title="Edit Data" href="<?=site_url('transaksi/kesehatan_pegawai/edit/'.$vaKesehatan['id_kesehatan'].'')?>">
                                <i class="fa fa-edit"></i>
                              </a>
                               <a class="btn btn-danger btn-flat"  title="Hapus Data" 
                               onclick="if(confirm('Apakah anda yakin akah menghapus data?'))
                                { window.location.href='<?=site_url('transaksi_act/kesehatan_pegawai/Delete/'.$vaKesehatan['id_kesehatan'].'')?>'}">
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