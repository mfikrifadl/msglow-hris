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
                  <td>Data Pelamar</td>
                  <td>Tahap Test</td>
                  <td>Status Test</td>
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
                      <b> Nama : </b> <?= ($vaArea['nama']) ?> <br />
                      <b> No. Hp : </b> <?= ($vaArea['nomor_telepon']) ?> <br />
                      <b> Email : </b> <?= ($vaArea['email']) ?> <br />
                      <b> Posisi : </b> <?= ($vaArea['job']) ?>
                    </td>
                    <td>

                      <?php
                      if ($vaArea['status'] == 'lolos') {
                        $cLabel = 'success';
                      } else if ($vaArea['status'] == 'tidaklolos') {
                        $cLabel = 'danger';
                      } else  $cLabel = 'info';
                      ?>
                      <span class="kt-badge kt-badge--inline kt-badge--pill kt-badge--<?= $cLabel ?>">
                        <?= $vaArea['tahap_r'] ?>
                      </span>
                      <!-- <label class="label label-<?= $cLabel ?>"><?= ($vaArea['status']) ?></label> -->

                    </td>
                    <td>
                      <?php                     

                      $status_test = "";
                      $cLabel = "";
                      if ($vaArea['tahap_r'] == "Test Administrasi") {

                        if ($vaArea['recruitment'] == 'lolos') {
                          $cLabel = 'success';
                        } else if ($vaArea['recruitment'] == 'tidaklolos') {
                          $cLabel = 'danger';
                        } else  $cLabel = 'info';

                        $status_test = $vaArea['recruitment'];

                      } elseif ($vaArea['tahap_r'] == "Psikotest") {

                        if ($vaArea['psiko_test'] == 'lolos') {
                          $cLabel = 'success';
                        } else if ($vaArea['psiko_test'] == 'tidaklolos') {
                          $cLabel = 'danger';
                        } else  $cLabel = 'info';

                        $status_test = $vaArea['psiko_test'];

                      } elseif ($vaArea['tahap_r'] == "Uji Kompetensi") {

                        if ($vaArea['uji_kompetensi'] == 'lolos') {
                          $cLabel = 'success';
                        } else if ($vaArea['uji_kompetensi'] == 'tidaklolos') {
                          $cLabel = 'danger';
                        } else  $cLabel = 'info';

                        $status_test = $vaArea['uji_kompetensi'];

                      } elseif ($vaArea['tahap_r'] == "Interview User 1") {

                        if ($vaArea['interview_user_1'] == 'lolos') {
                          $cLabel = 'success';
                        } else if ($vaArea['interview_user_1'] == 'tidaklolos') {
                          $cLabel = 'danger';
                        } else  $cLabel = 'info';

                        $status_test = $vaArea['interview_user_1'];

                      } elseif ($vaArea['tahap_r'] == "Interview User 2") {

                        if ($vaArea['interview_user_2'] == 'lolos') {
                          $cLabel = 'success';
                        } else if ($vaArea['interview_user_2'] == 'tidaklolos') {
                          $cLabel = 'danger';
                        } else  $cLabel = 'info';

                        $status_test = $vaArea['interview_user_2'];

                      } elseif ($vaArea['tahap_r'] == "Interview HRGA") {

                        if ($vaArea['interview_hrga'] == 'lolos') {
                          $cLabel = 'success';
                        } else if ($vaArea['interview_hrga'] == 'tidaklolos') {
                          $cLabel = 'danger';
                        } else  $cLabel = 'info';

                        $status_test = $vaArea['interview_hrga'];
                      }elseif ($vaArea['tahap_r'] == "Tes Kesehatan") {

                        if ($vaArea['tes_kesehatan'] == 'lolos') {
                          $cLabel = 'success';
                        } else if ($vaArea['tes_kesehatan'] == 'tidaklolos') {
                          $cLabel = 'danger';
                        } else  $cLabel = 'info';

                        $status_test = $vaArea['tes_kesehatan'];
                      }

                      ?>
                      <span class="kt-badge kt-badge--inline kt-badge--pill kt-badge--<?= $cLabel ?>">
                        <?= $status_test ?>
                      </span>
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
                  <td>Data Pelamar</td>
                  <td>Nilai Tes</td>
                  <td>Tahap Test</td>
                  <td>Status Test</td>
                  <td>Keterangan</td>
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
                        <b> Nama : </b> <?= ($vaArea['nama']) ?> <br />
                        <b> No. Hp : </b> <?= ($vaArea['nomor_telepon']) ?> <br />
                        <b> Email : </b> <?= ($vaArea['email']) ?> <br />
                        <b> Posisi : </b> <?= ($vaArea['job']) ?>
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
                        <span class="kt-badge kt-badge--inline kt-badge--pill kt-badge--<?= $cLabel ?>">
                          <?= $vaArea['tahap_r'] ?>
                        </span>
                      </td>
                      <td><?php
                          if ($vaArea['status'] == 'lolos') {
                            $cLabel = 'success';
                          } else if ($vaArea['status'] == 'tidaklolos') {
                            $cLabel = 'danger';
                          } else  $cLabel = 'info';
                          ?>
                        <span class="kt-badge kt-badge--inline kt-badge--pill kt-badge--<?= $cLabel ?>">
                          <?= $vaArea['status'] ?>
                        </span>
                      </td>
                      <td>
                        <span class="kt-badge kt-badge--inline kt-badge--pill ">
                          <?= $vaArea['alasan_tidak_lolos'] ?>
                        </span>
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