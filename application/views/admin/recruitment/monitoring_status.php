  <!-- begin:: Content -->
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

    <!--konten halaman ini bisa isi disini mulai dari <div class="row"> pada setiap widgetnya-->
    <div class="row">
      <div class="col-12">
        <div class="kt-portlet">
          <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
              <span class="kt-portlet__head-icon">
                <i class="kt-font-brand flaticon2-line-chart"></i>
              </span>
              <h3 class="kt-portlet__head-title">
                Data Semua Wawancara
              </h3>
            </div>
          </div>

          <div class="kt-portlet__body">
            <table class="table table-striped table-bordered" id="DataTable">
              <thead>
                <tr>
                  <td>No</td>
                  <td>Kode Wawancara</td>
                  <td>Tanggal Wawancara</td>
                  <td>Nama</td>
                  <td>Nomor Telepon</td>
                  <td>Email</td>
                  <td>Status</td>
                </tr>
              </thead>
              <tbody>
                <?php $no = 0;
                foreach ($row as $key => $vaArea) { ?>
                  <tr>
                    <td><?= ++$no; ?></td>
                    <td>
                      <?= $vaArea['kode_wawancara'] ?>
                    </td>
                    <td>
                      <?= $vaArea['tanggal_wawancara'] ?>
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
                      if ($vaArea['status'] == 'lolos') {
                        $cLabel = 'success';
                      } else if ($vaArea['status'] == 'tidaklolos') {
                        $cLabel = 'danger';
                      } else  $cLabel = 'info';
                      ?>
                      <span class="kt-badge kt-badge--inline kt-badge--pill kt-badge--<?= $cLabel ?>"><?php if ($vaArea['status'] == 'lolos') echo 'Lolos';
                                                                                                      elseif ($vaArea['status'] == 'tidaklolos') echo 'tidak lolos';
                                                                                                      elseif ($vaArea['interview_hrga'] != null) echo 'Interview HRGA';
                                                                                                      elseif ($vaArea['interview_user_2'] != null) echo 'Interview User 2';
                                                                                                      elseif ($vaArea['interview_user_1'] != null) echo 'Interview User 1';
                                                                                                      elseif ($vaArea['uji_kompetensi'] != null) echo 'Uji Kompetensi';
                                                                                                      elseif ($vaArea['psiko_test'] != null) echo 'Psiko Test';
                                                                                                      elseif ($vaArea['recruitment'] != null) echo 'Administrasi';
                                                                                                      else echo $vaArea['status'] ?></span>
                      <!-- <label class="label label-<?= $cLabel ?>"><?= ($vaArea['status']) ?></label> -->

                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
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
                Data Semua Tes
              </h3>
            </div>
            <div class="kt-portlet__head-toolbar">

            </div>
          </div>
          <div class="kt-portlet__body">
            <table class="table table-striped table-bordered" id="DataTableTwo">
              <thead>
                <tr>
                  <td>No</td>
                  <td>Kode Wawancara</td>
                  <td>Nama</td>
                  <td>Nomor Telepon</td>
                  <td>Email</td>
                  <td>Nilai Tes</td>
                  <td>Status</td>
                </tr>
              </thead>
              <tbody>
                <?php $no = 0;
                foreach ($nilai as $key => $vaArea2) {
                  if ($vaArea2['is_delete'] == 1) {
                  } else {
                ?>

                    <tr>
                      <td><?= ++$no; ?></td>
                      <td>
                        <?= $vaArea2['kode_wawancara'] ?>
                      </td>
                      <td>
                        <?= $vaArea2['nama'] ?>
                      </td>
                      <td>
                        <?= $vaArea2['nomor_telepon'] ?>
                      </td>
                      <td>
                        <?= $vaArea2['email'] ?>
                      </td>
                      <td><?= ($vaArea2['total_nilai']) ?> <br />
                      </td>
                      <td>
                        <?php
                        if ($vaArea2['status'] == 'lolos') {
                          $cLabel = 'success';
                        } else if ($vaArea2['status'] == 'tidaklolos') {
                          $cLabel = 'danger';
                        } else {
                          $cLabel = 'info';
                        }
                        ?>
                        <span class="kt-badge kt-badge--inline kt-badge--pill kt-badge--<?= $cLabel ?>"><?php if ($vaArea2['status'] == 'lolos') echo 'Lolos';
                                                                                                        elseif ($vaArea['status'] == 'tidaklolos') echo 'tidak lolos';
                                                                                                        elseif ($vaArea2['interview_hrga'] != null) echo 'Interview HRGA';
                                                                                                        elseif ($vaArea2['interview_user_2'] != null) echo 'Interview User 2';
                                                                                                        elseif ($vaArea2['interview_user_1'] != null) echo 'Interview User 1';
                                                                                                        elseif ($vaArea2['uji_kompetensi'] != null) echo 'Uji Kompetensi';
                                                                                                        elseif ($vaArea2['psiko_test'] != null) echo 'Psiko Test';
                                                                                                        elseif ($vaArea2['recruitment'] != null) echo 'Administrasi';
                                                                                                        else echo $vaArea2['status'] ?></span>
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

  <!-- end:: Content -->