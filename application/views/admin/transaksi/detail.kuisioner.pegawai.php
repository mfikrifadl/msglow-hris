

<div class="modal fade" id="modalPgw<?=$vaView['id_kuisioner']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="border-radius:0px;width:90%;">
        <div class="modal-content">
            <div class="modal-header bg-blue">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="" id="myModalLabel">Detail Kuisioner Pegawai <?=$vaView['Pegawai']?> </h4>
               </div><br/>
                <div class="container">
            	     <div class="col-sm-6">
                    <div class="row">
                    <div class="form-group">
                      <p>Pegawai : </p> 
                      <label><p><?=$vaView['Pegawai']?></p></label>
                    </div>
                    </div>
                    <div class="row">
                    <div class="form-group">
                      <p>Bulan -  Tahun : </p> 
                      <label><p><?=$vaView['bulan']?> - <?=$vaView['tahun']?></p></label>
                    </div>
                    </div>
                    <div class="row">
                    <div class="form-group">
                      <p>Keahlian : </p> 
                      <label><p><?=$vaView['keahlian']?></p></label>
                    </div>
                    </div>
                   <div class="row">
                    <div class="form-group">
                      <p>Kekurangan Diri : </p> 
                      <label><p><?=$vaView['kekurangan_diri']?></p></label>
                    </div>
                    </div>
                    <div class="row">
                    <div class="form-group">
                      <p>Bersedia Menerima Tantangan: </p> 
                      <label><p><?=$vaView['bersedia_menerima_tantangan']?></p></label>
                    </div>
                    </div>
                     </div>
                    <div class="col-sm-6">
                    <div class="row">
                    <div class="form-group">
                      <p>Inisiatif Untuk Perusahaan: </p> 
                      <label><p><?=$vaView['inisiatif_untuk_perusahaan']?></p></label>
                    </div>
                    </div>
                    <div class="row">
                    <div class="form-group">
                      <p>Gelar</p> 
                      <label><p><?=$vaView['catatan_dari_referensi']?></p></label>
                    </div>
                    </div>
                </div>
                <div class="modal-footer">
                </div>
    </div>
</div> 


