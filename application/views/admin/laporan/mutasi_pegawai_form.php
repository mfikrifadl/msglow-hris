
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
          							<h4>Rekap Mutasi Operator Per Tanggal dan Area</h4>
                        <hr/>
                        <div class="container">
                         <div class="col-sm-12">
                          <div class="col-sm-9">
                          <br/>
                          <strong>Tanggal Awal</strong>
                          </div>
                          <div class="col-sm-9">
                          <br/>
                            <input type="text" name="dTglAwal" id="dTglAwal" class="form-control datetimepicker" data-date-format="DD-MM-YYYY">
                          </div>
                          <div class="col-sm-9">
                          <br/>
                          <strong>Tanggal Akhir</strong>
                          </div>
                          <div class="col-sm-9">
                          <br/>
                            <input type="text" name="dTglAkhir" id="dTglAkhir" class="form-control datetimepicker" data-date-format="DD-MM-YYYY">
                          </div>
                          <br/>
                          <div class="col-sm-10" >
                          <br/>
                          <strong>Dari Area</strong>
                          <br/>
                          </div>
                          <div class="col-sm-9">
                            <select name="cIdAreaAwal" id="cIdAreaAwal" 
                            class="form-control comboBox">
                              <option></option>
                              <?php 
                              $dbAreaAwal = $this->model->ViewAsc('tb_area_kerja','id_area');
                              foreach ($dbAreaAwal as $key => $vaAreaAwal) { 
                              ?>
                                <option value="<?=$vaAreaAwal['id_area']?>">
                                  <?=$vaAreaAwal['nama_area']?>
                                </option>
                              <?php 
                              }
                              ?>
                            </select>
                          </div>
                          <div class="col-sm-10" >
                          <br/>
                          <strong>Ke Area</strong>
                          <br/>
                          </div>
                          <div class="col-sm-9">
                            <select name="cIdAreaBaru" id="cIdAreaBaru" 
                            class="form-control comboBox">
                              <option></option>
                              <?php 
                              $dbAreaAwal = $this->model->ViewAsc('tb_area_kerja','id_area');
                              foreach ($dbAreaAwal as $key => $vaAreaBaru) { 
                              ?>
                                <option value="<?=$vaAreaBaru['id_area']?>">
                                  <?=$vaAreaBaru['nama_area']?>
                                </option>
                              <?php 
                              }
                              ?>
                            </select>
                          </div>
                          <div class="col-sm-9">
                          <br/>
                          <button type="button" onclick="openReport('<?=base_url()?>rekap/rekap_surat_mutasi/'+document.getElementById('dTglAwal').value+
                             '/'+document.getElementById('dTglAkhir').value+
                             '/'+document.getElementById('cIdAreaAwal').value+
                             '/'+document.getElementById('cIdAreaBaru').value
                             )" class="btn btn-primary btn-flat"><i class="fa fa-print"></i> Rekap Data</button>
                          </div>
                         </div>
                        </div>
                        <br/>
                        <div class="col-sm-12">
                        <div id="tb_absen"></div>
                        </div>
          						</div>
          					</div>
          				</div>
    				</div>
    			</div>


          <div class="col-sm-12 col-md-12">
            <div class="col-sm-12">
              <div class="box box-success">
                  <div class="box-header">
                      <div class="box-body"> 
                        <h4>Rekap Mutasi Operator Semua Area</h4>
                        <hr/>
                        <div class="container">
                         <div class="col-sm-12">
                          <div class="col-sm-9">
                          <br/>
                          <strong>Tanggal Awal</strong>
                          </div>
                          <div class="col-sm-9">
                          <br/>
                            <input type="text" name="dTglAwalAll" id="dTglAwalAll" class="form-control datetimepicker" data-date-format="DD-MM-YYYY">
                          </div>
                          <div class="col-sm-9">
                          <br/>
                          <strong>Tanggal Akhir</strong>
                          </div>
                          <div class="col-sm-9">
                          <br/>
                            <input type="text" name="dTglAkhirAll" id="dTglAkhirAll" class="form-control datetimepicker" data-date-format="DD-MM-YYYY">
                          </div>
                        
                          <div class="col-sm-9">
                          <br/>
                          <button type="button" onclick="openReport('<?=base_url()?>rekap/rekap_surat_mutasi_all/'+document.getElementById('dTglAwalAll').value+
                             '/'+document.getElementById('dTglAkhirAll').value
                             )" class="btn btn-primary btn-flat"><i class="fa fa-print"></i> Rekap Data</button>
                          </div>
                         </div>
                        </div>
                        <br/>
                        <div class="col-sm-12">
                        <div id="tb_absen"></div>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
          </div>


    		</div>
    	</div> 

    <script type="text/javascript">
      function openReport(url){
       params  = 'width='+screen.width;
       params += ', height='+screen.height;
       params += ', top=0, left=0'
       params += ', fullscreen=yes';

       newwin=window.open(url,'windowname4', params);
       if (window.focus) {newwin.focus()}
       return false;
      }
    </script  