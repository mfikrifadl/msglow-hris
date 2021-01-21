  <?php 
        if($action == "edit") {
          foreach ($field as $column) {
            $cIdTimKhusus  =   $column['id_tim_khusus'];
            $cIdKategoriTim=   $column['id_kategori_tim_khusus'];
            $cNikTimKhusus =   $column['nik'];
            $cNamaTimKhusus=   $column['nama'];
            $nTelepon      =   $column['telefon'];     
            $cIconButton   =   "refresh"    ;
            $cValueButton  =   "Update Data" ;
          }
          $cAction = "Update/".$cIdTimKhusus."" ;
        }else{
            $cIdTimKhusus  =   "";
            $cIdKategoriTim=   "";
            $cNikTimKhusus =   "";
            $cNamaTimKhusus=   "";
            $nTelepon      =   "";  
            $cIconButton   = "save"    ;
            $cValueButton  = "Save Data" ;
            $cAction       = "Insert" ; 
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
    				<div class="col-sm-12">
    					<div class="box box-success">
        					<div class="box-header">
          						<div class="box-body"> 
          							<h3>Input Data Tim Khusus</h3>
          							<form method="post" enctype="multipart/form-data"
                        action="<?=site_url('action/tim_khusus/'.$cAction.'')?>">
                          <div class="row">
                           <div class="col-sm-12">
                            <div class="form-group">
                               <label>Pilih Kategori Tim Khusus</label>
                               <select class="comboBox form-control" name="cIdKategoriTimKhusus">
                                <option></option>
                                <?php foreach ($tim as $key => $vaTim) { ?>
                                <option value="<?=$vaTim['id_kategori_tim_khusus']?>"
                                <?php if($vaTim['id_kategori_tim_khusus'] == $cIdKategoriTim)echo "selected"; ?>>
                                    <?=$vaTim['keterangan']?>
                                </option>
                                <?php }  ?>
                              </select>
                            </div>
                          </div>
                        </div>
                          <div class="row">
                           <div class="col-sm-12">
                            <div class="form-group">
                               <label>Nik</label>
                               <Input type="text" name ="cNik" class="form-control" 
                               placeholder ="NIK" value="<?=$cNikTimKhusus?>">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                           <div class="col-sm-12">
                            <div class="form-group">
                               <label>Nama</label>
                               <Input type="text" name ="cNama" class="form-control" 
                               placeholder ="Nama" value="<?=$cNamaTimKhusus?>">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                           <div class="col-sm-12">
                            <div class="form-group">
                               <label>Telepon</label>
                               <Input type="text" name ="nTelepon" class="form-control" 
                               placeholder ="Telefon" value="<?=$nTelepon?>">
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
    				<div class="col-sm-12">
    					<div class="box box-info">
        					<div class="box-header">
          						<div class="box-body"> 
          							<table class="table table-striped table-bordered" id="DataTable">
                         <thead>
                           <tr>
                             <td>No</td>
                             <td>Kategori</td>
                             <td>Nik</td>
                             <td>Nama</td>
                             <td>Telepon</td>
                             <td>Action</td>
                           </tr>
                         </thead>
                         <tbody>
                          <?php $no = 0 ; foreach ($row as $key => $vaKhusus) { ?>
                           <tr>
                             <td><?=++$no;?></td>
                             <td><?=$vaKhusus['Kategori']?></td>
                             <td><?=$vaKhusus['nik']?></td>
                             <td><?=$vaKhusus['nama']?></td>
                              <td><?=$vaKhusus['telefon']?></td>
                             <td align="center">
                              <a class="btn btn-link" title="Edit Data" 
                              href="<?=site_url('master/tim_khusus/edit/'.$vaKhusus['id_tim_khusus'].'')?>">
                                <i class="fa fa-edit"></i>
                              </a>
                               <a class="btn btn-link"  title="Hapus Data" 
                               onclick="if(confirm('Apakah anda yakin akah menghapus data?'))
                                { window.location.href='<?=site_url('action/tim_khusus/Delete/'.$vaKhusus['id_tim_khusus'].'')?>'}">
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