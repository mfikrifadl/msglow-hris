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
    <?php
    if ($this->session->userdata('level') == 1 || $this->session->userdata('level') == 2 || $this->session->userdata('level') == 100) {
    ?>
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
                                                    <?php
                                                    if ($this->session->userdata('level') == 100) {
                                                    ?>

                                                        <button class="btn btn-info btn-sm" style="font-size: 10px;" onclick="window.alert('Maaf Anda Tidak Mempunyai Kewenangan')">
                                                            <i class="fa fa-sign-in-alt"></i> Masukkan Ke Data Pegawai
                                                        </button>

                                                    <?php
                                                    } else {
                                                    ?>
                                                        <a href="<?= site_url('recruitment_phl_act/to_pegawai_phl/' . $vaArea['id_recruitment_phl'] . '') ?>">
                                                            <button class="btn btn-info btn-sm" style="font-size: 10px;"> <i class="fa fa-sign-in-alt"></i> Masukkan Ke Data Pegawai </button>
                                                        </a>
                                                    <?php
                                                    }
                                                    ?>

                                                <?php
                                                } else {
                                                ?>
                                                    <?php
                                                    if ($this->session->userdata('level') == 100) {
                                                    ?>
                                                        <a class="btn btn-sm btn-outline-success btn-elevate btn-icon mr-2" title="Lolos" onclick="window.alert('Maaf Anda Tidak Mempunyai Kewenangan')" href="#">
                                                            <i class="flaticon2-check-mark"></i>
                                                        </a>
                                                        <a class="btn btn-sm btn-outline-danger btn-elevate btn-icon" title="Tidak Lolos" onclick="window.alert('Maaf Anda Tidak Mempunyai Kewenangan')">
                                                            <i class="flaticon2-cross"></i>
                                                        </a>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <a class="btn btn-sm btn-outline-success btn-elevate btn-icon mr-2" title="Lolos" href="<?= site_url('recruitment_phl_act/aksi/lolos/' . $vaArea['id_recruitment_phl'] . '') ?>">
                                                            <i class="flaticon2-check-mark"></i>
                                                        </a>
                                                        <a class="btn btn-sm btn-outline-danger btn-elevate btn-icon" title="Tidak Lolos" data-toggle="modal" data-target="#id-<?= $vaArea['id_recruitment_phl'] ?>">
                                                            <i class="flaticon2-cross"></i>
                                                        </a>
                                                    <?php
                                                    }
                                                    ?>


                                                    <!-- Modal edit category -->
                                                    <div id="id-<?= $vaArea['id_recruitment_phl'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="alasanTidakLolos" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title" id="alasanTidakLolos">Edit Kategori</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="mdi mdi-close"></i></button>
                                                                </div>
                                                                <form action="<?= site_url('recruitment_phl_act/aksi/tidaklolos/' . $vaArea['id_recruitment_phl'] . '') ?>" method="POST" class="d-inline-block" enctype="multipart/form-data">
                                                                    <div class="modal-body">
                                                                        <div class="form-group">
                                                                            <label for="alasanTidakLolos" class="control-label col-form-label">Alasan Tidak diterima</label>
                                                                            <input type="text" class="form-control" name="alasanTidakLolos" id="alasanTidakLolos" value="" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit" name="submit" class="btn btn-primary waves-effect">Simpan</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End modal add category -->
                                                <?php } ?>
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
    <?php
    } else {
    }
    ?>

</div>