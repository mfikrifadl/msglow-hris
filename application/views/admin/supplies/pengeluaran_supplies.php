  <?php 
        if($action == "edit") {
          foreach ($field as $column) {
            $cIdPengeluaran=   $column['id_pengeluaran'];
            $cKodePengeluaran= $column['kode_pengeluaran'];
            $dTglPengeluaran = $column['tgl_pengeluaran'];
            $cIdSpv          = $column['id_spv'];
            $cIdOutlet       = $column['id_outlet'];
            $cIdStock        = $column['id_stock_supplies'];
            $nJumlahAwal     = $column['jumlah_awal'];
            $nJumlahPengeluaran= $column['jumlah_pengeluaran'];
            $cKeterangan       = $column['keterangan'];
            $cIconButton   =   "refresh"    ;
            $cValueButton  =   "Update Data" ;
          }
          $cAction = "Update/".$cIdPo."" ;
        }else{
           $cIdPengeluaran=   "";
            $cKodePengeluaran= $kode_pengeluaran;
            $dTglPengeluaran =  $this->session->userdata('tgl_pengeluaran');
            $cIdSpv          =  $this->session->userdata('id_spv_pengeluaran');
            $cIdOutlet       =  $this->session->userdata('id_outlet_pengeluaran');
            $cIdStock        = "" ;
            $nJumlahAwal     = "";
            $nJumlahPengeluaran= "" ;
            $cKeterangan       = "" ;
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
    				<div class="col-sm-5">
    					<div class="box box-success">
        					<div class="box-header">
          						<div class="box-body"> 
          							<h3>Input Data Pengeluaran </h3>
          							<form method="post" enctype="multipart/form-data"
                        action="<?=site_url('supplies_act/pengeluaran/'.$cAction.'')?>">
                          <div class="row">
                           <div class="col-sm-12">
                            <div class="form-group">
                               <label>Kode Pengeluaran</label>
                               <input type="text"  required="true"name="cKodePengeluaran" id="cKodePengeluaran" class="form-control"
                               value="<?=$cKodePengeluaran?>">
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <div class="form-group">
                               <label>Tanggal Pengeluaran</label>
                               <input type="text" name="dTglPengeluaran" id="dTglPengeluaran" class="form-control datetimepicker" data-date-format="DD-MM-YYYY"
                               value="<?=$dTglPengeluaran?>">
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <div class="form-group">
                               <label>Supervisor</label>
                               <select required="true" class="comboBox form-control" id="cIdSpv" name="cIdSpv">
                                  <option></option>
                                  <?php 
                                    $dbSpv = $this->model->ViewAsc('tb_spv','id_spv');
                                    foreach ($dbSpv as $key => $vaSpv) {
                                    
                                  ?>
                                  <option value="<?=$vaSpv['id_spv']?>" <?php if($vaSpv['id_spv'] == $cIdSpv)echo "selected"; ?>><?=$vaSpv['nama']?></option>
                                <?php } ?>
                               </select>
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <div class="form-group">
                               <label>Outlet</label>
                               <select required="true" class="comboBox form-control" id="cIdOutlet" name="cIdOutlet">
                                  <option></option>
                                  <?php 
                                    $dbOutlet = $this->model->ViewAsc('tb_outlet','id_outlet');
                                    foreach ($dbOutlet as $key => $vaOutlet) {
                                    
                                  ?>
                                  <option value="<?=$vaOutlet['id_outlet']?>" <?php if($vaOutlet['id_outlet'] == $cIdOutlet)echo "selected"; ?>><?=$vaOutlet['kode']?> - <?=$vaOutlet['nama']?></option>
                                <?php } ?>
                               </select>
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <div class="form-group">
                               <label>Supplies</label>
                                <select required="true" class="comboBox form-control" id="cIdStock" name="cIdStock" onchange="return getJumlah(this.value)">
                                  <option></option>
                                  <?php 
                                    $dbSupplies = $this->model->ViewAsc('v_stock_supplies','nama_supplies');
                                    foreach ($dbSupplies as $key => $vaSupplies) {
                                    
                                  ?>
                                  <option value="<?=$vaSupplies['id_stock_supplies']?>" <?php if($vaSupplies['id_stock_supplies'] == $cIdStock)echo "selected"; ?>><?=$vaSupplies['nama_supplies']?></option>
                                <?php } ?>
                               </select>
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <div class="form-group">
                               <label>Jumlah Awal</label>
                               <input type="text" name="nJumlahAwal" id="nJumlahAwal" class="form-control" 
                               value="<?=$nJumlahAwal?>" readonly>
                            </div>
                          </div>
                           <div class="col-sm-12">
                            <div class="form-group">
                               <label>Jumlah Pengeluaran</label>
                               <input type="text" name="nJumlahPengeluaran" id="nJumlahPengeluaran" class="form-control"
                               value="<?=$nJumlahPengeluaran?>">
                            </div>
                          </div>
                          
                          
                        </div><br/>
                        <div class="row">
                          <div class="col-sm-12">
                            <?php 
                            if($action == 'edit'){
                            ?>
                            <button type="submit"  class="btn btn-flat btn-block btn-primary">
                              <i class="fa fa-<?=$cIconButton?>"></i> <?=$cValueButton?>
                            </button>
                        <?php }else{ ?>
                          <button type="submit" class="btn btn-flat btn-block btn-primary">
                              <i class="fa fa-<?=$cIconButton?>"></i> Add Pengeluaran
                            </button>
                        <?php } ?>
                            
                          </div>
                          <div class="col-sm-12">
                            <br/>
                            <button type="button" onclick="return selesai();"  class="btn btn-flat btn-block btn-success">
                              <i class="fa fa-arrow-right"></i> Selesai
                            </button>
                          </div>
                        </div>  
                        </form>
          						</div>
          					</div>
          				</div>
    				</div>
    				<div class="col-sm-7">
    					<div class="box box-info">
        					<div class="box-header">
          						<div class="box-body"> 
                        <h3>Data Supplies Yang Di Keluarkan</h3>
          							<table class="table table-striped table-bordered" id="DataTable">
                         <thead>
                           <tr>
                             <td>No</td>
                             <td>Kode Pengeluaran</td>
                             <td>Nama Outlet</td>
                             <td>Nama Supplies</td>
                             <td>Jumlah Awal</td>
                             <td>Jumlah Keluar</td>
                             <td>Action</td>
                           </tr>
                         </thead>
                         <tbody>
                          <?php $no = 0 ; 
                          $dbTempPO = $this->db->query("SELECT * FROM v_pengeluaran_supplies_tmp");
                          foreach ($dbTempPO->result_array() as $key => $vaTempPo) { ?>
                           <tr>
                             <td><?=++$no;?></td>
                             <td>
                              <strong><?=$vaTempPo['kode_pengeluaran']?></strong>
                              </td>
                             <td><?=($vaTempPo['nama_outlet'])?></td>
                             <td><?=($vaTempPo['nama_supplies'])?></td>
                             <td><?=($vaTempPo['jumlah_awal'])?></td>
                             <td><?=($vaTempPo['jumlah_pengeluaran'])?></td>
                             <td align="center">
                              </a>
                               <a class="btn btn-danger btn-flat"  title="Hapus Data" 
                               onclick="if(confirm('Apakah anda yakin akah menghapus data?'))
                                { window.location.href='<?=site_url('supplies_act/pengeluaran_temp_delete/'.$vaTempPo['id_pengeluaran'].'')?>'}">
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
            <div class="col-sm-12">
              <div class="box box-info">
                  <div class="box-header">
                      <div class="box-body"> 
                        <h3>Data Pengeluaran</h3>
                        <table class="table table-striped table-bordered" id="DataTableTwo">
                         <thead>
                           <tr>
                             <td>No</td>
                             <td>Kode Pengeluaran</td>
                             <td>Nama Outlet</td>
                             <td>Nama Spv</td>
                             <td>Action</td>
                           </tr>
                         </thead>
                         <tbody>
                          <?php $no = 0 ; 
                          $dbTempPO = $this->db->query("SELECT * FROM v_pengeluaran_supplies GROUP BY kode_pengeluaran");
                          foreach ($dbTempPO->result_array() as $key => $vaTempPo) { ?>
                           <tr>
                             <td><?=++$no;?></td>
                             <td>
                              <strong><?=$vaTempPo['kode_pengeluaran']?></strong>
                              </td>
                             <td><?=($vaTempPo['nama_outlet'])?></td>
                             <td><?=($vaTempPo['nama_supervisor'])?></td>
    
                             <td align="center">
                              <a target="_blank" href="<?=site_url('laporan/cetak_pengeluaran/'.$vaTempPo['kode_pengeluaran'].'')?>" class="btn btn-primary btn-flat"  title="Print Data">
                                <i class="fa fa-print"></i>
                              </a>
                               <a class="btn btn-danger btn-flat"  title="Hapus Data" 
                               onclick="if(confirm('Apakah anda yakin akah menghapus data?'))
                                { window.location.href='<?=site_url('supplies_act/pengeluaran_delete/'.$vaTempPo['id_pengeluaran'].'')?>'}">
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
<script type="text/javascript">
  function getJumlah(cIdStock){
    $.ajax({
      type: "GET",
      url    : "<?=site_url('supplies_act/get_jumlah_supplies')?>/"+cIdStock,
      cache: false,
      success:function(msg){
        $('#nJumlahAwal').val(msg);
      }
    });
  }

  

  function selesai(){

    var cKodePo  = $('#cKodePengeluaran').val();
    $.ajax({
      type: "GET",
      url    : "<?=site_url('supplies_act/selesai_pengeluaran')?>/"+cKodePo,
      cache: false,
      success:function(msg){
        new PNotify({
                title: 'Success!',
                text: 'Berhasil dan Selesai Simpan Data Pengeluaran',
                type: 'success'
              });
        window.location.href="<?=base_url()?>supplies/pengeluaran_supplies/";
      }
    });
  }
</script>