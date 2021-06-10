<?php
$cIconButton    =   "save";
$cValueButton   =   "Pengajuan";
$cAction        =   "Insert";

if ($action == "edit") {

    foreach ($row_edit as $columnP) {
        $cId_form      = $columnP['id_form'];
        $cJob_career      = $columnP['job_career'];
        $cIdPegawai         = $columnP['id_pegawai'];
        $cNik         = $columnP['nik'];
        $cJabatan_pengaju_form         = $columnP['unit_kerja_pengaju_form'];
        $cSub_unit_kerja_pf         = $columnP['sub_unit_kerja_pf'];
        $cSub_unit_kerja         = $columnP['nama_sub_unit_kerja'];
        $cId_sub_unit_kerja         = $columnP['id_sub_unit_kerja'];
        $cId_ref_jabatan         = $columnP['add_man_power_uk'];
        $ctotal_man_power         = $columnP['total_man_power'];
        $cNama_jabatan         = $columnP['nama_jabatan'];
        $cNama_pengaju_form         = $columnP['nama_pengaju_form'];
        $cJobDesc         = $columnP['job_desc'];
    }
    $cValueButton   =   "Update";
} else {
    $cId_form      = "";
    $cJob_career      = "";
    $cNik         = "";
    $cJabatan_pengaju_form         = "";
    $cSub_unit_kerja_pf         = "";
    $cId_sub_unit_kerja         = "";
    $cSub_unit_kerja         = "";
    $cId_ref_jabatan         = "";
    $cIdPegawai         = "";
    $cJob_career        = "";
    $ctotal_man_power         = "";
    $cNama_jabatan         = "";
    $cJobDesc         = "";
    $cNama_pengaju_form         = "";
    $cValueButton   =   "tambah";
}

?>

