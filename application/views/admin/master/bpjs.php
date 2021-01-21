  <?php 
        if($action == "edit") {
          foreach ($field as $column) {
            $cIdBPJS        =   $column['id_bpjs'];
            $cIdPegawai     =   $column['id_pegawai'];
            $nJumlah        =   $column['jumlah'];
            $cIconButton   =   "refresh"    ;
            $cValueButton  =   "Update Data" ;
          }
          $cAction = "Update/".$cIdBPJS."" ;
        }else{
            $cIdBPJS        =   "";
            $cIdPegawai     =   "";
            $nJumlah        =   "";
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
    				<div class="col-sm-6">
    					<div class="box box-success">
        					<div class="box-header">
          						<div class="box-body"> 
          							<h3>Input Data BPJS</h3>
          							<form method="post" enctype="multipart/form-data"
                        action="<?=site_url('action/bpjs/'.$cAction.'')?>">
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
                          <div class="col-sm-12">
                            <div class="form-group">
                               <label>Jumlah BPJS</label>
                               <Input type="text" name ="nJumlah" class="form-control" 
                               placeholder ="Jumlah BPJS" value="<?=$nJumlah?>">
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
    				<div class="col-sm-6">
    					<div class="box box-info">
        					<div class="box-header">
          						<div class="box-body"> 
          							<table class="table table-striped table-bordered" id="DataTable">
                         <thead>
                           <tr>
                             <td>No</td>
                             <td>Nama Pegawai</td>
                             <td>Jumlah BPJS</td>
                             <td>Action</td>
                           </tr>
                         </thead>
                         <tbody>
                          <?php $no = 0 ; foreach ($row as $key => $vaArea) { ?>
                           <tr>
                             <td><?=++$no;?></td>
                             <td><?=$vaArea['nama']?></td>
                             <td><?=number_format($vaArea['jumlah'])?></td>
                             <td align="center">
                              <a class="btn btn-flat btn-success" title="Edit Data" href="<?=site_url('master/bpjs/edit/'.$vaArea['id_bpjs'].'')?>">
                                <i class="fa fa-edit"></i>
                              </a>
                               <a class="btn btn-danger btn-flat"  title="Hapus Data" 
                               onclick="if(confirm('Apakah anda yakin akah menghapus data?'))
                                { window.location.href='<?=site_url('action/bpjs/Delete/'.$vaArea['id_bpjs'].'')?>'}">
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