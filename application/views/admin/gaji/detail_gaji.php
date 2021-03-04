<?php 
  $dbOp = $this->model->ViewWhere('tb_pegawai','id_pegawai',$id_pegawai);
  foreach ($dbOp as $key => $vaData) {
    $cNamaPegawai = $vaData['nama'];
    $cNik         = $vaData['nik'];
    $cIdOutlet    = $vaData['outlet'];
    $dTglMasuk    = $vaData['tanggal_masuk_kerja'];
  }
   $dbOt = $this->model->ViewWhere('tb_outlet','id_outlet',$cIdOutlet);
   foreach ($dbOt as $key => $vaOt) {
     $cNamaOutlet = $vaOt['nama'];
     $cKodeOutlet = $vaOt['kode'];
   }

   function TotalSebulan($IdPegawaiPendapatan,$BulanPendapatan,$TahunPendapatan){
      $link = @mysqli_connect('localhost', 'root', 'nitrogen123', 'greennit_penjualan'); 
      $db   = mysqli_query($link,"SELECT COUNT(id_penjualan) as total FROM v_penjualan WHERE id_pegawai = '".$IdPegawaiPendapatan."' and bulan = '".$BulanPendapatan."' and tahun = '".$TahunPendapatan."' ");
      $data = mysqli_fetch_array($db);
      $nPendapatan = $data['total'];
      return $nPendapatan ;
    }

    function TotalPendapatan($IdPegawaiPendapatan,$BulanPendapatan,$TahunPendapatan){
      $link = @mysqli_connect('localhost', 'root', 'nitrogen123', 'greennit_penjualan'); 
      $db   = mysqli_query($link,"SELECT SUM(pendapatan) as total FROM v_penjualan WHERE id_pegawai = '".$IdPegawaiPendapatan."' and bulan = '".$BulanPendapatan."' and tahun = '".$TahunPendapatan."' ");
      $data = mysqli_fetch_array($db);
      $nPendapatan = $data['total'];
      return $nPendapatan ;
    }

   function GetAbsenShift1($IdPegawaiPendapatan,$BulanPendapatan,$TahunPendapatan){
      $link = @mysqli_connect('localhost', 'root', 'nitrogen123', 'greennit_penjualan'); 
      $db   = mysqli_query($link,"SELECT COUNT(id_penjualan) as shift1 FROM v_penjualan WHERE id_pegawai = '".$IdPegawaiPendapatan."' and bulan = '".$BulanPendapatan."' and tahun = '".$TahunPendapatan."' and shift = '1' ");
      $data = mysqli_fetch_array($db);
      $nPendapatan = $data['shift1'];
      return $nPendapatan ;
    }

    function GetAbsenShift2($IdPegawaiPendapatan,$BulanPendapatan,$TahunPendapatan){
      $link = @mysqli_connect('localhost', 'root', 'nitrogen123', 'greennit_penjualan'); 
      $db   = mysqli_query($link,"SELECT COUNT(id_penjualan) as shift2 FROM v_penjualan WHERE id_pegawai = '".$IdPegawaiPendapatan."' and bulan = '".$BulanPendapatan."' and tahun = '".$TahunPendapatan."' and shift = '2' ");
      $data = mysqli_fetch_array($db);
      $nPendapatan = $data['shift2'];
      return $nPendapatan ;
    }

    function GetSpv($cIdOutlet){
      $link = @mysqli_connect('localhost', 'root', 'nitrogen123', 'greennit_penjualan'); 
      $db   = mysqli_query($link,"SELECT id_spv FROM username WHERE id_outlet = '".$cIdOutlet."' ");
      $data = mysqli_fetch_array($db);
      $nPendapatan = $data['id_spv'];
      return $nPendapatan ;
    }

    $nBonus = TotalPendapatan($id_pegawai,$bulan,$tahun);
    $nHari  = 30 ;

    $GetRataRata = $nBonus / $nHari ;
    if($GetRataRata > 200000){
      $nInsentif = $GetRataRata ;
    }else{
      $nInsentif  = 0 ;
    }
    
