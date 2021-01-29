<?php
$cIconButton    =   "save";
$cValueButton   =   "Pengajuan";
$cAction        =   "Insert";

if ($action == "edit") {
    foreach ($pegawai as $column) {
        $cIdPegawai         = $column['id_pegawai'];
    }
    foreach ($unit_kerja as $columnUK) {
        $cIdRefJabatan      = $columnUK['id_ref_jabatan'];
    }
    // foreach ($subUnitKerja as $columnUK) {  
    //     $cIdUnitKerja      = $columnUK['id_unit_kerja'];    
    // }

} else {
    $cIdPegawai         = "";
    $cIdRefJabatan      = "";
    // $cIdUnitKerja       = "";
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
            <form method="post" enctype="multipart/form-data" action="<?= site_url('hak_akses_interview/form_pengajuan/tambah') ?>">
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
                                                        <select name="cIdPegawai" onchange="cek_pegawai(this.value)" class="form-control kt-selectpicker" data-live-search="true">
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
                                                    </div>
                                                </div> <!-- /.col-form -->
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label>NIK</label>
                                                        <input type="text" name="cNik" id="cNik" readonly="true" value="" class="form-control">
                                                        <input type="hidden" name="cNama" id="cNama">
                                                    </div>
                                                </div> <!-- /.col-form -->
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label>Jabatan</label>
                                                        <input type="text" name="cJabatan" id="cJabatan" readonly="true" value="" class="form-control">
                                                    </div>
                                                </div> <!-- /.col-form -->
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label>Sub Unit Kerja</label>
                                                        <input type="text" name="cSuk" id="cSuk" readonly="true" value="" class="form-control">
                                                    </div>
                                                </div> <!-- /.col-form -->
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label>Mengajukan permohonan penambahan karyawan pada Unit Kerja : </label>
                                                        <select name="cUnit_k" id="cUnit_k" onchange="cek_sub_unit_kerja(this.value)" class="form-control kt-selectpicker" data-live-search="true">
                                                            <option></option>
                                                            <?php
                                                            $jsArray = "var jason = new Array();\n";
                                                            foreach ($unit_kerja as $rowUk) {
                                                            ?>
                                                                <option value="<?= $rowUk['id_ref_jabatan'] ?>" <?php if ($rowUk['id_ref_jabatan'] == $cIdRefJabatan) echo 'selected'; ?>>
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
                                                        <input type="text" name="jmlP" value="" class="form-control">
                                                    </div>
                                                </div> <!-- /.col-form -->
                                            </div>


                                            <!-- /.col-form -->
                                            <div class="col-sm-12">
                                                <div class="kt-portlet__foot">
                                                <br /><br /><br /><br /><br /><br />
                                                    <button type="submit" class="btn btn-flat btn-primary">
                                                        <i class="fa fa-<?= $cIconButton ?>"></i> <?= $cValueButton ?>
                                                    </button>
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
                                                        <td>Nama Pengaju Form</td>
                                                        <td>Jabatan Unit Kerja</td>
                                                        <td>Sub Unit Kerja</td>
                                                        <td>Tambah Pegawai Bagian</td>
                                                        <td>Sub Unit Kerja</td>
                                                        <td>Total</td>
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
                                                                    <?= $vaArea['nama_pengaju_form'] ?>
                                                                </td>
                                                                <td>
                                                                    <?= $vaArea['unit_kerja_pengaju_form'] ?>
                                                                </td>
                                                                <td>
                                                                    <?= $vaArea['sub_unit_kerja_pf'] ?>
                                                                </td>
                                                                <td>
                                                                    <?= $vaArea['nama_jabatan'] ?>
                                                                </td>
                                                                <td>
                                                                    <?= $vaArea['nama_sub_unit_kerja'] ?>
                                                                </td>
                                                                <td>
                                                                    <?= $vaArea['total_man_power'] ?>
                                                                </td>
                                                                <td class="text-center">
                                                                    <a class="btn btn-sm btn-outline-success btn-elevate btn-icon" title="Edit Data" href="">
                                                                        <i class="flaticon-edit"></i>
                                                                    </a>
                                                                    <a class="btn btn-sm btn-outline-danger btn-elevate btn-icon" title="Hapus Data">
                                                                        <i class="flaticon-delete"></i>
                                                                    </a>
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