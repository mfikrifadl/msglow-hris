

<div class="modal fade" id="modalPgw<?=$vaView['id_pendidikan_pegawai']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="border-radius:0px;width:90%;">
        <div class="modal-content">
            <div class="modal-header bg-blue">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="" id="myModalLabel">Detail Pendidikan Pegawai <?=$vaView['Pegawai']?> </h4>
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
                      <p>Pendidikan : </p> 
                      <label><p><?=$vaView['Pendidikan']?></p></label>
                    </div>
                    </div>
                    <div class="row">
                    <div class="form-group">
                      <p>Nama Sekolah: </p> 
                      <label><p><?=$vaView['nama_sekolah']?></p></label>
                    </div>
                    </div>
                   <div class="row">
                    <div class="form-group">
                      <p>Jurusan : </p> 
                      <label><p><?=$vaView['jurusan']?></p></label>
                    </div>
                    </div>
                    <div class="row">
                    <div class="form-group">
                      <p>Tahun Masuk: </p> 
                      <label><p><?=$vaView['tahun_masuk']?></p></label>
                    </div>
                    </div>
                     </div>
                    <div class="col-sm-4">
                    <div class="row">
                    <div class="form-group">
                      <p>Tahun Lulus: </p> 
                      <label><p><?=$vaView['tahun_lulus']?></p></label>
                    </div>
                    </div>
                    <div class="row">
                    <div class="form-group">
                      <p>Gelar</p> 
                      <label><p><?=$vaView['gelar']?></p></label>
                    </div>
                    </div>
                   <div class="row">
                    <div class="form-group">
                      <p>IPK / NUN </p> 
                      <label><p><?=$vaView['nun_ipk']?></p></label>
                    </div>
                    </div>
                    

                </div>
                <div class="modal-footer">
                </div>
    </div>
</div> 