?>
<script type="text/javascript">
  function GetPendapatanFromPenjualan(){
    var nIntBulanPrev             = $('#nIntBulanPrev').val();
    var nPendapatanSekarang       = $('#nPendapatanSekarang').val();

      var getRataRata  = eval(nPendapatanSekarang) / eval(nIntBulanPrev);
      var bulatkan     = Math.round(getRataRata);
        if(bulatkan > 200000){
          var nTotalAsli = bulatkan ;
        }else{
          var nTotalAsli = 0 ; 
        }
      document.getElementById('nBonusSebelumnya').value = nTotalAsli ;
  } 
</script>
                  <div class="col-sm-22">
                   <div class="box box-danger">
                    <div class="box-header with-border">
                      <h3 class="box-title">Data Absensi Bulan <?=$bulan?> Tahun <?=$tahun?> </h3>
                      <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                      </div>
                    </div><!--  /.box-header -->
                    <div class="box-body">
                     <div class="row">
                      <div class="col-sm-6">
                       <div class="col-sm-6">
                        <div class="form-group">
                          <label>Nama</label><br/>
                          <p><?=$cNamaPegawai?></p>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>NIK</label>
                          <p><?=$cNik?></p>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Tanggal Kerja</label>
                          <p><?=$dTglMasuk?></p>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Kode Outlet</label>
                          <p><?=$cKodeOutlet?></p>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Nama Outlet</label>
                          <p><?=$cNamaOutlet?></p>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                     <div class="col-sm-12">
                       <h4>Rincian Masuk Kerja - <strong>Total Masuk Satu Bulan : <?=TotalSebulan($id_pegawai,$bulan,$tahun)?> Hari</strong></h4>
                       <input type="hidden" name="nTotalMasuk1Bulan" id="nTotalMasuk1Bulan" value="<?=TotalSebulan($id_pegawai,$bulan,$tahun)?>">
                       <table class="table table-bordered">
                        <thead>
                          <tr style="background:#00a65a;color:white">
                            <th>Total Shift 1</th>
                            <th>Total Shift 2</th>
                           
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td><?=GetAbsenShift1($id_pegawai,$bulan,$tahun);?></td>
                            <td><?=GetAbsenShift2($id_pegawai,$bulan,$tahun);?></td>
                          </tr>
                        </tbody>
                      </table>
                      <br/>
                      <h4><strong>Total Pendapatan : </strong></h4>
                       <table class="table table-bordered">
                        <thead>
                          <tr style="background:#00a65a;color:white">
                            <th>Total Pendapatan Bulan <?=$bulan?> - <?=$tahun?></th>                           
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td><p style="font-size: 19px">Rp. <?=number_format(TotalPendapatan($id_pegawai,$bulan,$tahun))?></p></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    
             </div>
             <div class="col-sm-12">
              <div class="container">
                <h4>Rincian Gaji</h4>
                <table class="table table-bordered">
                  <thead>
                    <tr style="background:#d73925;color:white">
                      <td>Uang Makan</td>
                      <td>Tunjangan Laporan</td>
                      <td>Uang Kesehatan</td>
                    </tr>
                    <tr style="background:;color:black">
                      <td align="center">Rp  <?=number_format(30000)?> x <?=TotalSebulan($id_pegawai,$bulan,$tahun)?> Hari </td>
                      <td align="center">Rp  <?=number_format(50000)?></td>
                      <td align="center">Rp  <?=number_format(100000)?></td>
                    </tr>
                    <tr style="background:;color:black">
                      <td align="center"><strong>Rp  <?=number_format(TotalSebulan($id_pegawai,$bulan,$tahun)*30000)?>  </strong> </td>
                      <td align="center"><strong>Rp  <?=number_format(50000)?></strong></td>
                      <td align="center"><strong>Rp  <?=number_format(100000)?></strong></td>
                    </tr>
                  </thead>
                </table>
                
                <form method="post" id="FormGaji">
                  <div class="col-sm-6">
                    <table class="table table-bordered table-striped">
                      <tr>
                        <td colspan="3" align="center"><strong>Rincian Gaji</strong></td>
                      </tr>
                      <tr>
                        <td>Gaji Pokok</td>
                        <td>:</td>
                        <td>Rp . 1.000.000
                        <input type="hidden" value="1000000" 
                        id="nGajiPokok"> </td>

                      </tr>
                      <tr>
                        <td>Uang Makan + Laporan + Kesehatan</td>
                        <td>:</td>
                        <?php 
                        $nMakan = (TotalSebulan($id_pegawai,$bulan,$tahun)*30000) + 50000 + 100000;
                        ?>
                        <td>Rp . <?=number_format($nMakan)?> </td>
                        <input type="hidden" value="<?=$nMakan?>" 
                        id="MknLpSehat">
                      </tr>
                      <tr>
                        <td>Bonus Shift</td>
                        <td>:</td>
                        <td><input type="text" name="nBonusSebelumnya" 
                          onkeyup="GetTotalGaji()" id="nBonusSebelumnya" value="<?=$nInsentif?>" 
                          class="form-control" placeholder="Bonus Shift"></td>
                        </tr>
                       
                          <tr>
                            <td>Insentif Idul Fitri</td>
                            <td>:</td>
                            <td><input type="text" name="nIdulFitri" 
                             onkeyup="GetTotalGaji()" id="nIdulFitri" value="0"
                             class="form-control" placeholder="Idul Fitri"></td>
                           </tr>
                           <tr>
                            <td>Insentif Idul Adha</td>
                            <td>:</td>
                            <td><input type="text" name="nIdulAdha"
                             onkeyup="GetTotalGaji()" id="nIdulAdha" value="0" 
                             class="form-control" placeholder="Idul Adha"></td>
                           </tr>
                           <tr>
                            <td>Pergantian Nasi Box (Qurban)</td>
                            <td>:</td>
                            <td><input type="text" name="cNasiBox"
                             onkeyup="GetTotalGaji()" id="cNasiBox" value="0" 
                             class="form-control" placeholder="Pergantian Nasi Box"></td>
                           </tr>
                           <tr>
                            <td>Lain - Lain (Overtime)</td>
                            <td>:</td>
                            <td><input type="text" name="nInsentif_1" 
                             onkeyup="GetTotalGaji()" id="nInsentif_1" value="0" 
                             class="form-control" placeholder="Insentif "></td>
                           </tr>
                           
                            </table>
                          </div>
                          <div class="col-sm-6">
                            
                              <div><h3>TOTAL GAJI</h3> 
                                <div><h2><strong id="hasil">Rp . </strong></h2></div>
                                <input type="hidden" id="nTotal" name="nTotal" value="">
                              </div>
                              <hr/>
                              <div id="button_act">
                                <button type="button" onclick="showGaji();" class="btn btn-danger btn-flat">
                                  <i class="fa fa-save"></i> Lihat Gaji
                                </button> 
                              </div>
                            </form>
                         
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div> 
          
            </div>
          </div>
        </div>
      </div> 
