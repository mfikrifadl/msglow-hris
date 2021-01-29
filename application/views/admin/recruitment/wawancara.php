  <?php
  if ($action == "edit") {
    foreach ($field as $column) {
      $cIdWawancara   =   $column['id_recruitment'];
      $createBy       =   $this->session->userdata('nama');
      $updateBy       =   $this->session->userdata('nama');
      $deleteBy       =   $this->session->userdata('nama');
      $cKodeWawancara =   $column['kode_wawancara'];
      // $dTglWawancara  =   String2Date($column['tanggal_wawancara']);
      $dTglWawancara  =   $column['tanggal_wawancara'];
      $cNama          =   $column['nama'];
      $cNomorTelepon  =   $column['nomor_telepon'];
      $cEmail         =   $column['email'];
      $cStatus        =   $column['status'];
      $cLevel        =   $column['level_id'];
      $cJob       =   $column['job'];
      $cJob_id          =   $column['job_id'];
      // $cTahap         =   $column['tahap'];
      $cIconButton   =   "refresh";
      $cValueButton  =   "Update Data";
    }
    $cAction = "Update/" . $cKodeWawancara . "";
  } else {
    $cIdWawancara   =   "";
    $cKodeWawancara   =   "";
    // $cKodeWawancara =   "WWCR-" . date("ymd");
    $cKodeWawancara =   "";
    $dTglWawancara  =   "";
    $cNama          =   "";
    $cNomorTelepon  =   "";
    $cEmail         =   "";
    $cStatus        =   "";
    $cLevel        =   "";
    $cTahap         =   "";
    $cJob         =   "";
    $cJob_id          =  "";
    $cIconButton  = "save";
    $cValueButton = "Save Data";
    $cAction      = "Insert";
  }
  ?>
  <?php $whois = $this->session->userdata('nama'); ?>
  <!-- begin:: Content -->
  <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <div class="row">
      <div class="col-sm-12">
        <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
          <li class="breadcrumb-item"><?= $menu ?></li>
          <li class="breadcrumb-item active"><?= $file ?></li>
        </ul>
      </div>
    </div>

    <div class="row">
      <div class="col-md-4">

        <!--begin::Portlet-->
        <div class="kt-portlet kt-portlet--height-fluid">
          <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
              <h3 class="kt-portlet__head-title">
                Input Data Calon Pegawai
              </h3>
            </div>
          </div>

          <!--begin::Form-->
          <form class="kt-form kt-form--label-right" method="post" enctype="multipart/form-data" action="<?= site_url('recruitment_act/wawancara/' . $cAction . '') ?>">
            <div class="kt-portlet__body">
              <div class="form-group">
                <label>Kode Wawancara</label>
                <input type="text" name="cKodeWawancara" id="cKodeWawancara" placeholder="Kode Wawancara" class="form-control" value="<?= $cKodeWawancara ?>" required>
                <input type="hidden" value="<?= $cIdWawancara ?>" name="cIdWawancara" id="cIdWawancara">
                <input type="hidden" value="<?= $whois ?>" name="whois" id="whois">
              </div>
              <div class="form-group">
                <label>Nama</label>
                <input type="text" name="cNama" id="cNama" class="form-control" placeholder="Nama Peserta" value="<?= $cNama ?>">
              </div>
              <div class="form-group">
                <label>Nomor Telepon</label>
                <input type="text" name="cNomorTelepon" id="cNomorTelepon" class="form-control" placeholder="Nomor Telepon" value="<?= $cNomorTelepon ?>">
              </div>
              <div class="form-group">
                <label>Email</label>
                <input type="email" name="cEmail" id="cEmail" class="form-control" placeholder="Email" value="<?= $cEmail ?>">
              </div>
              <div class="form-group">
                <label>Pekerjaan</label>
                <input name="cJob" id="cJob" type="text" class="form-control" placeholder="Pekerjaan" value="<?= $cJob ?>">
                <input type="hidden" name="cJob_id" id="cJob_id" value="<?= $cJob_id ?>">
              </div>
              <div class="form-group">
                <label>Interviewer</label>
                <select class="form-control kt-selectpicker" data-live-search="true" id="cLevel" name="cLevel">
                  <option></option>
                  <?php foreach ($levels as $key => $level) { ?>
                    <option value="<?= $level['id_level'] ?>" <?php if ($cLevel == $level['id_level']) echo "selected"; ?>>
                      <?= $level['level'] ?>
                    </option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <label>Tanggal Wawancara</label>
                <input type="date" name="dTglWawancara" id="tglW" class="form-control" data-date-format="dd-mm-yyyy" placeholder="Tanggal Wawancara" value="<?= $dTglWawancara ?>">
              </div>
              <div class="form-group">
                <label>Status</label>
                <select class="form-control kt-selectpicker" data-live-search="true" id="cStatus" name="cStatus">
                  <option></option>
                  <option value="pemanggilan" <?php if ($cStatus == 'pemanggilan') echo "selected"; ?>>Pemanggilan</option>
                  <option value="lolos" <?php if ($cStatus == 'lolos') echo "selected"; ?>>Lolos</option>
                  <option value="tidaklolos" <?php if ($cStatus == 'tidaklolos') echo "selected"; ?>>Tidak Lolos</option>
                </select>
              </div>
            </div>
            <div class="kt-portlet__foot">
              <div class="kt-form__actions">
                <?php
                if ($action == 'edit') {
                ?>
                  <button type="submit" class="btn btn-flat btn-primary">
                    <i class="fa fa-<?= $cIconButton ?>"></i> <?= $cValueButton ?>
                  </button>
                <?php } else { ?>
                  <button type="button" onclick="return save();" class="btn btn-flat btn-primary">
                    <i class="fa fa-<?= $cIconButton ?>"></i> <?= $cValueButton ?>
                  </button>
                <?php } ?>
                <button type="button" onclick="return selesai();" class="btn btn-flat btn-success">
                  <i class="fa fa-arrow-right"></i> Selesai
                </button>
              </div>
            </div>
          </form>

          <!--end::Form-->
        </div>

        <!--end::Portlet-->

      </div>
      <div class="col-md-8">

        <!--begin::Portlet-->
        <div class="kt-portlet kt-portlet--height-fluid">

          <!--begin::Form-->

          <div class="kt-portlet__body">
            <table class="table table-striped table-bordered" id="DataTableWawancara">
              <thead>
                <tr>
                  <td>No</td>
                  <td>Action</td>
                  <td>ID Registrant</td>
                  <td>Lowongan</td>
                  <td>Nama</td>
                  <td>Pendidikan</td>
                  <td>Email</td>
                  <td>Telp</td>
                </tr>
              </thead>
              <tbody>
                <?php $no = 0;
                foreach ($registrant as $vaAreaa) { ?>
                  <tr>
                    <td><?= ++$no; ?></td>
                    <td>
                      <div class="btn-group btn-group-sm" role="group" aria-label="Large button group">
                        <button type="button" onclick="setinput(<?= ($vaAreaa['id']) ?>)" class="btn btn-outline-success">
                          <i class="flaticon2-edit"></i>
                        </button>
                        <a class="btn btn-outline-warning" title="View Data" target="_blank" href="<?= site_url('recruitment/view_wawancara/' . $vaAreaa['id'] . '') ?>">
                          <i class="la la-search"></i>
                        </a>
                        <button type="button" onclick="setinput(<?= ($vaAreaa['id']) ?>)" class="btn btn-outline-danger">
                          <i class="flaticon2-trash"></i>
                        </button>
                      </div>
                    </td>
                    <td><?= $vaAreaa['reg_id'] ?></td>
                    <td><?= $vaAreaa['job_name'] ?></td>
                    <td><?= $vaAreaa['reg_name'] ?></td>
                    <td><?= $vaAreaa['graduate'] ?></td>
                    <td><?= $vaAreaa['reg_email'] ?></td>
                    <td><?= $vaAreaa['reg_tlp'] ?></td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>

          <!--end::Form-->
        </div>

        <!--end::Portlet-->
      </div>
    </div>
    <div class="row">
      <div class="col-12">

        <!--begin::Portlet-->
        <div class="kt-portlet">

          <!--begin::Form-->
          <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
              <h3 class="kt-portlet__head-title">
                Peserta Pemanggilan dan Lolos
              </h3>
            </div>
          </div>

          <div class="kt-portlet__body">
            <table class="table table-striped table-bordered" id="DataTable">
              <thead>
                <tr>
                  <td>No</td>
                  <td>Kode Wawancara</td>
                  <td>Peserta</td>
                  <td>Posisi</td>
                  <td>Status</td>
                  <td>Status Email</td>
                  <td>Action</td>
                </tr>
              </thead>
              <tbody>
                <?php $no = 0;
                foreach ($row as $key => $vaArea) { ?>
                  <tr>
                    <td><?= ++$no; ?></td>
                    <td>
                      <strong><?= $vaArea['kode_wawancara'] ?></strong> <br />
                      <?= $vaArea['tanggal_wawancara'] ?>
                    </td>
                    <td>
                      <b> Nama : </b> <?= ($vaArea['nama']) ?> <br />
                      <b> No. Hp : </b> <?= ($vaArea['nomor_telepon']) ?> <br />
                      <b> Email : </b> <?= ($vaArea['email']) ?>
                    </td>
                    <td> <?= ($vaArea['job']) ?> </td>
                    <td>
                      <?php
                      if ($vaArea['recruitment'] == 'pemanggilan') {
                        $cLabel = 'info';
                      } else if ($vaArea['recruitment'] == 'lolos') {
                        $cLabel = 'success';
                      } else if ($vaArea['recruitment'] == 'tidaklolos') {
                        $cLabel = 'danger';
                      }
                      ?>
                      <span class="kt-badge kt-badge--inline kt-badge--pill kt-badge--<?= $cLabel ?>"><?= ($vaArea['recruitment']) ?></span>
                    </td>
                    <td> <?= ($vaArea['status_email_adm']) ?> </td>
                    <td>
                      <a class="btn btn-sm btn-outline-info btn-elevate btn-icon" title="Send Email" href="<?= site_url('send_email_act/send_email/wawancara/' . $vaArea['id_recruitment'] . '') ?>">
                        <i class="flaticon-mail"></i>
                      </a>
                      <a class="btn btn-sm btn-outline-success btn-elevate btn-icon" title="Edit Data" href="<?= site_url('recruitment/wawancara/edit/' . $vaArea['kode_wawancara'] . '') ?>">
                        <i class="flaticon-edit"></i>
                      </a>
                      <a class="btn btn-sm btn-outline-danger btn-elevate btn-icon" title="Hapus Data" onclick="if(confirm('Apakah anda yakin akah menghapus data?'))
                                { window.location.href='<?= site_url('recruitment_act/wawancara/Delete/' . $vaArea['id_recruitment'] . '') ?>'}">
                        <i class="flaticon-delete"></i>
                      </a>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>

          <!--end::Form-->
        </div>

        <!--end::Portlet-->
      </div>
    </div>

    <div class="row">
      <div class="col-12">

        <!--begin::Portlet-->
        <div class="kt-portlet">

          <!--begin::Form-->
          <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
              <h3 class="kt-portlet__head-title">
                Peserta Tidak Lolos
              </h3>
            </div>
          </div>

          <div class="kt-portlet__body">
            <table class="table table-striped table-bordered" id="DataTable">
              <thead>
                <tr>
                  <td>No</td>
                  <td>Kode Wawancara</td>
                  <td>Peserta</td>
                  <td>Status Email</td>
                  <td>Action</td>
                </tr>
              </thead>
              <tbody>
                <?php $no = 0;
                foreach ($tdklolos as $key => $vaArea) { ?>
                  <tr>
                    <td><?= ++$no; ?></td>
                    <td>
                      <strong><?= $vaArea['kode_wawancara'] ?></strong> <br />
                      <?= $vaArea['tanggal_wawancara'] ?>
                    </td>
                    <td>
                      <b> Nama : </b> <?= ($vaArea['nama']) ?> <br />
                      <b> No. Hp : </b> <?= ($vaArea['nomor_telepon']) ?> <br />
                      <b> Email : </b> <?= ($vaArea['email']) ?>
                    </td>
                    <td>
                      <?= ($vaArea['status_email_tidaklolos']) ?>
                    </td>
                    <td>
                      <a class="btn btn-sm btn-outline-info btn-elevate btn-icon" title="Send Email" href="<?= site_url('send_email_act/send_email/wawancara/' . $vaArea['id_recruitment'] . '') ?>">
                        <i class="flaticon-mail"></i>
                      </a>
                      <a class="btn btn-sm btn-outline-success btn-elevate btn-icon" title="Edit Data" href="<?= site_url('recruitment/wawancara/edit/' . $vaArea['kode_wawancara'] . '') ?>">
                        <i class="flaticon-edit"></i>
                      </a>
                      <a class="btn btn-sm btn-outline-danger btn-elevate btn-icon" title="Hapus Data" onclick="if(confirm('Apakah anda yakin akah menghapus data?'))
                                { window.location.href='<?= site_url('recruitment_act/wawancara/Delete/' . $vaArea['id_recruitment'] . '') ?>'}">
                        <i class="flaticon-delete"></i>
                      </a>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>

          <!--end::Form-->
        </div>

        <!--end::Portlet-->
      </div>
    </div>
  </div>

  <!-- end:: Content -->

  <script src="<?php echo base_url(); ?>assets2/js/pages/crud/datatables/basic/scrollable.js" type="text/javascript"></script>

  <script type="text/javascript">
    function setinput(id) {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          var hasil = JSON.parse(this.responseText);
          console.log(hasil);
          var reg_id = hasil.data[0].reg_id;
          var nama = hasil.data[0].reg_name;
          var tlp = hasil.data[0].reg_tlp;
          var email = hasil.data[0].reg_email;
          var job = hasil.data[0].job_name;
          var job_id = hasil.data[0].job_id;

          document.getElementById('cKodeWawancara').value = reg_id;
          document.getElementById('cNama').value = nama;
          document.getElementById('cNomorTelepon').value = tlp;
          document.getElementById('cEmail').value = email;
          document.getElementById('cJob').value = job;
          document.getElementById('cJob_id').value = job_id;
        }
      };
      xmlhttp.open("GET", "<?= site_url('recruitment/wawancara_id') ?>/" + id, true);
      xmlhttp.send();
    }

    function save() {
      var cKodeWawancara = $('#cKodeWawancara').val();
      var dTglWawancara = $('#tglW').val();
      var cNama = $('#cNama').val();
      var cNomorTelepon = $('#cNomorTelepon').val();
      var cEmail = $('#cEmail').val();
      var cJob = $('#cJob').val();
      var cJob_id = $('#cJob_id').val();
      var cStatus = $('#cStatus').val();
      var cLevel = $('#cLevel').val();
      var whois = $('#whois').val();
      // alert(dTglWawancara);
      if (cKodeWawancara == "") {
        new PNotify({
          text: 'Pilih data pendaftar terlebih dahulu!',
          animation: 'slide',
          type: 'warning'
        });
      } else if (dTglWawancara == "") {
        new PNotify({
          text: 'Tanggal belum diisi!',
          animation: 'slide',
          type: 'warning'
        });
      } else if (cLevel == "") {
        new PNotify({
          text: 'Interviewer belum diisi!',
          animation: 'slide',
          type: 'warning'
        });
      } else if (cStatus == "") {
        new PNotify({
          text: 'Status belum diisi!',
          animation: 'slide',
          type: 'warning'
        });
      } else {
        $.ajax({
          type: "POST",
          data: "cKodeWawancara=" + cKodeWawancara +
            "&dTglWawancara=" + dTglWawancara +
            "&whois=" + whois +
            "&cNama=" + cNama +
            "&cNomorTelepon=" + cNomorTelepon +
            "&cStatus=" + cStatus +
            "&cJob=" + cJob +
            "&cJob_id=" + cJob_id +
            "&cLevel=" + cLevel +
            "&cEmail=" + cEmail,
          url: "<?= site_url('recruitment_act/wawancara/Insert') ?>",
          cache: false,
          success: function(msg) {
            new PNotify({
              // title: 'Success!',
              text: 'Berhasil Simpan Data Wawancara. Input Data Berikutnya',
              type: 'success'
            });
            $('#cNama').val("");
            $('#cNomorTelepon').val("");
            $('#cEmail').val("");
            $('#cJob').val("");
            $('#cJob_id').val("");
            $('#cStatus').val("")
            $('#cLevel').val("")
            $('#cNama').focus()
          }
        });
      }
    }

    function selesai() {
      window.location.href = "<?= site_url('recruitment/wawancara') ?>";
    }
  </script>