		<?php 
			if($action == "edit") {
				foreach ($field as $column) {
					$cIdOperator	=	$column['id_operator']	;
					$cIdOutlet		=	$column['id_outlet']	;
					$cNamaOperator  = 	$column['nama_operator'];
					$cAlamatOperator=	$column['alamat']		;
					$nTelepon		=	$column['telepon']		;
					$cImages 		=	$column['foto']			;
					$cKet 			=	"Silahkan Browse Untuk Ubah Gambar";
					$cIconButton	=   "refresh" 				;
					$cValueButton   =   "Update Data" 			;
					$cActionSubmit  =   "Editing(".$cIdOperator.")";
				}
				$cAction = "Update/".$cIdOperator."" ;
			}else{
					$cIdOperator	=	""	;
					$cIdOutlet		=	""	;
					$cNamaOperator  = 	""	;
					$cAlamatOperator=	""	;
					$nTelepon		=	""	;
					$cImages 		=	""	;
					$cKet 			=	"";
					$cIconButton	=   "save" 		;
					$cValueButton   =   "Save Data" ;
					$cAction = "Insert" ;
					$cActionSubmit  =   "Saving()";	
			}
		?>
<div class="row">
	<div class="col-sm-12">
		<div class="nav-tabs-custom">
		  	<ul class="nav nav-tabs" id="myTabs">
		  		 <li class="active"><a href="#tab_1" data-toggle="tab">Input / Edit Operator</a></li>  
            	 <li><a href="#tab_2" data-toggle="tab">Data Operator</a></li>  
		  	</ul>
		 <div class="tab-content">
		  	<div class="tab-pane active" id="tab_1"><br/>
				<form id="FormOperator" enctype="multipart/form-data" method="post">
				  		<div class="row">
				  			<div class="col-sm-12">
					  			<div class="box box-danger">
			            			<div class="box-header">
			                 			<h3 class="box-title">Input Operator</h3>
			            			</div>
			          			<div class="box-body">
					  				<div class="row">
					  					<div class="col-sm-6">
					  						<div class="form-group">
					  							 <label>Pilih Outlet</label>
					  							 <select name="cIdOutlet" class="form-control comboBox">
					  							 	<option value="1">Satu</option>
					  							 </select>
					  						</div>
					  					</div>
					  					<div class="col-sm-4">
					  						<div class="form-group">
					  							 <label>Nama Operator</label>
					  							 <input type="text" name="cNamaOperator" class="form-control"
					  							 value="<?=$cNamaOperator?>" placeholder="Nama Operator" >
					  						</div>
					  					</div>
					  				</div>
					  				<div class="row">
					  					<div class="col-sm-4">
					  						<div class="form-group">
					  							 <label>Alamat</label>
					  							 <textarea name="cAlamat" class="form-control" placeholder="Alamat"><?=$cAlamatOperator?></textarea>
					  						</div>
					  					</div>
					  					<div class="col-sm-4">
					  						<div class="form-group">
					  							 <label>Telefon</label>
					  							 <input type="text" name="nTelepon" class="form-control"
					  							 value="<?=$nTelepon?>" placeholder="Nomor Operator" >
					  						</div>
					  					</div>
					  					<div class="col-sm-4">
					  						<div class="form-group">
					  							 <label>Foto Operator</label>
					  							 <Input type="file" class="form-control" name="foto">
					  							 <label><font size="-1" color="red"><?=$cKet?></font></label>
					  						</div>
					  					</div>
					  				</div>
					  				<br/>
					  				<div class="row">
					  					<div class="col-sm-12">
					  						<button type="button" onclick="return <?=$cActionSubmit?>"  class="btn btn-flat btn-danger">
					  							<i class="fa fa-<?=$cIconButton?>"></i> <?=$cValueButton?>
					  						</button>
					  						<div id="notif"></div>
					  					</div>
					  				</div>				    	  	
					  			</div><!-- /.box-body -->
		          			 </div><!-- /.box -->
				 		</div>	<!-- /.col-sm-9 -->
					</div> <!-- /.row_form -->
				</form>
		  	</div> <!-- tab-pane -->
		  	<div class="tab-pane" id="tab_2"><br/>
		  			<div class="box box-danger">
		            	<div class="box-header">
		                	 <h3 class="box-title">Data Operator</h3>
		           		 </div>
		          		<div class="box-body">
				  				<table class="table table-striped table-bordered table-hover" id="DataTable">
				  				<thead>
				  					<tr>
				  						<th>No</th>
				  						<th>Outlet</th>
				  						<th>Nama Operator</th>
				  						<th>Alamat</th>
				  						<th>Telepon</th>
				  						<th>Foto</th>	
				  						<td align="center"><strong>Action</strong></td> 
				  					</tr>
				  				</thead>
				  				<tbody>
				  				<?php $no = 0; foreach($row as $dbData){ ?>
				  					<tr>
				  						<td><?=++$no?></td>
				  						<td><?=$dbData['id_outlet']?></td>
				  						<td><?=$dbData['nama_operator']?></td>
				  						<td><?=$dbData['alamat']?></td>
				  						<td><?=$dbData['telepon']?></td>
				  						<td><a href="<?=base_url().$dbData['foto']?>" target="_blank">Lihat Foto</a></td>
				  						<td align="center">
		                                <a class="btn btn-flat btn-success" href="<?=site_url('master/operator/edit/'.$dbData['id_operator'].'')?>">
		                                	<i class="fa fa-edit"></i> Edit
		                               	</a>
					    				 <a class="btn btn-danger btn-flat"  
					    				 onclick="return Deleting('<?=$dbData['id_operator']?>');">
					    				 	<i class="fa fa-trash-o"></i> Delete
					    				</a>
		                               </td>
				  					</tr>
				  				<?php } ?>
				  				</tbody>
				  				<tfoot>
				  					<tr>
				  						<th>No</th>
				  						<th>Outlet</th>
				  						<th>Nama Operator</th>
				  						<th>Alamat</th>
				  						<th>Telepon</th>
				  						<th>Foto</th>	
				  						<td align="center"><strong>Action</strong></td>
				  					</tr>
				  				</tfoot>
				  			</table>
		  				</div><!-- /.box-body -->
	           		</div><!-- /.box -->
		  		</div> <!-- /.Tap-pane -->
			</div> <!-- tab-content --> 
		</div> <!-- nav-tabs-custom -->
	</div> <!-- col-sm-12 -->
