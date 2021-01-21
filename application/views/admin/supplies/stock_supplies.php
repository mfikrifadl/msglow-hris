  <?php 
        if($action == "edit") {
          foreach ($field as $column) {
            $cIdStockSupplies   =   $column['id_stock_supplies'];
            $cIdSupplies        =   $column['id_supplies'];
            $cIdOutlet          =   $column['id_outlet'];
            $dTgl               =   String2Date($column['tgl']);
            $nJumlah            =   $column['jumlah'];
          
            $cStatus       =   $column['status'];
            $cIconButton   =   "refresh"    ;
            $cValueButton  =   "Update Data" ;
          }
          $cAction = "Update/".$cIdStockSupplies."" ;
        }else{
            $cIdStockSupplies   =   "";
            $cIdSupplies        =   "";
            $dTgl               =   "";
            $cIdOutlet          =   "";
            $nJumlah            =   "";
          
            $cStatus      =   "";
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
          							<h3>Input Data Stock Supplies Tiap Outlet</h3>
          							<form method="post" enctype="multipart/form-data"
                        action="<?=site_url('supplies_act/stock_supplies/'.$cAction.'')?>">
                          <div class="row">
                          
                          <div class="col-sm-12">
                            <div class="form-group">
                               <label>Tanggal</label>
                               <input type="text" name ="dTgl" id="dTgl" class="form-control datetimepicker" data-date-format= "DD-MM-YYYY"
                               placeholder ="Tanggal" value="<?=$dTgl?>">
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <div class="form-group">
                               <label>Outlet</label>
                                <select class="comboBox form-control" required="true" id="cIdOutlet" name="cIdOutlet">
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
                                <select class="comboBox form-control" required="true" id="cIdSupplies" name="cIdSupplies">
                                  <option></option>
                                  <?php 
                                    $dbSupplies = $this->model->ViewAsc('supplies','nama_supplies');
                                    foreach ($dbSupplies as $key => $vaSupplies) {
                                    
                                  ?>
                                  <option value="<?=$vaSupplies['id_supplies']?>" <?php if($vaSupplies['id_supplies'] == $cIdSupplies)echo "selected"; ?>><?=$vaSupplies['nama_supplies']?></option>
                                <?php } ?>
                               </select>
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <div class="form-group">
                               <label>Jumlah</label>
                               <input type="text" name ="nJumlah" required="true" id="nJumlah" class="form-control" 
                               placeholder ="Jumlah" value="<?=$nJumlah?>">
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <div class="form-group">
                               <label>Status</label>
                               <select class="comboBox form-control" id="cStatus" name="cStatus">
                                 <option value="tersedia" <?php if($cStatus == 'tersedia')echo "selected"; ?>>Tersedia</option>
                                 <option value="akanhabis"  <?php if($cStatus == 'akanhabis')echo "selected"; ?>>Akan Habis</option>
                                 <option value="habis"  <?php if($cStatus == 'habis')echo "selected"; ?>>Habis</option>
                               </select>
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
                        	<button type="button" onclick="return save();"  class="btn btn-flat btn-block btn-primary">
                              <i class="fa fa-<?=$cIconButton?>"></i> Add Stock Supplies
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
          							<table class="table table-striped table-bordered" id="DataTable">
                         <thead>
                           <tr>
                             <td>No</td>
                             <td>Nama Outlet</td>
                             <td>Nama Supplies</td>
                             <td>Jumlah</td>
                             <td>Status</td>
                             <td>Action</td>
                           </tr>
                         </thead>
                         <tbody>
                          <?php $no = 0 ; foreach ($row as $key => $vaArea) { ?>
                           <tr>
                             <td><?=++$no;?></td>
                             <td>
                              <strong><?=$vaArea['nama_outlet']?></strong>
                              </td>
                             <td><?=($vaArea['nama_supplies'])?>
                             </td>
                             <td><?=($vaArea['jumlah'])?> <?=$vaArea['satuan']?>
                             </td>
                             <td><?=($vaArea['status'])?></td>
                             <td align="center">
                              <a class="btn btn-flat btn-success" title="Edit Data" href="<?=site_url('supplies/stock_supplies/edit/'.$vaArea['id_stock_supplies'].'')?>">
                                <i class="fa fa-edit"></i>
                              </a>
                               <a class="btn btn-danger btn-flat"  title="Hapus Data" 
                               onclick="if(confirm('Apakah anda yakin akah menghapus data?'))
                                { window.location.href='<?=site_url('supplies_act/stock_supplies/Delete/'.$vaArea['id_stock_supplies'].'')?>'}">
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
 	function save(){
 		 var dTgl                  = $('#dTgl').val();
 		 var cIdOutlet             = $('#cIdOutlet').val();
 		 var cIdSupplies           = $('#cIdSupplies').val();
 		 var nJumlah               = $('#nJumlah').val();
 
 		 var cStatus               = $('#cStatus').val();
 		$.ajax({
 			type: "POST",
 			data  :"tanggal="+dTgl+
 			"&id_outlet="+cIdOutlet+
 			"&id_supplies="+cIdSupplies+
 			"&jumlah="+nJumlah+
 			"&status="+cStatus,
 			url    : "<?=site_url('supplies_act/add_supplies')?>",
 			cache: false,
 			success:function(msg){
 				new PNotify({
                title: 'Success!',
                text: 'Berhasil Simpan Data Stock Supplies. Input Data Berikutnya',
                type: 'success'
              });
 				$('#cIdSupplies').val("");
 				$('#nJumlah').val("");
 			}
 		});
 	}

 	

 	function selesai(){
 		window.location.href="<?=site_url('supplies/stock_supplies')?>";
 	}
 </script>