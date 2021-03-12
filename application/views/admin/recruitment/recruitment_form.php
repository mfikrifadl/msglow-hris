<?php
if ($action == "edit") {
    foreach ($field as $column) {
        $cIdTest  =   $column['id_recruitment'];

        $cKodeWawancara  =   $column['kode_wawancara'];
        $createBy       =   $this->session->userdata('nama');
        $updateBy       =   $this->session->userdata('nama');
        $deleteBy       =   $this->session->userdata('nama');
        //$nNilaiTes     =   "";
        if ($controller_name == "tes_kesehatan") {
            $cStatus_tes = $column['tes_kesehatan'];
            $nNilaiTes     =   "";
        } elseif ($controller_name == "psiko_test") {
            $cStatus_tes = $column['psiko_test'];
            $nNilaiTes      =   $column['nilai_psiko_test'];
        } elseif ($controller_name == "uji_kompetensi") {
            $cStatus_tes = $column['uji_kompetensi'];
            $nNilaiTes      =   $column['nilai_uji_kompetensi'];
        } elseif ($controller_name == "interview_user_1") {
            $cStatus_tes = $column['interview_user_1'];
            $nNilaiTes      =   $column['nilai_interview_user_1'];
            $cWaktuTes      = $column['waktu_interview_user_1'];
        } elseif ($controller_name == "interview_user_2") {
            $cStatus_tes = $column['interview_user_2'];
            $nNilaiTes      =   $column['nilai_interview_user_2'];
            $cWaktuTes      = $column['waktu_interview_user_2'];
        } elseif ($controller_name == "interview_hrga") {
            $cStatus_tes = $column['interview_hrga'];
            $nNilaiTes      =   $column['nilai_interview_hrga'];
            $cWaktuTes      = $column['waktu_interview_hrga'];
        } else {
        }

        $cStatus        =   $column[$controller_name];
        if ($controller_name == "interview_user_1" || $controller_name == "interview_user_2" || $controller_name == "interview_hrga") {
            $cWaktuTes      = $column['waktu_' . $controller_name];
        } else {
            $cWaktuTes = "";
        }

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
    $cWaktuTes      = "";
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

            <?php
            if ($action == "edit") {
            ?>

                <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                Input Data <?= $file ?>
                            </h3>
                        </div>
                    </div>

                    <!--begin::Form-->
                    <form class="kt-form" method="post" enctype="multipart/form-data" action="<?= site_url('recruitment_act/' . $controller_name . '/' . $cAction . '') ?>">
                        <div class="kt-portlet__body">

                            <div class="form-group">
                                <label>Nama Peserta</label>
                                <?php
                                foreach ($row as $key => $value) {
                                    if ($cIdTest == $value['id_recruitment']) {
                                ?>
                                        <input type="text" class="form-control" value="<?= $value['kode_wawancara'] ?> - <?= $value['nama'] ?>">
                                        <input type="hidden" name="cIdTest" value="<?= $value['id_recruitment'] ?>">
                                <?php
                                    } else {
                                    }
                                }
                                ?>

                                <!-- <select class="form-control kt-selectpicker" data-live-search="true" name="cIdTest" required>
                                <option></option> -->
                                <?php
                                // foreach ($row as $key => $value) {
                                # code...
                                ?>
                                <!-- <option value="<?= $value['id_recruitment'] ?>" <?php if ($cIdTest == $value['id_recruitment']) echo "selected"; ?>><?= $value['kode_wawancara'] ?> - <?= $value['nama'] ?></option> -->
                                <?php //} 
                                ?>
                                <!-- </select> -->
                            </div>

                            <?php
                            if ($controller_name == "tes_kesehatan") {
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
                                <input type="date" name="dTglWawancara" id="tglW" class="form-control" data-date-format="dd-mm-yyyy" placeholder="Tanggal Test" value="<?= $dTglWawancara ?>" required>
                                <input type="hidden" name="whois" value="<?= $whois ?>">
                                <input type="hidden" name="whois_date" value="<?= $whois_date ?>">
                                <input type="hidden" name="cKW" value="<?= $cKodeWawancara ?>">
                            </div>
                            <?php
                            if ($controller_name == "interview_user_1" || $controller_name == "interview_user_2" || $controller_name == "interview_hrga") {
                                if ($cStatus_tes == "lolos") {
                                } else {
                            ?>
                                    <div class="form-group">
                                        <label>Jam Test</label>
                                        <input type="time" name="cTimeWawancara" id="timeW" class="form-control" data-date-format="dd-mm-yyyy" placeholder="Tanggal Test" value="<?= $cWaktuTes ?>" required>
                                    </div>
                                    <?php
                                }
                            } else {
                            }

                            if ($controller_name == "tes_kesehatan") {
                                foreach ($hasil_tes_kesehatan as $key => $value) {

                                    if ($value['hasil_tes_kesehatan'] == null && $value['tes_kesehatan'] == 'pemanggilan') {

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
                                <select class="form-control kt-selectpicker" data-live-search="true" name="cStatus" required>
                                    <option></option>
                                    <option value="pemanggilan" <?php if ($cStatus_tes == 'pemanggilan') echo "selected"; ?>>Pemanggilan</option>
                                    <option value="lolos" <?php if ($cStatus_tes == 'lolos') echo "selected"; ?>>Lolos</option>
                                    <option value="tidaklolos" <?php if ($cStatus_tes == 'tidaklolos') echo "selected"; ?>>Tidak Lolos</option>
                                </select>
                            </div>
                        </div>
                        <div class="kt-portlet__foot">
                            <div class="kt-form__actions">
                                <button type="submit" id="button" class="btn btn-primary">
                                    <i class="fa fa-<?= $cIconButton ?>"></i> <?= $cValueButton ?>
                                </button>
                            </div>
                        </div>
                    </form>
                    <!--end::Form-->

                </div>
                <!--end::Portlet-->

            <?php
            } else {
            }
            ?>

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
                                if ($controller_name == "tes_kesehatan") {
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
                            $cEmail = "";
                            foreach ($row as $key => $vaArea) {
                                if ($vaArea['is_delete'] == 1 || $vaArea['status'] == "Menjadi Pegawai") {
                                } else {
                                    if ($this->session->userdata("level") == 4) {
                                        if ($vaArea['level_id'] == $this->session->userdata("id")) {
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
                                                    if ($controller_name == "tes_kesehatan") {
                                                        //echo $vaArea['hasil_tes_kesehatan'];
                                                        if ($vaArea['hasil_tes_kesehatan'] == NULL) {
                                                        } else {
                                                    ?>
                                                            <button type="button" class="btn btn-bold btn-label-info btn-outline-info btn-sm" data-toggle="modal" data-target="#kt_modal_3<?= $vaArea['id_recruitment'] ?>"> Preview </button>

                                                            <!--begin::Modal-->
                                                            <?php
                                                            $no = 0;
                                                            foreach ($row as $key => $vaAreaModal) {
                                                                ++$no;
                                                            ?>
                                                                <div class="modal fade" id="kt_modal_3<?= $vaAreaModal['id_recruitment'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog modal-lg" role="document">
                                                                        <div class="modal-content">

                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="exampleModalLabel">Hasil Tes Kesehatan <?= $vaAreaModal['nama'] ?></h5>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <form>
                                                                                    <div class="form-group">
                                                                                        <img src="<?= base_url() ?><?= $vaAreaModal['hasil_tes_kesehatan'] ?>" style="width:500%;max-width:700px" />
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <?php
                                                            } ?>
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
                                                    if ($controller_name == "psiko_test") {
                                                        if ($vaArea['status_email_p'] == NULL) {
                                                            echo "Belum Kirim Email";
                                                        } elseif ($vaArea['psiko_test'] == "tidaklolos") {
                                                            echo "$vaArea[status_email_tidaklolos]";
                                                        } else {
                                                            echo "$vaArea[status_email_p]";
                                                        }
                                                    } elseif ($controller_name == "uji_kompetensi") {
                                                        if ($vaArea['status_email_uk'] == NULL) {
                                                            echo "Belum Kirim Email";
                                                        } elseif ($vaArea['uji_kompetensi'] == "tidaklolos") {
                                                            echo "$vaArea[status_email_tidaklolos]";
                                                        } else {
                                                            echo "$vaArea[status_email_uk]";
                                                        }
                                                    } elseif ($controller_name == "interview_user_1") {
                                                        if ($vaArea['status_email_u1'] == NULL) {
                                                            echo "Belum Kirim Email";
                                                        } elseif ($vaArea['interview_user_1'] == "tidaklolos") {
                                                            echo "$vaArea[status_email_tidaklolos]";
                                                        } else {
                                                            echo "$vaArea[status_email_u1]";
                                                        }
                                                    } elseif ($controller_name == "interview_user_2") {
                                                        if ($vaArea['status_email_u2'] == NULL) {
                                                            echo "Belum Kirim Email";
                                                        } elseif ($vaArea['interview_user_2'] == "tidaklolos") {
                                                            echo "$vaArea[status_email_tidaklolos]";
                                                        } else {
                                                            echo "$vaArea[status_email_u2]";
                                                        }
                                                    } elseif ($controller_name == "interview_hrga") {
                                                        if ($vaArea['status_email_hrga'] == NULL) {
                                                            echo "Belum Kirim Email";
                                                        } elseif ($vaArea['interview_hrga'] == "tidaklolos") {
                                                            echo "$vaArea[status_email_tidaklolos]";
                                                        } else {
                                                            echo "$vaArea[status_email_hrga]";
                                                        }
                                                    } elseif ($controller_name == "tes_kesehatan") {
                                                        if ($vaArea['status_email_tes_kesehatan'] == NULL) {
                                                            echo "Belum Kirim Email";
                                                        } elseif ($vaArea['tes_kesehatan'] == "tidaklolos") {
                                                            echo "$vaArea[status_email_tidaklolos]";
                                                        } else {
                                                            echo "$vaArea[status_email_tes_kesehatan]";
                                                        }
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <div class="btn-group" role="group" aria-label="First group">
                                                        <a class="btn btn-sm btn-outline-success btn-elevate btn-icon mr-2" title="Edit Data" href="<?= site_url('recruitment/' . $controller_name . '/edit' . '/' . $vaArea['id_recruitment'] . '') ?>">
                                                            <i class="flaticon-edit"></i>
                                                        </a>
                                                        <a class="btn btn-sm btn-outline-info btn-elevate btn-icon" title="Send Email" href="<?= site_url('send_email_act/send_email/' . $controller_name . '/' . $vaArea['id_recruitment'] . '') ?>">
                                                            <i class="flaticon-mail"></i>
                                                        </a>
                                                        <!-- <a class="btn btn-sm btn-outline-danger btn-elevate btn-icon" title="Hapus Data" onclick="if(confirm('Apakah anda yakin akah menghapus data?'))
                                { window.location.href='<?= site_url('recruitment_act/' . $controller_name . '/Delete/' . $vaArea['id_recruitment'] . '') ?>'}">
                                                    <i class="flaticon-delete"></i>
                                                </a> -->
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php
                                        } else {
                                        }
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
                                                if ($controller_name == "tes_kesehatan") {
                                                    //echo $vaArea['hasil_tes_kesehatan'];
                                                    if ($vaArea['hasil_tes_kesehatan'] == NULL) {
                                                    } else {
                                                ?>
                                                        <button type="button" class="btn btn-bold btn-label-info btn-outline-info btn-sm" data-toggle="modal" data-target="#kt_modal_3<?= $vaArea['id_recruitment'] ?>"> Preview </button>

                                                        <!--begin::Modal-->
                                                        <?php
                                                        $no = 0;
                                                        foreach ($row as $key => $vaAreaModal) {
                                                            ++$no;
                                                        ?>
                                                            <div class="modal fade" id="kt_modal_3<?= $vaAreaModal['id_recruitment'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog modal-lg" role="document">
                                                                    <div class="modal-content">

                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Hasil Tes Kesehatan <?= $vaAreaModal['nama'] ?></h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form>
                                                                                <div class="form-group">
                                                                                    <img src="<?= base_url() ?><?= $vaAreaModal['hasil_tes_kesehatan'] ?>" style="width:500%;max-width:700px" />
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php
                                                        } ?>
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
                                                if ($controller_name == "psiko_test") {
                                                    if ($vaArea['status_email_p'] == NULL) {
                                                        echo "Belum Kirim Email";
                                                    } elseif ($vaArea['psiko_test'] == "tidaklolos") {
                                                        echo "$vaArea[status_email_tidaklolos]";
                                                    } else {
                                                        echo "$vaArea[status_email_p]";
                                                    }
                                                } elseif ($controller_name == "uji_kompetensi") {
                                                    if ($vaArea['status_email_uk'] == NULL) {
                                                        echo "Belum Kirim Email";
                                                    } elseif ($vaArea['uji_kompetensi'] == "tidaklolos") {
                                                        echo "$vaArea[status_email_tidaklolos]";
                                                    } else {
                                                        echo "$vaArea[status_email_uk]";
                                                    }
                                                } elseif ($controller_name == "interview_user_1") {
                                                    if ($vaArea['status_email_u1'] == NULL) {
                                                        echo "Belum Kirim Email";
                                                    } elseif ($vaArea['interview_user_1'] == "tidaklolos") {
                                                        echo "$vaArea[status_email_tidaklolos]";
                                                    } else {
                                                        echo "$vaArea[status_email_u1]";
                                                    }
                                                } elseif ($controller_name == "interview_user_2") {
                                                    if ($vaArea['status_email_u2'] == NULL) {
                                                        echo "Belum Kirim Email";
                                                    } elseif ($vaArea['interview_user_2'] == "tidaklolos") {
                                                        echo "$vaArea[status_email_tidaklolos]";
                                                    } else {
                                                        echo "$vaArea[status_email_u2]";
                                                    }
                                                } elseif ($controller_name == "interview_hrga") {
                                                    if ($vaArea['status_email_hrga'] == NULL) {
                                                        echo "Belum Kirim Email";
                                                    } elseif ($vaArea['interview_hrga'] == "tidaklolos") {
                                                        echo "$vaArea[status_email_tidaklolos]";
                                                    } else {
                                                        echo "$vaArea[status_email_hrga]";
                                                    }
                                                } elseif ($controller_name == "tes_kesehatan") {
                                                    if ($vaArea['status_email_tes_kesehatan'] == NULL) {
                                                        echo "Belum Kirim Email";
                                                    } elseif ($vaArea['tes_kesehatan'] == "tidaklolos") {
                                                        echo "$vaArea[status_email_tidaklolos]";
                                                    } else {
                                                        echo "$vaArea[status_email_tes_kesehatan]";
                                                    }
                                                }
                                                ?>
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group" role="group" aria-label="First group">
                                                    <a class="btn btn-sm btn-outline-success btn-elevate btn-icon mr-2" title="Edit Data" href="<?= site_url('recruitment/' . $controller_name . '/edit' . '/' . $vaArea['id_recruitment'] . '') ?>">
                                                        <i class="flaticon-edit"></i>
                                                    </a>
                                                    <a class="btn btn-sm btn-outline-info btn-elevate btn-icon" title="Send Email" href="<?= site_url('send_email_act/send_email/' . $controller_name . '/' . $vaArea['id_recruitment'] . '') ?>">
                                                        <i class="flaticon-mail"></i>
                                                    </a>
                                                    <!-- <a class="btn btn-sm btn-outline-danger btn-elevate btn-icon" title="Hapus Data" onclick="if(confirm('Apakah anda yakin akah menghapus data?'))
                                { window.location.href='<?= site_url('recruitment_act/' . $controller_name . '/Delete/' . $vaArea['id_recruitment'] . '') ?>'}">
                                                    <i class="flaticon-delete"></i>
                                                </a> -->
                                                </div>
                                            </td>
                                        </tr>

                            <?php
                                    }
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!--end::Portlet-->
        </div>

    </div>
</div>

<!-- end:: Content -->

<!-- Javascript -->
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
<!-- end Javascript -->