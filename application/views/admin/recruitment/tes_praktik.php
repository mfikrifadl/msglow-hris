  <?php
  if ($action == "edit") {
    foreach ($field as $column) {
      $cIdTesPraktik  =   $column['id_tes_praktik'];
      $createBy       =   $this->session->userdata('nama');
      $updateBy       =   $this->session->userdata('nama');
      $deleteBy       =   $this->session->userdata('nama');
      $cIdWawancara   =   $column['id_wawancara'];
      $nNilaiTes      =   $column['nilai_tes_praktik'];
      $cStatus        =   $column['status'];
      $cIconButton   =   "refresh";
      $cValueButton  =   "Update Data";
    }
    $cAction = "Update/" . $cIdTesPraktik . "";
  } else {
    $cIdTesPraktik  =   "";
    $cIdWawancara   =   "";
    $nNilaiTes     =   "";
    $cStatus        =   "";
    $cIconButton  = "save";
    $cValueButton = "Save Data";
    $cAction      = "Insert";
  }
  ?>
  <?php

  $whois = $this->session->userdata('nama');
  date_default_timezone_set('Asia/Jakarta');
  $whois_date = date('d-m-Y H:i:s');
  ?>
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
      <div class="col-4">
        <!--begin::Portlet-->
        <div class="kt-portlet">
          <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
              <h3 class="kt-portlet__head-title">
                Input Data Tes Keterampilan
              </h3>
            </div>
          </div>

          <!--begin::Form-->
          <form class="kt-form" method="post" enctype="multipart/form-data" action="<?= site_url('recruitment_act/tes_praktik/' . $cAction . '') ?>">
            <div class="kt-portlet__body">
              <div class="form-group">
                <label>Nama Peserta</label>
                <select class="form-control kt-selectpicker" data-live-search="true" name="cIdWawancara">
                  <option></option>
                  <?php
                  $db = $this->db->query("SELECT * FROM wawancara WHERE status = 'lolos' ");
                  foreach ($db->result_array() as $key => $value) {
                    # code...
                  ?>
                    <option value="<?= $value['id_wawancara'] ?>" <?php if ($cIdWawancara == $value['id_wawancara']) echo "selected"; ?>><?= $value['kode_wawancara'] ?> - <?= $value['nama'] ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <label>Nilai Tes Ketrampilan</label>
                <input type="text" name="nNilaiTes" class="form-control" placeholder="Nilai Tes" value="<?= $nNilaiTes ?>">
                <input type="hidden" name="whois" value="<?= $whois ?>">
                <input type="hidden" name="whois_date" value="<?= $whois_date ?>">
              </div>
              <div class="form-group form-group-last">
                <label>Status</label>
                <select class="form-control kt-selectpicker" data-live-search="true" name="cStatus">
                  <option></option>
                  <option value="lolos" <?php if ($cStatus == 'lolos') echo "selected"; ?>>Lolos</option>
                  <option value="tidaklolos" <?php if ($cStatus == 'tidaklolos') echo "selected"; ?>>Tidak Lolos</option>
                </select>
              </div>
            </div>
            <div class="kt-portlet__foot">
              <div class="kt-form__actions">
                <button type="submit" class="btn btn-primary">
                  <i class="fa fa-<?= $cIconButton ?>"></i> <?= $cValueButton ?>
                </button>
              </div>
            </div>
          </form>
          <!--end::Form-->

        </div>
        <!--end::Portlet-->
      </div>

      <div class="col-8">
        <!--begin::Portlet-->
        <div class="kt-portlet">
          <div class="kt-portlet__body">
            <table class="table table-striped table-bordered" id="DataTable">
              <thead>
                <tr>
                  <td>No</td>
                  <td>Kode Wawancara</td>
                  <td>Calon Pegawai</td>
                  <td>Nilai Tes</td>
                  <td>Status</td>
                  <td>Action</td>
                </tr>
              </thead>
              <tbody>
                <?php $no = 0;
                foreach ($row as $key => $vaArea) {
                  if ($vaArea['is_delete'] == 1) {
                  } else {
                ?>

                    <tr>
                      <td><?= ++$no; ?></td>
                      <td>
                        <?= $vaArea['kode_wawancara'] ?>
                      </td>
                      <td style="font-size: 11px;">
                        <strong>
                          Nama : <?= $vaArea['nama'] ?> <br />
                          No : Telepon <?= $vaArea['nomor_telepon'] ?> <br />
                          Email : <?= $vaArea['email'] ?> <br />
                        </strong>
                      </td>
                      <td><?= ($vaArea['nilai_tes_praktik']) ?> <br />
                      </td>
                      <td>
                        <?php
                        if ($vaArea['status'] == 'pemanggilan') {
                          $cLabel = 'info';
                        } else if ($vaArea['status'] == 'lolos') {
                          $cLabel = 'success';
                        } else if ($vaArea['status'] == 'tidaklolos') {
                          $cLabel = 'danger';
                        } else {
                          $cLabel = 'warning';
                        }
                        ?>
                        <span class="btn btn-sm btn-<?= $cLabel ?>"><?= ($vaArea['status']) ?></span>
                      </td>
                      <td class="text-center">
                        <div class="btn-group" role="group" aria-label="First group">
                          <a class="btn btn-sm btn-outline-success btn-elevate btn-icon" title="Edit Data" href="<?= site_url('recruitment/tes_praktik/edit/' . $vaArea['id_tes_praktik'] . '') ?>">
                            <i class="flaticon-edit"></i>
                          </a>
                          <a class="btn btn-sm btn-outline-danger btn-elevate btn-icon" title="Hapus Data" onclick="if(confirm('Apakah anda yakin akah menghapus data?'))
                                { window.location.href='<?= site_url('recruitment_act/tes_praktik/Delete/' . $vaArea['id_tes_praktik'] . '') ?>'}">
                            <i class="flaticon-delete"></i>
                          </a>
                        </div>
                      </td>
                    </tr>

                  <?php
                  }
                  ?>

                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
        <!--end::Portlet-->
      </div>

    </div>
  </div>

  <!-- end:: Content -->