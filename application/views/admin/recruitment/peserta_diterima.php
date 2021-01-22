<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
  <div class="row">
    <div class="col-12">
      <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
        <li class="breadcrumb-item"><?= $menu ?></li>
        <li class="breadcrumb-item active"><?= $file ?></li>
      </ul>
    </div>
  </div>

  <div class="row">
    <div class="col-12">
      <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
          <div class="kt-portlet__head-label">
            <span class="kt-portlet__head-icon">
              <i class="kt-font-brand flaticon2-line-chart"></i>
            </span>
            <h3 class="kt-portlet__head-title">
              Data Peserta Diterima
            </h3>
          </div>
          <div class="kt-portlet__head-toolbar">

          </div>
        </div>
        <div class="kt-portlet__body">
          <table class="table table-striped table-bordered" id="DataTable">
            <thead>
              <tr>
                <td>No</td>
                <td>Kode Wawancara</td>
                <td>Tanggal Wawancara</td>
                <td>Total Nilai</td>
                <td>Nama</td>
                <td>Nomor Telepon</td>
                <td>Email</td>
                <td>Status</td>
                <td>Action</td>
              </tr>
            </thead>
            <tbody>
              <?php $no = 0;
              foreach ($row as $key => $vaArea) {
                if ($vaArea['is_delete'] == 1) {
                } else { ?>

                  <tr>
                    <td><?= ++$no; ?></td>
                    <td>
                      <?= $vaArea['kode_wawancara'] ?>
                    </td>
                    <td>
                      <?= $vaArea['tanggal_wawancara'] ?>
                    </td>
                    <td>
                      <?= $vaArea['total_nilai'] ?>
                    </td>
                    <td>
                      <?= $vaArea['nama'] ?>
                    </td>
                    <td>
                      <?= $vaArea['nomor_telepon'] ?>
                    </td>
                    <td>
                      <?= $vaArea['email'] ?>
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

                      <span class="btn btn-<?= $cLabel ?>" style="font-size: 10px;"><?= ($vaArea['status']) ?></span>

                    </td>
                    <td class="text-center">
                      <?php
                      if ($vaArea['status'] == "Menjadi Pegawai") {
                      ?>

                        <span class="btn btn-secondary btn-sm btn-icon" disabled title="Telah Menjadi Pegawai"> <i class="fa fa-user-check"></i> </span>

                      <?php
                      } elseif ($vaArea['status'] == "lolos") {
                      ?>
                        <a href="<?= site_url('recruitment_act/to_pegawai/' . $vaArea['id_recruitment'] . '') ?>">
                          <button class="btn btn-info btn-sm" style="font-size: 10px;"> <i class="fa fa-sign-in-alt"></i> Masukkan Ke Data Pegawai </button>
                        </a>
                      <?php
                      } else {
                      }
                      ?>
                      <!-- <a href="<?= site_url('recruitment_act/to_pegawai/' . $vaArea['id_recruitment'] . '') ?>">
                      <button class="btn btn-success btn-sm"> <i class="fa fa-sign-in-alt"></i> Masukkan Ke Data Pegawai </button>
                    </a> -->
                    </td>
                  </tr>

                <?php
                }
                ?>

              <?php } ?>
            </tbody>
          </table>
        </div>
        <!-- end:: Content -->
      </div>
    </div>
  </div>
</div>