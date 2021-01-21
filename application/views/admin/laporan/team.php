<section>
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
          <h3 class="box-title">Data Team Khusus PT.Global Insight Utama</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
      </div><!-- /.box-header -->
      <div class="box-body">
        <div class="nav-tabs-custom">
        <ul class="nav nav-tabs" id="myTabs">
           <li class="active"><a href="#tab_1" data-toggle="tab">Supervisor</a></li>  
           <li><a href="#tab_2"  data-toggle="tab">Tim Khusus</a></li>  
        </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="tab_1">
            <div class="row">
            <div class="col-sm-12">
              <h3>List Supervisor</h3>
              <table class="table table-bordered table-striped DataTablePegawai">
                <thead>
                  <tr>
                    <td>Nik</td>
                    <td>Nama</td>
                    <td>Telepon</td>
                    <td>Outlet</td>
                    <td>Act</td>
                  </tr>
                </thead>
                <tbody>
                <?php
                foreach ($spv as $key => $vaSpv) {?>
                  <tr>
                    <td><?=$vaSpv['nik']?></td>
                    <td><?=$vaSpv['nama']?></td>
                    <td><?=$vaSpv['telepon']?></td>
                    <td>Cooming Soon</td>
                    <td>
                    <a class="btn btn-link" title="View Data" href="<?=site_url('laporan/dt_spv/'.$vaSpv['id_spv'].'')?>">
                      <i class="fa fa-print"></i>
                    </a>
                  </td>
                  </tr>
                <?php } ?>
                </tbody>
              </table>
            </div>
            </div>
          </div>    
          <div class="tab-pane" id="tab_2">
            <div class="row">
            <div class="col-sm-12">
            <h3>Tim Khusus</h3>
            <div class="row">
              <div class="col-sm-3" align="right">Pilih Kategori Tim Khusus : </div>
              <div class="col-sm-6" align="left">
                <select name="cIdKategori" id="cIdKategori" 
                class="comboBox form-control" onchange="return GetData(this.value);">
                  <option></option>
                  <?php foreach ($list as $key => $vaList) { ?>
                  <option value="<?=$vaList['id_kategori_tim_khusus']?>">
                    <?=$vaList['keterangan']?>
                  </option>
                  <?php } ?>
                </select>
              </div>
              <div class="col-sm-2">
                <button type="button" class="btn btn-primary btn-flat">
                  <i class="fa fa-search"></i>
                </button>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <br/><br/>
                <div id="result"></div>
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
    </div>  
  </div>
</section>
  
    <script>
         function GetData(id){
          $.ajax({
            type: "GET",
            url: "<?=base_url()?>laporan/get_tim_khusus/"+id,
            cache: false,
            success:function(msg){
              $("#result").html(msg);
            }
           });
         }
      </script>