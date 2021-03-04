
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
    					<div class="box box-info">
        					<div class="box-header">
          						<div class="box-body"> 
          							<table class="table table-striped table-bordered" id="DataTable">
                         <thead>
                           <tr>
                             <td>No</td>
                             <td>Tgl Permintaan</td>
                             <td>Operator</td>
                             <td>Nama Outlet</td>
                             <td>Status</td>
                             <td>Action</td>
                           </tr>
                         </thead>
                         <tbody>
                          <?php
                         $no = 0 ;
                          $link = @mysqli_connect('localhost', 'root', 'nitrogen123', 'greennit_penjualan'); 
                          $db   = mysqli_query($link,"SELECT * FROM v_permintaan_supplies GROUP BY tanggal_permintaan,id_outlet ") or die(mysqli_error($link));;
                          while($vaArea = mysqli_fetch_assoc($db)){
                          ?>
                           <tr>
                             <td><?=++$no;?></td>
                             <td><?=($vaArea['tanggal_permintaan'])?></td>
                             <td><?=($vaArea['nama_operator'])?></td>
                             <td>
                              <strong><?=$vaArea['nama_outlet']?></strong>
                             </td>
                             <td><?=($vaArea['status'])?></td>
                             <td align="center">
                              <a class="btn btn-flat btn-success" title="Edit Data" href="<?=site_url('supplies/permintaan_supplies_get/'.$vaArea['tanggal_permintaan'].'/'.$vaArea['id_outlet'].'/'.$vaArea['id_operator'].'')?>">
                                <i class="fa fa-edit"></i>
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