</div>  <!-- row -->

<script type="text/javascript">
 function Saving(){
      $.ajax({
      	data:$("#FormOperator").serialize(),
        type: "POST",
        url: "<?=site_url('master_act/operator/Insert')?>",
        cache: false,
        beforeSend: function(){
        $('#notif').html("<div align='center'><img  width='50' height='50' src='<?=base_url()?>assets/dist/img/ajax-loader1.gif' /></div> ");
        },success:function(msg){
          return Notifikasi('simpan') ;
        },error:function(){
          return Notifikasi('error') ;
        },complete: function() {
         $('#notif').remove();
        setTimeout(function() { window.location="<?=site_url('master/operator')?>" },1500);
    	}
   	});

  }
  function Editing(id){
      $.ajax({
      	data:$("#FormOperator").serialize(),
        type: "POST",
        url: "<?=base_url()?>master_act/operator/Update/"+id,
        cache: false,
        beforeSend: function(){
        $('#notif').html("<div align='center'><img  width='50' height='50' src='<?=base_url()?>assets/dist/img/ajax-loader1.gif' /></div> ");
        },success:function(msg){
          return Notifikasi('edit') ;
        },error:function(){
          return Notifikasi('error') ;
        },complete: function() {
         $('#notif').remove();
         setTimeout(function() { window.location="<?=site_url('master/operator')?>" },1500);
    	}
   	});
  }

  function Deleting(id){
     
  	if (confirm("Apakah Anda Yakin Menghapus Data ? ") == true) {
      $.ajax({
        url: "<?=base_url()?>master_act/operator/Delete/"+id,
        cache: false,
        success:function(msg){
          return Notifikasi('hapus') ;
        },error:function(){
          return Notifikasi('error') ;
        },complete: function() {
         $('#notif').remove();
         setTimeout(function() { window.location="<?=site_url('master/operator')?>" },1500);
    	}
   	});
   }
  
  }

  
</script>