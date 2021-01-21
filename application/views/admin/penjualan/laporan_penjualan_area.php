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
   <div class="col-sm-4 col-md-4">
    <div class="col-sm-12">
     <div class="box box-danger">
       <div class="box-header">
         <div class="box-body">
        	LLaporan Penjualan Per Area - TANGGAL <hr/>
        	<div class="row">
     
        <div class="col-sm-12 col-xs-12">
          <div class="form-group">
            <label>Pilih Area </label>
            <select name="cIdOutletHarian" id="cIdOutletHarian" class="form-control comboBox" placeholder="Pilih Area">
                <option></option>
                <?php foreach ($outlet as $key => $vaOutlet) { ?>
                    <option value="<?=$vaOutlet['id_area']?>" 
                        <?php if($vaOutlet['id_area'] == $cIdOutlet)echo "selected"; ?>>
                          <?=$vaOutlet['kode_area']?> - <?=$vaOutlet['nama_area']?>
                    </option>
                <?php } ?>
            </select>
          </div>
         </div>
         <div class="col-sm-12 col-xs-12">
          <div class="form-group">
            <label>Tanggal Penjualan</label>
            <input type="text" name="dTglTransaksiHari" id="dTglTransaksiHari" class="form-control datetimepicker" placeholder="Tanggal"
            value="<?=$tanggal?>" data-date-format = "DD-MM-YYYY">
          </div>
         </div>  
        </div>
        <div class="row">
         <div class="col-xs-12 col-sm-6 widget-container-col"><br/>
            <button type="button" id="act" onclick="return TransaksiHarian();" 
            class="btn btn-success btn-flat"><i class="fa fa-search"></i> 
              Tampilkan 
            </button> 
         </div>
        </div>
         </div>
        </div>
      </div>
    </div>
   </div>
   <div class="col-sm-4 col-md-4">
    <div class="col-sm-12">
     <div class="box box-success">
       <div class="box-header">
         <div class="box-body">
        	Laporan Penjualan Per Area - BULAN <hr/>
        	<div class="row">
      
        <div class="col-sm-12 col-xs-12">
          <div class="form-group">
            <label>Pilih Area </label>
            <select name="cIdOutletBulan" id="cIdOutletBulan" class="form-control comboBox" placeholder="Pilih Area">
                <option></option>
                <?php foreach ($outlet as $key => $vaOutlet) { ?>
                    <option value="<?=$vaOutlet['id_area']?>" 
                        <?php if($vaOutlet['id_area'] == $cIdOutlet)echo "selected"; ?>>
                          <?=$vaOutlet['nama_area']?>
                    </option>
                <?php } ?>
            </select>
          </div>
         </div>
         
         <div class="col-sm-6 col-xs-12">
          <div class="form-group">
            <label>Pilih Bulan</label>
            <select name="cBulan" id="cBulan" class="comboBox form-control" data-placeholder="Bulan">
            <option></option>
            <option value="01">Januari</option><option value="02">Februari</option>
            <option value="03">Maret</option><option value="04">April</option>
            <option value="05">Mei</option><option value="06">Juni</option>
            <option value="07">Juli</option><option value="08">Agustus</option>
            <option value="09">September</option><option value="10">Oktober</option>
            <option value="11">November</option><option value="12">Desember</option>
          </select>
          </div>
         </div>
         <div class="col-sm-6 col-xs-12">
          <div class="form-group">
            <label>Tahun</label>
            <select name="cTahun" id="cTahun" class="comboBox form-control" data-placeholder="Tahun">
            <option></option>
            <option value="2017">2017</option><option value="2018">2018</option>
            <option value="2019">2019</option>
          </select>
          </div>
         </div>
        </div>
        <div class="row">
         <div class="col-xs-12 col-sm-6 widget-container-col"><br/>
            <button type="button" id="act" onclick="return TransaksiBulan();" 
            class="btn btn-warning btn-flat"><i class="fa fa-search"></i> 
              Tampilkan 
            </button> 
         </div>
        </div>
         </div>
        </div>
      </div>
    </div>
   </div>
   <div class="col-sm-4 col-md-4">
    <div class="col-sm-12">
     <div class="box box-info">
       <div class="box-header">
         <div class="box-body">
        	Laporan Penjualan Per Area - RANGE <hr/>

        	 <div class="row">
      
        <div class="col-sm-12 col-xs-12">
          <div class="form-group">
            <label>Pilih Area </label>
            <select name="cIdOutletRange" id="cIdOutletRange" class="form-control comboBox" placeholder="Pilih Area">
                <option></option>
                <?php foreach ($outlet as $key => $vaOutlet) { ?>
                    <option value="<?=$vaOutlet['id_area']?>" 
                        <?php if($vaOutlet['id_area'] == $cIdOutlet)echo "selected"; ?>>
                          <?=$vaOutlet['nama_area']?>
                    </option>
                <?php } ?>
            </select>
          </div>
         </div>
        
         <div class="col-sm-6 col-xs-12">
          <div class="form-group">
            <label>Tanggal Awal</label>
            <input type="text" name="dTglTransaksiRangeAwal" id="dTglTransaksiRangeAwal" class="form-control datetimepicker" placeholder="Tanggal"
            value="<?=$tanggal?>" data-date-format = "DD-MM-YYYY">
          </div>
         </div>
         <div class="col-sm-6 col-xs-12">
          <div class="form-group">
            <label>Tanggal Akhir</label>
            <input type="text" name="dTglTransaksiRangeAkhir" id="dTglTransaksiRangeAkhir" class="form-control datetimepicker" placeholder="Tanggal"
            value="<?=$tanggal?>" data-date-format = "DD-MM-YYYY">
          </div>
         </div>  
        </div>
        <div class="row">
         <div class="col-xs-12 col-sm-6 widget-container-col"><br/>
            <button type="button" id="act" onclick="return TransaksiRange();" 
            class="btn btn-primary btn-flat"><i class="fa fa-search"></i> 
              Tampilkan 
            </button> 
         </div>
        </div>  	
         </div>
        </div>
      </div>
    </div>
   </div>
   <div class="col-sm-12 col-md-12">
    <div class="col-sm-12">
     <div class="box box-warning">
       <div class="box-header">
         <div class="box-body">
        	List Laporan Penjualan

        	<div id="result"></div>	
         </div>
        </div>
      </div>
    </div>
   </div>
  </div>
