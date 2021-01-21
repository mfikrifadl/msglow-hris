

<section class="connectedSortable">
  <div class="container">
   <div class="col-sm-12">
     <ul class="breadcrumb"><li><a href="<?=base_url()?>">Home</a></li>
      <li class=""><?=$menu?></li>
      <li class="active"><?=$file?></li>
    </ul>                    
  </div>
</div>
<!-- /.DataTable -->

<div class="container">
  <div class="col-sm-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Data Table Cetak Rekap Gaji</h3>
        <div class="box-tools pull-right">
          <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
          <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
      </div><!-- /.box-header -->
      <div class="box-body">

       <div class="row">
         <div class="container">
           <div class="col-sm-12">
        <div class="col-sm-2" align="right">
          <strong>Bulan</strong>
        </div>
        <div class="col-sm-3" align="left">
          <select name="bulan" id="bulan_absensi" class="form-control comboBox">
            <option></option>
            <option value="1">Januari</option><option value="2">Februari</option>
            <option value="3">Maret</option><option value="4">April</option>
            <option value="5">Mei</option><option value="6">Juni</option>
            <option value="7">Juli</option><option value="8">Agustus</option>
            <option value="9">September</option><option value="10">Oktober</option>
            <option value="11">November</option><option value="12">Desember</option>
          </select>
        </div>
        <div class="col-sm-2" align="right">
          <strong>Tahun</strong>
        </div>
        <div class="col-sm-3" align="left">
          <select name="tahun" id="tahun_absensi" class="form-control comboBox">
            <option></option>
            <option value="2020">2020</option>
          </select>
        </div>
        <div class="col-sm-2">
          <button type="button" onclick="return showAbsen();" class="btn btn-primary btn-flat"><i class="fa fa-search"></i></button>
        </div>
      </div>
       <div class="col-sm-11" align="center">
        <div id="show_absen"></div>
      </div>
         </div>
       </div> 

     

    </div>

  </div>
</div>

</div>
<!--
<form method="post" enctype="multipart/form-data"
action="<?=site_url('gaji_act/absensi/'.$cAction.'')?>">
<div class="container">
  <div class="col-md-12 col-sm-12">
    <div class="box box-danger">
      <div class="box-header with-border">
        <h3 class="box-title">Input</h3>
        <div class="box-tools pull-right">
          <span class="label label-danger">Input Data Absensi</span>
          <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
      </div><!-- /.box-header 
      <div class="box-body">
        <div class="row">
          <div class="col-sm-12 col-md-12">
            <div class="form-group">
              <label>Status Absensi</label>
              <select class="comboBox form-control" name="cIdStatusAbsensi" required>
                <option></option>
                <?php foreach ($status as $key => $vaStatus) { ?>
                  <option value="<?=$vaStatus['id_status_absensi']?>"
                    <?php if($vaStatus['id_status_absensi'] == $cIdStatusAbsensi)echo "selected"; ?>>
                    <?=$vaStatus['status_absensi']?>
                  </option>
                <?php } ?>
              </select>
            </div>
          </div> <!-- /.col-form -
          <div class="col-sm-12 col-md-12">
            <div class="form-group">
              <label>Pegawai</label>
              <select class="comboBox form-control" name="cIdPegawai" required>
                <option></option>
                <?php foreach ($pegawai as $key => $vaPegawai) { ?>
                  <option value="<?=$vaPegawai['id_pegawai']?>"
                    <?php if($vaPegawai['id_pegawai'] == $cIdPegawai)echo "selected"; ?>>
                    <?=$vaPegawai['nama_pegawai']?> - <?=$vaPegawai['nama_lokasi']?>
                  </option>
                <?php } ?>
              </select>
            </div>
          </div> <!-- /.col-form 
          <div class="col-sm-12 col-md-12">
                <div class="form-group">
                <label>Tanggal Absensi</label>
                <div class="input-group">
                  <input type="text" name ="dTglAbsen" required
                  class="datetimepicker form-control" placeholder="Tanggal Absensi"
                  data-date-format="DD-MM-YYYY" value="<?=$dTglAbsen?>">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar-o"></i>
                    </div>
                </div>
                </div>
              </div> <!-- /.col-form -
          <div class="col-sm-12 col-md-12">
            <div class="form-group">
              <label>Keterangam</label>
              <textarea name="cKeterangan" class="form-control"><?=$cKeterangan?></textarea>
            </div>
          </div> <!-- /.col-form 

        </div><!-- /.row 
        <div class="row">
          <div class="col-sm-12">
            <button type="submit"  class="btn btn-flat btn-primary">
              <i class="fa fa-<?=$cIconButton?>"></i> <?=$cValueButton?>
            </button>
          </div>
        </div> 
      </div><!-- /.box-body -->
    </div><!--/.box -
  </div> <!-- /.col -

</div> <!-- /.container 
</form>-->
</section>


<script type="text/javascript">
 function showAbsen(){
  var cBulan              = $('#bulan_absensi').val();
  var cTahun              = $('#tahun_absensi').val();
  $.ajax({
    type: "GET",
    data  :"cBulan="+cBulan+
           "&cTahun="+cTahun,
    url: "<?=base_url()?>gaji/tampilkan_data_rekap_gaji/",
    cache: false,
    beforeSend: function(){
     $('#show_absen').html("<div align='center'><img  width='20' height='20' src='<?=base_url()?>assets/dist/img/bx_loader.gif' /></div> ");
   },
   success:function(msg){
    $("#show_absen").html(msg);
  }
});
}
</script>