<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

    <!-- begin:: Content -->
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

        <!--Begin::Dashboard 6-->
        <!--Begin::Row-->
        <section class="connectedSortable">
            <div class="row">
                <div class="col-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                        <li class="breadcrumb-item"><?= $menu ?></li>
                        <li class="breadcrumb-item active"><?= $file ?></li>
                    </ul>
                </div>
            </div>
            <form method="post" enctype="multipart/form-data" action="<?= site_url('transaksi_act/form_pengajuan/' . $cValueButton . '/' . $cId_form) ?>">
                <div class="col-12">

                    <!--begin::Portlet Data Keluarga-->
                    <div class="kt-portlet">

                        <!--begin::Accordion-->

                        <div class="accordion accordion-solid accordion-toggle-plus" id="accordionExample6">
                            <div class="card">
                                <div class="card-header" id="headingOne6">
                                    <div class="card-title btn btn-primary text-info" data-toggle="collapse" data-target="#collapsePengajuanFormInterviewer" aria-expanded="true" aria-controls="collapsePengajuanFormInterviewer">
                                        <strong> Form Pengajuan Penambahan Pegawai </strong>
                                    </div>
                                </div>
                                <div id="collapsePengajuanFormInterviewer" class="collapse show" aria-labelledby="headingOne6" data-parent="#accordionExample6">
                                    <div class="card-body">
                                        <!--begin::Form-->
                                        <div class="kt-portlet__body">
                                            <div class="row">
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label>Nama Manager</label>
                                                        <?php
                                                        if ($action == "edit") {
                                                        ?>
                                                            <input type="text" readonly="true" value="<?= $cNama_pengaju_form ?>" class="form-control">

                                                            <input type="hidden" name="cIdPegawai" value="<?= $cIdPegawai ?>">
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <select name="cIdPegawai" onchange="cek_pegawai(this.value)" class="form-control kt-selectpicker" data-live-search="true" required>
                                                                <option></option>
                                                                <?php
                                                                $jsArray = "var jason = new Array();\n";
                                                                foreach ($pegawai as $dbRow) {
                                                                ?>
                                                                    <option value="<?= $dbRow['id_pegawai'] ?>" <?php if ($dbRow['id_pegawai'] == $cIdPegawai) echo 'selected'; ?>>
                                                                        <?= $dbRow['nik'] ?> : <?= $dbRow['nama'] ?>
                                                                    </option>';
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        <?php
                                                        }
                                                        ?>
                                                    </div>
                                                </div> <!-- /.col-form -->
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label>NIK</label>
                                                        <input type="text" name="cNik" id="cNik" readonly="true" value="<?= $cNik ?>" class="form-control">
                                                        <?php
                                                        if ($action == "edit") {
                                                        ?>
                                                            <input type="hidden" name="cNama" value="<?= $cNama_pengaju_form ?>">
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <input type="hidden" name="cNama" id="cNama">
                                                        <?php
                                                        }
                                                        ?>
                                                        <input type="hidden" name="level_admin" value="<?= $this->session->userdata('nama') ?>">

                                                    </div>
                                                </div> <!-- /.col-form -->
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label>Jabatan</label>
                                                        <input type="text" name="cJabatan" id="cJabatan" readonly="true" value="<?= $cJabatan_pengaju_form ?>" class="form-control">
                                                    </div>
                                                </div> <!-- /.col-form -->
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label>Sub Unit Kerja</label>
                                                        <input type="text" name="cSuk" id="cSuk" readonly="true" value="<?= $cSub_unit_kerja_pf ?>" class="form-control">
                                                    </div>
                                                </div> <!-- /.col-form -->
                                                <?php
                                                if ($action == "edit") {
                                                ?>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <hr />
                                                            <label>
                                                                <h5 class="text-info"> DATA SEBELUMNYA</h5>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label>Mengajukan permohonan penambahan karyawan pada Unit Kerja : </label>
                                                            <input type="text" readonly="true" value="<?= $cNama_jabatan ?>" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label>Sub Unit Kerja </label>
                                                            <input type="text" readonly="true" value="<?= $cSub_unit_kerja ?>" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <label>Total Penambahan Pegawai </label>
                                                            <input type="number" readonly="true" value="<?= $ctotal_man_power ?>" class="form-control">

                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <hr />
                                                    </div>
                                                <?php
                                                } else {
                                                }
                                                ?>

                                                <?php
                                                if ($action == "edit") {
                                                ?>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <h5 class="text-danger"> DATA UPDATE</h5>
                                                        </div>
                                                    </div>
                                                <?php
                                                } else {
                                                }
                                                ?>

                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label>Mengajukan permohonan penambahan karyawan pada Unit Kerja : </label>
                                                        <select name="cUnit_k" id="cUnit_k" onchange="cek_sub_unit_kerja(this.value)" class="form-control kt-selectpicker" data-live-search="true">
                                                            <option></option>
                                                            <?php
                                                            $jsArray = "var jason = new Array();\n";
                                                            foreach ($unit_kerja as $rowUk) {
                                                            ?>
                                                                <option value="<?= $rowUk['id_ref_jabatan'] ?>" <?php //if ($rowUk['id_ref_jabatan'] == $cId_ref_jabatan) echo 'selected'; 
                                                                                                                ?>>
                                                                    <?= $rowUk['nama_jabatan'] ?>
                                                                </option>';
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div> <!-- /.col-form -->

                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label>Sub Unit Kerja </label>
                                                        <div id="data_sub_unit_kerja"></div>
                                                    </div>
                                                </div> <!-- /.col-form -->

                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label>Total penambahan pegawai : </label>
                                                        <input type="number" name="jmlP" class="form-control" value="<?= $ctotal_man_power ?>" required>
                                                    </div>
                                                </div> <!-- /.col-form -->
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>Nama Job Career </label>
                                                    <input type="text" name="cJob_career" value="<?= $cJob_career ?>" class="form-control" required>
                                                </div>
                                            </div> <!-- /.col-form -->
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>Job Description</label>
                                                    <?php
                                                    if ($cJobDesc == null || $cJobDesc == "" || empty($cJobDesc)) {
                                                    ?>
                                                        <textarea name="cJobDesc" class="summernote form-control" id="kt_summernote_1" required></textarea>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <textarea name="cJobDesc" class="summernote form-control" id="kt_summernote_1" required><?= $cJobDesc ?></textarea>
                                                    <?php
                                                    }
                                                    ?>

                                                </div>
                                            </div> <!-- /.col-form -->
                                            <div class="col-12">
                                                <hr />
                                            </div>
                                            <!-- /.col-form -->
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <?php
                                                    if ($this->session->userdata('level') == 100) {
                                                    ?>
                                                        <button type="button" class="btn btn-flat btn-primary" onclick="window.alert('Maaf Anda Tidak Mempunyai Kewenangan')">
                                                            <i class="fa fa-<?= $cIconButton ?>"></i> <?= $cValueButton ?>
                                                        </button>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <button type="submit" class="btn btn-flat btn-primary">
                                                            <i class="fa fa-<?= $cIconButton ?>"></i> <?= $cValueButton ?>
                                                        </button>
                                                    <?php
                                                    }
                                                    ?>

                                                </div>
                                            </div>
                                        </div><!-- /.row -->
                                    </div>
                                    <!--end::Portlet Data Kontak-->
                                </div>
                            </div>
                        </div>
                        <!--end::Accordion-->
                    </div>
                    <!--end::Portlet Data Keluarga-->
                </div>
            </form>
            <!-- End Form -->

            <div class="row">
                <div class="col-12">

                    <!--begin:: Widgets/Order Statistics-->
                    <div class="kt-portlet">

                        <!--begin::Accordion-->

                        <div class="accordion accordion-solid accordion-toggle-plus" id="accordionTablePegawai">
                            <div class="card">
                                <div class="card-header" id="headingTablePegawai">
                                    <div class="card-title btn btn-primary text-info" data-toggle="collapse" data-target="#collapseTablePengajuan" aria-expanded="true" aria-controls="collapseTablePengajuan">
                                        <strong> Data Table Pengajuan </strong>
                                    </div>
                                </div>
                                <div id="collapseTablePengajuan" class="collapse show" aria-labelledby="headingTablePegawai" data-parent="#accordionTablePegawai">
                                    <!-- <div class="card-body"> -->

                                    <div class="kt-portlet__body">
                                        <table class="table table-striped table-bordered" id="DataTable">
                                            <thead>
                                                <tr>
                                                    <td>No</td>
                                                    <td>Status_Form</td>
                                                    <td>Nama_Pengaju_Form</td>
                                                    <td>Job_Career</td>
                                                    <td>Jabatan_Unit_Kerja</td>
                                                    <td>Sub_Unit_Kerja</td>
                                                    <td>Tambah_Pegawai_Bagian</td>
                                                    <td>Total</td>
                                                    <td>Action</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 0;
                                                foreach ($row as $key => $vaArea) { ?>

                                                    <tr>
                                                        <td><?= ++$no; ?></td>
                                                        <td>
                                                            <?php
                                                            if ($vaArea['status_pengajuan'] == 'approve') {
                                                                $cLabel = 'success';
                                                            } else if ($vaArea['status_pengajuan'] == 'unapprove') {
                                                                $cLabel = 'danger';
                                                            } else  $cLabel = 'info';
                                                            ?>
                                                            <span class="kt-badge kt-badge--inline kt-badge--pill kt-badge--<?= $cLabel ?>">
                                                                <?= $vaArea['status_pengajuan'] ?>
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <?= $vaArea['nama_pengaju_form'] ?>
                                                        </td>
                                                        <td>
                                                            <?= $vaArea['job_career'] ?>
                                                        </td>
                                                        <td>
                                                            <?= $vaArea['unit_kerja_pengaju_form'] ?>
                                                        </td>
                                                        <td>
                                                            <?= $vaArea['sub_unit_kerja_pf'] ?>
                                                        </td>
                                                        <td>
                                                            <?= $vaArea['nama_jabatan'] ?> / <?= $vaArea['nama_sub_unit_kerja'] ?>
                                                        </td>
                                                        <td>
                                                            <?= $vaArea['total_man_power'] ?>
                                                        </td>
                                                        <td class="text-center">
                                                            <div class="btn-group" role="group" aria-label="First group">
                                                                <?php
                                                                if ($this->session->userdata('level') == 1 || $this->session->userdata('level') == 100) {
                                                                    if ($vaArea['status_recruitment'] == 'PASSED') {
                                                                        if ($this->session->userdata('level') == 100) {
                                                                ?>
                                                                            <a class="btn btn-sm btn-outline-danger btn-elevate btn-icon" title="Hapus Data" onclick="window.alert('Maaf Anda Tidak Mempunyai Kewenangan')">
                                                                                <i class="flaticon-delete"></i>
                                                                            </a>
                                                                        <?php
                                                                        } else {
                                                                        ?>
                                                                            <a class="btn btn-sm btn-outline-danger btn-elevate btn-icon" title="Hapus Data" href="<?= site_url('transaksi_act/form_pengajuan/delete/' . $vaArea['id_form'] . '') ?>">
                                                                                <i class="flaticon-delete"></i>
                                                                            </a>
                                                                        <?php
                                                                        }
                                                                        ?>

                                                                        <?php
                                                                    } else {
                                                                        if ($vaArea['status_pengajuan'] == 'approve') {
                                                                        } else {
                                                                            if ($this->session->userdata('level') == 100) {
                                                                        ?>
                                                                                <a class="btn btn-sm btn-outline-success btn-elevate btn-icon" title="Approve" onclick="window.alert('Maaf Anda Tidak Mempunyai Kewenangan')">
                                                                                    <i class="flaticon2-check-mark"></i>
                                                                                </a>
                                                                            <?php
                                                                            } else {
                                                                            ?>
                                                                                <a class="btn btn-sm btn-outline-success btn-elevate btn-icon" title="Approve" href="<?= site_url('transaksi_act/form_pengajuan/approve/' . $vaArea['id_form'] . '') ?>">
                                                                                    <i class="flaticon2-check-mark"></i>
                                                                                </a>
                                                                            <?php
                                                                            }
                                                                            ?>


                                                                        <?php
                                                                        }
                                                                        if ($vaArea['level_admin'] == $this->session->userdata('nama')) {

                                                                        ?>
                                                                            <a class="btn btn-sm btn-outline-info btn-elevate btn-icon" title="Edit Data" href="<?= site_url('transaksi/pengajuan_form_karyawan/edit/' . $vaArea['id_form'] . '') ?>">
                                                                                <i class="flaticon-edit"></i>
                                                                            </a>
                                                                        <?php

                                                                        } else {
                                                                        }
                                                                        ?>

                                                                        <?php
                                                                        if ($this->session->userdata('level') == 100) {
                                                                        ?>
                                                                            <a class="btn btn-sm btn-outline-warning btn-elevate btn-icon" title="Reject" onclick="window.alert('Maaf Anda Tidak Mempunyai Kewenangan')">
                                                                                <i class="flaticon2-delete"></i>
                                                                            </a>

                                                                            <a class="btn btn-sm btn-outline-danger btn-elevate btn-icon" title="Hapus Data" onclick="window.alert('Maaf Anda Tidak Mempunyai Kewenangan')">
                                                                                <i class="flaticon-delete"></i>
                                                                            </a>
                                                                        <?php
                                                                        } else {
                                                                        ?>
                                                                            <a class="btn btn-sm btn-outline-warning btn-elevate btn-icon" title="Reject" href="<?= site_url('transaksi_act/form_pengajuan/unapprove/' . $vaArea['id_form'] . '') ?>">
                                                                                <i class="flaticon2-delete"></i>
                                                                            </a>

                                                                            <a class="btn btn-sm btn-outline-danger btn-elevate btn-icon" title="Hapus Data" href="<?= site_url('transaksi_act/form_pengajuan/delete/' . $vaArea['id_form'] . '') ?>">
                                                                                <i class="flaticon-delete"></i>
                                                                            </a>
                                                                        <?php
                                                                        }
                                                                        ?>



                                                                        <!-- <a class="btn btn-sm btn-outline-info btn-elevate btn-icon" title="Edit Data" href="<?= site_url('transaksi/pengajuan_form_karyawan/edit/' . $vaArea['id_form'] . '') ?>">
                                                                            <i class="flaticon-edit"></i>
                                                                        </a> -->

                                                                <?php
                                                                    }
                                                                } else {
                                                                }
                                                                ?>
                                                            </div>
                                                        </td>
                                                    <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                                <!-- </div> -->
                            </div>
                        </div>

                        <!--end::Accordion-->


                        <!--end:: Widgets/Order Statistics-->
                    </div>
                </div>
            </div>

            <!--End::Row-->

            <div class="row">
                <div class="col-12">

                    <!--begin:: Widgets/Order Statistics-->
                    <div class="kt-portlet">

                        <!--begin::Accordion-->

                        <div class="accordion accordion-solid accordion-toggle-plus" id="accordionManPower">
                            <div class="card">
                                <div class="card-header" id="headingManPower">
                                    <div class="card-title btn btn-primary text-info" data-toggle="collapse" data-target="#collapseManPower" aria-expanded="true" aria-controls="collapseManPower">
                                        <strong> Data Table Pengajuan Total Karyawan Yang Diterima </strong>
                                    </div>
                                </div>
                                <div id="collapseManPower" class="collapse show" aria-labelledby="headingManPower" data-parent="#accordionManPower">
                                    <!-- <div class="card-body"> -->

                                    <div class="kt-portlet__body">
                                        <table class="table table-striped table-bordered" id="DataTable">
                                            <thead>
                                                <tr>
                                                    <td>No</td>
                                                    <td>Status_Form</td>
                                                    <td>Nama_Pengaju_Form</td>
                                                    <td>Job_Career</td>
                                                    <td>Tambah_Pegawai_Bagian</td>
                                                    <td>Status</td>
                                                    <td>Pegawai_Diterima</td>
                                                    <td>Total_Pengajuan_Pegawai</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 0;
                                                foreach ($data_man_power_diterima as $key => $vaMP) {
                                                    if ($vaMP['is_delete'] == 1) {
                                                    } else { ?>

                                                        <tr>
                                                            <td><?= ++$no; ?></td>
                                                            <td>
                                                                <?php
                                                                if (empty($vaMP['status_pengajuan'])) {
                                                                } else {
                                                                    if ($vaMP['status_pengajuan'] == 'approve') {
                                                                        $cLabel = 'success';
                                                                    } else if ($vaMP['status_pengajuan'] == 'unapprove') {
                                                                        $cLabel = 'danger';
                                                                    } else  $cLabel = 'info';
                                                                ?>
                                                                    <span class="kt-badge kt-badge--inline kt-badge--pill kt-badge--<?= $cLabel ?>">
                                                                        <?= $vaMP['status_pengajuan'] ?>
                                                                    </span>
                                                                <?php
                                                                }
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?= $vaMP['nama_pengaju_form'] ?>
                                                            </td>
                                                            <td>
                                                                <?= $vaMP['job_career'] ?>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                if (empty($vaMP['nama_jabatan'])) {
                                                                } else {
                                                                    echo $vaMP['nama_jabatan'] . " / " . $vaMP['nama_sub_unit_kerja'];
                                                                }
                                                                ?>
                                                            </td>
                                                            <?php
                                                            $class_style = "";
                                                            if ($vaMP['status_recruitment'] == "ON PROGRESS") {
                                                                $class_style = 'class="text-warning"';
                                                            } elseif ($vaMP['status_recruitment'] == "PASSED") {
                                                                $class_style = 'class="text-success"';
                                                            } else {
                                                                $class_style = 'class="text-danger"';
                                                            }
                                                            ?>
                                                            <td <?= $class_style ?>>
                                                                <b> <?= $vaMP['status_recruitment'] ?> </b>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                if (empty($vaMP['pegawai_lolos']) || $vaMP['pegawai_lolos'] == 0) {
                                                                } else {
                                                                    echo $vaMP['pegawai_lolos'];
                                                                }
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?= $vaMP['total_man_power'] ?>
                                                            </td>
                                                        <?php } ?>
                                                    <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                                <!-- </div> -->
                            </div>
                        </div>

                        <!--end::Accordion-->


                        <!--end:: Widgets/Order Statistics-->
                    </div>
                </div>
            </div>

            <!--End::Row-->

        </section>
        <!--End::Dashboard 6-->
    </div>
    <!-- end:: Content -->
</div>

<script type="text/javascript">
    function cek_pegawai(data) {
        // alert(data);
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                hasil = (this.responseText).split('~');

                // alert (hasil);
                document.getElementById('cNik').value = hasil[0];
                document.getElementById('cNama').value = hasil[1];
                document.getElementById('cJabatan').value = hasil[2];
                document.getElementById('cSuk').value = hasil[3];

            }
        };
        xmlhttp.open("GET", "<?= site_url('Transaksi_act/get_pegawai_jabatan/') ?>/" + data, true);
        xmlhttp.send();
    }

    function cek_sub_unit_kerja(data) {

        var cUnit_k = $('#cUnit_k').val();
        $.ajax({
            type: "POST",
            url: "<?= base_url() ?>transaksi_act/get_sub_unit_kerja/" + cUnit_k,
            cache: false,
            beforeSend: function() {
                $('#data_sub_unit_kerja').html("Cek Data Ke Sistem .. ");
            },
            success: function(msg) {
                $("#data_sub_unit_kerja").html(msg);
            }
        });

    }
</script>