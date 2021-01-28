<?php
$cIconButton    =   "save";
$cValueButton   =   "Pengajuan";
$cAction        =   "Insert";
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
            <form method="post" enctype="multipart/form-data" action="<?= site_url('hak_akses_interview/aksi/tambah') ?>">
                <div class="col">

                    <!--begin::Portlet Data Keluarga-->
                    <div class="kt-portlet">

                        <!--begin::Accordion-->

                        <div class="accordion accordion-solid accordion-toggle-plus" id="accordionExample6">
                            <div class="card">
                                <div class="card-header" id="headingOne6">
                                    <div class="card-title btn btn-primary text-info" data-toggle="collapse" data-target="#collapsePengajuanFormInterviewer" aria-expanded="true" aria-controls="collapsePengajuanFormInterviewer">
                                        <strong> Form Pengajuan Interviewer </strong>
                                    </div>
                                </div>
                                <div id="collapsePengajuanFormInterviewer" class="collapse show" aria-labelledby="headingOne6" data-parent="#accordionExample6">
                                    <div class="card-body">
                                        <!--begin::Form-->
                                        <div class="kt-portlet__body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Nama Manager</label>
                                                    <select name="cIdPegawai" class="form-control kt-selectpicker" data-live-search="true">
                                                        <option></option>
                                                        <?php foreach ($pegawais as $pegawai) { ?>
                                                            <option value="<?= $pegawai['id'] ?>"><?= $pegawai['nama'] ?></option>
                                                        <?php } ?>
                                                    </select>

                                                </div>
                                            </div> <!-- /.col-form -->
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Unit Kerja Manager</label>
                                                    <input type="text" name="ukm" value="" class="form-control">
                                                </div>
                                            </div> <!-- /.col-form -->
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Mengajukan permohonan penambahan karyawan pada bagian : </label>
                                                    <input type="text" name="uk" value="" class="form-control">
                                                </div>
                                            </div> <!-- /.col-form -->
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label>Sub Unit Kerja </label>
                                                    <input type="text" name="uk" value="" class="form-control">
                                                </div>
                                            </div> <!-- /.col-form -->
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label>Total penambahan pegawai : </label>
                                                    <input type="text" name="jmlP" value="" class="form-control">
                                                </div>
                                            </div> <!-- /.col-form -->
                                        </div>
                                            

                                            <!-- /.col-form -->
                                            <div class="col-sm-12">
                                                <div class="kt-portlet__foot">

                                                    <div class="col-sm-12">
                                                        <button type="submit" class="btn btn-flat btn-primary">
                                                            <i class="fa fa-<?= $cIconButton ?>"></i> <?= $cValueButton ?>
                                                        </button>
                                                    </div>
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
            </form>
            <!-- End Form -->
            <?php if ($this->session->userdata('level') == 1) { ?>
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
                                                        <td>Username</td>
                                                        <td>Nama</td>
                                                        <td>Level</td>
                                                        <td>Action</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $no = 0;
                                                    foreach ($row as $key => $vaArea) {
                                                        if ($vaArea['is_deleted'] == 1) {
                                                        } else { ?>

                                                            <tr>
                                                                <td><?= ++$no; ?></td>
                                                                <td>
                                                                    <?= $vaArea['username'] ?>
                                                                </td>
                                                                <td>
                                                                    <?= $vaArea['nama'] ?>
                                                                </td>
                                                                <td>
                                                                    <?= $vaArea['level'] ?>
                                                                </td>
                                                                <td class="text-center">
                                                                    <?php if ($vaArea['is_interview'] == 1) { ?>
                                                                        <a class="btn btn-sm btn-outline-primary btn-elevate" title="Hapus Data" onclick="if(confirm('Apakah anda yakin akah approve akun ini?'))
                                { window.location.href='<?= site_url('hak_akses_interview/aksi/approve/' . $vaArea['id'] . '') ?>'}">
                                                                            Approve
                                                                        </a>
                                                                    <?php } else { ?>
                                                                        <a class="btn btn-sm btn-outline-danger btn-elevate" title="Hapus Data" onclick="if(confirm('Apakah anda yakin akah unapprove akun ini?'))
                                { window.location.href='<?= site_url('hak_akses_interview/aksi/unapprove/' . $vaArea['id'] . '') ?>'}">
                                                                            UnApprove
                                                                        </a>
                                                                    <?php } ?>
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
            <?php } ?>
            <!--End::Row-->

        </section>
        <!--End::Dashboard 6-->
    </div>
    <!-- end:: Content -->
</div>