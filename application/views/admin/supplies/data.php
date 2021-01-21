  <?php 
        if($action == "edit") {
          foreach ($field as $column) {
            $cIdSupplies   =    $column['id_supplies'];
            $cNamaSupplies =    $column['nama_supplies'];
            $nHargaBeli    =    $column['harga_beli'];
            $nHargaJual    =    $column['harga_jual'];
            $cSatuan       =    $column['satuan'];
            $cIconButton   =   "refresh"    ;
            $cValueButton  =   "Update Data" ;
          }
          $cAction = "Update/".$cIdSupplies."" ;
        }else{
            $cIdSupplies   =   "";
            $cNamaSupplies =   "";
            $nHargaBeli    =   "";
            $nHargaJual    =   "";
            $cSatuan       =   "";
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
          							<h3>Input Data Supplies</h3>
          							<form method="post" enctype="multipart/form-data"
                        action="<?=site_url('supplies_act/data/'.$cAction.'')?>">
                          <div class="row">
                           <div class="col-sm-12">
                            <div class="form-group">
                               <label>Nama Supplies</label>
                               <input type="text" name="cNamaSupplies" required="true" id="cNamaSupplies" class="form-control"
                               value="<?=$cNamaSupplies?>">
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <div class="form-group">
                               <label>Harga Beli</label>
                               <input type="text" name="nHargaBeli" required="true" id="nHargaBeli" class="form-control"
                               value="<?=$nHargaBeli?>">
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <div class="form-group">
                               <label>Harga Jual</label>
                               <input type="text" name="nHargaJual" required="true" id="nHargaJual" class="form-control"
                               value="<?=$nHargaJual?>">
                            </div>
                          </div>
                        
                          <div class="col-sm-12">
                            <div class="form-group">
                               <label>Satuan</label>
                               <select class="comboBox form-control" id="cSatuan" name="cSatuan">
                                 <option value="PCS" <?php if($cSatuan == 'PCS')echo "selected"; ?>>PCS</option>
                               </select>
                            </div>
                          </div>
                        </div><br/>
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
    				<div class="col-sm-7">
    					<div class="box box-info">
        					<div class="box-header">
          						<div class="box-body"> 
          							<table class="table table-striped table-bordered" id="DataTable">
                         <thead>
                           <tr>
                             <td>No</td>
                             <td>Nama Supplies</td>
                             <td>Harga Beli</td>
                             <td>Harga Jual</td>
                             <td>Satuan</td>
                             <td>Action</td>
                           </tr>
                         </thead>
                         <tbody>
                          <?php $no = 0 ; foreach ($row as $key => $vaArea) { ?>
                           <tr>
                             <td><?=++$no;?></td>
                             <td>
                              <strong><?=$vaArea['nama_supplies']?></strong>
                              </td>
                             <td><?=($vaArea['harga_beli'])?> 
                             </td>
                             <td><?=($vaArea['harga_jual'])?></td>
                             <td><?=($vaArea['satuan'])?></td>
                             <td align="center">
                              <a class="btn btn-flat btn-success" title="Edit Data" href="<?=site_url('supplies/data/edit/'.$vaArea['id_supplies'].'')?>">
                                <i class="fa fa-edit"></i>
                              </a>
                               <a class="btn btn-danger btn-flat"  title="Hapus Data" 
                               onclick="if(confirm('Apakah anda yakin akah menghapus data?'))
                                { window.location.href='<?=site_url('supplies_act/data/Delete/'.$vaArea['id_supplies'].'')?>'}">
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