</div> 
 
 <script type="text/javascript">

    function TransaksiHarian(){
        var cIdOutletHarian     =   $('#cIdOutletHarian').val();
        var dTglTransaksiHari   =   $('#dTglTransaksiHari').val();

        $.ajax({
            type: "POST",
            data  :"id_area="+cIdOutletHarian+
                   "&tgl="+dTglTransaksiHari,  
            url: "http://36.89.27.201/sips/Administrator/Get_Laporan/LaporanHarianPenjualanArea/",
            cache: false,
               beforeSend:function(){
                $("#result").html("<div align='center'><img  width='80' height=80'   src='http://36.89.27.201/sips/assets/images/logo/loading.gif' /></div>");
                },
               success:function(msg){
                $('#result').html(msg);
              }
        });
    }

    function TransaksiRange(){
        var cIdOutletRange          =   $('#cIdOutletRange').val();
        var dTglTransaksiRangeAwal  =   $('#dTglTransaksiRangeAwal').val();
        var dTglTransaksiRangeAkhir =   $('#dTglTransaksiRangeAkhir').val();

        $.ajax({
            type: "POST",
            data  :"id_area="+cIdOutletRange+
                   "&tgl_awal="+dTglTransaksiRangeAwal+
                   "&tgl_akhir="+dTglTransaksiRangeAkhir,  
            url: "http://36.89.27.201/sips/Administrator/Get_Laporan/LaporanRangePenjualanArea/",
            cache: false,
               beforeSend:function(){
                $("#result").html("<div align='center'><img  width='80' height=80'   src='http://36.89.27.201/sips/assets/images/logo/loading.gif' /></div>");
                },
               success:function(msg){
                $('#result').html(msg);
              }
        });
    }

    function TransaksiBulan(){
        var cIdOutletBulan          =   $('#cIdOutletBulan').val();
        var cBulan                  =   $('#cBulan').val();
        var cTahun                  =   $('#cTahun').val();

        $.ajax({
            type: "POST",
            data  :"id_area="+cIdOutletBulan+
                   "&bulan="+cBulan+
                   "&tahun="+cTahun,  
            url: "http://36.89.27.201/sips/Administrator/Get_Laporan/LaporanBulanPenjualanArea/",
            cache: false,
               beforeSend:function(){
                $("#result").html("<div align='center'><img  width='80' height=80'   src='http://36.89.27.201/sips/assets/images/logo/loading.gif' /></div>");
                },
               success:function(msg){
                $('#result').html(msg);
              }
        });
    }

 </script>