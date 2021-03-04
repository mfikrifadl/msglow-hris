  <?php 
        if($action == "edit") {
          foreach ($field as $column) {
            $cIdPemasukan  =   $column['id_pemasukan'];
            $cKodePo       =   $column['kode_po'];
            $cKodePemasukan=   $column['kode_pemasukan'];
            $dTglPemasukan =   $column['tgl_pemasukan'];
            $cIdOutlet     =   $column['id_outlet'];
            $cIdStock      =   $column['id_stock'];
            $nJumlahAwal   =   $column['jumlah_awal'];
            $nJumlahPemasukan= $column['jumlah_pemasukan'];
            $cKeterangan   =   $column['keterangan'];
            $cIconButton   =   "refresh"    ;
            $cValueButton  =   "Update Data" ;
          }
          $cAction = "Update/".$cIdPemasukan."" ;
        }else{
            $cIdPemasukan  =   "";
            $cKodePo       =   $kode_po;
            $cKodePemasukan=   $kode_pemasukan;
            $dTglPemasukan =   "";
            $cIdOutlet     =   $id_outlet;
            $cIdStock      =   "";
            $nJumlahAwal   =   "";
            $nJumlahPemasukan= "";
            $cKeterangan   =   "";
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
    				<div class="col-sm-12">
    					<div class="box box-success">
        					<div class="box-header">
          						<div class="box-body"> 
          							<h3>Input Data Pemasukan Barang</h3>
          							<form method="post" enctype="multipart/form-data"
                        action="<?=site_url('supplies_act/pemasukan_barang_simpan/')?>">
                          <div class="row">
                            <div class="col-sm-12">
                            <div class="form-group">
                               <label>Kode PO</label>
                                <select class="comboBox form-control" id="cKodePo" name="cKodePo" 
                                onchange="return getPo(this.value)">
                                  <option></option>
                                  <?php 
                                    $dbPO = $this->db->query("SELECT * FROM v_po_supplies WHERE `status` = 'false' GROUP BY kode_po");
                                    foreach ($dbPO->result_array() as $key => $vaPo) {
                                    
                                  ?>
                                  <option value="<?=$vaPo['kode_po']?>" <?php if($vaPo['kode_po'] == $cKodePo)echo "selected"; ?>><?=$vaPo['kode_po']?> - <?=$vaPo['nama_outlet']?></option>
                                <?php } ?>
                               </select>
                            </div>
                          </div>
                           <div class="col-sm-12">
                            <div class="form-group">
                               <label>Kode Pemasukan</label>
                               <input type="text" required="true" name="cKodePemasukan" id="cKodePemasukan" class="form-control"
                               value="<?=$cKodePemasukan?>">
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <div class="form-group">
                               <label>Tanggal Pemasukan</label>
                               <input type="text"  name="dTglPemasukan" id="dTglPemasukan" class="form-control datetimepicker" data-date-format="DD-MM-YYYY"
                               value="<?=$dTglPemasukan?>">
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
                               <label>Data PO</label>
                               <?php 
                               if($kode_po != ""){
                               ?>
                               <table class="table table-striped table-bordered" >
                                 <thead>
                                   <tr>
                                     <td>No</td>
                                     <td>Nama</td>
                                     <td>Jumlah PO</td>
                                     <td>Jumlah Pemasukan</td>
                                     <td>Keterangan</td>
                          
                                   </tr>
                                 </thead>
                                 <tbody>
                                  <?php $no = 0 ; 
                                  $nTotal = 0 ;
                                  $dbPO = $this->db->query("SELECT * FROM v_po_supplies WHERE kode_po = '".$kode_po."' ");
                                  $nTotal = $dbPO->num_rows();
                                  foreach ($dbPO->result_array() as $key => $vaPo) { ?>
                                   <tr>
                                     <td><?=++$no;?></td>
                                     <td><?=($vaPo['nama_supplies'])?></td>
                                     <td><?=($vaPo['jumlah'])?></td>
                                     <td>
                                     

                                      <input type="hidden" name="cIdSupplies[]" id="cIdSupplies" class="form-control" 
                                      value="<?=($vaPo['id_stock'])?>">

                                      <input type="hidden" name="nJumlahPo[]" id="nJumlahPo" class="form-control" 
                                      value="<?=($vaPo['jumlah'])?>">


                                      <input type="text" name="nJumlahMasuk[]" id="nJumlahMasuk" class="form-control" value="<?=($vaPo['jumlah'])?>">
                                    </td>
                                     <td>
                                      <input type="text" name="cKeterangan[]" id="cKeterangan" class="form-control">
                                    </td>
                                    
                               </tr>
                             <?php } ?>
                           </tbody>
                         </table>
                       <?php } ?>
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
                              <i class="fa fa-<?=$cIconButton?>"></i> Simpan Data
                            </button>
                        <?php } ?>
                            
                          </div>
                          
                        </div>
                        </form>
          						</div>
          					</div>
          				</div>
    				</div>
    			
            <div class="col-sm-12">
              <div class="box box-danger">
                  <div class="box-header">
                      <div class="box-body"> 
                        <h3>Data Pemasukan Barang</h3>
                        <table class="table table-striped table-bordered" id="DataTableTwo">
                         <thead>
                           <tr>
                             <td>No</td>
                             <td>Kode PO</td>
                             <td>Kode Pemasukan</td>
                             <td>Nama Outlet</td>
                            
                             <td>Action</td>
                           </tr>
                         </thead>
                         <tbody>
                          <?php $no = 0 ; 
                          $dbTempPO = $this->db->query("SELECT * FROM v_pemasukan_supplies GROUP BY kode_pemasukan DESC");
                          foreach ($dbTempPO->result_array() as $key => $vaTempPo) { ?>
                           <tr>
                             <td><?=++$no;?></td>
                             <td>
                              <strong><?=$vaTempPo['kode_po']?></strong>
                              </td>
                              <td>
                              <strong><?=$vaTempPo['kode_pemasukan']?></strong>
                              </td>
                             <td><?=($vaTempPo['nama_outlet'])?></td>
                            
                             <td align="center">
                              <a target="_blank" href="<?=site_url('laporan/cetak_pemasukan/'.$vaTempPo['kode_pemasukan'].'')?>" class="btn btn-primary btn-flat"  title="Print Data">
                                <i class="fa fa-print"></i>
                              </a>
                               <a class="btn btn-danger btn-flat"  title="Hapus Data" 
                               onclick="if(confirm('Apakah anda yakin akah menghapus data?'))
                                { window.location.href='<?=site_url('supplies_act/pemasukan_temp_delete/'.$vaTempPo['id_pemasukan'].'')?>'}">
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
  function getPo(cIdStock){
    window.location.href='<?=base_url()?>supplies/pemasukan_supplies/po/'+cIdStock;
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