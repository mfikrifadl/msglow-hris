

<div class="modal fade" id="modalPgw<?=$vaView['id_pengalaman']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="border-radius:0px;width:90%;">
        <div class="modal-content">
            <div class="modal-header bg-blue">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="" id="myModalLabel">Detail Pengalaman Pegawai <?=$vaView['Pegawai']?> </h4>
               </div><br/>
                <div class="container">
            	     <div class="col-sm-4">
                    <div class="row">
                    <div class="form-group">
                      <p>Pegawai : </p> 
                      <label><p><?=$vaView['Pegawai']?></p></label>
                    </div>
                    </div>
                    <div class="row">
                    <div class="form-group">
                      <p>Perusahaan : </p> 
                      <label><p><?=$vaView['perusahaan']?></p></label>
                    </div>
                    </div>
                    <div class="row">
                    <div class="form-group">
                      <p>Bidang Jasa: </p> 
                      <label><p><?=$vaView['bidang_usaha']?></p></label>
                    </div>
                    </div>
                   <div class="row">
                    <div class="form-group">
                      <p>Tanggal Masuk : </p> 
                      <label><p><?=String2Date($vaView['tanggal_masuk'])?></p></label>
                    </div>
                    </div>
                    <div class="row">
                    <div class="form-group">
                      <p>Tanggal Keluar: </p> 
                      <label><p><?=String2Date($vaView['tanggal_keluar'])?></p></label>
                    </div>
                    </div>
                     </div>
                    <div class="col-sm-4">
                    <div class="row">
                    <div class="form-group">
                      <p>Job Desk : </p> 
                      <label><p><?=$vaView['job_desk']?></p></label>
                    </div>
                    </div>
                    <div class="row">
                    <div class="form-group">
                      <p>Bobot Nilai</p> 
                      <label><p><?=$vaView['bobot_nilai']?></p></label>
                    </div>
                    </div>
                </div>
                <div class="modal-footer">
                </div>
    </div>
</div> 


