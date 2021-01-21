  <?php 
        if($action == "edit") {
          foreach ($field as $column) {
            $cIdStatusKaryawan  =   $column['id_status']  ;
            $cStatusKaryawan    =   $column['status']     ;
            $cKodeStatusKaryawan=   $column['kode_status'];
            $cIconButton    =   "refresh"    ;
            $cValueButton   =   "Update Data" ;
          }
          $cAction = "Update/".$cIdStatusKaryawan."" ;
        }else{
            $cIdStatusKaryawan  =   ""   ;
            $cStatusKaryawan      =   ""   ;
            $cKodeStatusKaryawan  =   ""   ;
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
          							<h3>Input Data Status Karyawan</h3>
          							<form method="post" enctype="multipart/form-data"
                        action="<?=site_url('action/status_karyawan/'.$cAction.'')?>">
                          <div class="row">
                           <div class="col-sm-4">
                            <div class="form-group">
                               <label>Kode Status</label>
                               <Input type="text" name ="cKodeStatusKaryawan" class="form-control" 
                               placeholder ="Kode Status" value="<?=$cKodeStatusKaryawan?>">
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <div class="form-group">
                               <label>Status Karyawan</label>
                               <Input type="text" name ="cStatusKaryawan" class="form-control" 
                               placeholder ="Nama Jabatan" value="<?=$cStatusKaryawan?>">
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
                             <td>Kode Status</td>
                             <td>Status</td>
                             <td>Action</td>
                           </tr>
                         </thead>
                         <tbody>
                          <?php $no = 0 ; foreach ($row as $key => $vaStatus) { ?>
                           <tr>
                             <td><?=++$no;?></td>
                             <td><?=$vaStatus['kode_status']?></td>
                             <td><?=$vaStatus['status']?></td>
                             <td align="center">
                              <a class="btn btn-flat btn-success" title="Edit Data" href="<?=site_url('master/status_karyawan/edit/'.$vaStatus['id_status'].'')?>">
                                <i class="fa fa-edit"></i>
                              </a>
                               <a class="btn btn-danger btn-flat"  title="Hapus Data" 
                               onclick="if(confirm('Apakah anda yakin akah menghapus data?'))
                                { window.location.href='<?=site_url('action/status_karyawan/Delete/'.$vaStatus['id_status'].'')?>'}">
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