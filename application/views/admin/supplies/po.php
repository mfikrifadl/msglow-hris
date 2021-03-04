  <?php 
        if($action == "edit") {
          foreach ($field as $column) {
            $cIdPo        =    $column['id_po'];
            $cKodePo      =    $column['kode_po'];
            $dTglPo       =    $column['tgl_po'];
            $cIdOutlet    =    $column['id_outlet'];
            $cIdStock     =    $column['id_stock'];
            $nJumlah      =    $column['jumlah'];
            $nHarga       =    $column['harga'];
            $nDiskon      =    $column['diskon'];
            $nTotal       =    $column['total'];
            $cKeterangan  =    $column['keterangan'];
            $cStatus       =    $column['status'];
            $cIconButton   =   "refresh"    ;
            $cValueButton  =   "Update Data" ;
          }
          $cAction = "Update/".$cIdPo."" ;
        }else{
            $cIdPo        =    "";
            $cKodePo      =    $kode_po;
            $dTglPo       =    $this->session->userdata('tgl_po');
            $cIdOutlet    =    $this->session->userdata('id_outlet_supplies');;
            $cIdStock     =    "";
            $nJumlah      =    "";
            $nHarga       =    "";
            $nDiskon      =    "0";
            $nTotal       =    "";
            $cKeterangan  =    "";
            $cStatus       =   "" ;
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
          							<h3>Input Data PO</h3>
          							<form method="post" enctype="multipart/form-data"
                        action="<?=site_url('supplies_act/po/'.$cAction.'')?>">
                          <div class="row">
                           <div class="col-sm-12">
                            <div class="form-group">
                               <label>Kode PO</label>
                               <input type="text" name="cKodePo" id="cKodePo" class="form-control" required="true"
                               value="<?=$cKodePo?>">
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <div class="form-group">
                               <label>Tanggal PO</label>
                               <input type="text" name="dTglPo" id="dTglPo" class="form-control datetimepicker" data-date-format="DD-MM-YYYY" required="true"
                               value="<?=$dTglPo?>">
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <div class="form-group">
                               <label>Outlet</label>
                               <select class="comboBox form-control" style="width: 100%" required="true" id="cIdOutlet" name="cIdOutlet">
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
                                <select class="comboBox form-control" required="true" id="cIdStock" name="cIdStock" onchange="return getHarga(this.value)">
                                  <option></option>
                                  <?php 
                                    $dbSupplies = $this->model->ViewAsc('v_stock_supplies','nama_supplies');
                                    foreach ($dbSupplies as $key => $vaSupplies) {
                                    
                                  ?>
                                  <option value="<?=$vaSupplies['id_stock_supplies']?>" <?php if($vaSupplies['id_stock_supplies'] == $cIdStock)echo "selected"; ?>>
                                  	<?=$vaSupplies['nama_outlet']?> - <?=$vaSupplies['nama_supplies']?></option>
                                <?php } ?>
                               </select>
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <div class="form-group">
                               <label>Jumlah</label>
                               <input type="text" name="nJumlah" required="true" id="nJumlah" class="form-control" 
                               onchange="return total()"
                               value="<?=$nJumlah?>">
                            </div>
                          </div>
                           <div class="col-sm-12">
                            <div class="form-group">
                               <label>Harga</label>
                               <input type="text" name="nHarga" required="true" id="nHarga" class="form-control"
                               value="<?=$nHarga?>">
                            </div>
                          </div>
                           <div class="col-sm-12">
                            <div class="form-group">
                               <label>Diskon</label>
                               <input type="text" name="nDiskon" required="true" id="nDiskon" class="form-control"
                               value="<?=$nDiskon?>">
                            </div>
                          </div>
                         <div class="col-sm-12">
                            <div class="form-group">
                               <label>Total</label>
                               <input type="text" name="nTotal" required="true" id="nTotal" class="form-control"
                               value="<?=$nTotal?>">
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
                              <i class="fa fa-<?=$cIconButton?>"></i> Add PO
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
                        <h3>Data Supplies Yang Di Order</h3>
          							<table class="table table-striped table-bordered" id="DataTable">
                         <thead>
                           <tr>
                             <td>No</td>
                             <td>Kode PO</td>
                             <td>Nama Outlet</td>
                             <td>Nama Supplies</td>
                             <td>Jumlah</td>
                             <td>Harga</td>
                             <td>Total</td>
                             <td>Action</td>
                           </tr>
                         </thead>
                         <tbody>
                          <?php $no = 0 ; 
                          $dbTempPO = $this->db->query("SELECT * FROM v_po_supplies_tmp");
                          foreach ($dbTempPO->result_array() as $key => $vaTempPo) { ?>
                           <tr>
                             <td><?=++$no;?></td>
                             <td>
                              <strong><?=$vaTempPo['kode_po']?></strong>
                              </td>
                             <td><?=($vaTempPo['nama_outlet'])?></td>
                             <td><?=($vaTempPo['nama_supplies'])?></td>
                             <td><?=($vaTempPo['jumlah'])?></td>
                             <td><?=($vaTempPo['harga'])?></td>
                             <td><?=($vaTempPo['total'])?></td>
                             <td align="center">
                              </a>
                               <a class="btn btn-danger btn-flat"  title="Hapus Data" 
                               onclick="if(confirm('Apakah anda yakin akah menghapus data?'))
                                { window.location.href='<?=site_url('supplies_act/po_temp_delete/'.$vaTempPo['id_po'].'')?>'}">
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
                        <h3>Data PO</h3>
                        <table class="table table-striped table-bordered" id="DataTableTwo">
                         <thead>
                           <tr>
                             <td>No</td>
                             <td>Tanggal PO</td>
                             <td>Kode PO</td>
                             <td>Nama Outlet</td>
                             <td>Status</td>
                             <td>Action</td>
                           </tr>
                         </thead>
                         <tbody>
                          <?php $no = 0 ; 
                          $dbTempPO = $this->db->query("SELECT * FROM v_po_supplies GROUP BY kode_po ");
                          foreach ($dbTempPO->result_array() as $key => $vaTempPo) { ?>
                           <tr>
                             <td><?=++$no;?></td>
                             <td><?=String2Date($vaTempPo['tgl_po'])?></td>
                             <td>
                              <strong><?=$vaTempPo['kode_po']?></strong>
                              </td>
                             <td><?=($vaTempPo['nama_outlet'])?></td>
                             <td><?=($vaTempPo['status'])?></td>
                             <td align="center">
                              </a>
                               <a target="_blank" href="<?=site_url('laporan/cetak_po/'.$vaTempPo['kode_po'].'')?>" class="btn btn-primary btn-flat"  title="Print Data">
                                <i class="fa fa-print"></i>
                              </a>
                               <a class="btn btn-danger btn-flat"  title="Hapus Data" 
                               onclick="if(confirm('Apakah anda yakin akah menghapus data?'))
                                { window.location.href='<?=site_url('supplies_act/po_temp_delete/'.$vaTempPo['id_po'].'')?>'}">
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
  function getHarga(cIdStock){
    $.ajax({
      type: "GET",
      url    : "<?=site_url('supplies_act/get_harga_supplies')?>/"+cIdStock,
      cache: false,
      success:function(msg){
        $('#nHarga').val(msg);
      }
    });
  }

  function total(){
    var nHarga  = $('#nHarga').val();
    var nJumlah = $('#nJumlah').val();
    var nTotal  = eval(nHarga) * eval(nJumlah);
    $('#nTotal').val(nTotal);
  }

  function selesai(){

    var cKodePo  = $('#cKodePo').val();
    $.ajax({
      type: "GET",
      url    : "<?=site_url('supplies_act/selesai_po')?>/"+cKodePo,
      cache: false,
      success:function(msg){
        new PNotify({
                title: 'Success!',
                text: 'Berhasil dan Selesai Simpan Data PO',
                type: 'success'
              });
        window.location.href="<?=base_url()?>supplies/po/";
      }
    });
  }
</script>