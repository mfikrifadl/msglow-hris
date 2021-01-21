  <?php 
        if($action == "edit") {
          foreach ($field as $column) {
            $cIdPrestasi    =   $column['id_prestasi'] ;
            $cIdPegawai     =   $column['id_pegawai'];
            $dTgl           =   String2Date($column['tanggal']);
            $cTahun         =   ($column['tahun']);
            $cPrestasi      =   $column['prestasi'] ;
            $cIconButton    =   "refresh"    ;
            $cValueButton   =   "Update Data" ;
          }
          $cAction = "Update/".$cIdPrestasi."" ;
        }else{
            $cIdPrestasi   =    "" ;
            $cIdPegawai     =   "" ;
            $cTahun         =   "" ;
            $dTgl           =   $tanggal;
            $cPrestasi      =   "" ;
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
                        <h3>Riwayat Prestasi Kerja Pegawai</h3>
                        <table class="table table-striped table-bordered">
                          <thead>
                            <tr>
                              <td>No</td>
                              <td>Tahun</td>
                              <td>Pegawai</td>
                              <td>Act</td>
                            </tr>
                          </thead>
                          <tbody>
                          <?php $no = 0;  foreach ($view as $key => $vaView) {
                           include 'detail.prestasi.pegawai.php';
                          ?>
                          <tr>
                            <td><?=++$no?></td>
                            <td><?=($vaView['tahun'])?></td>
                            <td><?=($vaView['Pegawai'])?></td>
                            <td><a href="#modalPgw<?=$vaView['id_prestasi']?>" data-toggle="modal" title="Lihat Detail"><i class="fa fa-eye"></i> </a></td>
                          </tr>
                          <?php } ?>
                          </tbody>
                        </table> 
                        <br/>
                        <div class="col-sm-12">
                            <a href="<?=site_url('transaksi/prestasi_pegawai')?>">
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
          							<h3>Input Prestasi Pegawai</h3>
          							<form method="post" enctype="multipart/form-data"
                        action="<?=site_url('transaksi_act/prestasi_pegawai/'.$cAction.'')?>">
                          <div class="row">
                           <div class="col-sm-12">
                            <div class="form-group">
                              <label>Tanggal Prestasi</label>
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
                               <label>Prestasi</label>
                               <textarea class="form-control" rows="5" placeholder="Prestasi" name="cPrestasi"><?=$cPrestasi?></textarea>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label>Tahun</label>
                              <input type="text" name="cBulan" readonly="true" value="<?=$cTahun?>" class="form-control" placeholder="Bulan">
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
          						</div>
          					</div>
          				</div>
    				</div>
            <?php } ?>
    				<div class="col-sm-6">
              <div class="box box-danger">
                  <div class="box-header">
                       <div class="box-body">
                        <h5><strong>Cari Riwayat Prestasi Pegawai</strong></h5>
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
                         <button type="button" onclick="window.location.href='<?=base_url()?>transaksi/prestasi_pegawai/view/'+document.getElementById('cIdPegawai').value" 
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
                             <td>Tahun </td>
                             <td>Action</td>
                           </tr>
                         </thead>
                         <tbody>
                          <?php $no = 0 ; foreach ($row as $key => $vaPrestasi) { ?>
                           <tr>
                             <td><?=++$no;?></td>
                             <td><?=$vaPrestasi['Pegawai']?></td>
                             <td><?=($vaPrestasi['tahun'])?></td>
                             <td align="center">
                              <a class="btn btn-flat btn-success" title="Edit Data" href="<?=site_url('transaksi/prestasi_pegawai/edit/'.$vaPrestasi['id_prestasi'].'')?>">
                                <i class="fa fa-edit"></i>
                              </a>
                               <a class="btn btn-danger btn-flat"  title="Hapus Data" 
                               onclick="if(confirm('Apakah anda yakin akah menghapus data?'))
                                { window.location.href='<?=site_url('transaksi_act/prestasi_pegawai/Delete/'.$vaPrestasi['id_prestasi'].'')?>'}">
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