<script type="text/javascript">
  function GetTotalGaji(){
    var Gp                 = $('#nGajiPokok').val();
    var MknLpSehat         = $('#MknLpSehat').val();
    var nBonusSebelumnya   = $('#nBonusSebelumnya').val();
   
    var nIdulFitri         = $('#nIdulFitri').val(); 
    var nIdulAdha          = $('#nIdulAdha').val(); 
    var cNasiBox           = $('#cNasiBox').val(); 
    var nInsentif_1        = $('#nInsentif_1').val(); 
   

    //document.getElementById("nPendapatanSebelumnya").value =  nBonusSebelumnya ;

    var Total = eval(Gp) + eval(MknLpSehat) + eval(nBonusSebelumnya) +
                eval(nIdulFitri) + eval(nIdulAdha) + eval(cNasiBox) + eval(nInsentif_1) ;        
      document.getElementById('hasil').innerHTML = "Rp. " +number_format(Total, 2, ',', '.');
      document.getElementById('nTotal').value = Total ;
  }

  function showGaji(){
    var Gp                 = $('#nGajiPokok').val();
    var MknLpSehat         = $('#MknLpSehat').val();
    var nBonusSebelumnya   = $('#nBonusSebelumnya').val();
   
    var nIdulFitri         = $('#nIdulFitri').val(); 
    var nIdulAdha          = $('#nIdulAdha').val(); 
    var cNasiBox           = $('#cNasiBox').val(); 
    var nInsentif_1        = $('#nInsentif_1').val(); 



    //document.getElementById("nPendapatanSebelumnya").value =  nBonusSebelumnya ;

    var Total = eval(Gp) + eval(MknLpSehat) + eval(nBonusSebelumnya) +
                eval(nIdulFitri) + eval(nIdulAdha) + eval(cNasiBox) + eval(nInsentif_1) ;        
      document.getElementById('hasil').innerHTML = "Rp. " +number_format(Total, 2, ',', '.');
      document.getElementById('nTotal').value = Total ;
      $("#button_act").html("<button type='button' onclick='saveGaji();' class='btn btn-primary btn-flat'><i class='fa fa-save'></i> Simpan Gaji</button>");
  }

  function saveGaji(){
    var IdPegawai       = <?=$id_pegawai?> ;
    var nBulan          = <?=$bulan?> ;
    var nTahun          = <?=$tahun?> ;

    var cIdOutlet      = <?=$id_outlet?>;
    var cIdArea        = <?=$id_area?>;
    var cIdSpv         = <?=GetSpv($id_outlet)?>;

    var Gp                 = $('#nGajiPokok').val();
    var MknLpSehat         = $('#MknLpSehat').val();
    var nBonusSebelumnya   = $('#nBonusSebelumnya').val();
   
    var nIdulFitri         = $('#nIdulFitri').val(); 
    var nIdulAdha          = $('#nIdulAdha').val(); 
    var cNasiBox           = $('#cNasiBox').val(); 
    var nInsentif_1        = $('#nInsentif_1').val(); 
    var nTotal             = $('#nTotal').val();
    var nTotalMasuk1Bulan  = $('#nTotalMasuk1Bulan').val();
      $.ajax({
        type: "GET",
        url: "<?=site_url('gaji_act/gaji')?>",
        data  :"id_pegawai="+IdPegawai+
               "&id_spv="+cIdSpv+
               "&id_area="+cIdArea+
               "&id_outlet="+cIdOutlet+
               "&bulan="+nBulan+
               "&tahun="+nTahun+
               "&gaji_pokok="+Gp+
               "&total_masuk="+nTotalMasuk1Bulan+
               "&uang_makan="+MknLpSehat+
               "&bonus_shift="+nBonusSebelumnya+
               "&insentif_1="+nInsentif_1+
               "&idul_fitri="+nIdulFitri+
               "&idul_adha="+nIdulAdha+
               "&nasi_box="+cNasiBox+
               "&total="+nTotal,
        cache: false,
        success: function(msg){
          $("#button_act").html(" <a class='btn-flat btn btn-danger' href='<?=base_url()?>gaji/absen'><i class='fa fa-arrow-circle-right'></i> Kembali </a> ");
        }
       });

  }

  function number_format(number, decimals, dec_point, thousands_sep) {
      number = (number + '')
        .replace(/[^0-9+\-Ee.]/g, '');
      var n = !isFinite(+number) ? 0 : +number,
        prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
        sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
        dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
        s = '',
        toFixedFix = function(n, prec) {
          var k = Math.pow(10, prec);
          return '' + (Math.round(n * k) / k)
            .toFixed(prec);
        };
      s = (prec ? toFixedFix(n, prec) : '' + Math.round(n))
        .split('.');
      if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
      }
      if ((s[1] || '')
        .length < prec) {
        s[1] = s[1] || '';
        s[1] += new Array(prec - s[1].length + 1)
          .join('0');
      }
      return s.join(dec);
  }
</script>