  <?php 
  $dbOutlet   = $this->model->ViewWhere('tb_outlet','id_outlet',$id_outlet);
  $dbPegawai  = $this->model->ViewWhere('tb_pegawai','id_pegawai',$id_pegawai);

  foreach ($dbOutlet as $key => $vaOutlet) {
    $cNamaOutlet =  $vaOutlet['nama'];
  }

  foreach ($dbPegawai as $key => $vaPegawai) {
    $cNamaPegawai   = $vaPegawai['nama'];
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
    					<div class="box box-info">
        					<div class="box-header">
          						<div class="box-body"> 
                        <h3>Data Konfirmasi Pengeluaran Supplies Untuk Outlet <strong><?=$cNamaOutlet?></strong>, dan di Request Oleh <strong><?=$cNamaPegawai?></strong> </h3>
          							<table class="table table-striped table-bordered" id="DataTable">
                         <thead>
                           <tr>
                             <td>No</td>
                             <td>Kode Pengeluaran</td>
                             <td>Tgl Permintaan</td>
                             <td>Tgl Pengeluaran</td>
                             <td>Nama Supplies</td>
                             <td>Jumlah Stock Sekarang</td>
                             <td>Jumlah Yang Di Minta</td>
                             <td>Status</td>
                             <td>Action</td>
                           </tr>
                         </thead>
                         <tbody>
                          <?php
                         $no = 0 ;
                         $id = 0 ;
                          $link = @mysqli_connect('localhost', 'root', 'nitrogen123', 'greennit_penjualan'); 
                          $db   = mysqli_query($link,"SELECT * FROM v_permintaan_supplies WHERE tanggal_permintaan = '".$tanggal_permintaan."' and id_outlet = '".$id_outlet."' and id_operator = '".$id_pegawai."' ") or die(mysqli_error($link));;
                          while($vaArea = mysqli_fetch_assoc($db)){

                            $dbStockAwal = $this->model->ViewWhere('v_stock_supplies','id_supplies',$vaArea['id_supplies']);
                            foreach ($dbStockAwal as $key => $vaStockAwal) {
                              $nStockAwal = $vaStockAwal['jumlah'];
                            }
                          ?>
                          
                           <tr>
                             <td><?=++$no;?></td>
                             <td><strong><?=$kode_pengeluaran?></strong></td>
                             <td><?=($vaArea['tanggal_permintaan'])?></td>
                             <td><?=(date("d-m-Y"))?></td>
                             <td><?=($vaArea['nama_supplies'])?></td>
                             <td><?=$nStockAwal?></td>

                              <form method="post" action="<?=site_url('supplies_act/pengeluaran_by_request/'.$vaArea['id_permintaan_supplies'].'')?>">
                             <td><input type="text" name="cJumlahPengeluaran<?=$vaArea['id_permintaan_supplies']?>" class="form-control" value="<?=($vaArea['jumlah_permintaan'])?>"></td>
                             <td><?=$vaArea['status']?></td>
                             <td align="center">
                             
                             <input type="hidden" name="dTglPengeluaran<?=$vaArea['id_permintaan_supplies']?>" 
                            class="form-control" value="<?=($tanggal_permintaan)?>">

                            <input type="hidden" name="cIdPegawai<?=$vaArea['id_permintaan_supplies']?>" 
                            class="form-control" value="<?=($id_pegawai)?>">
                            
                              <input type="hidden" name="cKodePengeluaran<?=$vaArea['id_permintaan_supplies']?>" 
                            class="form-control" value="<?=($kode_pengeluaran)?>">

                            <input type="hidden" name="cIdOutlet<?=$vaArea['id_permintaan_supplies']?>" 
                            class="form-control" value="<?=($vaArea['id_outlet'])?>">

                            <input type="hidden" name="cIdSupplies<?=$vaArea['id_permintaan_supplies']?>" 
                            class="form-control" value="<?=($vaArea['id_supplies'])?>">

                            <input type="hidden" name="nJumlahAwal<?=$vaArea['id_permintaan_supplies']?>" 
                            class="form-control" value="<?=$nStockAwal?>">

                            <?php 
                            if($vaArea['status'] == 'open'){
                            ?>
                               <button type="submit" name="btn<?=$vaArea['id_permintaan_supplies']?>" class="btn btn-flat btn-success">
                                <i class="fa fa-check"></i>
                              </button>
                              <a class="btn btn-flat btn-danger" title="Edit Data" href="">
                                <i class="fa fa-times"></i>
                              </a>
                             <?php  }else{ ?>
                             	-
                             <?php } ?>
                             </form>
                               
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