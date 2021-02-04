<?php
if ($action == "edit") {
    foreach ($field as $column) {
        $cIdTest  =   $column['id_recruitment_phl'];
        $cKodeWawancara  =   $column['kode_wawancara'];
        $createBy       =   $this->session->userdata('nama');
        $updateBy       =   $this->session->userdata('nama');
        $deleteBy       =   $this->session->userdata('nama');

        $nNilaiTes = "";
        if ($controller_name == "tes_kesehatan_phl") {
            $nNilaiTes     =   "";
        } elseif ($controller_name == "wawancara_hr") {
            $nNilaiTes      =   $column['nilai_wawancara_hr'];
        } elseif ($controller_name == "interview_user_1") {
            $nNilaiTes      =   $column['nilai_interview_user_1'];
        } else {
        }

        $cStatus        =   $column[$controller_name];
        $dTglWawancara  =   $column[$date];
        $cIconButton   =   "refresh";
        $cValueButton  =   "Update Data";
    }
    $cAction = "Update/" . $cIdTest . "";
} else {
    $cIdTest  =   "";
    $cKodeWawancara  =   "";
    $nNilaiTes     =   "";
    $cStatus        =   "";
    $dTglWawancara = "";
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
                            Input Data <?= $file ?>
                        </h3>
                    </div>
                </div>

                <!--begin::Form-->
                <form class="kt-form" method="post" enctype="multipart/form-data" action="<?= site_url('recruitment_phl_act/' . $controller_name . '/' . $cAction . '') ?>">
                    <div class="kt-portlet__body">
                        <div class="form-group">
                            <label>Nama Peserta</label>
                            <select class="form-control kt-selectpicker" data-live-search="true" name="cIdTest">
                                <option></option>
                                <?php
                                foreach ($row as $key => $value) {
                                    # code...
                                ?>
                                    <option value="<?= $value['id_recruitment_phl'] ?>" <?php if ($cIdTest == $value['id_recruitment_phl']) echo "selected"; ?>><?= $value['kode_wawancara'] ?> - <?= $value['nama'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <?php
                        if ($controller_name == "tes_kesehatan_phl") {
                        } else {
                        ?>
                            <div class="form-group">
                                <label>Nilai <?= $file ?></label>
                                <input type="text" name="nNilaiTes" class="form-control" placeholder="Nilai Tes" value="<?= $nNilaiTes ?>">

                            </div>
                        <?php
                        }
                        ?>

                        <div class="form-group">
                            <label>Tanggal Test</label>
                            <input type="date" name="dTglWawancara" id="tglW" class="form-control" data-date-format="dd-mm-yyyy" placeholder="Tanggal Test" value="<?= $dTglWawancara ?>">
                            <input type="hidden" name="whois" value="<?= $whois ?>">
                            <input type="hidden" name="whois_date" value="<?= $whois_date ?>">
                            <input type="hidden" name="cKW" value="<?= $cKodeWawancara ?>">
                        </div>

                        <?php
                        if ($controller_name == "tes_kesehatan_phl") {
                            foreach ($hasil_tes_kesehatan as $key => $value) {

                                if ($value['hasil_tes_kesehatan_phl'] == null && $value['tes_kesehatan_phl'] == 'pemanggilan') {

                        ?>
                                    <div class="form-group">

                                        <label> Upload Hasil Tes Kesehatan : </label>
                                        <b><span id="file_error" style="color: red;"></span></b>
                                        <input type="file" class="form-control btn btn-label-brand btn-bold btn-sm" id="file" name="cTesKes" onchange="return validasiEkstensi()" required />
                                        <div id="preview"></div>
                                        <span class="form-text text-muted">
                                            <ol>
                                                <li>Allowed File - <b>images(jpeg,jpg,png).</b></li>
                                                <li>Max Size 1MB</li>
                                            </ol>
                                        </span>
                                    </div>
                        <?php

                                } else {
                                }
                            }
                        }
                        ?>
                        <div class="form-group form-group-last">
                            <label>Status</label>
                            <select class="form-control kt-selectpicker" data-live-search="true" name="cStatus">
                                <option></option>
                                <option value="pemanggilan" <?php if ($cStatus == 'pemanggilan') echo "selected"; ?>>Pemanggilan</option>
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
                                <?php
                                if ($controller_name == "tes_kesehatan_phl") {
                                ?>
                                    <td>Hasil Tes Kesehatan</td>
                                <?php
                                } else {
                                ?>
                                    <td>Nilai Tes</td>
                                <?php
                                }
                                ?>
                                <td>Status</td>
                                <td>Status Email</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 0;
                            foreach ($row as $key => $vaArea) {
                                if ($vaArea['is_delete'] == 1 || $vaArea['status'] == "Menjadi Pegawai") {
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
                                        <td>
                                            <?php
                                            if ($controller_name == "tes_kesehatan_phl") {
                                                //echo $vaArea['hasil_tes_kesehatan'];
                                                if ($vaArea['hasil_tes_kesehatan_phl'] == NULL) {
                                                } else {
                                            ?>
                                                    <button type="button" class="btn btn-bold btn-label-info btn-outline-info btn-sm" data-toggle="modal" data-target="#kt_modal_3"> Preview</button>

                                                    <!--begin::Modal-->

                                                    <div class="modal fade" id="kt_modal_3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Hasil Tes Kesehatan <?= $vaArea['nama'] ?></h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form>
                                                                        <div class="form-group">
                                                                            <img src="<?= base_url() ?><?= $vaArea['hasil_tes_kesehatan_phl'] ?>" style="width:500%;max-width:700px" />
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!--end::Modal-->

                                            <?php
                                                }
                                            } else {
                                                echo $vaArea[$nilai_test];
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($vaArea[$controller_name] == 'pemanggilan') {
                                                $cLabel = 'info';
                                            } else if ($vaArea[$controller_name] == 'lolos') {
                                                $cLabel = 'success';
                                            } else if ($vaArea[$controller_name] == 'tidaklolos') {
                                                $cLabel = 'danger';
                                            } else {
                                                $cLabel = 'warning';
                                            }
                                            ?>
                                            <span class="btn btn-sm btn-<?= $cLabel ?>"><?= ($vaArea[$controller_name]) ?></span>
                                        </td>
                                        <td>
                                            <?php
                                            if ($controller_name == "wawancara_hr") {
                                                if ($vaArea['status_email_wawancara_hr'] == NULL) {
                                                    echo "Belum Kirim Email";
                                                } elseif ($vaArea['wawancara_hr'] == "tidaklolos") {
                                                    echo "$vaArea[status_email_tidaklolos]";
                                                } else {
                                                    echo "$vaArea[status_email_wawancara_hr]";
                                                }
                                            } elseif ($controller_name == "interview_user_1") {
                                                if ($vaArea['status_email_interview_u1'] == NULL) {
                                                    echo "Belum Kirim Email";
                                                } elseif ($vaArea['interview_user_1'] == "tidaklolos") {
                                                    echo "$vaArea[status_email_tidaklolos]";
                                                } else {
                                                    echo "$vaArea[status_email_interview_u1]";
                                                }
                                            } elseif ($controller_name == "tes_kesehatan_phl") {
                                                if ($vaArea['status_email_tes_kesehatan_phl'] == NULL) {
                                                    echo "Belum Kirim Email";
                                                } elseif ($vaArea['tes_kesehatan_phl'] == "tidaklolos") {
                                                    echo "$vaArea[status_email_tidaklolos]";
                                                } else {
                                                    echo "$vaArea[status_email_tes_kesehatan_phl]";
                                                }
                                            }
                                            ?>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group" role="group" aria-label="First group">
                                                <a class="btn btn-sm btn-outline-success btn-elevate btn-icon mr-2" title="Edit Data" href="<?= site_url('recruitment_phl/' . $controller_name . '/edit/' . $vaArea['id_recruitment_phl'] . '') ?>">
                                                    <i class="flaticon-edit"></i>
                                                </a>
                                                <a class="btn btn-sm btn-outline-info btn-elevate btn-icon" title="Email Calon" href="<?= site_url('send_email_act/send_email_phl/' . $controller_name . '/' . $vaArea['id_recruitment_phl'] . '') ?>">
                                                    <i class="flaticon-mail"></i>
                                                </a>
                                                <!-- <a class="btn btn-sm btn-outline-danger btn-elevate btn-icon" title="Hapus Data" onclick="if(confirm('Apakah anda yakin akah menghapus data?'))
                                { window.location.href='<?= site_url('recruitment_phl_act/' . $controller_name . '/Delete/' . $vaArea['id_recruitment_phl'] . '') ?>'}">
                                                    <i class="flaticon-delete"></i>
                                                </a> -->
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

<script type="text/javascript">
    function validasiEkstensi() {
        var inputFile = document.getElementById('file');
        var cekData = document.getElementById('cekData');
        var cekData = document.getElementById('mybtn');
        var pathFile = inputFile.value;
        var ekstensiOk = /(\.jpg|\.jpeg|\.png)$/i;

        $("#file_error").html("");
        $("#btn_disabled").html("");
        var file_size = $('#file')[0].files[0].size;
        if (file_size > 1000000) {
            $("#file_error").html("** File maksimal 1MB");
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('preview').innerHTML = '<img src="' + e.target.result + '" style="width:100%;max-width:300px"/>';
            };
            reader.readAsDataURL(inputFile.files[0]);

            if (inputFile.files && inputFile.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('preview').innerHTML = '<img src="' + e.target.result + '" style="width:100%;max-width:300px"/>';
                    document.getElementById('mybtn').innerHTML = '<button type="submit" id="button" class="btn btn-primary" disabled>';
                };
                reader.readAsDataURL(inputFile.files[0]);
            }

            //return false;
        } else if (!ekstensiOk.exec(pathFile)) {
            $("#file_error").html("** Sorry Your Ekstension File is not allowed.");
            inputFile.value = '';

            if (inputFile.files && inputFile.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('preview').innerHTML = '<img src="' + e.target.result + '" style="width:100%;max-width:300px"/>';
                    document.getElementById('mybtn').innerHTML = '<button type="submit" id="button" class="btn btn-primary" disabled>';
                };
                reader.readAsDataURL(inputFile.files[0]);
            }

            //return false;
        } else {
            // Preview gambar
            if (inputFile.files && inputFile.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('preview').innerHTML = '<img src="' + e.target.result + '" style="width:100%;max-width:300px"/>';
                    document.getElementById('mybtn').innerHTML = '<button type="submit" id="button" class="btn btn-primary">';
                };
                reader.readAsDataURL(inputFile.files[0]);
            }
        }

    }
</script>