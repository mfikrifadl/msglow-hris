  <?php 
        if($action == "edit") {
          foreach ($field as $column) {
            $cIdRefJabatan  =   $column['id_ref_jabatan'];
            $cNamaJabatan   =   $column['nama_jabatan']  ;
            $cIconButton    =   "refresh"    ;
            $cValueButton   =   "Update Data" ;
          }
          $cAction = "Update/".$cIdRefJabatan."" ;
        }else{
            $cIdRefJabatan  =   "";
            $cNamaJabatan   =   "";
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
          							<h3>Input Data Referensi Jabatan</h3>
          							<form method="post" enctype="multipart/form-data"
                        action="<?=site_url('action/ref_jabatan/'.$cAction.'')?>">
                          <div class="row">
                           <div class="col-sm-12">
                            <div class="form-group">
                               <label>Nama Jabatan</label>
                               <Input type="text" name ="cNamaJabatan" class="form-control" 
                               placeholder ="Nama Jabatan" value="<?=$cNamaJabatan?>">
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
                             <td>Jabatan</td>
                             <td>Action</td>
                           </tr>
                         </thead>
                         <tbody>
                          <?php $no = 0 ; foreach ($row as $key => $vaJabatan) { ?>
                           <tr>
                             <td><?=++$no;?></td>
                             <td><?=$vaJabatan['nama_jabatan']?></td>
                             <td align="center">
                              <a class="btn btn-flat btn-success" title="Edit Data" href="<?=site_url('master/ref_jabatan/edit/'.$vaJabatan['id_ref_jabatan'].'')?>">
                                <i class="fa fa-edit"></i>
                              </a>
                               <a class="btn btn-danger btn-flat"  title="Hapus Data" 
                               onclick="if(confirm('Apakah anda yakin akah menghapus data?'))
                                { window.location.href='<?=site_url('action/ref_jabatan/Delete/'.$vaJabatan['id_ref_jabatan'].'')?>'}">
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