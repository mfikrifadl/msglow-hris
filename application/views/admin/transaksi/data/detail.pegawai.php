
               <?php 
               if($vaPegawai['jk'] == 1){
                $cJenis = "Laki-Laki";
               }else{
                $cJenis = "Perempuan";
               }
               ?>
                <div class="container">
            	     <div class="col-sm-4">
                    <div class="row">
                    <div class="form-group">
                      <p>Area : </p> 
                      <label><p><?=$vaPegawai['Area']?></p></label>
                    </div>
                    </div>
                    <div class="row">
                    <div class="form-group">
                      <p>Status : </p> 
                      <label><p><?=$vaPegawai['Status']?></p></label>
                    </div>
                    </div>
                    <div class="row">
                    <div class="form-group">
                      <p>NIK: </p> 
                      <label><p><?=$vaPegawai['nik']?></p></label>
                    </div>
                    </div>
                   <div class="row">
                    <div class="form-group">
                      <p>Nama : </p> 
                      <label><p><?=$vaPegawai['nama']?></p></label>
                    </div>
                    </div>
                    <div class="row">
                    <div class="form-group">
                      <p>Alamat: </p> 
                      <label><p><?=$vaPegawai['alamat']?></p></label>
                    </div>
                    </div>
                     </div>
                    <div class="col-sm-4">
                    <div class="row">
                    <div class="form-group">
                      <p>Jenis Kelamin: </p> 
                      <label><p><?=$cJenis?></p></label>
                    </div>
                    </div>
                    <div class="row">
                    <div class="form-group">
                      <p>Tampat , Tanggal Lahir: </p> 
                      <label><p><?=$vaPegawai['tempat_lahir']?> , <?=String2Date($vaPegawai['tanggal_lahir'])?></p></label>
                    </div>
                    </div>
                   <div class="row">
                    <div class="form-group">
                      <p>No KTP </p> 
                      <label><p><?=$vaPegawai['no_ktp']?></p></label>
                    </div>
                    </div>
                    <div class="row">
                    <div class="form-group">
                      <p>Email </p> 
                      <label><p><?=$vaPegawai['email']?></p></label>
                    </div>
                    </div>
                    <div class="row">
                    <div class="form-group">
                      <p>Handphone , Nomor Keluarga </p> 
                      <label><p><?=$vaPegawai['handphone']?> , <?=$vaPegawai['no_keluarga']?> </p></label>
                    </div>
                    </div>
                   </div>
                    <div class="col-sm-4">
                    <div class="row">
                    <div class="form-group">
                      <p>Referensi , Telp Referensi </p> 
                      <label><p><?=$vaPegawai['referensi']?> , <?=$vaPegawai['tlp_referensi']?></p></label>
                    </div>
                    </div>
                    <div class="row">
                    <div class="form-group">
                      <p>Tanggal Masuk Kerja </p> 
                      <label><p><?=String2Date($vaPegawai['tanggal_masuk_kerja'])?> </p></label>
                    </div>
                    </div>
                    <div class="row">
                    <div class="form-group">
                      <p>Bobot Nilai </p> 
                      <label><p><?=$vaPegawai['bobot_nilai']?></p></label>
                    </div>
                    </div>
                   <div class="row">
                    <div class="form-group">
                      <p>Foto : </p> 
                       <?php if(empty($vaPegawai['foto'])){ ?>
                          <img src="<?=base_url()?>upload/default.gif" height="100px">
                      <?php }else{ ?>
                          <img src="<?=base_url().$vaPegawai['foto']?>" height="100px">
                    <?php } ?>
                    </div>
                    </div>
                   </div>

                </div>
                <div class="modal-footer">
                  <div class="row">
                    <div class="pull-left" style="margin-left:20px">
                    <?php if($vaPegawai['created'] == 1 and $this->session->userdata('level')==2){ ?>
                    <a href="<?=site_url('transaksi/pegawai/edit/'.$vaPegawai['id_pegawai'].'')?>">
                      <button class="btn btn-flat btn-success">
                      <i class="fa fa-edit"></i> Edit </button>
                    </a>
                    <button class="btn btn-flat btn-warning" onclick="if(confirm('Apakah anda yakin akah menghapus data?'))
                      { window.location.href='<?=site_url('transaksi_act/pegawai/Delete/'.$vaPegawai['id_pegawai'].'')?>'}">
                      <i class="fa fa-trash-o"></i> Hapus 
                   </button>
                   <?php }else{ ?>
                     <?php if($this->session->userdata('level') == 1 or $this->session->userdata('level') == 3 ){ ?>
                   <a href="<?=site_url('transaksi/pegawai/edit/'.$vaPegawai['id_pegawai'].'')?>">
                      <button class="btn btn-flat btn-success">
                      <i class="fa fa-edit"></i> Edit </button>
                    </a>
                    <button class="btn btn-flat btn-warning" onclick="if(confirm('Apakah anda yakin akah menghapus data?'))
                      { window.location.href='<?=site_url('transaksi_act/pegawai/Delete/'.$vaPegawai['id_pegawai'].'')?>'}">
                      <i class="fa fa-trash-o"></i> Hapus 
                   </button>
                     <?php } ?>
                   <?php } ?>
                    <button class="btn btn-flat btn-danger" data-dismiss="modal" aria-hidden="true">
                      <i class="fa fa-times"></i> Close 
                    </button>
                    </div>
                  </div>
                </div>
        